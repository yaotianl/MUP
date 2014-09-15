<h1>Royalty & Advance Rate</h1>

<?php

    echo $this->Form->create();
    echo $this->Form->input('royaltyMethod', array(
        'options' => array('RRP'=>'RRP', 'NR'=>'NR'),
        'empty' => '(Choose one)',
        'class'=>'input1',
        'label'=>array('class'=>'label1')
    ));
    echo $this->Form->input('advancedPayment', array('class'=>'input1', 'label'=>array('class'=>'label1')));
    echo $this->Form->input('author1Split', array('class'=>'input1', 'label'=>array('class'=>'label1')));
    echo $this->Form->input('author2Split', array('class'=>'input1', 'label'=>array('class'=>'label1')));
    echo $this->Form->input('author3Split', array('class'=>'input1', 'label'=>array('class'=>'label1')));
    echo $this->Form->input('author4Split', array('class'=>'input1', 'label'=>array('class'=>'label1')));
    echo $this->Form->input('royaltyRatesA1Split', array('class'=>'input1', 'label'=>array('class'=>'label1')));
    echo $this->Form->input('royaltyRatesA2Split', array('class'=>'input1', 'label'=>array('class'=>'label1')));
    echo $this->Form->input('royaltyRatesA3Split', array('class'=>'input1', 'label'=>array('class'=>'label1')));
    echo $this->Form->input('royaltyRateA4Split', array('class'=>'input1', 'label'=>array('class'=>'label1')));
    echo $this->Form->input('startingRate', array('class'=>'input1', 'label'=>array('class'=>'label1')));
    echo $this->Form->input('hurdleOne', array('class'=>'input1', 'label'=>array('class'=>'label1')));
    echo $this->Form->input('hurdleOneRoyaltyRate', array('class'=>'input1', 'label'=>array('class'=>'label1')));
    echo $this->Form->input('hurdleTwo', array('class'=>'input1', 'label'=>array('class'=>'label1')));
    echo $this->Form->input('hurdleTwoRoyaltyRate', array('class'=>'input1', 'label'=>array('class'=>'label1')));
    echo $this->Form->input('overSeasRoyalty', array('class'=>'input1', 'label'=>array('class'=>'label1')));
    echo $this->Form->input('eBookRoyalty', array('class'=>'input1', 'label'=>array('class'=>'label1')));
    echo $this->Form->input('rightsIncomeSplit', array('class'=>'input1', 'label'=>array('class'=>'label1')));
    echo $this->Form->input('discountRateThreshold', array('class'=>'input1', 'label'=>array('class'=>'label1')));
    echo $this->Form->input('royaltyPayableAfterDiscountRate', array('class'=>'input1', 'label'=>array('class'=>'label1')));
    echo $this->Form->input('remainderRoyaltyRate', array('class'=>'input1', 'label'=>array('class'=>'label1')));
    echo $this->Form->input('payment1OnSigning', array(
        'options' => array('Quarter'=>'Quarter', 'Third'=>'Third', 'Half'=>'Half', 'Full'=>'Full', 'N/A'=>'N/A'),
        'default' => 'Third',
        'class'=>'input1',
        'label'=>array('class'=>'label1')
    ));
    echo $this->Form->input('payment2OnPublication', array(
        'options' => array('Quarter'=>'Quarter', 'Third'=>'Third', 'Half'=>'Half', 'Full'=>'Full', 'N/A'=>'N/A'),
        'default' => 'Third',
        'class'=>'input1',
        'label'=>array('class'=>'label1')
    ));
    echo $this->Form->input('payment3OnPublication', array(
        'options' => array('Quarter'=>'Quarter', 'Third'=>'Third', 'Half'=>'Half', 'Full'=>'Full', 'N/A'=>'N/A'),
        'default' => 'Third',
        'class'=>'input1',
        'label'=>array('class'=>'label1')

    ));

    echo $this->Form->end('save');

?>