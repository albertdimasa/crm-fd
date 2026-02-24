<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductFileController;

    /* PRODUCTS */
    Route::post('products/apply-quick-action', [ProductController::class, 'applyQuickAction'])->name('products.apply_quick_action');
    Route::post('products/remove-cart-item/{id}', [ProductController::class, 'removeCartItem'])->name('products.remove_cart_item');
    Route::get('products/options', [ProductController::class, 'allProductOption'])->name('products.options');
    Route::post('products/add-cart-item', [ProductController::class, 'addCartItem'])->name('products.add_cart_item');
    Route::get('products/cart', [ProductController::class, 'cart'])->name('products.cart');
    Route::get('products/empty-cart', [ProductController::class, 'emptyCart'])->name('products.empty_cart');
    /* Product Import */
            Route::get('import', [ProductController::class, 'importProduct'])->name('products.import');
            Route::post('import', [ProductController::class, 'importStore'])->name('products.import.store');
            Route::post('import/process', [ProductController::class, 'importProcess'])->name('products.import.process');
    Route::resource('products', ProductController::class);
    /* PRODUCT FILES */
    Route::get('product-files/download/{id}', [ProductFileController::class, 'download'])->name('product-files.download');
    Route::post('product-files/delete-image/{id}', [ProductFileController::class, 'deleteImage'])->name('product-files.delete_image');
    Route::post('product-files/update-images', [ProductFileController::class, 'updateImages'])->name('product-files.update_images');
    Route::resource('product-files', ProductFileController::class);
