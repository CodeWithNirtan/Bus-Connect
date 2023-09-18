
<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusController;
use App\Http\Controllers\AreaController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\SchoolMiddleware;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\contactcontroller;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\AddSchoolController;
use App\Http\Controllers\AddStudentController;

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
 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', [AdminController::class, 'schooldetails'])->middleware("admin");

Route::get('/back', function () {
    return view('index');
});

Route::get('/allschooldetails', function () {
    return view('admindashboard/allschooldetails');
})->middleware(AdminMiddleware::class);
Route::get('/allstudentsdetails', function () {
    return view('admindashboard/allstudentsdetails');
})->middleware(AdminMiddleware::class);
Route::get('/allbus', function () {
    return view('admindashboard/allbusesdetails');
})->middleware(AdminMiddleware::class);
Route::get('/alldriver', function () {
    return view('admindashboard/alldriverdetails');
})->middleware(AdminMiddleware::class);

Route::get('/addBuses', function () {
    return view('admindashboard/addbus');
})->middleware(AdminMiddleware::class);
Route::get('/addDriver', function () {
    return view('admindashboard/addDriver');
})->middleware(AdminMiddleware::class);
Route::get('/addSchool', function () {
    return view('admindashboard/addSchool');
})->middleware(AdminMiddleware::class);
Route::get('/addArea', function () {
    return view('admindashboard/AreaAdd');
})->middleware(AdminMiddleware::class);


// Route::get('/login', function (){
//     return view('login');
// });

// Contact on index
Route::POST('/sendmessage', [contactcontroller::class, 'postcontact']);
Route::get('/contactmessagesshow', [contactcontroller::class, 'contactdetails'])->middleware("admin");

// insert work Admin Dashboard
Route::POST('/addSchool', [AddSchoolController::class, 'index'])->middleware("admin");
Route::POST('/AddBuses', [BusController::class, 'AddBus'])->middleware("admin");
Route::POST('/AddDriver', [AdminController::class, 'DriverAdd'])->middleware("admin");
Route::POST('/AddAreas', [AreaController::class, 'AreaAdd'])->middleware("admin");



// insert work Parent Dashboard

// fetch work Admin Dashboard
Route::get('/allschooldetails', [AddSchoolController::class, 'schooldetails'])->middleware("admin");
// Route::get('/dashboard',[AdminController::class,'schooldetails']);
Route::get('/allstudentsdetails', [AdminController::class, 'adminstudentsdetails'])->middleware("admin");
Route::get('/allbus', [BusController::class, 'busdetails'])->middleware("admin");
Route::get('/alldriver', [AdminController::class, 'driverdetails'])->middleware("admin");

// Delete work Admin Dashboard
Route::get('/sdelete/{ID}', [AdminController::class, ('Schooldelete')]);
Route::get('/bdelete/{record}', [BusController::class, ('Busdelete')]);
Route::get('/stdelete/{record}', [AdminController::class, ('Studentdelete')]);
Route::get('/dvdelete/{record}', [AdminController::class, ('Driverdelete')]);



// Search Work Admin Dashboard
Route::POST('/schoolsearch', [AddSchoolController::class, 'schoolsearch'])->middleware("admin");
Route::POST('/adminstudentsearch', [AdminController::class, 'adminstudentsearch'])->middleware("admin");
Route::POST('/bussearch', [BusController::class, 'bussearch'])->middleware("admin");
Route::POST('/driversearch', [AdminController::class, 'driversearch'])->middleware("admin");


    // Area Select Admin Dashboard
    Route::get("/Get-School-Areas",[AddSchoolController::class,"SchoolGetAreas"]);
    Route::get("/Get-Driver-Areas",[AdminController::class,"DriverGetAreas"]);
    // bus driver Select Admin Dashboard
    Route::get("/Get-Drivers/{Area_Id}",[DropdownController::class,"getDriversByArea"]);

    //SchoolDashboard Routes
    Route::get('/schooldashboard',  function () {
        return view('schooldashboard/SchoolDashboard');
    })->middleware(SchoolMiddleware::class);
    Route::get('/detailsofstudent', function () {
        return view('schooldashboard/detailsofstudents');
    })->middleware(SchoolMiddleware::class);
    Route::get('/addstudents', function () {
        return view('schooldashboard/addstudent');
    })->middleware(SchoolMiddleware::class);
    // insert work School Dashboard
    Route::POST('/addStudents', [AddStudentController::class, 'add'])->middleware('school');
    // fetch work School Dashboard
    Route::get('/detailsofstudent', [AddStudentController::class, 'studentsdetails'])->middleware('school');
    Route::get('/detailsofbuses', [AddStudentController::class, 'schoolbusdetails'])->middleware('school');
    // Search Work School Dashboard
    Route::POST('/studentsearch', [AddStudentController::class, 'studentsearch'])->middleware('school');
    // Area Select School Dashboard
    Route::get("/Get-Areas",[DropdownController::class,"GetAreas"]);
    Route::get("/Get-Buses/{Area_Id}",[DropdownController::class,"getBusesByArea"]);
    Route::get("/Get-Seat-Numbers/{Bus_Id}",[DropdownController::class,"getSeatsByBuses"]);
    Route::get("/checkParentName/{Name}",[DropdownController::class,"checkParentName"]);


    



    // Parent Routes
    Route::get("/Add-Parent",[ParentController::class,"Create"]);
    Route::post("/Add-Parent",[ParentController::class,"CreatePost"]);
    



