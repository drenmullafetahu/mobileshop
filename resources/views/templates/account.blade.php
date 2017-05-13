@extends('main')
<?php
$routeLanguage = (isMultilingual()) ? '/'.appLanguage() : '/';

?>
@section('content')
<!--//////////////////////////////////////////////////-->
<!--///////////////////Account Page///////////////////-->
<!--//////////////////////////////////////////////////-->
<div id="page-content" class="single-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="home">Home</a></li>
                    <li><a href="account">Account</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                @if (Auth::check())
                        {{Auth::user()->name}}
                    {!! Form::model( ['method'=>'PATCH', 'action' => ['Auth\AuthController@update',Auth::user()->id]]) !!}
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="First Name :" name="name" id="firstname" value="{{Auth::user()->name}}" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Last Name :" name="last_name" id="lastname" value="{{Auth::user()->last_name}}" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" class="form-control" placeholder="Email Address :" name="email" id="email" value="{{Auth::user()->email}}" required>
                    </div>
                    <button type="submit" class="btn  btn-warning">Update</button>
                    <div class="pull-right">
                        <a href="{{http('/account/logout')}}" class="btn btn-danger btn-flat">Sign out</a>
                    </div>
                    {!! Form::close() !!}


                    @else
                <div class="heading"><h2>Login</h2></div>
                {!! Form::open(['url' => $routeLanguage.('/account/login'), 'method' => 'post']) !!}
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email :" name="email" id="username" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password :" name="password" id="password" required>
                    </div>
                    <button type="submit" class="btn btn-1" name="login" id="login">Login</button>
                    <a href="#">Forgot Your Password ?</a>
                {!! Form::close() !!}
            </div>
            <div class="col-md-6">
                <div class="heading"><h2>New User ? Create An Account.</h2></div>

                {!! Form::open(['url' => $routeLanguage.('/account/register'), 'method' => 'post']) !!}
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="First Name :" name="name" id="firstname" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Last Name :" name="last_name" id="lastname" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" class="form-control" placeholder="Email Address :" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password :" name="password" id="password" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Retype Password :" name="repassword" id="repassword" required>
                    </div>
                    <div class="form-group">
                        <input name="agree" id="agree" type="checkbox" > I agree to your website.
                    </div>
                    {!! Form::hidden('role_id', '3') !!}
                    <button type="submit" class="btn btn-1">Create</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endif
@endsection