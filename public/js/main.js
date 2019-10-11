
/* CART */

$('#product_add').on('click', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    var many = 23;
    $.ajax({
        url: 'cart/add',
        data: {id: id, many: many},
        type: 'GET',
        seccess: function(res){
            showCart(res);
            //alert('seccess');
        },
        error: function(){
            alert('error');
        }
    });
    //console.log(id);
});

function showCart(cart){
    console.log(cart);
}

var button = document.getElementsByClassName('add_to_cart_link');
var button2 = document.getElementById('product_add');
console.log(button);
console.log(button2);


/* CART */

$('#currency').change(function(){
    window.location = 'currency/change?curr=' + $(this).val();
});