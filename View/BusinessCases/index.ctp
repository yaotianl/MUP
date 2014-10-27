<link rel="stylesheet" href="app/webroot/css/style-print.css" type="text/css" media="print">
<?php
$this->Paginator->options(array(
    'update' => '#content',
    'evalScripts' => true
));
?>
<div class="header">
    <h1> Details of
        <u><?php echo $book['Book']['title']; ?></u>
    </h1>
</div>
<div class="summary">
    <div class="info">
        <h2>Latest <Summary></Summary></h2>
        <form id="print">
            <table id="table_report">
                <tr>
                    <td> <label class="label1">RRP incl. GST</label></td>
                    <td><input type="text" class="input_report" id='RRP' value="<?php echo '$'.number_format($sum['RRP'], 2); ?>" disabled></td>
                </tr>
                <tr>
                    <td> <label class="label1">RRP Ebook incl. GST</label> </td>
                    <td><input type="text" class="input_report" id='RRP_Ebook' value="<?php echo '$'.number_format($sum['RRPEbook'], 2); ?>" disabled></td>
                </tr>
                <tr>
                    <td> <label class="label1">Expected Total Print Runs </label></td>
                    <td> <input type="text" class="input_report" id='total' value="<?php echo $sum['totalPrintRuns']; ?>" disabled></td>
                </tr>
                <tr>
                    <td> <label class="label1">Average Trade Discount </label></td>
                    <td> <input type="text" class="input_report" id='avgUnitCost' value="<?php echo $sum['avgTradeDiscount'].'%'; ?>" disabled></td>
                </tr>
                <tr>
                    <td> <label class="label1">Average Ebook Trade Discount </label></td>
                    <td> <input type="text" class="input_report" id='avgUnitCost' value="<?php echo $sum['avgEbookTradeDiscount'].'%'; ?>" disabled></td>
                </tr>
                <tr>
                    <td> </td>
                </tr>
                <tr>
                    <td> <label class="label1">Distribution Rate</label></td>
                    <td> <input type="text" class="input_rate" id='dis' disabled='disabled' value="<?php echo ($sum['distributionSalesCommissionRate']*100).'%'; ?>"></td>
                </tr>
                <tr>
                    <td> <label class="label1">Advertising & Promotion Rate</label></td>
                    <td> <input type="text" class="input_rate" id='ad' disabled='disabled' value="<?php echo ($sum['advertisingPromotionRate']*100).'%'; ?>"></td>
                </tr>
            </table>
    </div>
    <div id="summary">
        <table id="table_summary">
            <th>
                <h4>Units Sold</h4>
            </th>
            <tr>
                <td id="a"><p>Physical Books Sold</p></td>
                <td id="b"><p><?php echo $sum['physicalBooksSold']; ?></p></td>
            </tr>
            <tr>
                <td id="a"><p>Ebooks Sold</p></td>
                <td id="b"><p><?php echo $sum['ebooksSold']; ?></p></td>
            </tr>
            <tr>
                <td id="a"><p><u>Total Books Sold</u></p></td>
                <td id="b"><p><u><?php echo $sum['totalBooksSold'] ?></u></p></td>
            </tr>

            <th>
                <h4>Trade Revenue</h4>
            </th>
            <tr>
                <td id="a"><p>Physical Book</p></td>
                <td id="b"><p><?php echo '$'.number_format($sum['physicalBookTradeRevenue']); ?></p></td>
            </tr>
            <tr>
                <td id="a"><p>Ebook</p></td>
                <td id="b"><p><?php echo '$'.number_format($sum['ebookTradeRevenue']); ?></p></td>
            </tr>
            <tr>
                <td id="a"><p><u>Total Trade Revenue</u></p></td>
                <td id="b"><p><u><?php echo '$'.number_format($sum['totalTradeRevenue']); ?></u></p></td>
            </tr>
            <tr></tr>
            <tr>
                <td id="a"><p>Rights Income (MUP Split)</p></td>
                <td id="b"><p><?php echo '$'.number_format($sum['rightsIncome']); ?></p></td>
            </tr>
            <tr>
                <td id="total_row"><h3>Total Income</h3></td>
                <td id="total_row"><h3><?php echo '$'.number_format($sum['totalIncome']); ?></h3></td>
            </tr>
            <tr></tr>
            <tr>
                <th>
                    <h4>Publication Expense</h4>
                </th>
            </tr>

            <th>
                <h4>Cost of Goods Sold</h4>
            </th>
            <tr>
                <td id="a"><p id="ind1">- Print, Paper & Binding</p></td>
                <td id="b"><p style="color:red"><?php echo '$'.number_format($sum['printPaperBinding']); ?></p></td>
            </tr>
            <tr>
                <td id="a"><p id="ind1">- Origination</p></td>
                <td id="b"><p style="color:red"><?php echo '$'.number_format($sum['origination']); ?></p></td>
            </tr>
            <tr>
                <td id="a"><p><u>Total Cost of Goods Sold</u></p></td>
                <td id="b"><p style="color:red"><u><?php echo '$'.number_format($sum['totalCostOfGoodsSold']); ?></u></p></td>
            </tr>
            <tr></tr>
            <tr>
                <th>
                    <h4>Selling Costs</h4>
                </th>
            </tr>
            <tr>
                <td><p id="ind1">- Royalty Expense / Advance Write Off</p></td>
                <td><p style="color:red"><?php echo '$'.number_format($sum['royaltyExpense']); ?></p></td>
            </tr>
            <tr>
                <td><p id="ind1">- Distribution & Sales Commission</p></td>
                <td><p style="color:red" id="dis"><?php echo '$'.number_format($sum['distributionSalesCommission'])?></p></td>
            </tr>
            <tr>
                <td><p id="ind1">- Advertising & Promotion</p></td>
                <td><p style="color:red" id="'ad"><?php echo '$'.number_format($sum['advertisingPromotion'])?></p></td>
            </tr>
            <tr>
                <td id="a"><p><u>Total Selling Costs</u></p></td>
                <td id="b"><p style="color:red"><u><?php echo '$'.number_format($sum['totalSellingCost']); ?></u></p></td>
            </tr>
            <tr>
                <td id="total_row"><h3>Total Publication Cost</h3></td>
                <td id="total_row"><h3 style="color:red"><?php echo '$'.number_format($sum['totalProductionCost']); ?></h3></td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <td id="final_row"><h3>Total Contribution</h3></td>
                <td id="final_row">
                    <?php if($sum['totalContribution']<0){
                        echo '<h3 style="color:red">'.'$'.number_format($sum['totalContribution']);
                    }
                    else{
                        echo '<h3>'.'$'.number_format($sum['totalContribution']);
                    }?></h3></td>
            </tr>

        </table>

    </div>

