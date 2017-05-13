@extends('main')
<?php
$routeLanguage = (isMultilingual()) ? '/' . appLanguage() : '/';
$brandsModelResults = $brandsModel->getBrands();
$productsModelResults = $productsModel->getAllProducts();

foreach($brandsModelResults as $brand){
    if(!empty($brand)){
        $brands[$brand['brand_id']] = $brand['brand_title'];
    }
}
?>

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="heading"><h2>Create Brand</h2></div>

                {!! Form::open(['url' => $routeLanguage.('/brand/create'), 'method' => 'post']) !!}
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Brand Name :" name="brand_title" id="firstname"
                           required>
                </div>
                <button type="submit" class="btn btn-1">Create</button>
                {!! Form::close() !!}


            </div>


            <div class="col-md-6">
                <div class="heading"><h2>Create Product</h2></div>

                {!! Form::open(['url' => $routeLanguage.('/product/create'), 'method' => 'post','enctype'=>'multipart/form-data']) !!}
                <div class="col-md-6">
                <div class="form-group">
                    {!! Form::select('brand_id', $brands , $brand['brand_id'] , ['class' => 'form-control select2','style'=>'width:100%']) !!}
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Product Name :" name="product_title" required>
                </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Product Description :" name="product_description" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Product Price &#8364:" name="price" required>
                    </div>
                    <div class="form-group">
                        <label>Select images</label>
                        <input id="input-id" type="file" name="file_original_name[]" class="file" data-preview-file-type="text" multiple>
                        {{--<input type="file" id="file" name="images" id="exampleInputFile">--}}
                    </div>
                <button type="submit" class="btn btn-1">Create</button>
                {!! Form::close() !!}
                </div>
            </div>

        </div>
        <div class="col-md-12">
            <h3>Brands Table <small>on Database</small></h3>
            <table class="table">
                <thead>
                <tr>
                    <th>Brand Id</th>
                    <th>Brand Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($brandsModelResults as $brand)
                    <tr>
                        <td>{{$brand['brand_id']}}</td>
                        <td>{{$brand['brand_title']}}</td>
                        <td>
                            <p data-original-title="Edit" data-placement="top" data-toggle="tooltip"
                               title="">
                                <button class="edit btn btn-success btn-xs" data-title="Edit"
                                        data-toggle="modal"
                                        data-target="#edit-brand-{{$brand['brand_id']}}"><span
                                            class="glyphicon glyphicon-pencil"></span>
                                </button>
                            </p>
                        </td>
                        <td>
                            <p data-original-title="Delete" data-placement="top" data-toggle="tooltip"
                               title="">
                                <button class="btn btn-danger btn-xs" data-title="Delete"
                                        data-toggle="modal" data-target="#delete-brand-{{$brand['brand_id']}}"><span
                                            class="glyphicon glyphicon-trash"></span></button>
                            </p>
                        </td>
                    </tr>
                    @include('layout.modals.edit_brands')
                    @include('layout.modals.delete_brands')
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            <h3>Products Table <small>on Database</small></h3>
            <table class="table">
                <thead>
                <tr>
                    <th>Product Id</th>
                    <th>Brand Name</th>
                    <th>Product Name</th>
                    <th>Product Description</th>
                    <th>Product Price</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($productsModelResults as $product)
                    <tr>
                        <td>{{$product['product_id']}}</td>
                        <td>{{$product['brand_title']}}</td>
                        <td>{{$product['product_title']}}</td>
                        <td>{{$product['product_description']}}</td>
                        <td>{{$product['price']}}</td>
                        <td>
                            <p data-original-title="Edit" data-placement="top" data-toggle="tooltip"
                               title="">
                                <button class="edit btn btn-success btn-xs" data-title="Edit"
                                        data-toggle="modal"
                                        data-target="#edit-product-{{$product['product_id']}}"><span
                                            class="glyphicon glyphicon-pencil"></span>
                                </button>
                            </p>
                        </td>
                        <td>
                            <p data-original-title="Delete" data-placement="top" data-toggle="tooltip"
                               title="">
                                <button class="btn btn-danger btn-xs" data-title="Delete"
                                        data-toggle="modal" data-target="#delete-product-{{$product['product_id']}}"><span
                                            class="glyphicon glyphicon-trash"></span></button>
                            </p>
                        </td>
                    </tr>
                    @include('layout.modals.edit_products')
                    @include('layout.modals.delete_products')
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection