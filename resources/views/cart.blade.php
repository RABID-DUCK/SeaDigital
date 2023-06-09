@extends('layouts.app')

@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url('{{ asset('assets/images/bg_6.jpg') }}');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span>Cart</span></p>
                    <h1 class="mb-0 bread">My Cart</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody id="cartList">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Cart Totals</h3>
                        <p class="d-flex">
                            <span>Subtotal</span>
                            <span id="subtotal"></span>
                        </p>
                        <p class="d-flex">
                            <span>Delivery</span>
                            <span>$0.00</span>
                        </p>
                        <p class="d-flex">
                            <span>Discount</span>
                            <span id="discount">$3.00</span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span id="total">$0</span>
                        </p>
                    </div>
                    <p class="text-center"><a href="/checkout" class="btn btn-primary py-3 px-4">Proceed to Checkout</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            var quantitiy = 0;
            $('.quantity-right-plus').click(function (e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());
                // If is not undefined
                $('#quantity').val(quantity + 1);
                // Increment
            });

            $('.quantity-left-minus').click(function (e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());
                // If is not undefined
                // Increment
                if (quantity > 0) {
                    $('#quantity').val(quantity - 1);
                }
            });

        });

        if(localStorage.getItem('cart')){
            let cart = JSON.parse(localStorage.getItem('cart'));
            $.each(cart, function (index, product){
                let productHtml = '<tr class="text-center"> ' +
                    '<td class="product-remove"><a onclick="removeProduct('+index+')">' +
                    '<span class="ion-ios-close"></span></a> </td>'+
                    '<td class="image-prod">' +
                    '<div class="img" style='+'"'+'background-image:url('+"'"+"storage/"+product.img+"'"+');'+'"'+'></div></td>'+
                    '<td class="product-name"><h3>'+product.title+'</h3>'+
                    '<p>'+product.description+'</p></td>'+
                    '<td class="price">$'+product.price+'</td>'+
                    '<td class="quantity"> ' +
                    '<div class="input-group mb-3"> ' +
                    '<input type="text" name="quantity" class="quantity form-control input-number"'+
                    'value="'+product.qty+'" min="1" max="100" id="qtyCartTable"> </div></td> <td class="total">$'+(product.price * product.qty)+'</td></tr>';
                $('#cartList').append(productHtml)
            })

            let subtotal = cart.reduce((sum, product) => sum + product.price * product.qty, 0);
            $('#subtotal').replaceWith('<span id="subtotal">$'+subtotal+'</span>')
            let discount = $('#discount').text().replace("$", "");
            if(subtotal !== 0) $('#total').replaceWith('<span id="total">$'+(subtotal-discount)+'</span>')

        }
    </script>
@endsection
