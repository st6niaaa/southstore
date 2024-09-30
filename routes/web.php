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
use App\Http\Controllers\fileController;

use App\Livewire\Admin\Categorys\Index as Categorys;
use App\Livewire\Admin\Categorys\Edit as CategoryEdit;

use App\Livewire\Admin\Products\Index as ProductsAdmin;
use App\Livewire\Admin\Products\Create as CreateProduct;
use App\Livewire\Admin\Products\Edit as EditProduct;
use App\Livewire\Admin\Products\Threedview;

use App\Livewire\Admin\Sales\Index as Sales;
use App\Livewire\Admin\Sales\Create as CreateSale;
use App\Livewire\Admin\Sales\Edit as EditSale;

use App\Livewire\Admin\Manager\Relatory\Index as RelatoryIndex;
use App\Livewire\Admin\Manager\Relatory\Create as CreateRelatory;
use App\Livewire\Admin\Manager\Relatory\Edit as EditRelatory;

use App\Livewire\Admin\Custom\Hero\Index as HeroIndex;
use App\Livewire\Admin\Custom\Hero\Create as HeroCreate;
use App\Livewire\Admin\Custom\Hero\Edit as HeroEdit;

use App\Livewire\Admin\Custom\Qs\Index as QsIndex;
use App\Livewire\Admin\Custom\Contact\Index as ContactIndex;


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
Route::get('/produtos/{id?}', Products::class)->name('Products');
Route::get('/quemsomos', Qs::class)->name('QS');
Route::get('/contato', Contact::class)->name('Contact');

Route::get('/produto/{id}', View::class)->name('PV');


Route::middleware('guest')->group(function () {
    Route::get('/acesso', Login::class)->name('login');
    Route::get('/acesso/twofa', Twofa::class)->name('login.twofa');
});

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/admin/logout', logoutController::class)->name('logout');

    Route::get('/admin/profile', Profile::class)->name('profile');
    route::post('/image/upload', [ImageController::class, 'upload'])->name('image.upload');

    Route::get('/admin/categorys', Categorys::class)->name('categories');
    Route::get('/admin/categorys/edit/{id}', CategoryEdit::class)->name('categories.edit');

    Route::get('/admin/products', ProductsAdmin::class)->name('admin.products');
    Route::get('/admin/products/create', CreateProduct::class)->name('admin.products.create');
    Route::get('/admin/products/edit/{id}', EditProduct::class)->name('admin.products.edit');
    route::get('/admin/products/Threedview/{id}', Threedview::class)->name('admin.products.threedview');
    route::post('/admin/products/upload', [fileController::class, 'upload'])->name('file.upload');
    
    route::get('/admin/sales', Sales::class)->name('sales');
    route::get('/admin/sales/create/{id}', CreateSale::class)->name('sales.create');
    route::get('/admin/sales/edit/{id}', EditSale::class)->name('sales.edit');
    
    route::get('/admin/relatory', RelatoryIndex::class)->name('relatory');
    route::get('/admin/relatory/create', CreateRelatory::class)->name('relatory.create');
    Route::get('/admin/relatory/edit/{id}', EditRelatory::class)->name('relatory.edit');

    Route::get('/admin/custom/hero', HeroIndex::class)->name('hero');
    Route::get('/admin/custom/hero/create', HeroCreate::class)->name('hero.create');
    Route::get('/admin/custom/hero/edit/{id}', HeroEdit::class)->name('hero.edit');

    Route::get('/admin/custom/qs', QsIndex::class)->name('admin.qs');
    Route::get('/admin/custom/contact', ContactIndex::class)->name('admin.contact');
});