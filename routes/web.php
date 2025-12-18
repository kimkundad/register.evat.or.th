<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TtbController;
use App\Http\Controllers\Ttb2Controller;
use App\Http\Controllers\TPController;
use App\Http\Controllers\SrichanController;
use App\Http\Controllers\ToyataController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\OwndaysQuizController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AdminHonor\ReceiptController;
use App\Http\Controllers\AdminHonor\LoginController;
use App\Http\Controllers\AdminHonor\ReceiptLogController;

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

Auth::routes();



Route::post('/admin-evat/logout', [LoginController::class, 'logout'])
    ->name('adminHonor.logout');

    Route::get('/admin-evat/logout', [LoginController::class, 'logout'])
    ->name('adminHonor.logout');



    Route::get('/', function () {
                return view('honor.index'); // หรือ controller ก็ได้
        });

        Route::get('/terms_conditions', function () {
                return view('honor.privacy'); // หรือ controller ก็ได้
        });

        Route::get('/pdpa', function () {
                return view('honor.pdpa'); // หรือ controller ก็ได้
        });

        Route::get('/regis_honor', [RegistrationController::class, 'showPhoneForm']);
        Route::post('/regis_honor', [RegistrationController::class, 'storePhone']);

        Route::get('/regis_user_data', [RegistrationController::class, 'showUserDataForm']);
        Route::post('/regis_user_data', [RegistrationController::class, 'storeUserData']);

        Route::get('/regis_user_upslip', [RegistrationController::class, 'showUploadForm']);
        Route::post('/regis_user_upslip', [RegistrationController::class, 'storeUpload']);

        Route::get('/regis_confirm', [RegistrationController::class, 'showConfirm']);

        Route::get('/my-rights', [RegistrationController::class, 'showLoginOrRedirect']);

        Route::post('/go-dashboard', [RegistrationController::class, 'goDashboard']);
        Route::get('/go-dashboard', [RegistrationController::class, 'showDashboard']);

        Route::get('/dashboard', [RegistrationController::class, 'showDashboard']);
        Route::get('/dashboard2', [RegistrationController::class, 'showDashboard2']);

        Route::post('/check-imei', [RegistrationController::class, 'checkIMEI']);

        Route::get('/logout-honor', function () {
            session()->flush();     // ล้าง Session ทั้งหมด
            return redirect('/');   // กลับหน้าแรก
        });

        Route::get('/terms', function () {
            return view('honor.terms');
        });

        Route::get('/privacy-policy', function () {
            return view('honor.privacy2');
        });

        Route::get('/edit-profile', [RegistrationController::class, 'editProfile']);
        Route::post('/edit-profile', [RegistrationController::class, 'updateProfile']);


//});

// ---------- ROUTE LOGIN ใหม่ (ไม่เกี่ยวกับ login เดิมของ Laravel) ----------
Route::get('/admin-evat/login', [LoginController::class, 'showLoginForm'])
    ->name('adminHonor.login');

Route::post('/admin-evat/login', [LoginController::class, 'login'])
    ->name('adminHonor.login.post');




Route::prefix('admin-evat')
    ->name('adminHonor.')
    ->middleware(['auth']) // ถ้าต้องการล็อกอินก่อนค่อยใส่ middleware ตรงนี้
    ->group(function () {

        Route::get('/imei-list', [ReceiptLogController::class, 'imeiIndex'])
    ->name('imei.index');

        Route::get('/receipt-logs', [ReceiptLogController::class, 'index'])
                ->name('receipts.logs');

        // หน้า Dashboard / รายการใบเสร็จ
        Route::get('/receipts', [ReceiptController::class, 'index'])
            ->name('receipts.index');

        // ดูรายละเอียดใบเสร็จ
        Route::get('/receipts/{receipt}', [ReceiptController::class, 'show'])
            ->name('receipts.show');

        // อนุมัติ
        Route::patch('/receipts/{receipt}/approve', [ReceiptController::class, 'approve'])
            ->name('receipts.approve');

        // ปฏิเสธ / ไม่ผ่าน
        Route::patch('/receipts/{receipt}/reject', [ReceiptController::class, 'reject'])
            ->name('receipts.reject');

        // Export ข้อมูล (ตัวอย่างเป็น CSV)
        Route::get('/receipts-export', [ReceiptController::class, 'export'])
            ->name('receipts.export');
    });


    Route::get('/adminHonor/receipt/download', [ReceiptController::class, 'downloadReceipt'])
    ->name('adminHonor.receipt.download');


