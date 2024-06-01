<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\MarkAttendanceController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\SubjectController;






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
    return view('welcome');
});
/** ----------------------------------student-----------------------------route--------------------------------------------------- */
Route::group(['prefix'=>'v1/student/'], function(){
    Route::get('register',[StudentController::class, 'register'])->name('student.register');
    Route::get('login',[StudentController::class, 'login'])->name('student.login');
    Route::post('register', [StudentController::class, 'studentRegister'])->name('student.register');
    Route::post('login', [StudentController::class, 'studentLogin'])->name('student.login');
    Route::middleware(['sguard'])->group(function(){
        Route::get('dashboard', [StudentController::class, 'studentDashboard'])->name('student.dashboard');
        Route::get('logout', [StudentController::class, 'studentLogout'])->name('student.logout');
        Route::get('scan', [studentController::class, 'scan'])->name('student.scan');
        Route::post('mark/attendance',[MarkAttendanceController::class, 'markAttendance'])->name('student.mark');
        //Route::get('search',[TeacherController::class, 'searchAttendance'])->name('student.search');
    });
}); 
/** ----------------------------------admin-------------------------------route--------------------------------------------------- */
Route::group(['prefix'=>'v1/admin/'], function(){
    Route::get('register',[AdminController::class, 'register'])->name('admin.register');
    Route::post('register',[AdminController::class, 'adminRegister'])->name('admin.register');
    Route::get('login',[AdminController::class, 'login'])->name('admin.login');
    Route::post('login',[AdminController::class, 'adminLogin'])->name('admin.login');
    
    Route::middleware(['guard'])->group(function(){
        Route::get('dashboard',[AdminController::class, 'adminDashboard'])->name('admin.dashboard');
        Route::get('logout',[AdminController::class, 'adminLogout'])->name('admin.logout');


        Route::get('timetable',[TimetableController::class, 'timeTable'])->name('admin.timetable');
        Route::post('timetable',[TimetableController::class, 'timeTables'])->name('admin.timetable');
        Route::get('viewtimetable',[TimetableController::class, 'getAllTimetable'])->name('admin.viewtimetable');

        Route::get('courses',[CourseController::class, 'getAllCourse'])->name('admin.course');
        
        Route::get('batch',[BatchController::class, 'createBatch'])->name('admin.batch');
        Route::post('batch',[BatchController::class, 'storeBatch'])->name('admin.batch');
        Route::get('viewbatch',[BatchController::class, 'getAllBatch'])->name('admin.viewbatch');
        Route::get('teacher',[AdminController::class, 'getAllTeacher'])->name('admin.teacher');
        Route::get('student',[AdminController::class, 'getAllStudent'])->name('admin.student');


        Route::get('subject',[SubjectController::class, 'createSubject'])->name('admin.subject');
        Route::post('subject',[SubjectController::class, 'storeSubject'])->name('admin.subject');
        Route::get('subject',[SubjectController::class, 'getAllSubject'])->name('admin.viewsubject');

        
        
        
        Route::get('sections/{id}',[SectionController::class, 'getAllSection'])->name('admin.section');
    });
});
/** ----------------------------------faculty-----------------------------route--------------------------------------------------- */
Route::group(['prefix'=>'v1/teacher/'], function(){
    Route::get('register',[TeacherController::class, 'register'])->name('teacher.register');
    Route::post('register',[TeacherController::class, 'teacherRegister'])->name('teacher.register');
    Route::get('login',[TeacherController::class, 'login'])->name('teacher.login');
    Route::post('login',[TeacherController::class, 'teacherLogin'])->name('teacher.login');
    Route::get('QRcode/{id}',[TeacherController::class, 'generateQRcode'])->name('teacher.QRcode');
    
    Route::middleware(['tguard'])->group(function(){
        Route::get('dashboard',[TeacherController::class, 'teacherDashboard'])->name('teacher.dashboard');
        Route::get('logout',[TeacherController::class, 'logout'])->name('teacher.logout');
        Route::get('attendance/{id}',[TeacherController::class, 'viewAttendance'])->name('teacher.attendance');
        //Route::get('search',[TeacherController::class, 'searchAttendance'])->name('teacher.search');
    });
    
});  

Route::get('qrcode', function () {
    return QrCode::size(300)->generate('Raju kumar!');
});
