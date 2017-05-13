<?php
$brandsModelResults = $brandsModel->getBrands();
$productsModelResults = $productsModel->getAllProducts();

foreach ($brandsModelResults as $brandi) {
    if (!empty($brandi)) {
        $brands[$brandi['brand_id']] = $brandi['brand_title'];
    }
}
?>
<div class="modal fade" id="edit-product-{{$product['product_id']}}" tabindex="-1" role="dialog" aria-labelledby="edit"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"> {!! Form::model($product, ['method'=>'PATCH', 'action' => ['ProductsController@update', $product['product_id']]]) !!}

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                            class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading"><i class="fa fa-edit fa-2x text-aqua margin-r-4"></i>
                    Edit -
                    <small>{{$product['product_title']}}</small>
                </h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Product Title</label>
                    <input type="text" class="form-control" value="{{$product['product_title']}}" name="product_title"
                           placeholder="">
                </div>
                <div class="form-group">
                    <label>Brand</label>
                    {!! Form::select('brand_id', $brands,$brandi['brand_title'] , ['class' => 'form-control select2','style'=>'width:100%']) !!}
                </div>
                <div class="form-group">
                    <label>Product Description</label>
                    <input type="text" class="form-control" value="{{$product['product_description']}}" name="product_description"
                           placeholder="">
                </div>
                <div class="form-group">
                    <label>Product Price</label>
                    <input type="text" class="form-control" value="{{$product['price']}}" name="price"
                           placeholder="">
                </div>
                {!! Form::hidden('product_id', $product['product_id']) !!}

            </div>
            <div class="modal-footer ">
                <button type="submit" class="btn btn-warning btn-lg" style="width: 100%;"><span
                            class="glyphicon glyphicon-ok-sign"></span> Update
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    {!! Form::close() !!}

</div>
