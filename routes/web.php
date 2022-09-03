<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CircleController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ReplyController;

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

require __DIR__ . '/auth.php';


Route::get('/', [OrderController::class, 'index'])->middleware('auth');


//Route::get('/maintenance',[MaintenanceController::class, 'index']);


//Route::resource('/orders', OrderController::class);


Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders/store', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders', [AuthenticatedSessionController::class, 'create']);
Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('/departments', DepartmentController::class);
    Route::resource('/circles', CircleController::class);
 Route::get('/replies', [ReplyController::class, 'index'])->name('replies.index');
    Route::get('/order/{order_id}/reply', [ReplyController::class, 'create'])->name('replies.create');
    Route::post('/replies/store', [ReplyController::class, 'store'])->name('replies.store');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::get('/orders/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit');
    Route::post('/orders/store', [OrderController::class, 'store'])->name('orders.store');
    Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
    Route::post('/reply/buyorder', [ReplyController::class, 'buyorder_insert'])->name('buyorder.store');
});  
