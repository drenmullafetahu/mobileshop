<?php
/**
 * Created by PhpStorm.
 * User: Dren
 * Date: 5/13/2017
 * Time: 3:42 PM
 */

namespace Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Faveorites extends Model
{
    protected $fillable = ['user_id','product_id', 'product_description','price'];

    public function getFaveorites($id){
        $result = objectToArray(DB::select("
           SELECT DISTINCT products.id as product_id,product_title,brand_title, product_description, price , products_images.file_original_name as img_src ,products.updated_at FROM `faveorites`
            inner join products
            on products.id = faveorites.product_id
            inner join products_images
            On products_images.product_id = products.id
            inner join brands
            On products.brand_id = brands.id
            where faveorites.user_id = $id

            order by updated_at

    "));
        return $result;
    }
}