<h1>Sales Forecast</h1>
<div>
    <form id="print">
        <div>
           <label class="label1">RRP excl. gst</label> <input type="text" class="input1" id='RRP' value="<?php echo $book['PrintSpecification']['RRP']; ?>" disabled>
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
echo $this->Html->script('auto_cal');
echo $this->Form->create('SalesForecast');
?>
<table>
<?php
echo $this->Form->input('averageTradeDiscount', array('class'=>'input1', 'value'=>50, 'label'=>array('class'=>'label1')));
echo $this->Html->tableHeaders(array('Month', 'Net Unit-Forecast', 'Net Receipts-Forecast'));
echo $this->Html->tableCells(array(
    $this->Form->label('SalesForecast.01monthNetUnits', 'Month1', 'label_a'),
    $this->Form->text('01monthNetUnits', array('class'=>'input_a')),
    $this->Form->text('01monthNetReceipts', array('class'=>'input_b','disabled'=>'disabled'))
));
echo $this->Html->tableCells(array(
    $this->Form->label('SalesForecast.02monthNetUnits', 'Month2', 'label_a'),
    $this->Form->text('02monthNetUnits', array('class'=>'input_a')),
    $this->Form->text('02monthNetReceipts', array('class'=>'input_b', 'disabled'=>'disabled'))
));
echo $this->Html->tableCells(array(
    $this->Form->label('SalesForecast.03monthNetUnits', 'Month3', 'label_a'),
    $this->Form->text('03monthNetUnits', array('class'=>'input_a')),
    $this->Form->text('03monthNetReceipts', array('class'=>'input_b', 'disabled'=>'disabled'))
));
echo $this->Html->tableCells(array(
    $this->Form->label('SalesForecast.04monthNetUnits', 'Month4', 'label_a'),
    $this->Form->text('04monthNetUnits', array('class'=>'input_a')),
    $this->Form->text('04monthNetReceipts', array('class'=>'input_b', 'disabled'=>'disabled'))
));
echo $this->Html->tableCells(array(
    $this->Form->label('SalesForecast.05monthNetUnits', 'Month5', 'label_a'),
    $this->Form->text('05monthNetUnits', array('class'=>'input_a')),
    $this->Form->text('05monthNetReceipts', array('class'=>'input_b', 'disabled'=>'disabled'))
));
echo $this->Html->tableCells(array(
    $this->Form->label('SalesForecast.06monthNetUnits', 'Month6', 'label_a'),
    $this->Form->text('06monthNetUnits', array('class'=>'input_a')),
    $this->Form->text('06monthNetReceipts', array('class'=>'input_b', 'disabled'=>'disabled'))
));
echo $this->Html->tableCells(array(
    $this->Form->label('SalesForecast.07monthNetUnits', 'Month7', 'label_a'),
    $this->Form->text('07monthNetUnits', array('class'=>'input_a')),
    $this->Form->text('07monthNetReceipts', array('class'=>'input_b', 'disabled'=>'disabled'))
));
echo $this->Html->tableCells(array(
    $this->Form->label('SalesForecast.08monthNetUnits', 'Month8', 'label_a'),
    $this->Form->text('08monthNetUnits', array('class'=>'input_a')),
    $this->Form->text('08monthNetReceipts', array('class'=>'input_b', 'disabled'=>'disabled'))
));

echo $this->Html->tableCells(array(
    $this->Form->label('SalesForecast.09monthNetUnits', 'Month9', 'label_a'),
    $this->Form->text('09monthNetUnits', array('class'=>'input_a')),
    $this->Form->text('09monthNetReceipts', array('class'=>'input_b', 'disabled'=>'disabled'))
));

echo $this->Html->tableCells(array(
    $this->Form->label('SalesForecast.10monthNetUnits', 'Month10', 'label_a'),
    $this->Form->text('10monthNetUnits', array('class'=>'input_a')),
    $this->Form->text('10monthNetReceipts', array('class'=>'input_b'))
));

