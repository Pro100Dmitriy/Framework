
/* CART */

$('body').on('click', '.addToCartLink', function(e){
    e.preventDefault();
    var id = $(this).data('id'),
        mod = $('.available select').val();
    $.ajax({
        url: '/public/cart/add',
        data: {id: id, mod: mod},
        type: 'GET',
        success: function(res){
            showCart(res);
        },
        error: function(){
            alert('error');
        }
    });
    console.log(mod, id);
});

function showCart(cart){
    console.log(cart);
}


/* CART */

$('#currency').change(function(){
    window.location = 'currency/change?curr=' + $(this).val();
});

$('.available select').on('change', function(){
    var id = $(this).val(),
        color = $(this).find('option').filter(':selected').data('title'),
        price = $(this).find('option').filter(':selected').data('price'),
        basePrice = $('#base_price').data('base');

    var SymbolRight = $('#base_price').data('symbolright'),
        SymbolLeft = $('#base_price').data('symbolleft');

    if( SymbolRight ){
        allPrice = price + SymbolRight + ' ';
        allBasePrice = basePrice + SymbolRight + ' ';
    }else{
        allPrice = ' ' + SymbolLeft + price;
        allBasePrice = ' ' + SymbolLeft + basePrice;
    }

    if( price ){
        $('#base_price').text(allPrice);
    }else{
        $('#base_price').text(allBasePrice);
    }
});