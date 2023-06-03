@extends('layouts.app')

@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url('{{ asset('assets/images/bg_6.jpg') }}');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span>Products</span></p>
                    <h1 class="mb-0 bread">Collection Products</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-10 order-md-last">
                    <div class="row" id="products">
                    </div>
                    <div class="row mt-5">
                        <div class="col text-center">
                            <div class="block-27">
                                <ul>
                                    <li><a href="#">&lt;</a></li>
                                    <li class="active"><span>1</span></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">&gt;</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-2 sidebar">
                    <div class="sidebar-box-2">
                        <h2 class="heading mb-4"><a href="#">Clothing</a></h2>
                        <ul>
                            <li><a href="#">Shirts &amp; Tops</a></li>
                            <li><a href="#">Dresses</a></li>
                            <li><a href="#">Shorts &amp; Skirts</a></li>
                            <li><a href="#">Jackets</a></li>
                            <li><a href="#">Coats</a></li>
                            <li><a href="#">Sleeveless</a></li>
                            <li><a href="#">Trousers</a></li>
                            <li><a href="#">Winter Coats</a></li>
                            <li><a href="#">Jumpsuits</a></li>
                        </ul>
                    </div>
                    <div class="sidebar-box-2">
                        <h2 class="heading mb-4"><a href="#">Jeans</a></h2>
                        <ul>
                            <li><a href="#">Shirts &amp; Tops</a></li>
                            <li><a href="#">Dresses</a></li>
                            <li><a href="#">Shorts &amp; Skirts</a></li>
                            <li><a href="#">Jackets</a></li>
                            <li><a href="#">Coats</a></li>
                            <li><a href="#">Jeans</a></li>
                            <li><a href="#">Sleeveless</a></li>
                            <li><a href="#">Trousers</a></li>
                            <li><a href="#">Winter Coats</a></li>
                            <li><a href="#">Jumpsuits</a></li>
                        </ul>
                    </div>
                    <div class="sidebar-box-2">
                        <h2 class="heading mb-2"><a href="#">Bags</a></h2>
                        <h2 class="heading mb-2"><a href="#">Accessories</a></h2>
                    </div>
                    <div class="sidebar-box-2">
                        <h2 class="heading mb-4"><a href="#">Shoes</a></h2>
                        <ul>
                            <li><a href="#">Nike</a></li>
                            <li><a href="#">Addidas</a></li>
                            <li><a href="#">Skechers</a></li>
                            <li><a href="#">Jackets</a></li>
                            <li><a href="#">Coats</a></li>
                            <li><a href="#">Jeans</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
