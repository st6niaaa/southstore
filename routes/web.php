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

use App\Livewire\Admin\Customers\Index as CustomersIndex;
use App\Livewire\Admin\Customers\Create as CreateCustomers;
use App\Livewire\Admin\Customers\Edit as EditCustomers;
use App\Livewire\Admin\Customers\Sale as CreateSaleCustomer;

use App\Livewire\Admin\Reviews\Index as ReviewIndex;

use App\Livewire\Admin\Simulations\Creditcard;
use App\Livewire\Admin\Simulations\Devices;

use App\Livewire\Admin\Manager\Simulations\Creditcard\Index as SimuCredit;
use App\Livewire\Admin\Manager\Simulations\Creditcard\Create as SimuCreditCreate;
use App\Livewire\Admin\Manager\Simulations\Creditcard\Edit as SimuCreditEdit;

use App\Livewire\Admin\Manager\Simulations\Devices\Index as SimuDevice;
use App\Livewire\Admin\Manager\Simulations\Devices\Create as SimuDeviceCreate;
use App\Livewire\Admin\Manager\Simulations\Devices\Edit as SimuDeviceEdit;

use App\Livewire\Admin\Manager\Relatory\Index as RelatoryIndex;
use App\Livewire\Admin\Manager\Relatory\Create as CreateRelatory;
use App\Livewire\Admin\Manager\Relatory\Edit as EditRelatory;

use App\Livewire\Admin\Manager\Users\Index as UsersIndex;
use App\Livewire\Admin\Manager\Users\Create as UsersCreate;
use App\Livewire\Admin\Manager\Users\Edit as UsersEdit;

use App\Livewire\Admin\Manager\Business\Index as BusinessIndex;

use App\Livewire\Admin\Custom\Hero\Index as HeroIndex;
use App\Livewire\Admin\Custom\Hero\Create as HeroCreate;
use App\Livewire\Admin\Custom\Hero\Edit as HeroEdit;

use App\Livewire\Admin\Custom\Qs\Index as QsIndex;
use App\Livewire\Admin\Custom\Contact\Index as ContactIndex;

use App\Livewire\Review\Index as Review;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web Routes for your application. These
| Routes are loaded by the RouteServiceProvider and all of them will
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

Route::get('/review/{id}', Review::class)->name('Review');

Route::middleware('guest')->group(function () {
    Route::get('/acesso', Login::class)->name('login');
    Route::get('/acesso/twofa', Twofa::class)->name('login.twofa');
});

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/admin/logout', logoutController::class)->name('logout');

    Route::get('/admin/profile', Profile::class)->name('profile');
    Route::post('/image/upload', [ImageController::class, 'upload'])->name('image.upload');

    Route::get('/admin/categorys', Categorys::class)->name('categories');
    Route::get('/admin/categorys/edit/{id}', CategoryEdit::class)->name('categories.edit');

    Route::get('/admin/products', ProductsAdmin::class)->name('admin.products');
    Route::get('/admin/products/create', CreateProduct::class)->name('admin.products.create');
    Route::get('/admin/products/edit/{id}', EditProduct::class)->name('admin.products.edit');
    Route::get('/admin/products/Threedview/{id}', Threedview::class)->name('admin.products.threedview');
    Route::post('/admin/products/upload', [fileController::class, 'upload'])->name('file.upload');
    
    Route::get('/admin/sales', Sales::class)->name('sales');
    Route::get('/admin/sales/create/{id}', CreateSale::class)->name('sales.create');
    Route::get('/admin/sales/edit/{id}', EditSale::class)->name('sales.edit');

    Route::get('/admin/customers', CustomersIndex::class)->name('customers');
    Route::get('/admin/customers/create', CreateCustomers::class)->name('customers.create');
    Route::get('/admin/customers/edit/{id}', EditCustomers::class)->name('customers.edit');
    Route::get('/admin/customers/sale/{id}', CreateSaleCustomer::class)->name('customers.sale');

    Route::get('/admin/reviews', ReviewIndex::class)->name('reviews');

    Route::get('/admin/simulations/creditcard', Creditcard::class)->name('simulations.creditcard');
    Route::get('/admin/simulations/devices', Devices::class)->name('simulations.devices');

    Route::get('/admin/manager/simulations/creditcard', SimuCredit::class)->name('manager.simulations.credit');
    Route::get('/admin/manager/simulations/creditcard/create', SimuCreditCreate::class)->name('manager.simulations.credit.create');
    Route::get('/admin/manager/simulations/creditcard/edit/{id}', SimuCreditEdit::class)->name('manager.simulations.credit.edit');
    
    Route::get('/admin/manager/simulations/devices', SimuDevice::class)->name('manager.simulations.device');
    Route::get('/admin/manager/simulations/devices/create', SimuDeviceCreate::class)->name('manager.simulations.device.create');
    Route::get('/admin/manager/simulations/devices/edit/{id}', SimuDeviceEdit::class)->name('manager.simulations.device.edit');
    
    Route::get('/admin/relatory', RelatoryIndex::class)->name('relatory');
    Route::get('/admin/relatory/create', CreateRelatory::class)->name('relatory.create');
    Route::get('/admin/relatory/edit/{id}', EditRelatory::class)->name('relatory.edit');

    Route::get('/admin/users', UsersIndex::class)->name('users');
    Route::get('/admin/users/create', UsersCreate::class)->name('users.create');
    Route::get('/admin/users/edit/{id}', UsersEdit::class)->name('users.edit');

    Route::get('/admin/business', BusinessIndex::class)->name('business');

    Route::get('/admin/custom/hero', HeroIndex::class)->name('hero');
    Route::get('/admin/custom/hero/create', HeroCreate::class)->name('hero.create');
    Route::get('/admin/custom/hero/edit/{id}', HeroEdit::class)->name('hero.edit');

    Route::get('/admin/custom/qs', QsIndex::class)->name('admin.qs');
    Route::get('/admin/custom/contact', ContactIndex::class)->name('admin.contact');
});