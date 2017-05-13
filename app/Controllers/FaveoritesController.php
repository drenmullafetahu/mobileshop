<?php
/**
 * Created by PhpStorm.
 * User: Dren
 * Date: 4/18/2017
 * Time: 1:35 PM
 */

namespace Controllers;
use App\Http\Requests\AppRequest;
use Illuminate\Support\Facades\Request;
use Models\Faveorites;
use Models\Products;
use Illuminate\Support\Facades\Input;
use Models\ProductsImages;
use Symfony\Component\Routing\Annotation\Route;
use Illuminate\Support\Facades\View;

class FaveoritesController extends MainController
{

    public function index(){
        return view('templates.faveorite');

    }




    public function store(AppRequest $request){


        $products = new Faveorites();
        $user_id = Input::get('user_id');
        $product_id = Input::get('product_id');

        $products->user_id = $user_id;
        $products->product_id = $product_id;
        $products->save();


        return back();
    }


    public function destroy($id)
    {

        $product = Products::findOrFail($id);
        $product_image_id = Input::get('product_id');
        $product_image = ProductsImages::where('product_id', $product_image_id);
        $product_image->delete();
        $product->delete();

        return redirect(http('/brandsproducts'));


    }

}