<?php echo $this->Html->css('report-table')?>
<h1>All Books</h1>


<div class="CSSTableGenerator" >
    <table>
        <tr>
            <td>Title</td>
            <td>Imprint</td>
            <td>Pub Date</td>
            <td>RRP Ebook (Incl GST)</td>
            <td>Ebook Trade Revenue</td>
            <td>RRP (Incl GST)</td>
            <td>Print Run(Units)</td>
            <td>Net Sales(Units)</td>

            <td>Total Advance Payable</td>
            <td>Jan</td>
            <td>Feb</td>
            <td>Mar</td>
            <td>Apr</td>
            <td>May</td>
            <td>Jun</td>
            <td>Jul</td>
            <td>Aug</td>
            <td>Sep</td>
            <td>Oct</td>
            <td>Nov</td>
            <td>Dec</td>

            <td>Total Physical Units</td>
            <td>Gross Sales</td>
            <td>Net Sales (Physical)</td>
            <td>Total Ebook Units</td>
            <td>Net Sales (Ebook)</td>

            <td>Total Units</td>
            <td>Total Net Sales</td>

            <td>Print Cost (incl.Stoct WD)</td>
            <td>Origination Cost</td>
            <td>Title Subsidy</td>

            <td>Royalty Cost</td>
            <td>Advance Write Down</td>

            <td>Distribution & Sales</td>
            <td>Marketing Cost(A&P)</td>
            <td>Total Publication Costs</td>
            <td>Net Contribution (Forecast)</td>
            <td>Net Contribution (Business Case)</td>

            <td>Created</td>
            <td>Publishcation Date</td>
        </tr>

        <!-- Here is where we loop through our $posts array, printing out post info -->

        <?php foreach ($books as $book): ?>

            <tr>
                <td>
                    <?php echo $this->Html->link($book['Book']['title'],
                        array('controller' => 'books', 'action' => 'edit', $book['Book']['id']));
                    ?>
                </td>
                <td><?php echo $book['Book']['imprint']; ?></td>
                <td><?php echo $book['Book']['publicationsDate']; ?></td>
                <td><?php echo '$'.number_format($book['PrintSpecification']['RRPEbook'],2); ?></td>
                <td><?php echo '$'.number_format($book['SalesForecast']['totalReceiptsEbook']); ?></td>
                <td><?php echo '$'.number_format($book['PrintSpecification']['RRP'],2); ?></td>
                <td><?php echo $book['PrintSpecification']['totalPrintRuns']; ?></td>
                <td><?php echo $book['SalesForecast']['totalUnits']; ?></td>

                <td><?php echo '$'.number_format($book['Royalty']['advancedPayment']); ?></td>
                <!--month 1-12 -->
                <?php
                    $month = 1;
                    $date = new DateTime($book['Book']['publicationsDate']);
                    $start = date_format($date, "m");
                    while ($month <= 12) {
                        // Keep the format 01 - 12
                        if ($month < 10)
                            $month = '0'.$month;
                        $month = $month.'monthNetUnits';

                        if ($start > $month) {
                            ?><td></td><?php
                        }
                        else {
                            ?><td><?php echo $book['SalesForecast'][$month]; ?></td>
                        <?php
                            $month += 1;
                        }

                    }

                ?>


                <td><?php echo $book['Summary']['physicalBooksSold']; ?></td>
                <td><?php echo '$'.number_format($book['PrintSpecification']['RRP']/1.1*$book['Summary']['physicalBooksSold']); ?></td>
                <td><?php echo '$'.number_format($book['Summary']['physicalBookTradeRevenue']); ?></td>
                <td><?php echo $book['Summary']['ebooksSold']; ?></td>
                <td><?php echo '$'.number_format($book['Summary']['ebookTradeRevenue']); ?></td>

                <td><?php echo $book['Summary']['totalBooksSold']; ?></td>
                <td><?php echo '$'.number_format($book['Summary']['totalTradeRevenue']); ?></td>

                <td><?php echo $book['Summary']['printPaperBinding']; ?></td>
                <td><?php echo $book['Summary']['origination']; ?></td>
                <td></td>
                <td><?php echo $book['Summary']['royaltyExpense']; ?></td>
                <td><?php echo $book['Summary']['totalBooksSold']; ?></td>

                <td><?php echo $book['Summary']['distributionSalesCommission']; ?></td>
                <td><?php echo $book['Summary']['advertisingPromotion']; ?></td>
                <td><?php echo $book['Summary']['totalProductionCost']; ?></td>
                <td><?php echo $book['Summary']['totalContribution']; ?></td>

                <td><?php echo $this->Form->postLink(
                        'Delete',
                        array('action' => 'delete', $book['Book']['id']),
                        array('confirm' => 'Are you sure?'));
                    ?> </td>

            </tr>
        <?php endforeach; ?>
        <?php unset($post); ?>
    </table>
</div>