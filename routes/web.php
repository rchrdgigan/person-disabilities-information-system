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

Route::get('/af-pwd-pdf', function (Codedge\Fpdf\Fpdf\Fpdf $fpdf) {

    $form = "./AF.jpg";
    $fpdf->SetFont('Arial', '', 9);
    $fpdf->AddPage('P', 'Letter');
    $fpdf->SetTitle('Application Form'. ' - '. "pwd->firstname". ' '."pwd->lastname" );            
    $fpdf->Image($form, 0, 0, 216, 280);

    $fpdf->Text(15, 48, "pwd->last_name");
    $fpdf->Text(60, 48, "pwd->first_name");
    $fpdf->Text(105, 48, "pwd->middle_name");
    $fpdf->Text(153, 48, "pwd->sufix");
    $fpdf->Text(15, 60.5, "pwd->birthdate");
    $fpdf->Text(62, 60, "pwd->age");
    $fpdf->Text(112, 60, "pwd->religion");
    $fpdf->Text(162, 60, "pwd->ethnic_group");
    //Sex
    $fpdf->Text(22.5, 69.5, "X"); //if male
    $fpdf->Text(22.5, 75, "X"); //if female
    //civil status
    $fpdf->Text(55, 68.5, "X"); //if single
    $fpdf->Text(55, 72.5, "X"); //if separated
    $fpdf->Text(55, 76.5, "X"); //if cohabitation
    $fpdf->Text(100, 68.5, "X"); //if Married
    $fpdf->Text(100, 72.5, "X"); //if Widow
    //Blood type
    $fpdf->Text(137, 69.5, "X"); //A+
    $fpdf->Text(137.5, 76, "X"); //A-

    $fpdf->Text(155, 69.5, "X"); //AB+
    $fpdf->Text(155, 76, "X"); //AB-

    $fpdf->Text(175, 69.5, "X"); //B+
    $fpdf->Text(175.5, 76, "X"); //B-

    $fpdf->Text(193.5, 69.5, "X"); //O+
    $fpdf->Text(194, 76, "X"); //O-
    
    //Disability
    $fpdf->Text(22.5, 85.5, "X");
    $fpdf->Text(22.5, 90, "X");
    $fpdf->Text(22.5, 95, "X");
    $fpdf->Text(22.5, 99, "X");
    $fpdf->Text(22.5, 103, "X");

    $fpdf->Text(80.5, 85.5, "X");
    $fpdf->Text(80.5, 90, "X");
    $fpdf->Text(80.5, 95, "X");
    $fpdf->Text(80.5, 99, "X");
    //Cause
    $fpdf->Text(152, 85.5, "X");
    $fpdf->Text(152, 90, "X");
    $fpdf->Text(152, 95, "X");
    $fpdf->Text(152, 99, "X");
    $fpdf->Text(152, 104, "X");
    $fpdf->Text(152, 108, "X");
    $fpdf->Text(152, 113, "X");
    //Resident Address
    $fpdf->Text(15, 125, "pwd->street");
    $fpdf->Text(54, 125, "pwd->brgy");
    $fpdf->Text(94, 125, "pwd->municipality");
    $fpdf->Text(133, 125, "pwd->province");
    $fpdf->Text(172, 125, "pwd->region");
    //Contact Details
    $fpdf->Text(35, 134, "pwd->landline");
    $fpdf->Text(95, 134, "pwd->contact");
    $fpdf->Text(168, 134, "pwd->email");
    //Educ Att.
    $fpdf->Text(18, 144, "X");
    $fpdf->Text(18, 148.5, "X");
    $fpdf->Text(18, 153, "X");
    $fpdf->Text(18, 157.5, "X");
    $fpdf->Text(18, 162, "X");
    $fpdf->Text(18, 166.5, "X");
    $fpdf->Text(18, 171, "X");
    //Emp Stat
    $fpdf->Text(81, 144, "X");
    $fpdf->Text(81, 148.5, "X");
    $fpdf->Text(81, 153, "X");
    //Category Emp
    $fpdf->Text(81, 175.5, "X");
    $fpdf->Text(81, 179.5, "X");
    //Emp type
    $fpdf->Text(81, 195.5, "X");
    $fpdf->Text(81, 200, "X");
    $fpdf->Text(81, 204.5, "X");
    $fpdf->Text(81, 209, "X");
    $fpdf->Text(113.5, 209, "X");
    //Occupation
    $fpdf->Text(149, 144, "X");
    $fpdf->Text(149, 148.5, "X");
    $fpdf->Text(149, 153, "X");
    $fpdf->Text(149, 162, "X");
    $fpdf->Text(149, 166.5, "X");
    $fpdf->Text(149, 171, "X");
    $fpdf->Text(149, 180, "X");
    $fpdf->Text(149, 189, "X");
    $fpdf->Text(149, 198, "X");
    $fpdf->Text(149, 202.5, "X");
    $fpdf->Text(149, 207, "X");
    $fpdf->Text(154, 211, "pwd->other_occupation");
    //Organization Info
    $fpdf->Text(15, 223.5, "pwd->organization_affiliated");
    $fpdf->Text(62, 223.5, "pwd->contact_person");
    $fpdf->Text(112, 223.5, "pwd->office_address");
    $fpdf->Text(160, 223.5, "pwd->tell_number");
    //ID REF
    $fpdf->Text(62, 228, "pwd->id_number.'-'.pwd->type_id");
    $fpdf->Text(15, 234.5, "pwd->sss");
    $fpdf->Text(62, 234.5, "pwd->gsis");
    $fpdf->Text(112, 234.5, "pwd->pagibig");
    $fpdf->Text(160, 234.5, "pwd->philhealth");
    //Father
    $fpdf->Text(80, 243.5, "pwd->f_lname");
    $fpdf->Text(125, 243.5, "pwd->f_fname");
    $fpdf->Text(170, 243.5, "pwd->f_mname");
    //Mother
    $fpdf->Text(80, 248.5, "pwd->m_lname");
    $fpdf->Text(125, 248.5, "pwd->m_fname");
    $fpdf->Text(170, 248.5, "pwd->m_mname");
    //Guardian
    $fpdf->Text(80, 253.5, "pwd->g_lname");
    $fpdf->Text(125, 253.5, "pwd->g_fname");
    $fpdf->Text(170, 253.5, "pwd->g_mname");

    $fpdf->Output( 'I' ,'Application Form'. ' - '."pwd->lastname".', '. "pwd->firstname".'.pdf');

    exit;

});

