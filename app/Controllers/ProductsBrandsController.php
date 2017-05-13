<?php
/**
 * Created by PhpStorm.
 * User: Dren
 * Date: 4/16/2017
 * Time: 9:07 PM
 */

namespace Controllers;
use App\Http\Requests;
use App\Http\Requests\AppRequest;
use Models\Brands;
class ProductsBrandsController extends MainController
{
    public function index(){
        return view('templates.brands-products');
    }

}