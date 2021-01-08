<?php
use App\Models\Role;
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
//    $role = Role::where('slug', 'author')->first();
//    return Auth::user()->roles()->attach($role);
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/roles', function () {
    $user = \Illuminate\Support\Facades\Auth::user();

    return response()->json([
       'roles' => $user->roles
    ]);
});

Route::get('/admin', function () {
    return view('admin  ');
})->name('admin.post')->middleware('can:edit-post');

Route::resource('post', 'PostController');