</div>

<div class="business_case">
    <div class="info">
        <h2>proof Business Case</h2>
        <form id="print">
            <table id="table_report">
                <tr>
                    <td> <label class="label1">RRP incl. GST</label></td>
                    <td><input type="text" class="input_report" id='RRP' value="<?php echo '$'.number_format($bus['RRP'], 2); ?>" disabled></td>
                </tr>
                <tr>
                    <td> <label class="label1">RRP Ebook incl. GST</label> </td>
                    <td><input type="text" class="input_report" id='RRP_Ebook' value="<?php echo '$'.number_format($bus['RRPEbook'], 2); ?>" disabled></td>
                </tr>
                <tr>
                    <td> <label class="label1">Expected Total Print Runs </label></td>
                    <td> <input type="text" class="input_report" id='total' value="<?php echo $bus['totalPrintRuns']; ?>" disabled></td>
                </tr>
                <tr>
                    <td> <label class="label1">Average Trade Discount </label></td>
                    <td> <input type="text" class="input_report" id='avgUnitCost' value="<?php echo $bus['avgTradeDiscount'].'%'; ?>" disabled></td>
                </tr>
                <tr>
                    <td> <label class="label1">Average Ebook Trade Discount </label></td>
                    <td> <input type="text" class="input_report" id='avgUnitCost' value="<?php echo $bus['avgEbookTradeDiscount'].'%'; ?>" disabled></td>
                </tr>
                <tr>
                    <td> </td>
                </tr>
                <tr>
                    <td> <label class="label1">Distribution Rate</label></td>
                    <td> <input type="text" class="input_rate" id='dis' disabled='disabled' value="<?php echo ($bus['distributionSalesCommissionRate']*100).'%'; ?>"></td>
                </tr>
                <tr>
                    <td> <label class="label1">Advertising & Promotion Rate</label></td>
                    <td> <input type="text" class="input_rate" id='ad' disabled='disabled' value="<?php echo ($bus['advertisingPromotionRate']*100).'%'; ?>"></td>
                </tr>
            </table>
    </div>
    <div id="business case">
        <table id="table_businessCase">
            <th>
                <h4>Units Sold</h4>
            </th>
            <tr>
                <td id="a"><p>Physical Books Sold</p></td>
                <td id="b"><p><?php echo $bus['physicalBooksSold']; ?></p></td>
            </tr>
            <tr>
                <td id="a"><p>Ebooks Sold</p></td>
                <td id="b"><p><?php echo $bus['ebooksSold']; ?></p></td>
            </tr>
            <tr>
                <td id="a"><p><u>Total Books Sold</u></p></td>
                <td id="b"><p><u><?php echo $bus['totalBooksSold'] ?></u></p></td>
            </tr>

            <th>
                <h4>Trade Revenue</h4>
            </th>
            <tr>
                <td id="a"><p>Physical Book</p></td>
                <td id="b"><p><?php echo '$'.number_format($bus['physicalBookTradeRevenue']); ?></p></td>
            </tr>
            <tr>
                <td id="a"><p>Ebook</p></td>
                <td id="b"><p><?php echo '$'.number_format($bus['ebookTradeRevenue']); ?></p></td>
            </tr>
            <tr>
                <td id="a"><p><u>Total Trade Revenue</u></p></td>
                <td id="b"><p><u><?php echo '$'.number_format($bus['totalTradeRevenue']); ?></u></p></td>
            </tr>
            <tr></tr>
            <tr>
                <td id="a"><p>Rights Income (MUP Split)</p></td>
                <td id="b"><p><?php echo '$'.number_format($bus['rightsIncome']); ?></p></td>
            </tr>
            <tr>
                <td id="total_row"><h3>Total Income</h3></td>
                <td id="total_row"><h3><?php echo '$'.number_format($bus['totalIncome']); ?></h3></td>
            </tr>
            <tr></tr>
            <tr>
                <th>
                    <h4>Publication Expense</h4>
                </th>
            </tr>

            <th>
                <h4>Cost of Goods Sold</h4>
            </th>
            <tr>
                <td id="a"><p id="ind1">- Print, Paper & Binding</p></td>
                <td id="b"><p style="color:red"><?php echo '$'.number_format($bus['printPaperBinding']); ?></p></td>
            </tr>
            <tr>
                <td id="a"><p id="ind1">- Origination</p></td>
                <td id="b"><p style="color:red"><?php echo '$'.number_format($bus['origination']); ?></p></td>
            </tr>
            <tr>
                <td id="a"><p><u>Total Cost of Goods Sold</u></p></td>
                <td id="b"><p style="color:red"><u><?php echo '$'.number_format($bus['totalCostOfGoodsSold']); ?></u></p></td>
            </tr>
            <tr></tr>
            <tr>
                <th>
                    <h4>Selling Costs</h4>
                </th>
            </tr>
            <tr>
                <td><p id="ind1">- Royalty Expense / Advance Write Off</p></td>
                <td><p style="color:red"><?php echo '$'.number_format($bus['royaltyExpense']); ?></p></td>
            </tr>
            <tr>
                <td><p id="ind1">- Distribution & Sales Commission</p></td>
                <td><p style="color:red" id="dis"><?php echo '$'.number_format($bus['distributionSalesCommission'])?></p></td>
            </tr>
            <tr>
                <td><p id="ind1">- Advertising & Promotion</p></td>
                <td><p style="color:red" id="'ad"><?php echo '$'.number_format($bus['advertisingPromotion'])?></p></td>
            </tr>
            <tr>
                <td id="a"><p><u>Total Selling Costs</u></p></td>
                <td id="b"><p style="color:red"><u><?php echo '$'.number_format($bus['totalSellingCost']); ?></u></p></td>
            </tr>
            <tr>
                <td id="total_row"><h3>Total Publication Cost</h3></td>
                <td id="total_row"><h3 style="color:red"><?php echo '$'.number_format($bus['totalProductionCost']); ?></h3></td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <td id="final_row"><h3>Total Contribution</h3></td>
                <td id="final_row">
                    <?php if(number_format($bus['totalContribution'])<0){
                        echo '<h3 style="color:red">'.'$'.number_format($bus['totalContribution']).'<h3>';}
                    else
                        echo '<h3>'.'$'.number_format($bus['totalContribution']).'<h3>';
                    ?>
                </td>
            </tr>

        </table>

    </div>

</div>