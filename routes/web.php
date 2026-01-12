<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userAuthController;
use App\Http\Controllers\VendorAuthController;
use App\Http\Controllers\Vendors\VendorDashboard;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\webSiteController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\userPaymentController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\vendorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountController;
use App\Models\Product;



 Route::get('/',[webSiteController::class,'index'])->name('user.visite');
 
 Route::post('/cart/add/{id}', [cartController::class,'add'])->name('cart.add');
 Route::get('/cart', [cartController::class,'index'])->name('cart.index');
 Route::get('/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('checkout');
 Route::post('/checkout', [App\Http\Controllers\CartController::class, 'processOrder'])->name('checkout.store');
 Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
 Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


//route pour les utilisateurs (acheteur) connecter
Route::middleware('guest')->group(function(){

       // inscription
 Route::get('/register', [userAuthController::class,'register'])->name('user.register');
 Route::post('/register', [userAuthController::class,'handleRegister'])->name('handleUserRegister');

     //connexion
  Route::get('/login', [userAuthController::class,'login'])->name('user.login');
  Route::post('/login', [userAuthController::class,'handleLogin'])->name('handleUserLogin');

});
 Route::middleware('auth')->group( function(){
 Route::get('/articles/order/{id}',[userPaymentController::class,'initPayment'])->name('order.article');
 //deconnexion
 Route::get('/logout', [userAuthController::class,'handleLogout'])->name('user.logout');

 Route::get('/mon-compte', [AccountController::class, 'index'])->name('account');
 Route::post('/profile/update', [AccountController::class, 'update'])->name('profile.update');
});

// route pour les vendeurs 
//vendeur guest [AUTH]
Route::prefix('vendors/accounts')->group( function() {

    Route::get('/login',[VendorAuthController::class,'login'] )->name('vendors.login');
    Route::get('/register',[VendorAuthController::class,'register'])->name('vendors.register');
    Route::post('/register',[VendorAuthController::class,'handleRegister'])->name('vendors.handleRegister');
    Route::post('/login',[VendorAuthController::class,'handleLogin'])->name('vendors.handleLogin');
 });
// route pour les vendeurs connecter
 Route::prefix('vendors/dashboard')->middleware('auth:vendor')->group(function(){ 
 Route::get('/',[VendorDashboard::class,'index'])->name('vendors.dashboard');
 Route::prefix('articles')->group(function(){
 Route::get('/',[ArticleController::class,'index'])->name('articles.index');
 Route::get('/create',[ArticleController::class,'create'])->name('articles.create');
 Route::post('/create',[ArticleController::class,'handleCreate'])->name('articles.handleCreate');
 });
 Route::get('payment-comfiguration',[paymentController::class,'getAccountInfo'])->name('payment.configuration');
 Route::get('payment-Info',[paymentController::class,'getPaymentInfo'])->name('payment.Info');
 Route::post('payment-comfiguration',[paymentController::class,'handleUpdateInfo'])->name('payments.updateConfiguration');


 Route::get('/logout',[VendorDashboard::class,'logout'])->name('vendors.logout');
 Route::delete('/articles/{id}',[ArticleController::class,'destroy'])->name('articles.destroy');
 Route::get('/profile',[profileController::class,'index'])->name('profile.index');
 Route::post('/profile/update',[VendorController::class,'updateProfile'])->name('vendors.profile.update');
 Route::post('/profile/update-photo', [VendorController::class, 'updatePhoto'])->name('profile.updatePhoto');
 Route::get('/ma-boutique', [VendorController::class, 'dashboard'])->name('seller.dashboard');
 Route::get('/vendeur/produits/creer', [ProductController::class, 'create'])->name('products.create');
 Route::post('/vendeur/produits', [ProductController::class, 'store'])->name('products.store');
 Route::resource('products', ProductController::class);

});
 




 