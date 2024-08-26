<?php

use App\Http\Controllers\Admin\InsuranceProviderCrudController;
use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('user', 'UserCrudController');
    Route::crud('category', 'CategoryCrudController');
    Route::crud('insurance-provider', 'InsuranceProviderCrudController');



}); // this should be the absolute last line of this file
use App\Http\Controllers\Admin\CategoryCrudController;

Route::post('import', [CategoryCrudController::class, 'import'])->name('import');
Route::get('export', [CategoryCrudController::class, 'export'])->name('export');


Route::post('insurance-provider-import', [
    InsuranceProviderCrudController::class, 'import'
])->name('insurance-provider-import');
