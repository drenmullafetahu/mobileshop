<?php
/**
 * Created by PhpStorm.
 * User: Dren
 * Date: 4/16/2017
 * Time: 8:43 PM
 */

namespace Controllers;


use Controllers\MainController;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\AppRequest;
use Illuminate\Database\Eloquent\Model;
use Models\Brands;
use Illuminate\Support\Facades\Input;
use Models\Products;
use Illuminate\Support\Facades\View;
class BrandsController extends MainController
{

    public function index(){
        return view('templates.brands-products');
    }
    public function brand_detail($id){
        $products = new Products();
        $prod = $products->getBrandProducts($id);
        return View::make('templates.product_list', compact('prod'));

    }

    public function store(AppRequest $request)
    {

        $this->validate($request, [
            'brand_title' => 'required',
        ]);
        $brands = new Brands();
        $brand_title = Input::get('brand_title');

        $brands->brand_title = $brand_title;
        $brands->save();

//        Brands::create($inputs);
        return redirect(http('/brandsproducts'));
    }

    public function update(AppRequest $request, $id){

        $inputs = $request->all();
        $brands = Brands::findOrFail($id);

        $brands->update($inputs);

        return redirect(http('/brandsproducts'));
    }

    public function destroy($id)
    {

        $brand = Brands::findOrFail($id);
        $brand->delete();

        return redirect(http('/brandsproducts'));


    }
}