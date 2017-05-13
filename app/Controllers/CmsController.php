<?php
/**
 * Created by PhpStorm.
 * User: Dren
 * Date: 4/16/2017
 * Time: 2:28 PM
 */

namespace Controllers;


class CmsController extends MainController
{
    public function index(){
        return view('templates.cms');
    }

    public function brandsproducts(){
        return view('templates.brands-products');
    }

}