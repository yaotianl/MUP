$(document).ready(function(){
    $('#PrintSpecificationFormat').change(function(){
        calRRP(this);
    })

})

function calRRP(src) {
    form = $(src).closest('form');
    format = form.find('#PrintSpecificationFormat').val();
    switch (format) {
        case 'Paper Back (PB)':
            form.find('#PrintSpecificationRRP').val(24.99);
            break;
        case 'Hard Back (HB)':
            form.find('#PrintSpecificationRRP').val(49.99);
            break;
        case 'Electronic':
            form.find('#PrintSpecificationRRP').val(19.99);
            break;
        case 'POD':
            form.find('#PrintSpecificationRRP').val(59.99);
            break;
        case 'Trade Paper Back':
            break;
        default:
            break;
    }
}