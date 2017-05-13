@extends('main')
<?php
    $faveoritesResults = $faveoritesModel->getFaveorites(Auth::user()->id);
$routeLanguage = (isMultilingual()) ? '/' . appLanguage() : '/';
?>
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="heading"><h2> Faveorite List</h2></div>

            <div class="products">
                @foreach($faveoritesResults as $fav)
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="product">
                            <div class="image"><a href="{{http('/product/'.$fav['product_id'])}}"><img src="{{ '/mobileshop/public/product_images/'.$fav['img_src'] }}" /></a></div>
                            @if(Auth::user())
                                {!! Form::open(['url' => $routeLanguage.('/product/addToCart'), 'method' => 'post']) !!}
                                <div class="buttons">
                                    <button class="btn cart" type="submit" ><span class="glyphicon glyphicon-shopping-cart"></span></button>

                                    {!! Form::hidden('quantity',1) !!}
                                    {!! Form::hidden('product_id', $fav['product_id']) !!}
                                    {!! Form::hidden('user_id', Auth::user()->id) !!}
                                    {!! Form::close() !!}

                                </div>
                            @endif
                            <div class="caption">
                                <div class="name"><h3><a href="product.html">{{$fav['product_title']}}</a></h3></div>
                                <div class="price">{{$fav['price']}}</div>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

        </div>
    </div>

@endsection