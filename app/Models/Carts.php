<?php
/**
 * Created by PhpStorm.
 * User: Dren
 * Date: 5/2/2017
 * Time: 6:47 PM
 */

namespace Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Carts extends Model
{
    protected $fillable = ['user_id','product_id','quantity'];

    public function getCart($id){
        $result = objectToArray(DB::select("
            SELECT carts.id as cart_id, products.id as product_id ,product_title, price ,quantity, brand_title , products_images.file_original_name as img_src FROM `carts`
  			inner join products
            On products.id = carts.product_id
            inner join products_images
            On products_images.product_id = products.id
            inner join brands
            On products.brand_id = brands.id
            where user_id = $id

    "));
        return $result;
    }


    public function getCount($id){
        $result = objectToArray(DB::select("
           SELECT COUNT(*)as cart_count FROM `carts` WHERE user_id= $id

    "));
        return $result;
    }


}