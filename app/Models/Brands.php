<?php
/**
 * Created by PhpStorm.
 * User: Dren
 * Date: 4/18/2017
 * Time: 12:45 PM
 */

namespace Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Brands extends Model
{
    protected $fillable = ['brand_title'];

    public function getBrands(){
        $result = objectToArray(DB::select("
        SELECT id as brand_id , brand_title FROM brands
    "));
        return $result;
    }

}