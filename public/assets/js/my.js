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

$.get("api/products", function (data){
    $('#products').html
    $.each(data, function (index, product){
        let productHTML =  '<div class="col-sm col-md-6 col-lg ftco-animate"><div class="product">' +
            '<a href="/product/'+product.id+'" class="img-prod">' +
            '<img class="img-fluid" src="http://seadigital/'+product.cover+'" alt="'+product.title+'">' +
            '<div class="overlay"></div>' +
            '</a>' +
            '<div class="text py-3 px-3">' +
            '<h3><a href="#">'+product.title+'</a></h3>' +
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
            '<a href="#" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>' +
            '<a href="#" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a>' +
            '</p>' +
            '</div>' +
            '</div></div>';
        $('#products').append(productHTML);
    })
})
