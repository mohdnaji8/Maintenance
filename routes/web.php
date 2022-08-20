<?php

use App\Http\Controllers\CircleController;
use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\OrderController;
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
    $data['content'] = 'index';
    $data['TITLE'] = 'قسم الحرف والمهن والصناعات';
    $data['main_title'] = ' مصحلة المياه';
    $data['sub_title'] = 'الخدمات الاكترونية';
    $data['sub_of_title'] = 'قسم الصيانة';
    return view('welcome')->with($data);
});

//Route::get('/maintenance',[MaintenanceController::class, 'index']);

Route::resource('/orders', OrderController::class);
Route::resource('/departments', DepartmentController::class);
Route::resource('/circles', CircleController::class);
