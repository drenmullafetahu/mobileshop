@extends('main')
<?php
$routeLanguage = (isMultilingual()) ? '/' . appLanguage() : '/';
?>
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="heading"><h2>List By brand</h2></div>

        <div class="products">

            @foreach($prod as $product)
                <div class="col-lg-3 col-md-10 col-sm-6 col-xs-12">
                    <div class="product">
                        <div class="image"><a href="{{http('/product/'.$product['product_id'])}}"><img src="{{ '/mobileshop/public/product_images/'.$product['img_src'] }}" /></a></div>
                        @if(Auth::user())
                            <div class="buttons col-lg-10" style="margin-left: 20%">
                        <span class="col-md-3">
                        {!! Form::open(['url' => $routeLanguage.('/product/addToCart'), 'method' => 'post']) !!}
                            <button class="btn cart" type="submit" ><span class="glyphicon glyphicon-shopping-cart"></span></button>

                            {!! Form::hidden('quantity',1) !!}
                            {!! Form::hidden('product_id', $product['product_id']) !!}
                            {!! Form::hidden('user_id', Auth::user()->id) !!}
                            {!! Form::close() !!}
                        </span>
                        <span class="col-md-3">
                        {!! Form::open(['url' => $routeLanguage.('/product/addToFaveorites'), 'method' => 'post']) !!}
                            {!! Form::hidden('user_id',Auth::user()->id) !!}
                            {!! Form::hidden('product_id', $product['product_id']) !!}
                            <button class="btn wishlist" type="submit" ><span class="glyphicon glyphicon-heart"></span></button>
                            {!! Form::close() !!}

                        </span>
                            </div>
                        @endif
                        <div class="caption">
                            <div class="name"><h3><a href="product.html">{{$product['product_title']}}</a></h3></div>
                            <div class="price">{{$product['price']}}</div>
                        </div>
                    </div>

                </div>
            @endforeach



        </div>

    </div>
</div>

    @endsection