<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EnrollController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\StudentController;



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

Route::get('/admin/student/delete/{id}' , [ EnrollController::class, 'deleteStudent']);  //delete student

//lecturer edit, delete







Route::get('admin/storeStudentBulk', [ AdminController::class, 'storeBulkStudent']);
Route::get('admin/storeLecturerBulk', [ AdminController::class, 'storeBulkLecturer']);
Route::get('admin/storeSubjectBulk', [ AdminController::class, 'storeSubjectBulk']);



Route::POST('/admin/logoutAdmin', [LoginController::class, 'logout'])->name('logoutAdmin');

//lecturer routes


//admin routes
Route::get('/admin/yly_viewStudent', [ AdminController::class, 'viewStudent']);



//enroll lecturers

//enroll students




//enroll subjects to student












Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



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




Route::view('/', 'welcome');
//Auth::routes();

Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm']);
Route::get('/login/lecturer', [LoginController::class, 'showLecturerLoginForm']);
Route::get('/login/student', [LoginController::class, 'showStudentLoginForm']);
Route::get('/register/admin', [RegisterController::class, 'showAdminRegisterForm']);
Route::get('/register/lecturer', [RegisterController::class, 'showLecturerRegisterForm']);
Route::get('/register/student', [RegisterController::class, 'showStudentRegisterForm']);

Route::post('/login/admin', [LoginController::class, 'adminLogin']);
Route::post('/login/student', [LoginController::class, 'studentLogin']);
Route::post('/login/lecturer', [LoginController::class, 'lecturerLogin']);
Route::post('/register/admin', [RegisterController::class, 'createAdmin']);
Route::post('/register/lecturer', [RegisterController::class, 'createLecturer']);
Route::post('/register/student', [RegisterController::class, 'createStudent']);

Route::group(['middleware' => 'auth:lecturer'], function () {
    Route::view('/lecturer', 'lecturer');
    Route::get('/lecturer/viewSubjects', [ LecturerController::class, 'viewSubjects']);
    Route::get('/lecturer/yly_viewStudent', [ LecturerController::class, 'viewStudent']);
    Route::get('/lecturer/enrollMarks', [ LecturerController::class, 'enrollMarks']);
    Route::get('/lecturer/enrollMarks', [ LecturerController::class, 'enrollMarks']);
    Route::get('/lecturer/viewMarks', [ LecturerController::class, 'viewStudentMarks']);
    Route::get('/lecturer/enrollMarksSingle', [ LecturerController::class, 'addMarksSingle']);
    Route::get('/lecturer/edit/{id}' , [ LecturerController::class, 'editMarks']);
    Route::get('/lecturer/delete/{id}' , [ LecturerController::class, 'deleteMarks']);
    Route::post('/lecturer/updateMarks' , [ LecturerController::class, 'updateMarks']);
    Route::post('/lecturer/Report' , [ LecturerController::class, 'makeReport']);
    Route::get('/lecturer/selectSubject' , [ LecturerController::class, 'selectSubject']);
    Route::get('/lecturer/downloadPdf' , [ LecturerController::class, 'downloadPdf']);
    Route::get('/lecturer/sendInquiry' , [ MailController::class, 'sendInquiryLecturer']);
    Route::post('/send/emailLecturer',[MailController::class, 'sendEmailLecturer']);



});

Route::group(['middleware' => 'auth:student'], function () {
    Route::view('/student', 'student');
    Route::get('/student/viewSubjects', [StudentController::class,'viewSubjects']);
    Route::get('/student/Results', [StudentController::class,'viewMarks']);
    Route::post('/student/viewGPA', [StudentController::class,'viewGPA']);
    Route::get('/student/selectSemester', [StudentController::class,'selectSemester']);
    Route::view('/student/sendMailToAdmin', 'student.email');
    Route::post('/student/sendMailToAdmin', [MailController::class,'studentMail']);
});


Route::group(['middleware' => 'auth:admin'], function () {
    Route::view('/admin', 'admin');
    Route::get('/admin/yly_viewLectures', [ AdminController::class, 'viewLecturer']);
    Route::post('/dashboard/registerStudent', [AdminController::class, 'storeStudent']);
    Route::get('admin/yly_createStudent', [ AdminController::class, 'createStudent']);
    Route::get('/admin/student/edit/{id}' , [ StudentController::class, 'editStudent']);
    Route::get('/admin/subject/edit/{id}' , [ StudentController::class, 'editSubject']);
    Route::get('/admin/yly_viewStudent', [ AdminController::class, 'viewStudent']);
    Route::get('/admin/yly_createSubjects', [AdminController::class, 'createSubject']);
    Route::post('/dashboard/addSubject', [AdminController::class, 'storeSubject']);
    Route::get('/admin/yly_viewSubjects', [ AdminController::class, 'viewSubjects']);
    Route::get('/admin/yly_createLecturer', [AdminController::class, 'createLecturer']);
    Route::post('/dashboard/registerLecturer', [AdminController::class, 'storeLecturer']);
    Route::get('/admin/lecturer/edit/{id}' , [ LecturerController::class, 'editLecturer']);
    Route::get('/admin/lecturer/delete/{id}' , [ LecturerController::class, 'deleteLecturer']);  //delete student
    Route::get('/admin/enroll/{id}' , [ EnrollController::class, 'enrollLecturer']);
    Route::post('/admin/lecturer/enroll', [EnrollController::class, 'storeAssignedSubject']);
    Route::get('/admin/viewLecturesEnrollments', [ EnrollController::class, 'viewLecturerEnrollments']);
    Route::get('/admin/lecturer/deleteEnrollment/{id}' , [ LecturerController::class, 'deleteEnrollment']);
    Route::get('/admin/student/enrolldepartment/{id}' , [ EnrollController::class, 'enrollstudentdepartment']);
    Route::get('/admin/student/enrolldepartment/{id}' , [ EnrollController::class, 'enrollstudentdepartment']);
    Route::post('admin/student/enrollDepartment', [EnrollController::class, 'storeAssignedDepartment']);
    Route::get('/admin/student/enrollCourse/{id}' , [ EnrollController::class, 'enrollCourse']);
    Route::post('/enrollSubjects' , [ EnrollController::class, 'storeSubjects']);
    Route::get('/import-form' , [ AdminController::class, 'importForm']);
    Route::get('/import-form-lecturer' , [ AdminController::class, 'importFormLecturer']);
    Route::get('/subjects-import-form' , [ AdminController::class, 'importSubjects']);
    Route::post('/admin/storeStudent' , [ AdminController::class, 'StudentBulk']);
    Route::post('/admin/storeLecturer' , [ AdminController::class, 'LecturerBulk']);
    Route::post('/admin/storeSubjectCsv' , [ AdminController::class, 'storeSubjectCsv']);



});

Route::get('/send-email',[MailController::class, 'sendEmail']);
Route::get('/email',[MailController::class, 'create']);
Route::post('/email',[MailController::class, 'sendEmail'])->name('send.email');
Route::get('/sendStudentDetails',[MailController::class, 'SendStudentCredentials']);
Route::get('/SendLecturerCredentials',[MailController::class, 'SendLecturerCredentials']);

