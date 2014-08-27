<h1>Royalty & Advance Rate</h1>

<?php

    echo $this->Form->create();
    echo $this->Form->input('royaltyMethod', array(
        'options' => array("RRP", "NR"),
        'empty' => 'Choose a method'
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
        'options' => array('Quarter', 'Third', 'Half', 'Full', 'N/A'),
        'empty' => 'choose one'
    ));
    echo $this->Form->input('payment2OnDelivery', array(
        'options' => array('Quarter', 'Third', 'Half', 'Full', 'N/A'),
        'empty' => 'choose one'
    ));
    echo $this->Form->input('payment3OnPublication', array(
        'options' => array('Quarter', 'Third', 'Half', 'Full', 'N/A'),
        'empty' => 'choose one'
    ));

    echo $this->Form->end('save');

?>