Route::get('/gen-id-pdf', function (Codedge\Fpdf\Fpdf\Fpdf $fpdf) {

    $form = "./ID.png";
    $fpdf->SetFont('Arial', '', 9);
    $fpdf->AddPage('P', 'Letter');
    $fpdf->SetTitle('Identification Information'. ' - '. "pwd->firstname". ' '."pwd->lastname" );            
    $fpdf->Image($form, 0, 0, 216, 280);


    $fpdf->Output( 'I' ,'Application Form'. ' - '."pwd->lastname".', '. "pwd->firstname".'.pdf');

    exit;

});

Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::put('/udpate/profile', [UserController::class, 'updateUser'])->name('home.update.profile');
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');

    Route::get('/admin/barangay', [BarangayController::class, 'listBarangay'])->name('barangay');

    Route::get('/admin/disability', [DisablityTypeController::class, 'listDisability'])->name('disability');
    Route::post('/admin/disability/store', [DisablityTypeController::class, 'store'])->name('disability.store');
    Route::get('/admin/disability/edit/{id}', [DisablityTypeController::class, 'edit'])->name('disability.edit');
    Route::put('/admin/disability/update/{id}', [DisablityTypeController::class, 'update'])->name('disability.update');
    Route::delete('/admin/disability/destroy', [DisablityTypeController::class, 'destroy'])->name('disability.destroy');

    Route::get('/admin/bloodtype', [BloodTypeController::class, 'listBloodType'])->name('bloodtype');
    Route::get('/admin/bloodtype/edit/{id}', [BloodTypeController::class, 'editBloodType'])->name('bloodtype.edit');
    Route::put('/admin/bloodtype/update/{id}', [BloodTypeController::class, 'updateBloodType'])->name('bloodtype.update');

    Route::get('/admin/classification', [ClassificationController::class, 'listClassification'])->name('classification');
    Route::post('/admin/classification/store', [ClassificationController::class, 'store'])->name('classification.store');
    Route::get('/admin/classification/edit/{id}', [ClassificationController::class, 'edit'])->name('classification.edit');
    Route::put('/admin/classification/update/{id}', [ClassificationController::class, 'update'])->name('classification.update');
    Route::delete('/admin/classification/destroy', [ClassificationController::class, 'destroy'])->name('classification.destroy');

    Route::get('/admin/pwd', [PwdController::class, 'listPWD'])->name('pwd');
    Route::get('/admin/pwd/show/{id}', [PwdController::class, 'show'])->name('pwd.show');
    Route::put('admin/pwd/update/{id}', [PwdController::class, 'updatePwd'])->name('pwd.update');
    
    Route::get('/admin/message', [SmsNotificationController::class, 'listMessage'])->name('message');
});