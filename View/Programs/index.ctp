<?php echo $this->Html->css('report-table')?>
<h1>Annual Program</h1>

<div class="search">
<?php
echo $this->Form->create();
echo $this->Form->input('year', array(
    'type' => 'date',
    'label' => 'Year',
    'dateFormat' => 'Y',
    'minYear' => date('Y'),
    'maxYear' => date('Y') + 10,
    'class' => 'date2',
    'label' => array('class'=>'label1')
));
echo $this->Form->submit('Search', array('class'=>'myButton'));
echo $this->Form->end();
echo "<p> </p>";
echo $this->Html->link('Summary', array('controller'=>'programSummaries', 'action'=>'index', $overall['year']), array('class'=>'myButton', 'id'=>'right'));
?>
</div>
<div class="CSSTableGenerator" >
    <table>
        <tr>
            <td>Title</td>
            <td>Imprint</td>
            <td>Pub Date</td>
            <td>RRP (Incl GST)</td>
            <td>Print Run(Units)</td>

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
            <td>Gross Sales (Physical)</td>
            <td>Net Sales (Physical)</td>
            <td>RRP Ebook (Incl GST)</td>
<!--            <td>Ebook Trade Revenue</td>-->

            <td>Total Ebook Units</td>
            <td>Total Net Sales (Ebook)</td>

            <td>Total Units</td>
            <td>Total Net Sales</td>

            <td>Print Cost (incl.Stoct WD)</td>
            <td>Origination Cost</td>
            <td>Royalty Cost</td>
            <td>Advance Write Down</td>

            <td>Distribution & Sales</td>
            <td>Marketing Cost(A&P)</td>
            <td>Total Publication Costs</td>
            <td>Net Contribution (Forecast)</td>
            <td>Margin Ratio</td>
            <td>Net Contribution (Business Case)</td>

            <td>Delete</td>

        </tr>

        <!-- Here is where we loop through our $posts array, printing out post info -->

        <?php foreach ($books as $book): ?>

            <tr>
                <td>
                    <?php echo $this->Html->link($book['Program']['title'],
                        array('controller' => 'books', 'action' => 'edit', $book['Book']['id']));
                    ?>
                </td>
                <td><?php echo $book['Program']['imprint']; ?></td>
                <td><?php echo $book['Program']['publicationsDate']; ?></td>
                <td><?php echo '$'.number_format($book['Program']['RRP'],2); ?></td>
                <td><?php echo $book['Program']['printRuns']; ?></td>


                <td><?php echo '$'.number_format($book['Royalty']['advancedPayment']); ?></td>
                <td><?php echo $book['Program']['jan']; ?></td>
                <td><?php echo $book['Program']['feb']; ?></td>
                <td><?php echo $book['Program']['mar']; ?></td>
                <td><?php echo $book['Program']['apr']; ?></td>
                <td><?php echo $book['Program']['may']; ?></td>
                <td><?php echo $book['Program']['jun']; ?></td>
                <td><?php echo $book['Program']['jul']; ?></td>
                <td><?php echo $book['Program']['aug']; ?></td>
                <td><?php echo $book['Program']['sep']; ?></td>
                <td><?php echo $book['Program']['oct']; ?></td>
                <td><?php echo $book['Program']['nov']; ?></td>
                <td><?php echo $book['Program']['dec']; ?></td>



                <td><?php echo $book['Program']['totalPhysicalUnits']; ?></td>
                <td><?php echo '$'.number_format($book['Program']['grossSales']); ?></td>
                <td><?php echo '$'.number_format($book['Program']['netSalesPhysical']); ?></td>
                <td><?php echo '$'.number_format($book['Program']['RRPEbook'],2); ?></td>
