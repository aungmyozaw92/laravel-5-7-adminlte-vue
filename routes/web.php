<?php

// Route::get('/{slug}', [
//         'as' => 'app.post.view',
//         'uses' => 'HomeController@index',
//     ]);

$this->get('admin/login', 'Auth\LoginController@showLoginForm')->name('login');


 Route::get('admin/{any}',"HomeController@index")->where( 'any', '([A-z\d-\/_.]+)?' );

 Route::get('/{path}',"Frontend\HomeController@index")->where( 'path', '([A-z\d-\/_.]+)?' );
 

Route::group(['prefix' => 'admin'], function() {
    Auth::routes();  
    Route::post('admin/logout', 'Auth\LoginController@logout')->name('logout'); 

});
