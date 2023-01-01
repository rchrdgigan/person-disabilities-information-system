<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController,UserController,BarangayController,PwdController,SmsNotificationController,DisablityTypeController,BloodTypeController,ClassificationController};
use App\Models\Barangay;

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

Route::redirect('/', 'login');

Auth::routes();
Route::get('/register', function () {
    $brgy = Barangay::get();
    return view('auth.register',compact('brgy'));
})->name('register');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::put('/udpate/profile', [UserController::class, 'updateUser'])->name('home.update.profile');
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/barangay', [BarangayController::class, 'listBarangay'])->name('barangay');

    Route::get('/admin/disability', [DisablityTypeController::class, 'listDisability'])->name('disability');
    Route::post('/admin/disability/store', [DisablityTypeController::class, 'store'])->name('disability.store');

    Route::get('/admin/bloodtype', [BloodTypeController::class, 'listBloodType'])->name('bloodtype');
    Route::get('/admin/classification', [ClassificationController::class, 'listClassification'])->name('classification');
    Route::get('/admin/pwd', [PwdController::class, 'listPWD'])->name('pwd');
    Route::get('/admin/message', [SmsNotificationController::class, 'listMessage'])->name('message');
});