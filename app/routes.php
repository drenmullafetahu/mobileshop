<?php
use App\Http\Requests\AppRequest;
use App\Http\Requests;
$routeLanguage = (isMultilingual()) ? '/' . appLanguage() : '/';

Route::get('/', function () {
    return redirect('/en/home');
});
Route::group(['prefix' => $routeLanguage,array('before' => 'auth'), 'namespace' => 'Controllers', 'middleware' => 'web',
], function ($router) {
    Route::resource('/home', 'HomeController');
    Route::get('/account', 'AccountController@index');
    Route::resource('/account/register', 'Auth\RegisterController@store');
    Route::resource('/account/login', 'Auth\AuthController@handleLogin');
//    Route::get('/login', 'Auth\AuthController@login');
    Route::get('/register', 'Auth\RegisterController@register');
    Route::post('/register/newUser', 'Auth\RegisterController@store');
    Route::post('/handleLogin', 'Auth\AuthController@handleLogin');
    Route::get('/product/{id}', 'ProductsController@product_detail');
    Route::get('/brand/{id}', 'BrandsController@brand_detail');


    Route::group(['middleware' => 'auth',
    ], function ($router) {
        Route::resource('/cms', 'CmsController');
        Route::resource('/brandsproducts', 'ProductsBrandsController');
        Route::resource('/faveorites', 'FaveoritesController');
        Route::resource('/brandsproducts', 'BrandsController');
        Route::resource('/brandsproducts', 'ProductsController');
        Route::post('/brand/create', 'BrandsController@store');
//        Route::post('/brand/edit/{id}', 'BrandsController@edit');
        Route::post('/product/create', 'ProductsController@store');
        Route::resource('/cart', 'CartsController');
        Route::post('/product/addToCart', 'CartsController@store');
        Route::post('/product/addToFaveorites', 'FaveoritesController@store');

        Route::resource('/cms/upload', 'CmsController@store');
//        Route::post('/account/edit/{id}', 'AccountController@update');
        Route::get('/account/logout', 'Auth\AuthController@logout', ['middleware' => 'auth']);
        Route::resource('/dashboard', 'DashboardController');
        Route::resource('/profile', 'ProfilesController');
        Route::resource('/tasks', 'TasksController');
        Route::resource('/activities', 'ActivitiesController');
        Route::resource('/task-responses', 'TaskResponsesController');
        Route::resource('/profile/uploadCoverImage', 'ProfilesController@uploadCoverImage');
        Route::resource('/profile/uploadProfilePicture', 'ProfilesController@uploadProfilePicture');
        Route::post('/tasks/edit/{id}', 'TasksController@edit');
        Route::post('/tasks-response', 'TaskResponsesController@store');
        Route::post('/tasks-reject/{id}', 'TaskResponsesController@reject');
        Route::post('/tasks-approve/{id}', 'TaskResponsesController@approve');
        Route::resource('/manage/tasks', 'ManageTasksController');
        Route::resource('/manage/activities', 'ManageActivitiesController');
        Route::resource('/projects', 'ProjectsController', ['middleware' => 'auth']);
        Route::resource('/calendar', 'CalendarController', ['middleware' => 'auth']);
        Route::resource('/treeView', 'TreeController@index', ['middleware' => 'auth']);
        Route::resource('/privacy', 'PrivacyController@index', ['middleware' => 'auth']);
        //        Social
        Route::resource('/social', 'SocialController@index');



    });


});


?>