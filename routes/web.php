<?php

use App\Models\Blog;
use App\Models\Listing;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\ListingController;



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

// gigs listing routes

Route::get('/',  [ListingController::class,'index'])->name('index');

Route::get('/show/{id}', [ListingController::class,'show'])->name('show');

// Route::get('/search', function (Request $request) {
//     return view('home',[RegisterController::class,'registerAction']);
// });
Route::middleware('auth')->group(function(){

    Route::delete('/listing/{listing}/delete',  [ListingController::class,'destroy'])->name('destroyGig');

    Route::put('/listing/{listing}/update', [ListingController::class,'update'])->name('updateGig');

    Route::get('/listing/manage',[ListingController::class,'manage'])->name("user_dashboard");

    Route::get('/create',[ListingController::class,'create'])->name('create');

    Route::post('/create/listing', [ListingController::class,'store'])->name('createListing');

    Route::get('/listing/{listing}/update',[ListingController::class,'edit'])->name('updateGigView');
});
// admin routes
Route::middleware(['auth','admin_auth'])->group(function(){

    Route::get('/admin',[AdminController::class,'index'])->name('admin_dashboard');
    Route::get('admin/user/{id}', [AdminController::class,'viewUser'])->name('viewUser');
       Route::delete('admin/user/{userId}/delete', [AdminController::class,'destroy'])->name('deleteUser');
});




// user login action
Route::get('/login',[UserController::class,'show'])->name('login');

Route::post('/login/auth', [UserController::class,'authenticate']);

Route::get('/register', [UserController::class,'showRegister'])->name("register");

Route::post('/register/auth', [UserController::class,'create']);

Route::post('/logout', [UserController::class,'logout'])->name('logout');




// testing routes
Route::get('/listings', function ( ) {
    return view('listings',[
        'listings' => Listing::all()
    ]);

});




// blog CRUD routes

Route::get('/blog', function () {
    return view('blog');
})->name('blog');
Route::post('/blog/add', [BlogController::class, 'store']
)->name('addBlog');
Route::get('/blog/all', [BlogController::class, 'show']
)->name('allBlog');
Route::get('/blog/{blog}/update', function (Blog $blog) {
    return view('updateBlog',['blog' => $blog]);
})->name('updateBlogView');
Route::put('/blog/{blog}/update', [BlogController::class, 'update']
)->name('updateBlog');
Route::delete('/blog/{blog}/destroy', [BlogController::class, 'destroy']
)->name('deleteBlog');

// Route::get('/show', function () {
//     return view('show');
// });