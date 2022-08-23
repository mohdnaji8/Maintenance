<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CircleController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/', function () {
    $data['content'] = 'index';
    $data['TITLE'] = 'قسم الحرف والمهن والصناعات';
    $data['main_title'] = ' مصحلة المياه';
    $data['sub_title'] = 'الخدمات الاكترونية';
    $data['sub_of_title'] = 'قسم الصيانة';
    return view('welcome')->with($data);
});

//Route::get('/maintenance',[MaintenanceController::class, 'index']);


//Route::resource('/orders', OrderController::class);
Route::resource('/departments', DepartmentController::class);
Route::resource('/circles', CircleController::class);

Route::get('/orders/create',[ OrderController::class,'create'])->name('orders.create');
Route::post('/orders/store',[ OrderController::class,'store'])->name('orders.store');
Route::get('/orders',[ AuthenticatedSessionController::class,'create']);
Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {
    Route::get('/orders',[ OrderController::class,'index'])->name('orders.index');
    Route::get('/orders/create',[ OrderController::class,'create'])->name('orders.create');
    Route::get('/orders/{id}/edit',[ OrderController::class,'edit'])->name('orders.edit');
    Route::post('/orders/store',[ OrderController::class,'store'])->name('orders.store');
    Route::post('/orders/{id}/update',[ OrderController::class,'update'])->name('orders.update');

});