<!--                <td>--><?php //echo '$'.number_format($book['Program']['ebookTradeRevenue']); ?><!--</td>-->
                <td><?php echo $book['Program']['ebooksSoldThisYear']; ?></td>
                <td><?php echo '$'.number_format($book['Program']['netSalesEbook']); ?></td>

                <td class="total_td"><?php echo $book['Program']['totalUnits']; ?></td>
                <td class="total_td"><?php echo '$'.number_format($book['Program']['totalNetSales']); ?></td>

                <td class="total_td"><?php echo '$'.number_format($book['Program']['totalPrintCost']); ?></td>
                <td class="total_td"><?php echo '$'.number_format($book['Program']['totalOriginationCost']); ?></td>
                <td class="total_td"><?php echo '$'.number_format($book['Program']['royaltyExpense']); ?></td>
                <td class="total_td"><?php echo '$'.number_format($book['Program']['advanceWriteDown']); ?></td>

                <td class="total_td"><?php echo '$'.number_format($book['Summary']['distributionSalesCommission']); ?></td>
                <td class="total_td"><?php echo '$'.number_format($book['Summary']['advertisingPromotion']); ?></td>
                <td class="total_td"><?php echo '$'.number_format($book['Program']['totalPublicationCost']); ?></td>
                <?php
                if($book['Program']['netContribution']<0) {
                    echo '<td style="color:red; background:bisque">'.'$'.number_format($book['Program']['netContribution']).'</td>';
                }
                else
                    echo '<td class="total_td">'.'$'.number_format($book['Program']['netContribution']).'</td>';
                ?>

                <td class="total_td"><?php echo $book['Program']['marginRatio'].'%'; ?></td>
                <?php
                if($book['Program']['businessCaseNetContribution']<0){
                    echo '<td style="color:red; background:bisque">'.'$'.number_format($book['Program']['businessCaseNetContribution']).'</td>';
                }
                else
                    echo '<td class="total_td">'.'$'.number_format($book['Program']['businessCaseNetContribution']).'</td>';
                ?>


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

<div class="break"></div>

<div class="CSSTableGenerator" >
    <h2>Annual Summary</h2>
    <table>
        <tr>
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
            <td>Quarter 1</td>
            <td>Quarter 2</td>
            <td>Quarter 3</td>
            <td>Quarter 4</td>
            <td>Total Units</td>
            <td>Total Gross Sales</td>
            <td>Total Net Sales(Physical)</td>
            <td>Total Net Sales(Ebook)</td>
            <td>Total Net Sales</td>
            <td>BackList</td>
            <td>Total Publication Cost</td>
            <td>Total NetContribution</td>
        </tr>
        <tr>
            <td><?php echo $overall['jan']; ?></td>
            <td><?php echo $overall['feb']; ?></td>
            <td><?php echo $overall['mar']; ?></td>
            <td><?php echo $overall['apr']; ?></td>
            <td><?php echo $overall['may']; ?></td>
            <td><?php echo $overall['jun']; ?></td>
            <td><?php echo $overall['jul']; ?></td>
            <td><?php echo $overall['aug']; ?></td>
            <td><?php echo $overall['sep']; ?></td>
            <td><?php echo $overall['oct']; ?></td>
            <td><?php echo $overall['nov']; ?></td>
            <td><?php echo $overall['dec']; ?></td>
            <td><?php echo $overall['quarter1']; ?></td>
            <td><?php echo $overall['quarter2']; ?></td>
            <td><?php echo $overall['quarter3']; ?></td>
            <td><?php echo $overall['quarter4']; ?></td>

            <td><?php echo $overall['totalUnits'] ?></td>
            <td><?php echo '$'.number_format($overall['totalGrossSales']); ?></td>
            <td><?php echo '$'.number_format($overall['totalNetSalesP']); ?></td>
            <td><?php echo '$'.number_format($overall['totalNetSalesE']); ?></td>
            <td><?php echo '$'.number_format($overall['totalNetSales']); ?></td>
            <td><?php echo '$'.number_format($overall['backList']); ?></td>
            <td><?php echo '$'.number_format($overall['totalPublicationCost']); ?></td>
            <?php if($overall['totalNetContribution']<0){
                echo "<td style='color:red'>".'$'.number_format($overall['totalNetContribution'])."</h3>";
            }else{
                echo "<td>".'$'.number_format($overall['totalNetContribution'])."</td>";
            }?>

        </tr>