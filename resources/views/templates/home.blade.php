@extends('main')

<!--//////////////////////////////////////////////////-->
<!--///////////////////HomePage///////////////////////-->
<!--//////////////////////////////////////////////////-->

<?php
        $specialProductsResult = $productsModel->getSpecialProducts();
        $featuredProductsResult = $productsModel->getFeaturedProducts();
        $routeLanguage = (isMultilingual()) ? '/' . appLanguage() : '/';
?>
@section('content')
<div class="row">
    <div class="col-lg-12">
        <!-- Carousel -->
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators hidden-xs">
                <li data-target="#carousel-example-generic"></li>
                <li data-target="#carousel-example-generic"></li>
                <li data-target="#carousel-example-generic"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="{{ http_resources('/assets/images/main-banner1-1903x600.jpg') }}" alt="First slide">
                    <!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                        </div>
                    </div><!-- /header-text -->
                </div>
                <div class="item">

                    <img src="{{ http_resources('/assets/images/main-banner2-1903x600.jpg') }}" alt="Second slide">
                    <!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                        </div>
                    </div><!-- /header-text -->
                </div>
                <div class="item">
                    <img src="{{ http_resources('/assets/images/main-banner3-1903x600.jpg') }}" alt="Third slide">
                    <!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                        </div>
                    </div><!-- /header-text -->
                </div>
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div><!-- /carousel -->
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="heading"><h2>SPECIAL PRODUCTS</h2></div>

        <div class="products">
            @foreach($specialProductsResult as $specProd)
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="product">
                    <div class="image"><a href="{{http('/product/'.$specProd['product_id'])}}"><img src="{{ '/mobileshop/public/product_images/'.$specProd['file_original_name'] }}" /></a></div>
                    @if(Auth::user())

                    <div class="buttons col-lg-10" style="margin-left: 20%">
                        <span class="col-md-3">
                        {!! Form::open(['url' => $routeLanguage.('/product/addToCart'), 'method' => 'post']) !!}
                        <button class="btn cart" type="submit" ><span class="glyphicon glyphicon-shopping-cart"></span></button>

                    {!! Form::hidden('quantity',1) !!}
                    {!! Form::hidden('product_id', $specProd['product_id']) !!}
                    {!! Form::hidden('user_id', Auth::user()->id) !!}
                    {!! Form::close() !!}
                        </span>
                        <span class="col-md-3">
                        {!! Form::open(['url' => $routeLanguage.('/product/addToFaveorites'), 'method' => 'post']) !!}
                            {!! Form::hidden('user_id',Auth::user()->id) !!}
                            {!! Form::hidden('product_id', $specProd['product_id']) !!}
                            <button class="btn wishlist" type="submit" ><span class="glyphicon glyphicon-heart"></span></button>
                        {!! Form::close() !!}

                        </span>
                    </div>
                    @endif
                    <div class="caption">
                        <div class="name"><h3><a href="product.html">{{$specProd['product_title']}}</a></h3></div>
                        <div class="price">{{$specProd['price']}} &euro;</div>
                        </div>
                </div>

            </div>
            @endforeach
        </div>

    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="heading"><h2>FEATURED PRODUCTS</h2></div>
        <div class="products">
            @foreach($featuredProductsResult as $featuredProd)
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="product">
                        <div class="image"><a href="{{http('/product/'.$featuredProd['product_id'])}}"><img src="{{ '/mobileshop/public/product_images/'.$featuredProd['file_original_name'] }}" /></a></div>
                        @if(Auth::user())
                            {!! Form::open(['url' => $routeLanguage.('/product/addToCart'), 'method' => 'post']) !!}
                            <div class="buttons col-lg-10" style="margin-left: 20%">
                        <span class="col-md-3">
                        {!! Form::open(['url' => $routeLanguage.('/product/addToCart'), 'method' => 'post']) !!}
                            <button class="btn cart" type="submit" ><span class="glyphicon glyphicon-shopping-cart"></span></button>

                            {!! Form::hidden('quantity',1) !!}
                            {!! Form::hidden('product_id', $featuredProd['product_id']) !!}
                            {!! Form::hidden('user_id', Auth::user()->id) !!}
                            {!! Form::close() !!}
                        </span>
                        <span class="col-md-3">
                        {!! Form::open(['url' => $routeLanguage.('/product/addToFaveorites'), 'method' => 'post']) !!}
                            {!! Form::hidden('user_id',Auth::user()->id) !!}
                            {!! Form::hidden('product_id', $featuredProd['product_id']) !!}
                            <button class="btn wishlist" type="submit" ><span class="glyphicon glyphicon-heart"></span></button>
                            {!! Form::close() !!}

                        </span>
                            </div>
                        @endif
                        <div class="caption">
                            <div class="name"><h3><a href="product.html">{{$featuredProd['product_title']}}</a></h3></div>
                            <div class="price">{{$featuredProd['price']}} &euro;</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection