<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PinController;
use App\Http\Controllers\RilController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\ChangepasswordController;

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
    return view('login');
});
Route::post('/proses_login', [AuthController::class, 'proses_login']);
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/register', [AuthController::class, 'register']);
Route::post('/proses_register', [AuthController::class, 'proses_register']);

Route::middleware(['auth'])->group(function () {
    // Route::get('/getDataExplore', [RilController::class, 'getdata']);
    Route::get('/getDataExplore', [ExploreController::class, 'getData']);
    Route::get('/getDataFavorite', [ExploreController::class, 'getDataFavorite']);
    Route::post('/likefotos', [ExploreController::class, 'likesfoto']);
    Route::post('/pinned', [ExploreController::class, 'pinned']);
    Route::get('/explore', function () {
        return view('pages.explore');
    });
    Route::get('/changepassword', function () {
        return view('pages.changepassword');
    });
    Route::get('/fotoalbum', function () {
        return view('pages.fotoalbum');
    });
    Route::get('/explore-detail/{id}', function () {
        return view('pages.explore_detail');
    });


    Route::get('/explore-detail/{id}/getdatadetail', [ExploreController::class, 'getdatadetail']);
    Route::get('/explore-detail/getComment/{id}', [ExploreController::class, 'ambildatakomentar']);
    Route::post('/explore-detail/kirimkomentar', [ExploreController::class, 'kirimkomentar']);
    Route::post('/change', [ChangepasswordController::class, 'change']);



    
    Route::post('/explore-detail/ikuti', [ExploreController::class, 'ikuti']);
    Route::get('/follower', function () {
        return view('pages.follower');
    });
    Route::get('/following', function () {
        return view('pages.following');
    });
    Route::get('/my_pin', function () {
        return view('pages.my_pin');
    });
    Route::get('/other-pin/getDataPin/{id}', [PinController::class, 'getdatapin']);
    Route::get('/other_pin/{id}', function () {
        return view('pages.other_pin');
    });
    Route::get('/pin', function () {
        return view('pages.pin');
    });
    Route::get('/edit', function () {

        return view('pages.profile');
    });
    Route::get('/profilku', function () {

        return view('pages.album');
    });
    Route::get('/profilpublic', function () {

        return view('pages.profil_public');
    });
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::post('/post', [PinController::class, 'post']);
    Route::get('/edit',[ChangepasswordController::class, 'editprofil']);

    Route::get('/profile',[ChangepasswordController::class, 'profil']);
    //updatedata
    Route::post('/updateprofile',[ChangepasswordController::class, 'updatedataprofile']);
    Route::get('/pin',[ChangepasswordController::class, 'post']);

    //updatefotoprofile
    Route::post('/ubahprofil',[ChangepasswordController::class, 'fotoprofil']);
    Route::get('/profil_public/{id}',[ChangepasswordController::class, 'profil_public']);
    //fotopublic
    Route::get('/getDataPublic/{id}',[ChangepasswordController::class, 'getdatapublic']);
     //log out
     Route::post('/tambah_album',[ChangepasswordController::class, 'tambahalbum']);

     Route::get('/profilsaya',[ChangepasswordController::class, 'profile']);

     //datapostinan
     Route::get('/getDataPostingan',[ChangepasswordController::class, 'getdatapostingan']);
     //dataAlbum
     Route::get('/getDataAlbum',[ChangepasswordController::class, 'getdataalbum']);
     Route::get('/profil_public/{id}',[ChangepasswordController::class, 'profil_public']);
     Route::get('/profil_public/{id}',[ChangepasswordController::class, 'userlain']);
     Route::get('/fotoalbum/{id}', [ChangepasswordController::class, 'album']);

 

});
