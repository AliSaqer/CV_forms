<?php

use App\Http\Controllers\CvController;
use App\Http\Controllers\FormControler;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('cv')->name('cv.')->group(function(){
    Route::get('/',[CvController::class,'index'])->name('index');
    Route::get('/Experience',[CvController::class,'Experience'])->name('Experience');
    Route::get('/Education',[CvController::class,'Education'])->name('Education');
    Route::get('/Skills',[CvController::class,'Skills'])->name('Skills');
    Route::get('/Interests',[CvController::class,'Interests'])->name('Interests');
    Route::get('/Awards',[CvController::class,'Awards'])->name('Awards');
});

//form1 route
Route::get('form1',[FormControler::class,'form1'])->name('form1');
Route::post('form1',[FormControler::class,'form1_data'])->name('form1_data');

//form2route

Route::get('form2',[FormControler::class , 'form2'])->name('form2');
Route::post('form2',[FormControler::class,'form2_data'])->name('form2_data');

//form3Routs

Route::get('form3',[FormControler::class , 'form3'])->name('form3');
Route::post('form3',[FormControler::class,'form3data'])->name('form3_data');

Route::get('email',[FormControler::class , 'email'])->name('email');
Route::post('email',[FormControler::class,'emaildata'])->name('email_data');

Route::get('etemp' , function(){return view('forms.emailtemplate');});
