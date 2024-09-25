<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Landing;
use App\Livewire\Products;
use App\Livewire\Qs;
use App\Livewire\Contact;
use App\Livewire\Products\View;

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Twofa;
use App\Http\Controllers\logoutController;

use App\Livewire\Admin\Index as Dashboard;
use App\Livewire\Admin\Commons\Profile;

use App\Http\Controllers\ImageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Home');
});

Route::get('/', Landing::class)->name('Home');
Route::get('/produtos', Products::class)->name('Products');
Route::get('/quemsomos', Qs::class)->name('QS');
Route::get('/contato', Contact::class)->name('Contact');

Route::get('/product-view', View::class)->name('PV');


Route::middleware('guest')->group(function () {
    Route::get('/acesso', Login::class)->name('login');
    Route::get('/acesso/twofa', Twofa::class)->name('login.twofa');
});

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/admin/logout', logoutController::class)->name('logout');

    Route::get('/admin/profile', Profile::class)->name('profile');
    route::post('/image/upload', [ImageController::class, 'upload'])->name('image.upload');
});