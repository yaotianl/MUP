$(document).ready(function(){
    window.onload=calculateReceipt();
    window.onload=calculateTotal();
    setInterval(calculateReceipt(), 1000);
    setInterval(calculateTotal(), 1000);
    $('input#SalesForecastAverageTradeDiscount').keyup(function(){
        calculateReceipt();
        calculateTotal();
    });
    $('input.input_a').keyup(function(){
        calculateReceipt();
        calculateTotal();
    });
    $('input.input_c').keyup(function(){
        calculateReceipt();
        calculateTotal();
    });
});
function calculateTotal() {
    var sum = 0, sum2 = 0, sum3 = 0, sum4 =0;
    form = $('#SalesForecastEditForm');
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
    form.find('input.input_c').each(function( index, elem ) {
        var val = parseInt($(elem).val());
        if( !isNaN( val ) ) {
            console.log(sum3);
            sum3 += val;
        }
    });
    form.find('input.input_d').each(function( index, elem ) {
        var val = parseInt($(elem).val());
        if( !isNaN( val ) ) {
            sum4 += val;
        }
    });
    form.find('input#SalesForecastTotalUnits').val(sum);
    form.find('input#SalesForecastTotalReceipts').val(sum2);
    form.find('input#SalesForecastTotalUnitsEbook').val(sum3);
    form.find('input#SalesForecastTotalReceiptsEbook').val(sum4);


    // Update Stock Write Down, and SubscriptionRatio
    var total = parseInt($('form#print').find('input#total').val());
    if (!isNaN(sum) && !isNaN(total)) {
        form.find('input#SalesForecastStockWriteDown').val(total-sum);
        form.find('input#SalesForecastSubscriptionRatio').val((sum/total*100).toFixed(2));
    }
    //Update Subscription Ratio
    var avg = parseFloat($('form#print').find('input#avgUnitCost').val());
    if(!isNaN(avg) && !isNaN(sum) && !isNaN(total)) {
        var ratio = 0
        ratio = -1*((total-sum)/avg);
        form.find('input#SalesForecastStockWriteDownReceipts').val(ratio.toFixed(2));
    }

}
function calculateReceipt() {
    var val = 0,
        form = $('#SalesForecastEditForm');
    var rrp = parseFloat($('form#print').find('input#RRP').val());
    var rrpebook = parseFloat($('form#print').find('input#RRP_Ebook').val());
    var total = parseFloat($('form#print').find('input#total').val());
    var discount = parseFloat(form.find('input#SalesForecastAverageTradeDiscount').val());
    var ediscount = parseFloat(form.find('input#SalesForecastAverageTradeDiscountEbook').val());

//    console.log(rrp);
//    console.log(total);
//    console.log(discount);
    if(isNaN(rrp) || isNaN(total) || isNaN(discount)) {
        form.find('input.input_b').val(0);
    }
    else{
        var m1 = parseFloat(form.find('input#SalesForecast01monthNetUnits').val());
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
            var rm = rrp*m1*(1-discount/100);
            //console.log(rm.toFixed(2));
            form.find('input#SalesForecast01monthNetReceipts').val(rm.toFixed(2));
        }
        else
            form.find('input#SalesForecast01monthNetReceipts').val(0);

        if(!isNaN(m2)) {
            var rm = rrp*m2*(1-discount/100);
            form.find('input#SalesForecast02monthNetReceipts').val(rm.toFixed(2));
        }
        else
            form.find('input#SalesForecast02monthNetReceipts').val(0);

        if(!isNaN(m3)) {
            var rm = rrp*m3*(1-discount/100);
            form.find('input#SalesForecast03monthNetReceipts').val(rm.toFixed(2));
        }
        else
            form.find('input#SalesForecast03monthNetReceipts').val(0);

        if(!isNaN(m4)) {
            var rm = rrp*m4*(1-discount/100);
            form.find('input#SalesForecast04monthNetReceipts').val(rm.toFixed(2));
        }
        else
            form.find('input#SalesForecast04monthNetReceipts').val(0);

        if(!isNaN(m5)) {
            var rm = rrp*m5*(1-discount/100);
            form.find('input#SalesForecast05monthNetReceipts').val(rm.toFixed(2));
        }
        else
            form.find('input#SalesForecast05monthNetReceipts').val(0);

        if(!isNaN(m6)) {
            var rm = rrp*m6*(1-discount/100);
            form.find('input#SalesForecast06monthNetReceipts').val(rm.toFixed(2));
        }
        else
            form.find('input#SalesForecast06monthNetReceipts').val(0);

        if(!isNaN(m7)) {
            var rm = rrp*m7*(1-discount/100);
            form.find('input#SalesForecast07monthNetReceipts').val(rm.toFixed(2));
        }
        else
            form.find('input#SalesForecast07monthNetReceipts').val(0);

        if(!isNaN(m8)) {
            var rm = rrp*m8*(1-discount/100);
            form.find('input#SalesForecast08monthNetReceipts').val(rm.toFixed(2));
        }
        else
            form.find('input#SalesForecast08monthNetReceipts').val(0);

        if(!isNaN(m9)) {
            var rm = rrp*m9*(1-discount/100);
            form.find('input#SalesForecast09monthNetReceipts').val(rm.toFixed(2));
        }
        else
            form.find('input#SalesForecast09monthNetReceipts').val(0);
        if(!isNaN(m10)) {
            var rm = rrp*m10*(1-discount/100);
            form.find('input#SalesForecast10monthNetReceipts').val(rm.toFixed(2));
        }
        else
            form.find('input#SalesForecast10monthNetReceipts').val(0);

        if(!isNaN(m11)) {
            var rm = rrp*m11*(1-discount/100);
            form.find('input#SalesForecast11monthNetReceipts').val(rm.toFixed(2));
        }
        else
            form.find('input#SalesForecast11monthNetReceipts').val(0);

        if(!isNaN(m12)) {
            var rm = rrp*m12*(1-discount/100);
            form.find('input#SalesForecast12monthNetReceipts').val(rm.toFixed(2));
        }
        else
            form.find('input#SalesForecast12monthNetReceipts').val(0);

        if(!isNaN(m13)) {
            var rm = rrp*m13*(1-discount/100);
            form.find('input#SalesForecast13monthNetReceipts').val(rm.toFixed(2));
        }
        else
            form.find('input#SalesForecast13monthNetReceipts').val(0);

        if(!isNaN(m14)) {
            var rm = rrp*m14*(1-discount/100);
            form.find('input#SalesForecast14monthNetReceipts').val(rm.toFixed(2));
        }
        else
            form.find('input#SalesForecast14monthNetReceipts').val(0);

        if(!isNaN(m15)) {
            var rm = rrp*m15*(1-discount/100);
            form.find('input#SalesForecast15monthNetReceipts').val(rm.toFixed(2));
        }
        else
            form.find('input#SalesForecast15monthNetReceipts').val(0);

        if(!isNaN(m16)) {
            var rm = rrp*m16*(1-discount/100);
            form.find('input#SalesForecast16monthNetReceipts').val(rm.toFixed(2));
        }
        else
            form.find('input#SalesForecast16monthNetReceipts').val(0);

        if(!isNaN(m17)) {
            var rm = rrp*m17*(1-discount/100);
            form.find('input#SalesForecast17monthNetReceipts').val(rm.toFixed(2));
        }
        else
            form.find('input#SalesForecast17monthNetReceipts').val(0);

        if(!isNaN(m18)) {
            var rm = rrp*m18*(1-discount/100);
            form.find('input#SalesForecast18monthNetReceipts').val(rm.toFixed(2));
        }
        else
            form.find('input#SalesForecast18monthNetReceipts').val(0);

    }

    // Calculate the Ebook receipts:
    if(isNaN(rrpebook) || isNaN(ediscount)) {
        form.find('input.input_d').val(0);
    }
    else {

        var e1 = parseFloat(form.find('input#SalesForecast01monthEUnits').val());
        var e2 = parseFloat(form.find('input#SalesForecast02monthEUnits').val());
        var e3 = parseFloat(form.find('input#SalesForecast03monthEUnits').val());
        var e4 = parseFloat(form.find('input#SalesForecast04monthEUnits').val());
        var e5 = parseFloat(form.find('input#SalesForecast05monthEUnits').val());
        var e6 = parseFloat(form.find('input#SalesForecast06monthEUnits').val());
        var e7 = parseFloat(form.find('input#SalesForecast07monthEUnits').val());
        var e8 = parseFloat(form.find('input#SalesForecast08monthEUnits').val());
        var e9 = parseFloat(form.find('input#SalesForecast09monthEUnits').val());
        var e10 = parseFloat(form.find('input#SalesForecast10monthEUnits').val());
        var e11 = parseFloat(form.find('input#SalesForecast11monthEUnits').val());
        var e12 = parseFloat(form.find('input#SalesForecast12monthEUnits').val());
        var e13 = parseFloat(form.find('input#SalesForecast13monthEUnits').val());
        var e14 = parseFloat(form.find('input#SalesForecast14monthEUnits').val());
        var e15 = parseFloat(form.find('input#SalesForecast15monthEUnits').val());
        var e16 = parseFloat(form.find('input#SalesForecast16monthEUnits').val());
        var e17 = parseFloat(form.find('input#SalesForecast17monthEUnits').val());
        var e18 = parseFloat(form.find('input#SalesForecast18monthEUnits').val());
        if(!isNaN(e1)) {
            var rm = (1-ediscount/100)*rrpebook*e1;
            form.find('input#SalesForecast01eReceipts').val(rm.toFixed(2));
        }
        else
            form.find('input#SalesForecast01eReceipts').val(0);

        if(!isNaN(e2)) {
            var rm = (1-ediscount/100)*rrpebook*e2;
            form.find('input#SalesForecast02eReceipts').val(rm.toFixed(2));
        }
        else
            form.find('input#SalesForecast02eReceipts').val(0);

        if(!isNaN(e3)) {
            var rm = (1-ediscount/100)*rrpebook*e3;
            form.find('input#SalesForecast03eReceipts').val(rm.toFixed(2));
        }
        else
            form.find('input#SalesForecast03eReceipts').val(0);

        if(!isNaN(e4)) {
            var rm = (1-ediscount/100)*rrpebook*e4;
            form.find('input#SalesForecast04eReceipts').val(rm.toFixed(2));
        }
        else
            form.find('input#SalesForecast04eReceipts').val(0);

        if(!isNaN(e5)) {
            var rm = (1-ediscount/100)*rrpebook*e5;
            form.find('input#SalesForecast05eReceipts').val(rm.toFixed(2));
        }
        else
            form.find('input#SalesForecast05eReceipts').val(0);

        if(!isNaN(e6)) {
            var rm = (1-ediscount/100)*rrpebook*e6;
            form.find('input#SalesForecast06eReceipts').val(rm.toFixed(2));
        }
        else
            form.find('input#SalesForecast06eReceipts').val(0);

        if(!isNaN(e7)) {
            var rm = (1-ediscount/100)*rrpebook*e7;
            form.find('input#SalesForecast07eReceipts').val(rm.toFixed(2));
        }
        else
            form.find('input#SalesForecast07eReceipts').val(0);

        if(!isNaN(e8)) {
            var rm = (1-ediscount/100)*rrpebook*e8;
            form.find('input#SalesForecast08eReceipts').val(rm.toFixed(2));
        }
        else
            form.find('input#SalesForecast08eReceipts').val(0);

        if(!isNaN(e9)) {
            var rm = (1-ediscount/100)*rrpebook*e9;
            form.find('input#SalesForecast09eReceipts').val(rm.toFixed(2));
        }
        else
            form.find('input#SalesForecast09eReceipts').val(0);

        if(!isNaN(e10)) {
            var rm = (1-ediscount/100)*rrpebook*e10;
            form.find('input#SalesForecast10eReceipts').val(rm.toFixed(2));
        }
        else
            form.find('input#SalesForecast10eReceipts').val(0);

        if(!isNaN(e11)) {
            var rm = (1-ediscount/100)*rrpebook*e11;
            form.find('input#SalesForecast11eReceipts').val(rm.toFixed(2));
        }
        else
            form.find('input#SalesForecast11eReceipts').val(0);

        if(!isNaN(e12)) {
            var rm = (1-ediscount/100)*rrpebook*e12;
            form.find('input#SalesForecast12eReceipts').val(rm.toFixed(2));
        }
        else
            form.find('input#SalesForecast12eReceipts').val(0);

        if(!isNaN(e13)) {
            var rm = (1-ediscount/100)*rrpebook*e13;
            form.find('input#SalesForecast13eReceipts').val(rm.toFixed(2));
        }
        else
            form.find('input#SalesForecast13eReceipts').val(0);

        if(!isNaN(e14)) {
            var rm = (1-ediscount/100)*rrpebook*e14;
            form.find('input#SalesForecast14eReceipts').val(rm.toFixed(2));
        }
        else
            form.find('input#SalesForecast14eReceipts').val(0);

        if(!isNaN(e15)) {
            var rm = (1-ediscount/100)*rrpebook*e15;
            form.find('input#SalesForecast15eReceipts').val(rm.toFixed(2));
        }
        else
            form.find('input#SalesForecast15eReceipts').val(0);
        if(!isNaN(e16)) {
            var rm = (1-ediscount/100)*rrpebook*e16;
            form.find('input#SalesForecast16eReceipts').val(rm.toFixed(2));
        }
        else
            form.find('input#SalesForecast16eReceipts').val(0);

        if(!isNaN(e17)) {
            var rm = (1-ediscount/100)*rrpebook*e17;
            form.find('input#SalesForecast17eReceipts').val(rm.toFixed(2));
        }
        else
            form.find('input#SalesForecast17eReceipts').val(0);

        if(!isNaN(e18)) {
            var rm = (1-ediscount/100)*rrpebook*e18;
            form.find('input#SalesForecast18eReceipts').val(rm.toFixed(2));
        }
        else
            form.find('input#SalesForecast18eReceipts').val(0);


    }


}