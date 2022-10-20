<?php

use Illuminate\Support\Facades\Route;

//returning views
Route::get('login', 'App\Http\Controllers\Icontroller@index');

Route::get('pageadd', function () {
    return view('adminpannel/pageadd');
});

Route::get('categoryadd', function () {
    return view('adminpannel/categoryadd');
});

Route::get('changepassword', function () {
    return view('adminpannel/changepassword');
});

/////////pagesummary/////////

//pagesummary display
Route::get('pagesummary', 'App\Http\Controllers\Icontroller@pagesummary');

//pagesummary delete
Route::get('delete_form/{id}', 'App\Http\Controllers\Icontroller@deleteform');

//pagesummary edit
Route::get('pageadd/{id}', 'App\Http\Controllers\Icontroller@editdata');

//pagesummary update
Route::post('pageupdate/{id}', 'App\Http\Controllers\Icontroller@updatedata');

//pagesummary add
Route::post('form_insert', 'App\Http\Controllers\Icontroller@insertdata');

//pagesummary search
Route::post('search', 'App\Http\Controllers\Icontroller@search');


/////////category summary/////////

//category display
Route::get('categorysummary', 'App\Http\Controllers\Icontroller@categorysummary');

//category delete
Route::get('category_delete/{id}', 'App\Http\Controllers\Icontroller@categorydelete');

//category edit display
Route::get('categoryadd/{id}', 'App\Http\Controllers\Icontroller@categoryedisplay');

//category update
Route::post('categoryupdate/{id}', 'App\Http\Controllers\Icontroller@categoryupdate');

//category search
Route::post('categorysearch', 'App\Http\Controllers\Icontroller@categorysearch');

//category insert
Route::post('categoryinsert', 'App\Http\Controllers\Icontroller@categoryinsert');

/////////product/////////


//product display
Route::get('productsummary', 'App\Http\Controllers\Icontroller@productsummary');

//display in products add category
Route::get('productadd', 'App\Http\Controllers\Icontroller@categorydisplayproduct');

//product delete
Route::get('productdelete/{id}', 'App\Http\Controllers\Icontroller@productdelete');

//product edit
Route::get('productadd/{id}', 'App\Http\Controllers\Icontroller@productedit');

//products insert
Route::post('pinsert', 'App\Http\Controllers\Icontroller@productinsert');

//product update
Route::post('productupdate/{id}', 'App\Http\Controllers\Icontroller@productupdate');

//product search
Route::post('productsearch', 'App\Http\Controllers\Icontroller@productsearch');

//login
Route::post('sessionForm', 'App\Http\Controllers\Icontroller@sessionForm');

//Confirm old pass
Route::post('confirmoldpass', 'App\Http\Controllers\Icontroller@cop');

//create new pass
Route::post('createpass', 'App\Http\Controllers\Icontroller@cnp');