echo $this->Html->tableCells(array(
    $this->Form->label('SalesForecast.11monthNetUnits', 'Month11', 'label_a'),
    $this->Form->text('11monthNetUnits', array('class'=>'input_a')),
    $this->Form->text('11monthNetReceipts', array('class'=>'input_b', 'disabled'=>'disabled'))
));

echo $this->Html->tableCells(array(
    $this->Form->label('SalesForecast.12monthNetUnits', 'Month12', 'label_a'),
    $this->Form->text('12monthNetUnits', array('class'=>'input_a')),
    $this->Form->text('12monthNetReceipts', array('class'=>'input_b', 'disabled'=>'disabled'))
));

echo $this->Html->tableCells(array(
    $this->Form->label('SalesForecast.13monthNetUnits', 'Month13', 'label_a'),
    $this->Form->text('13monthNetUnits', array('class'=>'input_a')),
    $this->Form->text('13monthNetReceipts', array('class'=>'input_b', 'disabled'=>'disabled'))
));

echo $this->Html->tableCells(array(
    $this->Form->label('SalesForecast.14monthNetUnits', 'Month14', 'label_a'),
    $this->Form->text('14monthNetUnits', array('class'=>'input_a')),
    $this->Form->text('14monthNetReceipts', array('class'=>'input_b', 'disabled'=>'disabled'))
));

echo $this->Html->tableCells(array(
    $this->Form->label('SalesForecast.15monthNetUnits', 'Month15', 'label_a'),
    $this->Form->text('15monthNetUnits', array('class'=>'input_a')),
    $this->Form->text('15monthNetReceipts', array('class'=>'input_b', 'disabled'=>'disabled'))
));

echo $this->Html->tableCells(array(
    $this->Form->label('SalesForecast.16monthNetUnits', 'Month16', 'label_a'),
    $this->Form->text('16monthNetUnits', array('class'=>'input_a')),
    $this->Form->text('16monthNetReceipts', array('class'=>'input_b', 'disabled'=>'disabled'))
));

echo $this->Html->tableCells(array(
    $this->Form->label('SalesForecast.17monthNetUnits', 'Month17', 'label_a'),
    $this->Form->text('17monthNetUnits', array('class'=>'input_a')),
    $this->Form->text('17monthNetReceipts', array('class'=>'input_b', 'disabled'=>'disabled'))
));

echo $this->Html->tableCells(array(
    $this->Form->label('SalesForecast.18monthNetUnits', 'Month18', 'label_a'),
    $this->Form->text('18monthNetUnits', array('class'=>'input_a')),
    $this->Form->text('18monthNetReceipts', array('class'=>'input_b', 'disabled'=>'disabled'))
));

echo $this->Html->tableCells(array(
    '<br>'
));

echo $this->Html->tableCells(array(
    $this->Form->label('SalesForecast.totalUnits', 'Total Units', 'label_a'),
    $this->Form->text('totalUnits', array('class'=>'input_c', 'readonly'=>'readonly')),
    $this->Form->text('totalReceipts', array('class'=>'input_d', 'readonly'=>'readonly'))
));

echo $this->Html->tableCells(array(
    $this->Form->label('SalesForecast.stockWriteDown', 'Stock Write Down', 'label_a'),
    $this->Form->text('stockWriteDown', array('class'=>'input_c', 'readonly'=>'readonly')),
    $this->Form->text('stockWriteDownReceipts', array('class'=>'input_d', 'readonly'=>'readonly'))
));

echo $this->Html->tableCells(array(
    $this->Form->label('SalesForecast.subscriptionRatio', 'Subscription Ratio', 'label_a'),
    $this->Form->text('subscriptionRatio', array('class'=>'input_c', 'readonly'=>'readonly')),
));

echo $this->Html->tableCells(array(
    $this->Form->end('Save')
));
echo $this->element('sql_dump');
?>

</table>
