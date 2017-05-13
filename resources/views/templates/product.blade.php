@extends('main')
<?php
$brandsModelResults = $brandsModel->getBrands();
$latestProductResults = $productsModel->getLatestProducts();
$routeLanguage = (isMultilingual()) ? '/' . appLanguage() : '/';
?>
@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="category.html">Category</a></li>
                        <li><a href="#">Samsung Galaxy</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div id="main-content" class="col-md-8">
                    <div class="product">
                        <div class="col-md-6">
                            <div class="image">
                                @foreach($prod as $product)
                                <img src="{{'/mobileshop/public/product_images/'.$product['img_src']}}" />
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-6">
                            @foreach($prod as $product)
                            <div class="caption">
                                <div class="name"><h3>{{$product['product_title']}}</h3></div>
                                <div class="info">
                                    <ul>
                                        <li>Brand: {{$product['brand_title']}}</li>

                                    </ul>
                                </div>
                                <div class="price">&euro; {{$product['price']}}</div>
                                {!! Form::open(['url' => $routeLanguage.('/product/addToCart'), 'method' => 'post']) !!}
                                 <div class="well"><label>Qty: </label> <input class="form-inline quantity" name="quantity" type="text" value="1">
                                     {!! Form::hidden('product_id', $product['product_id']) !!}
                                     <button type="submit" class="btn btn-2 ">ADD</button>
                                 </div>
                                {!! Form::close() !!}
                            </div>
                                @endforeach
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="product-desc">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#description">Description</a></li>

                        </ul>
                        <div class="tab-content">
                            @foreach($prod as $product)
                            <div id="description" class="tab-pane fade in active">
                               {{$product['product_description']}}</div>
                            @endforeach
                        </div>
                    </div>

                </div>
                <div id="sidebar" class="col-md-4">
                    <div class="widget wid-categories">
                        <div class="heading"><h4>Brands</h4></div>
                        <div class="content">
                            <ul>
                                @foreach($brandsModelResults as $brand)
                                <li><a href="#">{{$brand['brand_title']}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="widget wid-product">
                        <div class="heading"><h4>LATEST</h4></div>
                        <div class="content">
                            @foreach($latestProductResults as $product)
                            <div class="product">
                                <a href="#"><img src="{{ '/mobileshop/public/product_images/'.$product['file_original_name'] }}" /></a>
                                <div class="wrapper">
                                    <h5><a href="#">{{$product['product_title']}}</a></h5>
                                    <div class="price">&euro; {{$product['price']}}</div>
                                   </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

@endsection