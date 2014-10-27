<?php
/**
 * Created by PhpStorm.
 * User: yaotianlin
 * Date: 8/10/2014
 * Time: 10:14 AM
 */
class ProgramsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
    }

    public function index() {
        $year = date('Y');
        $book = $this->Program->Book->find('all', array(
            'conditions'=>array(
                'Book.publicationsDate >=' => "$year-01-01",
                'Book.publicationsDate <=' => "$year-12-31"
            )
        ));
        $lastYear = date('Y')-1;
        $lastYearbook = $this->Program->Book->find('all', array(
            'conditions'=>array(
                'Book.publicationsDate >='=>"$lastYear-01-01",
                'Book.publicationsDate <='=>"$lastYear-12-31"
            )
        ));

//        if (!$book) {
//            throw new NotFoundException(__('There is no book currently!'));
//        }
        // Total Summary
        $jan = 0;
        $feb = 0;
        $mar = 0;
        $apr = 0;
        $may = 0;
        $jun = 0;
        $jul = 0;
        $aug = 0;
        $sep = 0;
        $oct = 0;
        $nov = 0;
        $dec = 0;
        $backList = 0;
        $totalUnits = 0;
        $totalGrossSales = 0;
        $totalNetSalesP = 0;
        $totalNetSalesE = 0;
        $totalPublicationCost = 0;
        $totalNetContribution = 0;

        // Calculate the info for the whole year
        foreach ($book as $abook):
            $jan += $abook['Program']['jan'];
            $feb += $abook['Program']['feb'];
            $mar += $abook['Program']['mar'];
            $apr += $abook['Program']['apr'];
            $may += $abook['Program']['may'];
            $jun += $abook['Program']['jun'];
            $jul += $abook['Program']['jul'];
            $aug += $abook['Program']['aug'];
            $sep += $abook['Program']['sep'];
            $oct += $abook['Program']['oct'];
            $nov += $abook['Program']['nov'];
            $dec += $abook['Program']['dec'];
            $totalUnits += $abook['Program']['totalUnits'];
            $totalGrossSales += $abook['Program']['grossSales'];
            $totalNetSalesP += $abook['Program']['netSalesPhysical'];
            $totalNetSalesE += $abook['Program']['netSalesEbook'];
            $totalPublicationCost += $abook['Program']['totalPublicationCost'];
            $totalNetContribution += $abook['Program']['netContribution'];
        endforeach;

        // Get the backlist from last year
        foreach ($lastYearbook as $lbook):
            $backList += $lbook['Summary']['totalTradeRevenue'] - $lbook['Program']['netSalesPhysical']+$lbook['Program']['netSalesEbook'];
        endforeach;

        $overall = array();
        // 4 quarters of a year
        $q1 = $jan+$feb+$mar;
        $q2 = $apr+$may+$jun;
        $q3 = $jul+$aug+$sep;
        $q4 = $oct+$nov+$dec;
        $overall['jan'] = $jan;
        $overall['feb'] = $feb;
        $overall['mar'] = $mar;
        $overall['apr'] = $apr;
        $overall['may'] = $may;
        $overall['jun'] = $jun;
        $overall['jul'] = $jul;
        $overall['aug'] = $aug;
        $overall['sep'] = $sep;
        $overall['oct'] = $oct;
        $overall['nov'] = $nov;
        $overall['dec'] = $dec;
        $overall['quarter1'] = $q1;
        $overall['quarter2'] = $q2;
        $overall['quarter3'] = $q3;
        $overall['quarter4'] = $q4;

        $overall['totalUnits'] = $totalUnits;
        $overall['totalGrossSales'] = $totalGrossSales;
        $overall['totalNetSalesP'] = $totalNetSalesP;
        $overall['totalNetSalesE'] = $totalNetSalesE;
        $overall['totalNetSales'] = $totalNetSalesP+$totalNetSalesE;
        $overall['backList'] = $backList;
        $overall['totalPublicationCost'] = $totalPublicationCost;

        // Add the backList to the annual total net contribution.
        $overall['totalNetContribution'] = $totalNetContribution+$backList;
        $overall['year'] = $year;

        $this->set('books', $book);
        $this->set('overall', $overall);

        //
        //
        // Search the certain year's program
        if ($this->request->is('post')) {
            $year = $this->request->data['Program']['year']['year'];

            $book = $this->Program->Book->find('all', array(
                'conditions'=>array(
                    'Book.publicationsDate >=' => "$year-01-01",
                    'Book.publicationsDate <=' => "$year-12-31"
                )
            ));

            $lastYear = $this->request->data['Program']['year']['year']-1;

            $lastYearbook = $this->Program->Book->find('all', array(
                'conditions'=>array(
                    'Book.publicationsDate >='=>"$lastYear-01-01",
                    'Book.publicationsDate <='=>"$lastYear-12-31"
                )
            ));
            //debug($book);

            // Total Summary
            $jan = 0;
            $feb = 0;
            $mar = 0;
            $apr = 0;
            $may = 0;
            $jun = 0;
            $jul = 0;
            $aug = 0;
            $sep = 0;
            $oct = 0;
            $nov = 0;
            $dec = 0;
            $backList = 0;
            $totalUnits = 0;
            $totalGrossSales = 0;
            $totalNetSalesP = 0;
            $totalNetSalesE = 0;
            $totalPublicationCost = 0;
            $totalNetContribution = 0;
            foreach ($book as $abook):
                $jan += $abook['Program']['jan'];
                $feb += $abook['Program']['feb'];
                $mar += $abook['Program']['mar'];
                $apr += $abook['Program']['apr'];
                $may += $abook['Program']['may'];
                $jun += $abook['Program']['jun'];
                $jul += $abook['Program']['jul'];
                $aug += $abook['Program']['aug'];
                $sep += $abook['Program']['sep'];
                $oct += $abook['Program']['oct'];
                $nov += $abook['Program']['nov'];
                $dec += $abook['Program']['dec'];
                $totalUnits += $abook['Program']['totalUnits'];
                $totalGrossSales += $abook['Program']['grossSales'];
                $totalNetSalesP += $abook['Program']['netSalesPhysical'];
                $totalNetSalesE += $abook['Program']['netSalesEbook'];
                $totalPublicationCost += $abook['Program']['totalPublicationCost'];
                $totalNetContribution += $abook['Program']['netContribution'];
            endforeach;

            // Get the backlist from last year
            foreach ($lastYearbook as $lbook):
                $backList += $lbook['Summary']['totalTradeRevenue'] - $lbook['Program']['netSalesPhysical']+$lbook['Program']['netSalesEbook'];
            endforeach;
            $overall = array();
            // 4 quarters of a year
            $overall['jan'] = $jan;
            $overall['feb'] = $feb;
            $overall['mar'] = $mar;
            $overall['apr'] = $apr;
            $overall['may'] = $may;
            $overall['jun'] = $jun;
            $overall['jul'] = $jul;
            $overall['aug'] = $aug;
            $overall['sep'] = $sep;
            $overall['oct'] = $oct;
            $overall['nov'] = $nov;
            $overall['dec'] = $dec;
            $q1 = $jan+$feb+$mar;
            $q2 = $apr+$may+$jun;
            $q3 = $jul+$aug+$sep;
            $q4 = $oct+$nov+$dec;
            $overall['quarter1'] = $q1;
            $overall['quarter2'] = $q2;
            $overall['quarter3'] = $q3;
            $overall['quarter4'] = $q4;

            $overall['totalUnits'] = $totalUnits;
            $overall['totalGrossSales'] = $totalGrossSales;
            $overall['totalNetSalesP'] = $totalNetSalesP;
            $overall['totalNetSalesE'] = $totalNetSalesE;
            $overall['totalNetSales'] = $totalNetSalesP+$totalNetSalesE;
            $overall['backList'] = $backList;
            $overall['totalPublicationCost'] = $totalPublicationCost;

            // Add the backList to the annual total net contribution.
            $overall['totalNetContribution'] = $totalNetContribution+$backList;
            $overall['year'] = $year;

            $this->set('books', $book);
            $this->set('overall', $overall);
        }

    }

}

?>