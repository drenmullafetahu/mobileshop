<?php
/**
 * Created by PhpStorm.
 * User: Dren
 * Date: 4/24/2017
 * Time: 4:12 PM
 */

namespace Controllers;
use App\Http\Requests\AppRequest;
use Models\Carts;
use Illuminate\Support\Facades\Input;

class CartsController extends MainController
{
    public function index(){

        return view('templates.cart');
    }

    public function store(AppRequest $request){

        $this->validate($request, [
            'quantity' => 'required',
        ]);
        $cart = new Carts();
        $product_id = Input::get('product_id');
        $quantity = Input::get('quantity');
        $user_id = Input::get('user_id');

        $cart->product_id = $product_id;
        $cart->quantity = $quantity;
        $cart->user_id = $user_id;
        $cart->save();

//        Brands::create($inputs);
        return redirect(http('/home'));
    }

    public function destroy($id)
    {
        $cart = Carts::findOrFail($id);
        $cart->delete();
        return redirect(http('/cart'));


    }
    public function update(AppRequest $request, $id){

        $inputs = $request->all();
        $carts = Carts::findOrFail($id);

        $carts->update($inputs);

        return redirect(http('/cart'));
    }

}