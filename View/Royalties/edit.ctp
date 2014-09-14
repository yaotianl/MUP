<h1>Royalty & Advance Rate</h1>

<?php

echo $this->Form->create('Royalty');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->input('royaltyMethod', array(
    'options' => array('RRP'=>'RRP', 'NR'=>'NR'),
    'empty' => '(Choose one)'
));
echo $this->Form->input('advancedPayment');
echo $this->Form->input('author1Split');
echo $this->Form->input('author2Split');
echo $this->Form->input('author3Split');
echo $this->Form->input('author4Split');
echo $this->Form->input('royaltyRatesA1Split');
echo $this->Form->input('royaltyRatesA2Split');
echo $this->Form->input('royaltyRatesA3Split');
echo $this->Form->input('royaltyRateA4Split');
echo $this->Form->input('startingRate');
echo $this->Form->input('hurdleOne');
echo $this->Form->input('hurdleOneRoyaltyRate');
echo $this->Form->input('hurdleTwo');
echo $this->Form->input('hurdleTwoRoyaltyRate');
echo $this->Form->input('overSeasRoyalty');
echo $this->Form->input('eBookRoyalty');
echo $this->Form->input('rightsIncomeSplit');
echo $this->Form->input('discountRateThreshold');
echo $this->Form->input('royaltyPayableAfterDiscountRate');
echo $this->Form->input('remainderRoyaltyRate');
echo $this->Form->input('payment1OnSigning', array(
    'options' => array('Quarter'=>'Quarter', 'Third'=>'Third', 'Half'=>'Half', 'Full'=>'Full', 'N/A'=>'N/A'),
    'default' => 'Third'
));
echo $this->Form->input('payment2OnPublication', array(
    'options' => array('Quarter'=>'Quarter', 'Third'=>'Third', 'Half'=>'Half', 'Full'=>'Full', 'N/A'=>'N/A'),
    'default' => 'Third'
));
echo $this->Form->input('payment3OnPublication', array(
    'options' => array('Quarter'=>'Quarter', 'Third'=>'Third', 'Half'=>'Half', 'Full'=>'Full', 'N/A'=>'N/A'),
    'default' => 'Third'
));

echo $this->Form->end('Update');

?>