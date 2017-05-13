<?php
/**
 * Created by PhpStorm.
 * User: Dren
 * Date: 4/18/2017
 * Time: 1:48 PM
 */

namespace Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Products extends Model
{
    protected $fillable = ['id','brand_id','product_title', 'product_description','price'];


    public function getSpecialProducts(){
        $result = objectToArray(DB::select("
            SELECT products.id as product_id ,product_title, price , products_images.file_original_name FROM `products`
            inner join products_images
            On products_images.product_id = products.id
            limit 4
    "));
        return $result;
    }

    public function getLatestProducts(){
        $result = objectToArray(DB::select("
            SELECT product_title, price , products_images.file_original_name ,products.updated_at FROM `products`
            inner join products_images
            On products_images.product_id = products.id
            order by updated_at LIMIT 3
    "));
        return $result;
    }

    public function getAllProducts(){
        $result = objectToArray(DB::select("
            SELECT products.id as product_id,brand_title ,product_title,product_description, price , products_images.file_original_name ,products.updated_at FROM `products`
            inner join products_images
            On products_images.product_id = products.id
            inner join brands
            On brands.id = products.brand_id
            order by updated_at
    "));
        return $result;
    }

    public function getProduct($id){
        $result = objectToArray(DB::select("
            SELECT products.id as product_id,product_title,brand_title, product_description, price , products_images.file_original_name as img_src ,products.updated_at FROM `products`
            inner join products_images
            On products_images.product_id = products.id
            inner join brands
            On products.brand_id = brands.id
            where products.id = $id
            order by updated_at
    "));
        return $result;
    }
    public function getFeaturedProducts(){
        $result = objectToArray(DB::select("
            SELECT products.id as product_id,product_title,brand_title, product_description, price , products_images.file_original_name  ,products.updated_at FROM `products`
            inner join products_images
            On products_images.product_id = products.id
            inner join brands
            On products.brand_id = brands.id
            order by products.id DESC
            limit 4
    "));
        return $result;
    }

    public function getBrandProducts($id){
        $result = objectToArray(DB::select("
           SELECT products.id as product_id,product_title,brand_title, product_description, price , products_images.file_original_name as img_src ,products.updated_at FROM `products`
            inner join products_images
            On products_images.product_id = products.id
            inner join brands
            On products.brand_id = brands.id
            where brands.id = $id
            order by updated_at
    "));
        return $result;
    }
}