<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Home');
});


Route::post('/fileUp', 'UploadController@onFile');


Route::get('/filedownload/{filename}/{name}', 'DownloadController@onDownload');
Route::get('/filelist', 'DownloadController@onSelectFileList');



//delete

Route::get('/filedelete', 'DeleteController@onDelete');
