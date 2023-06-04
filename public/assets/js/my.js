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


//Получение всех продуктов
$.ajax({
    url: 'http://seadigital/public/api/products',
    type: 'GET',
    dataType: "json",
    success: function (data){
        $.each(data, function (index, product){
            let productHTML =  '<div class="col-sm col-md-6 col-lg"><div class="product">' +
                '<a href="/product/'+product.id+'" class="img-prod">' +
                '<img class="img-fluid" src="http://seadigital/public/storage/'+product.cover+'" alt="'+product.title+'">' +
                '<div class="overlay"></div>' +
                '</a>' +
                '<div class="text py-3 px-3">' +
                '<h3><a href="http://seadigital/public/product/'+product.id+'">'+product.title+'</a></h3>' +
                '<div class="d-flex">' +
                '<div class="pricing">' +
                '<p class="price"><span class="mr-2 price-dc">$'+product.price+'</span></p>' +
                '</div>' +
                '<div class="rating">' +
                '<p class="text-right">' +
                '<a href="#"><span class="ion-ios-star-outline"></span></a>' +
                '<a href="#"><span class="ion-ios-star-outline"></span></a>' +
                '<a href="#"><span class="ion-ios-star-outline"></span></a>' +
                '<a href="#"><span class="ion-ios-star-outline"></span></a>' +
                '<a href="#"><span class="ion-ios-star-outline"></span></a>' +
                '</p>' +
                '</div>' +
                '</div>' +
                '<p class="bottom-area d-flex px-3">' +
                '<a class="add-to-cart text-center py-2 mr-1 cursor-pointer" onclick="addToCart('+ product.id+','+ true +')"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>' +
                '<a href="#" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a>' +
                '</p>' +
                '</div>' +
                '</div></div>';
            $('#products').append(productHTML);
    })
}
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


