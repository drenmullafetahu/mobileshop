<?php
$brandsModelResults = $brandsModel->getBrands();
$productsModelResults = $productsModel->getAllProducts();

?>
<div class="modal fade" id="edit-brand-{{$brand['brand_id']}}" tabindex="-1" role="dialog" aria-labelledby="edit"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"> {!! Form::model($brand, ['method'=>'PATCH', 'action' => ['BrandsController@update', $brand['brand_id']]]) !!}

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                            class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading"><i class="fa fa-edit fa-2x text-aqua margin-r-4"></i>
                    Edit -
                    <small>{{$brand['brand_title']}}</small>
                </h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Brand Title</label>
                    <input type="text" class="form-control" value="{{$brand['brand_title']}}" name="brand_title"
                           placeholder="">
                </div>

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
