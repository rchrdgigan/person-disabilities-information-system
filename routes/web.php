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
    Route::get('/pwd/genpdf/{id}', [PwdController::class, 'generatePWD'])->name('genpdf');
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');

    Route::get('/admin/barangay', [BarangayController::class, 'listBarangay'])->name('barangay');

    Route::get('/admin/disability/archive-list', [DisablityTypeController::class, 'archiveList'])->name('disability.arclist');
    Route::get('/admin/disability', [DisablityTypeController::class, 'listDisability'])->name('disability');
    Route::post('/admin/disability/store', [DisablityTypeController::class, 'store'])->name('disability.store');
    Route::get('/admin/disability/edit/{id}', [DisablityTypeController::class, 'edit'])->name('disability.edit');
    Route::put('/admin/disability/update/{id}', [DisablityTypeController::class, 'update'])->name('disability.update');
    Route::delete('/admin/disability/destroy', [DisablityTypeController::class, 'destroy'])->name('disability.destroy');
    Route::put('/admin/disability/archive', [DisablityTypeController::class, 'archive'])->name('disability.archive');
    Route::put('/admin/disability/unarchive', [DisablityTypeController::class, 'unarchive'])->name('disability.unarchive');

    Route::get('/admin/bloodtype', [BloodTypeController::class, 'listBloodType'])->name('bloodtype');
    Route::get('/admin/bloodtype/edit/{id}', [BloodTypeController::class, 'editBloodType'])->name('bloodtype.edit');
    Route::put('/admin/bloodtype/update/{id}', [BloodTypeController::class, 'updateBloodType'])->name('bloodtype.update');

    Route::get('/admin/classification/archive-list', [ClassificationController::class, 'archiveList'])->name('classification.arclist');
    Route::get('/admin/classification', [ClassificationController::class, 'listClassification'])->name('classification');
    Route::post('/admin/classification/store', [ClassificationController::class, 'store'])->name('classification.store');
    Route::get('/admin/classification/edit/{id}', [ClassificationController::class, 'edit'])->name('classification.edit');
    Route::put('/admin/classification/update/{id}', [ClassificationController::class, 'update'])->name('classification.update');
    Route::delete('/admin/classification/destroy', [ClassificationController::class, 'destroy'])->name('classification.destroy');
    Route::put('/admin/classification/archive', [ClassificationController::class, 'archive'])->name('classification.archive');
    Route::put('/admin/classification/unarchive', [ClassificationController::class, 'unarchive'])->name('classification.unarchive');

    Route::get('/admin/pwd', [PwdController::class, 'listPWD'])->name('pwd');
    Route::get('/admin/pwd/show/{id}', [PwdController::class, 'show'])->name('pwd.show');
    Route::put('admin/pwd/update/{id}', [PwdController::class, 'updatePwd'])->name('pwd.update');
    Route::get('/admin/pwd/genpdf/{id}', [PwdController::class, 'generatePWD'])->name('pwd.genpdf');
    Route::get('/admin/pwd/genid/{id}', [PwdController::class, 'generateID'])->name('pwd.genid');
    
    Route::get('/admin/message', [SmsNotificationController::class, 'listMessage'])->name('message');
    Route::post('/admin/message/store', [SmsNotificationController::class, 'store'])->name('message.store');
    Route::delete('/admin/message/destroy', [SmsNotificationController::class, 'destroy'])->name('message.destroy');
});