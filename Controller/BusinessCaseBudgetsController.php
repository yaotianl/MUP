<?php
/**
 * Created by PhpStorm.
 * User: yaotianlin
 * Date: 17/09/2014
 * Time: 3:17 PM
 */
class BusinessCaseBudgetsController extends AppController{

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'addABook';
    }

    public function index() {
        $book = $this->BusinessCaseBudget->Book->find('first', array(
            'conditions'=>array('Book.id'=>$this->Session->read('Book'))
        ));
        // Calculate the royalty based on the formulate from MUP, two ways- RRP or NR
        $rrp_excl_gst = $book['PrintSpecification']['RRP']/1.1;
        $royalty = 0.0;
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
            $royalty = $rrp_excl_gst*(($book['SalesForecast']['totalUnits'])*$book['Royalty']['startingRate']/100+$royalty_h1+$royalty_h2);
        }
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

            // Pay either Royalty or Advanced Payment
            if ($book['Royalty']['advancedPayment']== null) {
                $royalty = $rrp_excl_gst*(1-$book['SalesForecast']['averageTradeDiscount']/100)*($book['SalesForecast']['totalUnits']*$book['Royalty']['startingRate']/100+$royalty_h1+$royalty_h2);
            }
            else {
                $royalty = $rrp_excl_gst*(1-$book['SalesForecast']['averageTradeDiscount']/100)*($book['SalesForecast']['totalUnits']*$book['Royalty']['startingRate']/100+$royalty_h1+$royalty_h2);
                if ($book['Royalty']['advancedPayment'] > $royalty) {
                    $royalty = $book['Royalty']['advancedPayment'];
                }
            }

        }
        // Default rate for the distribution and advertising
        $distributionRate = $book['SalesForecast']['distributionRate'];
        $advertisingRate = $book['SalesForecast']['advertisingRate'];

        $distribution = $distributionRate * ($book['SalesForecast']['totalReceipts']+$book['SalesForecast']['totalReceiptsEbook']);
        $advertising = $advertisingRate * ($book['SalesForecast']['totalReceipts']+$book['SalesForecast']['totalReceiptsEbook']);


        // An associative array that contains all details for the business case budget
        $summary = array(
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
            'totalContribution'=>(($book['SalesForecast']['totalReceipts']+$book['SalesForecast']['totalReceiptsEbook']+$book['Royalty']['rightsIncomeSplit']*$book['SalesForecast']['forcastRightsIncome'])-($royalty+$distribution+$advertising+$book['EditorialOrigination']['totalEditorial']+$book['ProductionOrigination']['totalProduction']+$book['PrintSpecification']['totalPrintQuotations']))
        );
        $this->set('book', $book);
        $this->set('sum', $summary);
        //
    }

}

?>