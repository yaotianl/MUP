$(document).ready(function(){
    $('input.input_a').keyup(function(){
        calculateReceipt(this);
        calculateTotal(this);
    });
});
function calculateTotal( src ) {
    var sum = 0;
    var sum2 = 0;
    form = $(src).closest('form');
    form.find('input.input_a').each(function( index, elem ) {
        var val = parseInt($(elem).val());
        if( !isNaN( val ) ) {
            sum += val;
        }
    });
    form.find('input.input_b').each(function( index, elem ) {
        var val = parseInt($(elem).val());
        if( !isNaN( val ) ) {
            sum2 += val;
        }
    });

    form.find('input#SalesForecastTotalReceipts').val(sum2);
    form.find('input#SalesForecastTotalUnits').val(sum);
    var total = parseInt($('form#print').find('input#total').val());
    form.find('input#SalesForecastTotalReceipts').val(total-sum);

}
function calculateReceipt( src ) {
    var val = 0,
        form = $(src).closest('form');
    var rrp = parseFloat($('form#print').find('input#RRP').val());
    var total = parseFloat($('form#print').find('input#total').val());
    var discount = parseFloat(form.find('input#SalesForecastAverageTradeDiscount').val());

    console.log(rrp);
    console.log(total);
    console.log(discount);
    if(isNaN(rrp) || isNaN(total) || isNaN(discount)) {
        form.find('input.input_b').val(0);
    }
    else{
        var m1 = parseFloat(form.find('input#SalesForecast01monthNetUnits').val());
        console.log(m1);
        var m2 = parseFloat(form.find('input#SalesForecast02monthNetUnits').val());
        var m3 = parseFloat(form.find('input#SalesForecast03monthNetUnits').val());
        var m4 = parseFloat(form.find('input#SalesForecast04monthNetUnits').val());
        var m5 = parseFloat(form.find('input#SalesForecast05monthNetUnits').val());
        var m6 = parseFloat(form.find('input#SalesForecast06monthNetUnits').val());
        var m7 = parseFloat(form.find('input#SalesForecast07monthNetUnits').val());
        var m8 = parseFloat(form.find('input#SalesForecast08monthNetUnits').val());
        var m9 = parseFloat(form.find('input#SalesForecast09monthNetUnits').val());
        var m10 = parseFloat(form.find('input#SalesForecast10monthNetUnits').val());
        var m11 = parseFloat(form.find('input#SalesForecast11monthNetUnits').val());
        var m12 = parseFloat(form.find('input#SalesForecast12monthNetUnits').val());
        var m13 = parseFloat(form.find('input#SalesForecast13monthNetUnits').val());
        var m14 = parseFloat(form.find('input#SalesForecast14monthNetUnits').val());
        var m15 = parseFloat(form.find('input#SalesForecast15monthNetUnits').val());
        var m16 = parseFloat(form.find('input#SalesForecast16monthNetUnits').val());
        var m17 = parseFloat(form.find('input#SalesForecast17monthNetUnits').val());
        var m18 = parseFloat(form.find('input#SalesForecast18monthNetUnits').val());
        if(!isNaN(m1)) {
            var rm = rrp/1.1*m1*(discount/100);
            console.log(rm.toFixed(0));
            form.find('input#SalesForecast01monthNetReceipts').val(rm.toFixed(0));
        }
        if(!isNaN(m2)) {
            var rm = rrp/1.1*m2*(discount/100);
            form.find('input#SalesForecast02monthNetReceipts').val(rm.toFixed(0));
        }
        if(!isNaN(m3)) {
            var rm = rrp/1.1*m3*(discount/100);
            form.find('input#SalesForecast03monthNetReceipts').val(rm.toFixed(0));
        }
        if(!isNaN(m4)) {
            var rm = rrp/1.1*m4*(discount/100);
            form.find('input#SalesForecast04monthNetReceipts').val(rm.toFixed(0));
        }
        if(!isNaN(m5)) {
            var rm = rrp/1.1*m5*(discount/100);
            form.find('input#SalesForecast05monthNetReceipts').val(rm.toFixed(0));
        }
        if(!isNaN(m6)) {
            var rm = rrp/1.1*m6*(discount/100);
            form.find('input#SalesForecast06monthNetReceipts').val(rm.toFixed(0));
        }
        if(!isNaN(m7)) {
            var rm = rrp/1.1*m7*(discount/100);
            form.find('input#SalesForecast07monthNetReceipts').val(rm.toFixed(0));
        }
        if(!isNaN(m8)) {
            var rm = rrp/1.1*m8*(discount/100);
            form.find('input#SalesForecast08monthNetReceipts').val(rm.toFixed(0));
        }
        if(!isNaN(m9)) {
            var rm = rrp/1.1*m9*(discount/100);
            form.find('input#SalesForecast09monthNetReceipts').val(rm.toFixed(0));
        }
        if(!isNaN(m10)) {
            var rm = rrp/1.1*m10*(discount/100);
            form.find('input#SalesForecast10monthNetReceipts').val(rm.toFixed(0));
        }
        if(!isNaN(m11)) {
            var rm = rrp/1.1*m11*(discount/100);
            form.find('input#SalesForecast11monthNetReceipts').val(rm.toFixed(0));
        }
        if(!isNaN(m12)) {
            var rm = rrp/1.1*m12*(discount/100);
            form.find('input#SalesForecast12monthNetReceipts').val(rm.toFixed(0));
        }
        if(!isNaN(m13)) {
            var rm = rrp/1.1*m13*(discount/100);
            form.find('input#SalesForecast13monthNetReceipts').val(rm.toFixed(0));
        }
        if(!isNaN(m14)) {
            var rm = rrp/1.1*m14*(discount/100);
            form.find('input#SalesForecast14monthNetReceipts').val(rm.toFixed(0));
        }
        if(!isNaN(m15)) {
            var rm = rrp/1.1*m15*(discount/100);
            form.find('input#SalesForecast15monthNetReceipts').val(rm.toFixed(0));
        }
        if(!isNaN(m16)) {
            var rm = rrp/1.1*m16*(discount/100);
            form.find('input#SalesForecast16monthNetReceipts').val(rm.toFixed(0));
        }
        if(!isNaN(m17)) {
            var rm = rrp/1.1*m17*(discount/100);
            form.find('input#SalesForecast17monthNetReceipts').val(rm.toFixed(0));
        }
        if(!isNaN(m18)) {
            var rm = rrp/1.1*m18*(discount/100);
            form.find('input#SalesForecast18monthNetReceipts').val(rm.toFixed(0));
        }
    }



}