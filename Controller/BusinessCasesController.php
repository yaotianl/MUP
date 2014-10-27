<?php
/**
 * Created by PhpStorm.
 * User: yaotianlin
 * Date: 8/10/2014
 * Time: 10:29 AM
 */
class BusinessCasesController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'addABook';
    }

    /**
     * @param $option if $option == 1, it means that the user is trying to create a new business case
     * while $option == 0 means the user just view the details of the business case.
     */
    public function index($option) {
        if ($this->Session->read('Book') == null) {
            $this->Session->setFlash('Please create the book first!');

            return $this->redirect(array(
                'controller'=>'books',
                'action'=>'add'
            ));
        }
//        $book = $this->BusinessCase->Book->find('first',array(
//        'conditons'=>array('Book.id'=>$this->Session->read('Book'))));
//        debug($book);
        $book = $this->BusinessCase->Book->find('first', array(
            'conditions'=>array('Book.id'=>$this->Session->read('Book'))
        ));

        $count = $this->BusinessCase->find('count', array(
            'conditions'=>array('BusinessCase.book_id'=>$this->Session->read('Book'))
        ));

        $summary = $this->BusinessCase->Book->Summary->find('first', array(
            'conditions'=>array('Summary.book_id'=>$this->Session->read('Book'))
        ));


        $businessCase = array(
            'BusinessCase' => array(
                'RRP'=>0,
                'RRPEbook'=>0,
                'totalPrintRuns'=>0,
                'avgTradeDiscount'=>0,
                'avgEbookTradeDiscount'=>0,
                'physicalBooksSold'=>0,
                'ebooksSold'=>0,
                'totalBooksSold'=>0,
                'physicalBookTradeRevenue'=>0,
                'ebookTradeRevenue'=>0,
                'totalTradeRevenue'=>0,
                'rightsIncome'=>0,
                'totalIncome'=>0,
                'printPaperBinding'=>0,
                'origination'=>0,
                'totalCostOfGoodsSold'=>0,
                'royaltyExpense'=>0,
                'distributionSalesCommissionRate'=>0,
                'distributionSalesCommission'=>0,
                'advertisingPromotionRate'=>0,
                'advertisingPromotion'=>0,
                'totalSellingCost'=>0,
                'totalProductionCost'=>0,
                'totalContribution'=>0,
                'book_id'=>($this->Session->read('Book'))
            )
        );

        // If we already created the business case, then we will not update it. Otherwise, create it.
        if ($count == 0 && $option == 1) {
            $businessCase = array('BusinessCase'=>$summary['Summary']);
            if ($this->BusinessCase->save($businessCase)){

            }

            else
                $this->Session->setFlash('Unable to save !');

        }
        elseif ($count == 1) {
            $businessCase = $this->BusinessCase->find('first', array(
                'conditions'=>array('BusinessCase.book_id'=>$this->Session->read('Book'))
            ));


        }
        $this->set('book', $book);
        $this->set('sum', $summary['Summary']);
        $this->set('bus', $businessCase['BusinessCase']);



    }

}
?>