<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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



/*
 * Home Route
 */

Route::get('/', [
    'uses' => HomeController::class,
]);

/*
 * Product Routes
 */
Route::resource('products', ProductsController::class);

Route::middleware(['auth'])->group(function () {
    /*
     * Profile Routes
     */
    Route::resource('profile', ProfileController::class);

    /*
     * Order Routes
     */
    Route::resource('orders', OrdersController::class);
});


require __DIR__.'/auth.php';
