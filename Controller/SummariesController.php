<?php
/**
 * Created by PhpStorm.
 * User: yaotianlin
 * Date: 17/09/2014
 * Time: 3:17 PM
 */
class SummariesController extends AppController{

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'addABook';
    }


    public function index() {
        if ($this->Session->read('Book') == null) {
            $this->Session->setFlash('Please create the book first!');

            return $this->redirect(array(
                'controller'=>'books',
                'action'=>'add'
            ));
        }
        $book = $this->Summary->Book->find('first', array(
            'conditions'=>array('Book.id'=>$this->Session->read('Book'))
        ));
        // Calculate the royalty based on the formulate from MUP, two ways- RRP or NR
        $rrp_excl_gst = $book['PrintSpecification']['RRP']/1.1;
        $rrp_excl_gst_ebook = $book['PrintSpecification']['RRPEbook']/1.1;
        $royalty = 0.0;
        // Result contains the real value of the royalty
        $result = 0.0;
        $eBookRoyalty = 0.0;

        // Calculate the Royalty based on the RRP formula
        if ($book['Royalty']['royaltyMethod'] == 'RRP') {
            $royalty_h1 = 0.0;
            $royalty_h2 = 0.0;
            if ($book['Royalty']['hurdleTwo'] != null && $book['Royalty']['hurdleTwoRoyaltyRate'] != null) {
                if ($book['SalesForecast']['totalUnits'] > $book['Royalty']['hurdleTwo']) {
                    $royalty_h2 = ($book['SalesForecast']['totalUnits']-$book['Royalty']['hurdleTwo'])*$book['Royalty']['hurdleTwoRoyaltyRate']/100;
                    $royalty_h1 = ($book['Royalty']['hurdleTwo']-$book['Royalty']['hurdleOne'])*$book['Royalty']['hurdleOneRoyaltyRate']/100;
                }
                elseif ($book['SalesForecast']['totalUnits'] > $book['Royalty']['hurdleOne']) {
                    $royalty_h1 = ($book['SalesForecast']['totalUnits']-$book['Royalty']['hurdleOne'])*$book['Royalty']['hurdleOneRoyaltyRate']/100;
                }
            }
            elseif ($book['Royalty']['hurdleOne'] != null && $book['Royalty']['hurdleOneRoyaltyRate'] != null) {
                if ($book['SalesForecast']['totalUnits'] > $book['Royalty']['hurdleOne']) {
                    $royalty_h1 = ($book['SalesForecast']['totalUnits']-$book['Royalty']['hurdleOne'])*$book['Royalty']['hurdleOneRoyaltyRate']/100;

                }
            }
            $eBookRoyalty = $rrp_excl_gst_ebook * $book['SalesForecast']['totalUnitsEbook'] * $book['Royalty']['eBookRoyalty']/100;
            $royalty = $rrp_excl_gst*(($book['SalesForecast']['totalUnits'])*$book['Royalty']['startingRate']/100+$royalty_h1+$royalty_h2) + $eBookRoyalty;
            // Pay either Royalty or Advanced Payment
            if ($book['Royalty']['advancedPayment']== null || $book['Royalty']['advancedPayment'] <= $royalty ) {
                $result = $royalty;
            }

            elseif ($book['Royalty']['advancedPayment'] > $royalty) {
                $result = $book['Royalty']['advancedPayment'];
            }

        }
        // Calculate the Royalty based on the "NR" formula
        elseif ($book['Royalty']['royaltyMethod'] == 'NR') {
            $royalty_h1 = 0.0;
            $royalty_h2 = 0.0;
            if ($book['Royalty']['hurdleTwo'] != null && $book['Royalty']['hurdleTwoRoyaltyRate'] != null) {
                if ($book['SalesForecast']['totalUnits'] > $book['Royalty']['hurdleTwo']) {
                    $royalty_h2 = ($book['SalesForecast']['totalUnits']-$book['Royalty']['hurdleTwo'])*$book['Royalty']['hurdleTwoRoyaltyRate']/100;
                    $royalty_h1 = ($book['Royalty']['hurdleTwo']-$book['Royalty']['hurdleOne'])*$book['Royalty']['hurdleOneRoyaltyRate']/100;
                }
                elseif ($book['SalesForecast']['totalUnits'] > $book['Royalty']['hurdleOne']) {
                    $royalty_h1 = ($book['SalesForecast']['totalUnits']-$book['Royalty']['hurdleOne'])*$book['Royalty']['hurdleOneRoyaltyRate']/100;
                }
            }
            elseif ($book['Royalty']['hurdleOne'] != null && $book['Royalty']['hurdleOneRoyaltyRate'] != null) {
                if ($book['SalesForecast']['totalUnits'] > $book['Royalty']['hurdleOne']) {
                    $royalty_h1 = $rrp_excl_gst*($book['SalesForecast']['totalUnits']-$book['Royalty']['hurdleOne'])*$book['Royalty']['hurdleOneRoyaltyRate']/100;

                }
            }

            $eBookRoyalty = $rrp_excl_gst_ebook*(1-$book['SalesForecast']['averageTradeDiscountEbook']/100)*$book['SalesForecast']['totalUnitsEbook']*$book['Royalty']['eBookRoyalty']/100;
            $royalty = $rrp_excl_gst*(1-$book['SalesForecast']['averageTradeDiscount']/100)*($book['SalesForecast']['totalUnits']*$book['Royalty']['startingRate']/100+$royalty_h1+$royalty_h2) + $eBookRoyalty;
            // Pay either Royalty or Advanced Payment
            if ($book['Royalty']['advancedPayment']== null || $book['Royalty']['advancedPayment'] <= $royalty ) {
                $result = $royalty;
            }

            elseif ($book['Royalty']['advancedPayment'] > $royalty) {
                $result = $book['Royalty']['advancedPayment'];
            }

        }

        // Default rate for the distribution and advertising
        $distributionRate = $book['SalesForecast']['distributionRate']/100;
        $advertisingRate = $book['SalesForecast']['advertisingRate']/100;

        $distribution = $distributionRate * ($book['SalesForecast']['totalReceipts']+$book['SalesForecast']['totalReceiptsEbook']);
        $advertising = $advertisingRate * ($book['SalesForecast']['totalReceipts']+$book['SalesForecast']['totalReceiptsEbook']);

        $totalIncome = $book['SalesForecast']['totalReceipts']+$book['SalesForecast']['totalReceiptsEbook']+$book['Royalty']['rightsIncomeSplit']*$book['SalesForecast']['forcastRightsIncome'];
        $totalProductionCost = $result+$distribution+$advertising+$book['EditorialOrigination']['totalEditorial']+$book['ProductionOrigination']['totalProduction']+$book['PrintSpecification']['totalPrintQuotations'];
        // An associative array that contains all details for the summary/business case budget, refer to the database format
        $summary = array(
            'Summary' => array(
                'RRP'=>(float)$book['PrintSpecification']['RRP'],
                'RRPEbook'=>(float)$book['PrintSpecification']['RRPEbook'],
                'totalPrintRuns'=>(int)$book['PrintSpecification']['totalPrintRuns'],
                'avgTradeDiscount'=>(float)$book['SalesForecast']['averageTradeDiscount'],
                'avgEbookTradeDiscount'=>(float)$book['SalesForecast']['averageTradeDiscountEbook'],
                'physicalBooksSold'=>(int)$book['SalesForecast']['totalUnits'],
                'ebooksSold'=>(int)$book['SalesForecast']['totalUnitsEbook'],
                'totalBooksSold'=>(int)$book['SalesForecast']['totalUnits']+$book['SalesForecast']['totalUnitsEbook'],
                'physicalBookTradeRevenue'=>(float)$book['SalesForecast']['totalReceipts'],
                'ebookTradeRevenue'=>(float)$book['SalesForecast']['totalReceiptsEbook'],
                'totalTradeRevenue'=>$book['SalesForecast']['totalReceipts']+$book['SalesForecast']['totalReceiptsEbook'],
                'rightsIncome'=>$book['Royalty']['rightsIncomeSplit']*$book['SalesForecast']['forcastRightsIncome'],
                'totalIncome'=>$totalIncome,
                'printPaperBinding'=>(float)$book['PrintSpecification']['totalPrintQuotations'],
                'origination'=>$book['EditorialOrigination']['totalEditorial']+$book['ProductionOrigination']['totalProduction'],
                'totalCostOfGoodsSold'=>$book['EditorialOrigination']['totalEditorial']+$book['ProductionOrigination']['totalProduction']+$book['PrintSpecification']['totalPrintQuotations'],
                'royaltyExpense'=>$result,
                'distributionSalesCommissionRate'=>$distributionRate,
                'distributionSalesCommission'=>$distribution,
                'advertisingPromotionRate'=>$advertisingRate,
                'advertisingPromotion'=>$advertising,
                'totalSellingCost'=>$result+$distribution+$advertising,
                'totalProductionCost'=>$totalProductionCost,
                'totalContribution'=>(int)$totalIncome-$totalProductionCost,
                'book_id'=>($this->Session->read('Book'))
            )
        );

        $this->set('book', $book);
        $this->set('sum', $summary['Summary']);

        $count = $this->Summary->find('count', array(
            'conditions'=>array('Summary.book_id'=>$this->Session->read('Book'))
        ));
        // Save the new summary
        if($count == 0) {
            if($this->Summary->save($summary)) {
            }
            else
                $this->Session->setFlash('Unable to save !');
        }
        // Update the summary
        else {
            $first = $this->Summary->Book->find('first', array(
                'conditions'=>array('Summary.book_id'=>$this->Session->read('Book'))
            ));
            $summary['Summary']['id'] = $first['Summary']['id'];
            if($this->Summary->save($summary)) {
            }
            else
                $this->Session->setFlash('Unable to save !');
        }

        // Save the data to the program

        // Units sold monthly
        $totalUnit = 0;
        $totalEUnit = 0;
        $value = array(null,null,null,null,null,null,null,null,null,null,null,null);
        $month = 1;
        $m = 1;
        $date = new DateTime($book['Book']['publicationsDate']);
        $start = date_format($date, "m");
        while ($month <= 12) {
            // Keep the format 01 - 12
            if ($start <= $month) {

                if ($m < 10){
                    $mon = '0'.$m.'monthNetUnits';
                    $Emon = '0'.$m.'monthEUnits';
                }
                else{
                    $mon = $m.'monthNetUnits';
                    $Emon = $m.'monthEUnits';
                }

                if ($book['SalesForecast'][$mon] != null)
                    $value[$month-1] = $book['SalesForecast'][$mon];

                $m += 1;
                $totalUnit += $book['SalesForecast'][$mon];
                $totalEUnit += $book['SalesForecast'][$Emon];

            }
            $month += 1;

        }
        $grossSales = $book['PrintSpecification']['RRP']/1.1*$totalUnit;
        $netSalesPhysical = (1-$book['SalesForecast']['averageTradeDiscount']/100)*$grossSales;
        $netSalesEbook = (1-$book['SalesForecast']['averageTradeDiscountEbook']/100)*($book['PrintSpecification']['RRPEbook']/1.1*$totalEUnit);
        $advanceWriteDown = 0;
        if ($book['Royalty']['advancedPayment']-$royalty>=0) {
            $advanceWriteDown = $book['Royalty']['advancedPayment']-$royalty;
        }
        $totalCost = $advanceWriteDown+$royalty+$distribution+$advertising+$book['EditorialOrigination']['totalEditorial']+$book['ProductionOrigination']['totalProduction']+$book['PrintSpecification']['totalPrintQuotations'];
        if($book['BusinessCase']['totalContribution'] != null) {
            $businessCase = $book['BusinessCase']['totalContribution'];
        }
        else
            $businessCase = 'not a business case';

        $backList = ($book['SalesForecast']['totalUnits'] - $totalUnit)*(1-$book['SalesForecast']['averageTradeDiscount']/100)*$book['PrintSpecification']['RRP']/1.1;


        $marginRatio = ($netSalesEbook+$netSalesPhysical-$totalCost)/$grossSales*100;

        $program = array(
            'Program' => array(
                'ISBN'=>$book['Book']['ISBN'],
                'title'=>$book['Book']['title'],
                'imprint'=>$book['Book']['imprint'],
                'author'=>$book['Book']['author1'],
                'publicationsDate'=>$book['Book']['publicationsDate'],
                'RRP'=>$book['PrintSpecification']['RRP'],
                'printRuns'=>$book['PrintSpecification']['totalPrintRuns'],
                'sellThrough'=>(int)$book['SalesForecast']['totalUnits']/$book['PrintSpecification']['totalPrintRuns']*100,
                'netSalesPhysical'=>$book['SalesForecast']['totalUnits'],
                'totalPrintCost'=>$book['PrintSpecification']['totalPrintQuotations'],
                'totalOriginationCost'=>$book['EditorialOrigination']['totalEditorial']+$book['ProductionOrigination']['totalProduction'],
                'avgTradeDiscount'=>(float)$book['SalesForecast']['averageTradeDiscount'],

                'RRPEbook'=>(float)$book['PrintSpecification']['RRPEbook'],
                'ebooksSold'=>(int)$book['SalesForecast']['totalUnitsEbook'],
                'ebooksSoldThisYear'=>(int)$totalEUnit,
                'ebookTradeRevenue'=>(float)$book['SalesForecast']['totalReceiptsEbook'],
                'avgEbookTradeDiscount'=>(float)$book['SalesForecast']['averageTradeDiscountEbook'],
                'netSalesEbook'=>$netSalesEbook,
                'royaltyMethod'=>$book['Royalty']['royaltyMethod'],
                'royaltyRate'=>$book['Royalty']['startingRate'],
                'ebookRoyaltyRate'=>$book['Royalty']['eBookRoyalty'],
                'jan'=>$value[0],
                'feb'=>$value[1],
                'mar'=>$value[2],
                'apr'=>$value[3],
                'may'=>$value[4],
                'jun'=>$value[5],
                'jul'=>$value[6],
                'aug'=>$value[7],
                'sep'=>$value[8],
                'oct'=>$value[9],
                'nov'=>$value[10],
                'dec'=>$value[11],
                'totalPhysicalUnits'=>$totalUnit,
                'grossSales'=>(float)$grossSales,
                'netSalesPhysical'=>$netSalesPhysical,
                // Including the Ebook
                'totalUnits'=> $totalEUnit+$totalUnit,
                'totalNetSales'=>$netSalesEbook+$netSalesPhysical,
                'royaltyExpense'=>$royalty,
                'advanceWriteDown'=>$advanceWriteDown,
                'totalPublicationCost'=>$totalCost,
                'netContribution'=>$netSalesEbook+$netSalesPhysical-$totalCost,
                'marginRatio'=>(float)$marginRatio,
                'businessCaseNetContribution'=>$businessCase,
                'backList'=>$backList,
                'book_id'=>($this->Session->read('Book'))
            )
        );
        $count = $this->Summary->Book->Program->find('count', array(
            'conditions'=>array('Program.book_id'=>$this->Session->read('Book'))
        ));
        if ($count == 0) {
            if($this->Summary->Book->Program->save($program)) {

            }
            else
                $this->Session->setFlash(('Unable to save the program!'));
        }
        else {
            $first = $this->Summary->Book->Program->find('first', array(
                'conditions'=>array('Program.book_id'=>$this->Session->read('Book'))
            ));
            $program['Program']['id'] = $first['Program']['id'];
            if($this->Summary->Book->Program->save($program)) {
            }
            else
                $this->Session->setFlash('Unable to save !');
        }


    }

}

?>