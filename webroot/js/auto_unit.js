$(document).ready(function(){
    $('input.num').keyup(function(){
        calculateTotal(this);
        calculateUnit0(this);
        calculateUnit1(this);
        calculateUnit2(this);
        calculateAvg(this);
    });
    $('input.quo').keyup(function(){
        calculateTotalQuo(this);
        calculateUnit0(this);
        calculateUnit1(this);
        calculateUnit2(this);
        calculateAvg(this);
    });

});

function calculateTotal( src ) {
    var sum = 0,
        form = $(src).closest('form');
    form.find('input.num').each(function( index, elem ) {
        var val = parseInt($(elem).val());
        if( !isNaN( val ) ) {
            sum += val;
        }
    });

    form.find('input#PrintSpecificationTotalPrintRuns').val(sum);
}

function calculateTotalQuo( src ) {
    var sum = 0,
        form = $(src).closest('form');
    form.find('input.quo').each(function( index, elem ) {
        var val = parseInt($(elem).val());
        if( !isNaN( val ) ) {
            sum += val;
        }
    });

    form.find('input#PrintSpecificationTotalPrintQuotations').val(sum);
}

function calculateUnit0( src ) {
    var unit = 0,
        form = $(src).closest('form');
    var val1 = parseFloat(form.find('input#PrintSpecificationInitialPrintRun').val());
    var val2 = parseFloat(form.find('input#PrintSpecificationPrintQuote').val());
    if( !isNaN( val1 ) && !isNaN( val2 ) ){
        unit = val2/val1;
        form.find('input#PrintSpecificationUnitCost').val(unit.toFixed(2));
    }
}

function calculateUnit1( src ) {
    var unit = 0,
        form = $(src).closest('form');
    var val1 = parseFloat(form.find('input#PrintSpecification1stReprint').val());
    var val2 = parseFloat(form.find('input#PrintSpecificationPrintQuote1').val());
    if( !isNaN( val1 ) && !isNaN( val2 ) ){
        unit = val2/val1;
        form.find('input#PrintSpecificationUnitCost1').val(unit.toFixed(2));
    }
}

function calculateUnit2( src ) {
    var unit = 0,
        form = $(src).closest('form');
    var val1 = parseFloat(form.find('input#PrintSpecification2ndReprint').val());
    var val2 = parseFloat(form.find('input#PrintSpecificationPrintQuote2').val());
    if( !isNaN( val1 ) && !isNaN( val2 ) ){
        unit = val2/val1;
        form.find('input#PrintSpecificationUnitCost2').val(unit.toFixed(2));
    }
}


function calculateAvg( src ) {
    var avg = 0, num = 0, quo = 0,
        form = $(src).closest('form');
    form.find('input.num').each(function( index, elem ) {
        var val1 = parseFloat($(elem).val());
        if( !isNaN( val1 ) ) {
            num += val1;
        }
    });
    form.find('input.quo').each(function( index, elem ) {
        var val2 = parseFloat($(elem).val());
        if( !isNaN( val2 ) ) {
            quo += val2;
        }
    });
    if( !isNaN(quo) && !isNaN(num)) {
        avg = quo/num;
        form.find('input#PrintSpecificationAverageUnitCost').val(avg.toFixed(2));
    }

}