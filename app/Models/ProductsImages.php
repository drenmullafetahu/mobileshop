<?php
/**
 * Created by PhpStorm.
 * User: Dren
 * Date: 4/18/2017
 * Time: 2:07 PM
 */

namespace Models;
use Illuminate\Database\Eloquent\Model;

class ProductsImages extends Model
{
    protected $fillable = ['product_id', 'file_original_name','size','type'];

}