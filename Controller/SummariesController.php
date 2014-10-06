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
        $book = $this->Summary->Book->find('first', array(
            'conditions'=>array('Book.id'=>$this->Session->read('Book'))
        ));
        // Calculate the royalty based on the formulate from MUP, two ways- RRP or NR
        $rrp_excl_gst = $book['PrintSpecification']['RRP']/1.1;
        $rrp_excl_gst_ebook = $book['PrintSpecification']['RRPEbook']/1.1;
        $royalty = 0.0;
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
            if ($book['Royalty']['advancedPayment']== null) {
                $royalty = $royalty;
            }
            else {
                if ($book['Royalty']['advancedPayment'] > $royalty) {
                    $royalty = $book['Royalty']['advancedPayment'];
                }
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
            if ($book['Royalty']['advancedPayment']== null) {
                $royalty = $royalty;
            }
            else {
                if ($book['Royalty']['advancedPayment'] > $royalty) {
                    $royalty = $book['Royalty']['advancedPayment'];
                }
            }

        }

        // Default rate for the distribution and advertising
        $distributionRate = $book['SalesForecast']['distributionRate']/100;
        $advertisingRate = $book['SalesForecast']['advertisingRate']/100;

        $distribution = $distributionRate * ($book['SalesForecast']['totalReceipts']+$book['SalesForecast']['totalReceiptsEbook']);
        $advertising = $advertisingRate * ($book['SalesForecast']['totalReceipts']+$book['SalesForecast']['totalReceiptsEbook']);


        // An associative array that contains all details for the business case budget, refer to the database format
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
                'totalIncome'=>$book['SalesForecast']['totalReceipts']+$book['SalesForecast']['totalReceiptsEbook']+$book['Royalty']['rightsIncomeSplit']*$book['SalesForecast']['forcastRightsIncome'],
                'printPaperBinding'=>(float)$book['PrintSpecification']['totalPrintQuotations'],
                'origination'=>$book['EditorialOrigination']['totalEditorial']+$book['ProductionOrigination']['totalProduction'],
                'totalCostOfGoodsSold'=>$book['EditorialOrigination']['totalEditorial']+$book['ProductionOrigination']['totalProduction']+$book['PrintSpecification']['totalPrintQuotations'],
                'royaltyExpense'=>$royalty,
                'distributionSalesCommissionRate'=>$distributionRate,
                'distributionSalesCommission'=>$distribution,
                'advertisingPromotionRate'=>$advertisingRate,
                'advertisingPromotion'=>$advertising,
                'totalSellingCost'=>$royalty+$distribution+$advertising,
                'totalProductionCost'=>$royalty+$distribution+$advertising+$book['EditorialOrigination']['totalEditorial']+$book['ProductionOrigination']['totalProduction']+$book['PrintSpecification']['totalPrintQuotations'],
                'totalContribution'=>(($book['SalesForecast']['totalReceipts']+$book['SalesForecast']['totalReceiptsEbook']+$book['Royalty']['rightsIncomeSplit']*$book['SalesForecast']['forcastRightsIncome'])-($royalty+$distribution+$advertising+$book['EditorialOrigination']['totalEditorial']+$book['ProductionOrigination']['totalProduction']+$book['PrintSpecification']['totalPrintQuotations'])),
                'book_id'=>($this->Session->read('Book'))
            )
        );

        $this->set('book', $book);
        $this->set('sum', $summary['Summary']);

        $count = $this->Summary->find('count', array(
            'conditions'=>array('Summary.book_id'=>$this->Session->read('Book'))
        ));
        if($count == 0) {
            if($this->Summary->save($summary)) {
            }
            else
                $this->Session->setFlash('Unable to save !');
        }
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

    }

}

?>