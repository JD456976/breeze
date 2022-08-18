<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ColorsController;
use App\Http\Controllers\Admin\DeleteTempFilesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\ScentsController;
use App\Http\Controllers\Admin\SizesController;
use App\Http\Controllers\Admin\TinsController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['admin'])->group(function () {
    /*
* Admin Dashboard
*/
    Route::get('dashboard', [
        'as' => 'dashboard',
        'uses' => AdminController::class,
    ]);

    /*
     * User Routes
     */
    Route::resource('users', UserController::class)->only(['index','edit','update']);

    /*
     * Tins Routes
     */
    Route::resource('tins', TinsController::class)->except('show');

    /*
     * Colors Routes
     */
    Route::resource('colors', ColorsController::class)->except('show');

    /*
     * Tins Routes
     */
    Route::resource('scents', ScentsController::class)->except('show');

    /*
     * Size Routes
     */
    Route::resource('sizes', SizesController::class)->except('show');

    /*
     * Product Routes
     */
    Route::resource('products', ProductsController::class)->except('show');

    Route::delete('filepond/revert', [
        'as' => 'filepond.revert',
        'uses' => DeleteTempFilesController::class,
    ]);
});
