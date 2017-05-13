@extends('main')
<?php
$cartResults = $cartsModel->getCart(Auth::user()->id);

foreach($cartResults as $cart){
   if(!empty($cart)){
    $total[] = $cart['price']*$cart['quantity'] ;
   }
}
?>
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li><a href="cart.html">Cart</a></li>
            </ul>
        </div>
    </div>
    @foreach($cartResults as $cart)
    <div class="row">

        <div class="product well">
            <div class="col-md-3">
                <div class="image">
                    <img src="{{'/mobileshop/public/product_images/'.$cart['img_src']}}" />
                </div>
            </div>
            <div class="col-md-9">
                <div class="caption">
                    <div class="name"><h3><a href="{{http('/product/'.$cart['product_id'])}}">{{$cart['product_title']}}</a></h3></div>
                    <div class="info">
                        <ul>
                            <li>Brand: {{$cart['brand_title']}}</li>

                        </ul>
                    </div>
                    <div class="price">{{$cart['price']}}</div>
                    {!! Form::model($cart, ['method'=>'PATCH', 'action' => ['CartsController@update', $cart['cart_id']]]) !!}
                     <label>Qty: </label>
                        <input class="form-inline quantity" type="text" name="quantity" value="{{$cart['quantity']}}"><button type="submit" class="btn btn-2 ">Update</button>
                    {!! Form::close() !!}
                    <hr>
                    <a href="#"  data-toggle="modal" data-target="#remove-product-{{$cart['cart_id']}}" class="btn btn-default pull-right">REMOVE</a>
                </div>
            </div>
            @include('layout.modals.remove_product_cart')
            <div class="clear"></div>
        </div>
    </div>

    @endforeach

    <div class="row">
        <div class="col-md-4 col-md-offset-8 ">
            <center><a href="{{http('/home')}}" class="btn btn-1">Continue To Shopping</a></center>
        </div>
    </div>
    <div class="row">
        <div class="pricedetails">
            <div class="col-md-4 col-md-offset-8">
                <table>
                    <h6>Price Details</h6>
                    <tr>
                        <td>Total</td>
                        <td>
                            @if(!empty ($total))
                            {{array_sum($total)}}
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>Delivery Charges</td>
                        @if(!empty ($total))
                        <td>10.00</td>
                            @else
                            <td></td>
                            @endif
                    </tr>
                    <tr style="border-top: 1px solid #333">
                        <td><h5>TOTAL</h5></td>
                        <td>
                            @if(!empty($total))
                                {{array_sum($total)+10}}
                            @endif
                        </td>
                    </tr>
                </table>
                <center><a href="#" class="btn btn-1">Checkout</a></center>
            </div>
        </div>
    </div>
    @endsection