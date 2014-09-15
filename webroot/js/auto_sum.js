$(document).ready(function(){
    $('input.input1').keyup(function(){
        calculateTotal(this);
    });
    $('input.input2').keyup(function(){
        calculateTotal(this);
    });
});

function calculateTotal( src ) {
    var sum = 0,
        form = $(src).closest('form');
    form.find('input.input1').each(function( index, elem ) {
        var val = parseFloat($(elem).val());
        if( !isNaN( val ) ) {
            sum += val;
        }
    });
    form.find('input.input2').each(function( index, elem ) {
        var val = parseFloat($(elem).val());
        if( !isNaN( val ) ) {
            sum -= val;
        }
    });

    form.find('input.total').val(sum.toFixed(2));
}