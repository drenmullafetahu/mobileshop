<?php
$brandsModelResults = $brandsModel->getBrands();
if(Auth::user()){
$cart_count = $cartsModel->getCount(Auth::user()->id);
}
?>
        <!--Top-->
<nav id="top">
    <div class="container">
        <div class="row">
            <div class="col-xs-6">
            </div>
            <div class="col-xs-6">
                <ul class="top-link">
                    <li><a href="{{http('/account')}}"><span class="glyphicon glyphicon-user"></span>
                            @if(Auth::check())
                                {{Auth::user()->name}}
                            @else
                                Login
                            @endif
                        </a></li>
                    <li><a href="{{http('/faveorites')}}"><span class="glyphicon glyphicon-heart" style="color: #a94242"></span> Faveorites</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!--Header-->
<header class="container">
    <div class="row">
        <div class="col-md-4">
            <div id="logo"><img src="{{ http_resources('/assets/images/logo.png') }}"/></div>
        </div>

        <div class="col-md-8">
            @if(Auth::user())
            @foreach($cart_count as $count)

                    <div id="cart"><a class="btn btn-1" href="{{http('/cart')}}">
                            <span class="glyphicon glyphicon-shopping-cart"></span>
                            CART :
                            @if(!empty ($count))
                            {{$count['cart_count']}} ITEM
                            @else 0 ITEM
                            @endif</a>
                    </div>

            @endforeach
                @endif
        </div>
    </div>
</header>
<!--Navigation-->
<nav id="menu" class="navbar">
    <div class="container">
        <div class="navbar-header"><span id="heading" class="visible-xs">Categories</span>
            <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse"
                    data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{http('/home')}}">Home</a></li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Mobiles &amp; Tablet</a>

                    <div class="dropdown-menu">
                        <div class="dropdown-inner">
                            <ul class="list-unstyled">
                                @foreach($brandsModelResults as $brand)
                                    <li><a href="{{http('/brand/'.$brand['brand_id'])}}">{{$brand['brand_title']}}</a></li>
                                @endforeach
                            </ul>

                        </div>
                    </div>
                </li>
                
                @role('admin')
                <li><a href="{{http('/brandsproducts')}}">Cms</a></li>
                @endrole
            </ul>
        </div>
    </div>
</nav>