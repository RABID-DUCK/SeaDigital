const cart = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : [];

//Удаление фоток в админке
$('.delete-image').on('click', function (e){
    let id = e.target.closest('div').getAttribute('data-key');
    $.ajax({
        url: '/admin/products/deleteImage',
        type: 'POST',
        data: {id: id},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data){
            window.location.reload()
        }
    })
})

const countCart = cart.reduce((qty, product) => qty + product.qty, 0)
$('#countCart').append('[' + countCart + ']')

// Добавление товара в корзину
function addToCart(id, isSingle){
    $.ajax({
        url: 'http://seadigital/public/api/product/'+id,
        success: function (res){
            let qty = isSingle ? 1 : parseInt($('#quantity').val()) || 1;
            console.log(cart)

            let index = cart.findIndex(productInCart => productInCart.id === id);

            let newProduct = [
                {
                    "id": res.id,
                    "title": res.title,
                    "price": res.price,
                    "size": res.size,
                    "description": res.description,
                    "img": res.cover,
                    "qty": qty
                }
            ];

            if (index !== -1){
                cart[index].qty += qty
            }else{
                cart.push(newProduct[0]);
            }
            localStorage.setItem('cart', JSON.stringify(cart));
            let count = cart.reduce((qty, product) => qty + product.qty, 0)

            $('#countCart').replaceWith('<a href="http://seadigital/public/cart" class="nav-link" id="countCart"><span class="icon-shopping_cart"></span>'
                +'[' + count + ']'+'</a>')
        }
    })
}

// удаляем продукт из localStorage
function removeProduct(id){
    let cart = JSON.parse(localStorage.getItem('cart'))
    cart.splice(id, 1);
    localStorage.setItem('cart', JSON.stringify(cart))

    let subtotal = cart.reduce((sum, product) => sum + product.price * product.qty, 0);
    $('#subtotal').replaceWith('<span id="subtotal">$'+subtotal+'</span>')

    let discount = $('#discount').text().replace("$", "");
    $('#total').replaceWith('<span id="total">$'+(subtotal-discount)+'</span>')
    console.log($('#total'))

    $('#cartList tr:eq('+id+')').remove();
}


