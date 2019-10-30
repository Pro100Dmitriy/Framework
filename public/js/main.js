/* SEARCH */

// constructs the suggestion engine
var products = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
        wildcard: '%QUERY',
        url: path + "/public/search/typeahead?query=%QUERY"
    }
  });

  products.initialize();
  
  $('#typeahead').typeahead({
    highlight: true
  },
  {
    name: 'products',
    items: 3,
    displayKey: "title",
    //display: 'title',
    //source: products
    //highlight: true,
    minLength: 1,
    source: products.ttAdapter(),
    //updater: selectCompany,
    matcher: function (t) {
        return t;
    }
  });

  $('#typeahead').bind('.typeahead:select', function(ev, suggestion){
      window.location = path + '/search/?s=' + encodeURIComponent(suggestion.title);
  });

/* SEARCH */

/* CART */

$('body').on('click', '.addToCartLink', function(e){
    e.preventDefault();
    var id = $(this).data('id'),
        qty = 2,
        mod = $('.available select').val();
    $.ajax({
        url: '/public/cart/add',
        data: {id: id, qty: qty, mod: mod},
        type: 'GET',
        success: function(res){
            showCart(res);
        },
        error: function(){
            alert('error');
        }
    });
    console.log(mod, id, qty);
});

function getCart()
{
    $.ajax({
        url: '/public/cart/show',
        type: 'GET',
        success: function(res){
            showCart(res);
        },
        error: function(){
            alert('error');
        }
    });
}

function clearCart()
{
    $.ajax({
        url: '/public/cart/clear',
        type: 'GET',
        success: function(res){
            showCart(res);
        },
        error: function(){
            alert('error');
        }
    });
}

$('#cart .modal-body').on('click', '.del_item', function(){
    var id = $(this).data('id');
    $.ajax({
        url: '/public/cart/delete',
        data: {id: id},
        type: 'GET',
        success: function(res){
            console.log(id);
            console.log(res);
        },
        error: function(){
            alert('error');
        }
    });
});

function showCart(cart){
    if( $.trim(cart) === "<h3>Корзина пустая</h3>" ){
        $('#cart .modal-footer a, #cart .modal-footer .btn-danger').css('display', 'none');
        //console.log(cart);
    }else{
        $('#cart .modal-footer a, #cart .modal-footer .btn-danger').css('display', 'inline-block');
        //console.log(cart);
    }
    $('#cart .modal-body').html(cart);
    $('#cart').modal();
    if( $('.cart-summ').text() ){
        $('.simpleCart_total').html( $('#cart .cart-sum').text() );
    }else{
        $('.simpleCart_total').text('Empty Cart');
    }
    //console.log(cart);
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

