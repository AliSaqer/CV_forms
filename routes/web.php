<?php

use App\Http\Controllers\CheckMailController;
use App\Http\Controllers\CvController;
use App\Http\Controllers\FormControler;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\Route as RoutingRoute;
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


Route::prefix('cv')->name('cv.')->group(function () {
    Route::get('/', [CvController::class, 'index'])->name('index');
    Route::get('/Experience', [CvController::class, 'Experience'])->name('Experience');
    Route::get('/Education', [CvController::class, 'Education'])->name('Education');
    Route::get('/Skills', [CvController::class, 'Skills'])->name('Skills');
    Route::get('/Interests', [CvController::class, 'Interests'])->name('Interests');
    Route::get('/Awards', [CvController::class, 'Awards'])->name('Awards');
});

//form1 route
Route::get('form1', [FormControler::class, 'form1'])->name('form1');
Route::post('form1', [FormControler::class, 'form1_data'])->name('form1_data');

//form2route

Route::get('form2', [FormControler::class, 'form2'])->name('form2');
Route::post('form2', [FormControler::class, 'form2_data'])->name('form2_data');

//form3Routs

Route::get('form3', [FormControler::class, 'form3'])->name('form3');
Route::post('form3', [FormControler::class, 'form3data'])->name('form3_data');

Route::get('email', [FormControler::class, 'email'])->name('email');
Route::post('email', [FormControler::class, 'emaildata'])->name('email_data');

// Route::get('etemp' , function(){return view('forms.emailtemplate');});


//CRUD for Post
//R:read
Route::get('posts', [PostController::class, 'index'])->name('Post.index');
Route::get('posts/search', [PostController::class, 'post_search'])->name('Post.post_search');

//C:create
Route::get('posts/create', [PostController::class, 'create'])->name('Post.create');
Route::post('posts/store', [PostController::class, 'store'])->name('Post.store');


//update
Route::put('post/{id}/update', [PostController::class, 'update'])->name('post.update');

//delete
Route::delete('post/{id}/delete', [PostController::class, 'destroy'])->name('post.destroy');



Route::get('checkmail', [CheckMailController::class, 'checkmail'])->name('checkmail');



//user Routes

Route::get('users', [UserController::class, 'users'])->name('users');
//chickMail
Route::get('user/checkmail', [UserController::class, 'checkmail'])->name('user.checkmail');
//create
Route::get('users/create', [UserController::class, 'create'])->name('user.create');
Route::post('users/store', [UserController::class, 'store'])->name('user.store');
//update
Route::put('users/{id}/update', [UserController::class, 'update'])->name('user.update');
