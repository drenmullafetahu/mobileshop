<?php
/**
 * Created by PhpStorm.
 * User: Dren
 * Date: 4/16/2017
 * Time: 1:59 PM
 */

namespace Controllers;


class AccountController extends MainController
{
    public function index(){
        return view('templates.account');
    }

    public function store(){

    }
    public function update(AppRequest $request, $id){
        die();
        $inputs = $request->all();
        $users = User::findOrFail($id);

        $users->update($inputs);
        return redirect(http('/account'));

    }

}