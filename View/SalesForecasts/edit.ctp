<h1>Sales Forecast</h1>
<div>
    <form id="print">
        <div>
            <label class="label1">RRP excl. gst</label> <input type="text" class="input1" id='RRP' value="<?php printf ("%.2f", $book['PrintSpecification']['RRP']/1.1); ?>" disabled>
        </div>

        <div>
            <label class="label1">RRP Ebook excl. gst</label> <input type="text" class="input1" id='RRP_Ebook' value="<?php printf("%.2f", $book['PrintSpecification']['RRPEbook']/1.1); ?>" disabled>
        </div>

        <div>
            <label class="label1">Expected Total Print Runs </label><input type="text" class="input1" id='total' value="<?php echo $book['PrintSpecification']['totalPrintRuns']; ?>" disabled>
        </div>

        <div>
            <label class="label1">Average Unit Cost </label><input type="text" class="input1" id='avgUnitCost' value="<?php echo $book['PrintSpecification']['averageUnitCost']; ?>" disabled>
        </div>
    </form>

</div>

<?php
echo $this->Html->script('auto_cal_edit');

echo $this->Form->create('SalesForecast');
echo $this->Form->input('id', array('type'=>'hidden'));
?>

<table>
    <?php
    echo $this->Form->input('averageTradeDiscount', array('class'=>'input1', 'label'=>array('class'=>'label1')));
    echo $this->Form->input('averageTradeDiscountEbook', array('class'=>'input1', 'label'=>array('class'=>'label1')));
    echo $this->Form->input('forcastRightsIncome', array('class'=>'input1', 'label'=>array('class'=>'label1')));
    echo $this->Form->input('distributionRate', array('class'=>'input1', 'label'=>array('class'=>'label1')));
    echo $this->Form->input('advertisingRate', array('class'=>'input1', 'label'=>array('class'=>'label1')));

    echo $this->Html->tableHeaders(array('Month', 'Net Unit-Forecast', 'Net Receipts-Forecast', 'Ebook Forecast', 'Ebook Receipts'));
    echo $this->Html->tableCells(array(
        $this->Form->label('SalesForecast.01monthNetUnits', 'Month1', 'label_a'),
        $this->Form->text('01monthNetUnits', array('class'=>'input_a')),
        $this->Form->text('01monthNetReceipts', array('class'=>'input_b','disabled'=>'disabled')),
        $this->Form->text('01monthEUnits', array('class'=>'input_c')),
        $this->Form->text('01eReceipts', array('class'=>'input_d', 'disabled'=>'disabled'))
    ));
    echo $this->Html->tableCells(array(
        $this->Form->label('SalesForecast.02monthNetUnits', 'Month2', 'label_a'),
        $this->Form->text('02monthNetUnits', array('class'=>'input_a')),
        $this->Form->text('02monthNetReceipts', array('class'=>'input_b', 'disabled'=>'disabled')),
        $this->Form->text('02monthEUnits',array('class'=>'input_c')),
        $this->Form->text('02eReceipts', array('class'=>'input_d', 'disabled'=>'disabled'))
    ));
    echo $this->Html->tableCells(array(
        $this->Form->label('SalesForecast.03monthNetUnits', 'Month3', 'label_a'),
        $this->Form->text('03monthNetUnits', array('class'=>'input_a')),
        $this->Form->text('03monthNetReceipts', array('class'=>'input_b', 'disabled'=>'disabled')),
        $this->Form->text('03monthEUnits', array('class'=>'input_c')),
        $this->Form->text('03eReceipts', array('class'=>'input_d', 'disabled'=>'disabled'))
    ));
    echo $this->Html->tableCells(array(
        $this->Form->label('SalesForecast.04monthNetUnits', 'Month4', 'label_a'),
        $this->Form->text('04monthNetUnits', array('class'=>'input_a')),
        $this->Form->text('04monthNetReceipts', array('class'=>'input_b', 'disabled'=>'disabled')),
        $this->Form->text('04monthEUnits', array('class'=>'input_c')),
        $this->Form->text('04eReceipts', array('class'=>'input_d', 'disabled'=>'disabled'))
    ));
    echo $this->Html->tableCells(array(
        $this->Form->label('SalesForecast.05monthNetUnits', 'Month5', 'label_a'),
        $this->Form->text('05monthNetUnits', array('class'=>'input_a')),
        $this->Form->text('05monthNetReceipts', array('class'=>'input_b', 'disabled'=>'disabled')),
        $this->Form->text('05monthEUnits', array('class'=>'input_c')),
        $this->Form->text('05eReceipts', array('class'=>'input_d', 'disabled'=>'disabled'))
    ));
    echo $this->Html->tableCells(array(
        $this->Form->label('SalesForecast.06monthNetUnits', 'Month6', 'label_a'),
        $this->Form->text('06monthNetUnits', array('class'=>'input_a')),
        $this->Form->text('06monthNetReceipts', array('class'=>'input_b', 'disabled'=>'disabled')),
        $this->Form->text('06monthEUnits', array('class'=>'input_c')),
        $this->Form->text('06eReceipts', array('class'=>'input_d', 'disabled'=>'disabled'))
    ));
    echo $this->Html->tableCells(array(
        $this->Form->label('SalesForecast.07monthNetUnits', 'Month7', 'label_a'),
        $this->Form->text('07monthNetUnits', array('class'=>'input_a')),
        $this->Form->text('07monthNetReceipts', array('class'=>'input_b', 'disabled'=>'disabled')),
        $this->Form->text('07monthEUnits', array('class'=>'input_c')),
        $this->Form->text('07eReceipts', array('class'=>'input_d', 'disabled'=>'disabled'))
    ));
    echo $this->Html->tableCells(array(
        $this->Form->label('SalesForecast.08monthNetUnits', 'Month8', 'label_a'),
        $this->Form->text('08monthNetUnits', array('class'=>'input_a')),
        $this->Form->text('08monthNetReceipts', array('class'=>'input_b', 'disabled'=>'disabled')),
        $this->Form->text('08monthEUnits', array('class'=>'input_c')),
        $this->Form->text('08eReceipts', array('class'=>'input_d', 'disabled'=>'disabled'))
    ));

    echo $this->Html->tableCells(array(
        $this->Form->label('SalesForecast.09monthNetUnits', 'Month9', 'label_a'),
        $this->Form->text('09monthNetUnits', array('class'=>'input_a')),
        $this->Form->text('09monthNetReceipts', array('class'=>'input_b', 'disabled'=>'disabled')),
        $this->Form->text('09monthEUnits', array('class'=>'input_c')),
        $this->Form->text('09eReceipts', array('class'=>'input_d', 'disabled'=>'disabled'))
    ));

    echo $this->Html->tableCells(array(
        $this->Form->label('SalesForecast.10monthNetUnits', 'Month10', 'label_a'),
        $this->Form->text('10monthNetUnits', array('class'=>'input_a')),
        $this->Form->text('10monthNetReceipts', array('class'=>'input_b')),
        $this->Form->text('10monthEUnits', array('class'=>'input_c')),
        $this->Form->text('10eReceipts', array('class'=>'input_d', 'disabled'=>'disabled'))
    ));

    echo $this->Html->tableCells(array(
        $this->Form->label('SalesForecast.11monthNetUnits', 'Month11', 'label_a'),
        $this->Form->text('11monthNetUnits', array('class'=>'input_a')),
        $this->Form->text('11monthNetReceipts', array('class'=>'input_b', 'disabled'=>'disabled')),
        $this->Form->text('11monthEUnits', array('class'=>'input_c')),
        $this->Form->text('11eReceipts', array('class'=>'input_d', 'disabled'=>'disabled'))
    ));

    echo $this->Html->tableCells(array(
        $this->Form->label('SalesForecast.12monthNetUnits', 'Month12', 'label_a'),
        $this->Form->text('12monthNetUnits', array('class'=>'input_a')),
        $this->Form->text('12monthNetReceipts', array('class'=>'input_b', 'disabled'=>'disabled')),
        $this->Form->text('12monthEUnits', array('class'=>'input_c')),
        $this->Form->text('12eReceipts', array('class'=>'input_d', 'disabled'=>'disabled'))
    ));

    echo $this->Html->tableCells(array(
        $this->Form->label('SalesForecast.13monthNetUnits', 'Month13', 'label_a'),
        $this->Form->text('13monthNetUnits', array('class'=>'input_a')),
        $this->Form->text('13monthNetReceipts', array('class'=>'input_b', 'disabled'=>'disabled')),
        $this->Form->text('13monthEUnits', array('class'=>'input_c')),
        $this->Form->text('13eReceipts', array('class'=>'input_d', 'disabled'=>'disabled'))
    ));

    echo $this->Html->tableCells(array(
        $this->Form->label('SalesForecast.14monthNetUnits', 'Month14', 'label_a'),
        $this->Form->text('14monthNetUnits', array('class'=>'input_a')),
        $this->Form->text('14monthNetReceipts', array('class'=>'input_b', 'disabled'=>'disabled')),
        $this->Form->text('14monthEUnits', array('class'=>'input_c')),
        $this->Form->text('14eReceipts', array('class'=>'input_d', 'disabled'=>'disabled'))
    ));

    echo $this->Html->tableCells(array(
        $this->Form->label('SalesForecast.15monthNetUnits', 'Month15', 'label_a'),
        $this->Form->text('15monthNetUnits', array('class'=>'input_a')),
        $this->Form->text('15monthNetReceipts', array('class'=>'input_b', 'disabled'=>'disabled')),
        $this->Form->text('15monthEUnits', array('class'=>'input_c')),
        $this->Form->text('15eReceipts', array('class'=>'input_d', 'disabled'=>'disabled'))
    ));

    echo $this->Html->tableCells(array(
        $this->Form->label('SalesForecast.16monthNetUnits', 'Month16', 'label_a'),
        $this->Form->text('16monthNetUnits', array('class'=>'input_a')),
        $this->Form->text('16monthNetReceipts', array('class'=>'input_b', 'disabled'=>'disabled')),
        $this->Form->text('16monthEUnits', array('class'=>'input_c')),
        $this->Form->text('16eReceipts', array('class'=>'input_d', 'disabled'=>'disabled'))
    ));

    echo $this->Html->tableCells(array(
        $this->Form->label('SalesForecast.17monthNetUnits', 'Month17', 'label_a'),
        $this->Form->text('17monthNetUnits', array('class'=>'input_a')),
        $this->Form->text('17monthNetReceipts', array('class'=>'input_b', 'disabled'=>'disabled')),
        $this->Form->text('17monthEUnits', array('class'=>'input_c')),
        $this->Form->text('17eReceipts', array('class'=>'input_d', 'disabled'=>'disabled'))
    ));

    echo $this->Html->tableCells(array(
        $this->Form->label('SalesForecast.18monthNetUnits', 'Month18', 'label_a'),
        $this->Form->text('18monthNetUnits', array('class'=>'input_a')),
        $this->Form->text('18monthNetReceipts', array('class'=>'input_b', 'disabled'=>'disabled')),
        $this->Form->text('18monthEUnits', array('class'=>'input_c')),
        $this->Form->text('18eReceipts', array('class'=>'input_d', 'disabled'=>'disabled'))
    ));

    echo $this->Html->tableCells(array(
        '<br>'
    ));

    echo $this->Html->tableCells(array(
        $this->Form->label('SalesForecast.totalUnits', 'Total Units', 'label_a'),
        $this->Form->text('totalUnits', array('class'=>'input_e', 'readonly'=>'readonly')),
        $this->Form->text('totalReceipts', array('class'=>'input_f', 'readonly'=>'readonly')),
        $this->Form->text('totalUnitsEbook', array('class'=>'input_e', 'readonly'=>'readonly')),
        $this->Form->text('totalReceiptsEbook', array('class'=>'input_f', 'readonly'=>'readonly'))
    ));

    echo $this->Html->tableCells(array(
        $this->Form->label('SalesForecast.stockWriteDown', 'Stock Write Down', 'label_a'),
        $this->Form->text('stockWriteDown', array('class'=>'input_e', 'readonly'=>'readonly')),
        $this->Form->text('stockWriteDownReceipts', array('class'=>'input_f', 'readonly'=>'readonly'))
    ));

    echo $this->Html->tableCells(array(
        $this->Form->label('SalesForecast.subscriptionRatio', 'Subscription Ratio', 'label_a'),
        $this->Form->text('subscriptionRatio', array('class'=>'input_e', 'readonly'=>'readonly')),
    ));

    echo $this->Html->tableCells(array(
        $this->Form->end('Save')
    ));
    //echo $this->element('sql_dump');
    ?>

</table>
