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
use Models\Products;
use Illuminate\Support\Facades\Input;
use Models\ProductsImages;
use Symfony\Component\Routing\Annotation\Route;
use Illuminate\Support\Facades\View;

class ProductsController extends MainController
{

    public function index(){
        return view('templates.brands-products');

    }

    public function product_detail($id){

        $products = new Products();
        $prod = $products->getProduct($id);
        return View::make('templates.product', compact('prod'));

    }


    public function store(AppRequest $request){

//        $this->validate($request, [
//            'brand_id' => 'required',
//            'product_title' => 'required',
//            'product_description' => 'required',
//            'price' => 'required',
//        ]);
        $products = new Products();
        $brand_id = Input::get('brand_id');
        $product_title = Input::get('product_title');
        $product_description = Input::get('product_description');
        $product_price = Input::get('price');


        $products->brand_id = $brand_id;
        $products->product_title = $product_title;
        $products->product_description = $product_description;
        $products->price = $product_price;
        $products->save();


        if(Input::hasFile('file_original_name')){

            for($i = 0 ; $i<count($_FILES["file_original_name"]["name"]); $i++){
                $files = Request::file('file_original_name');
                $original_name = $_FILES["file_original_name"]["name"][$i];
                $file_size = $_FILES["file_original_name"]["size"][$i];
                $file_type = $_FILES["file_original_name"]["type"][$i];

               ProductsImages::create([
                    'product_id'=>$products->id,
                    'file_original_name' => $original_name,
                    'size' => $file_size ,
                    'type' => $file_type
                ]);

            }
            foreach($files as $file){
                $file->move(public_path().'\product_images', $original_name);
            }
        }
        return redirect(http('/brandsproducts'));
    }

    public function update(AppRequest $request, $id){

        $inputs = $request->all();
        $products = Products::findOrFail($id);

//        $product_image = new ProductsImages();
//        $product_image_id = Input::get('product_id');
//        $product_image->update($product_image_id);
        $products->update($inputs);

        return redirect(http('/brandsproducts'));
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