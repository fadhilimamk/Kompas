<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/', 'IndexController@index')->name('index');
Route::get('/detail/{author_id}/{id}',  ['uses' =>'IndexController@detailindex'])->name('detail');

Auth::routes();

Route::get('/detail/{author_id}/{id}/{filename}', function ($author_id,$id,$filename){
    $path = storage_path() . '/app/public/' . $filename;

    if(!File::exists($path)) abort(404);

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    //return $response;
    return Response::make(file_get_contents($path), 200, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="'.$filename.'"'
    ]);
});


Route::get('/home/upload', 'UploadController@index')->middleware('auth');
Route::post('/home/upload/add', 'UploadController@uploadFiles')->middleware('auth');

Route::get('/home', 'HomeController@index');

Route::any('/categories', 'IndexController@ShowCategories');
Route::any('/search-category', 'IndexController@SearchCategory');
