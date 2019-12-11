<?php

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
Route::get('/','HomeController@test');

Route::get('/home','HomeController@home')->name('home');
Route::get('/playmusic','HomeController@playmusic');

Route::group(['prefix' => 'login','middleware'=>'checklogout'], function () {
    Route::get('/','LogInController@getLogin')->name('UserLogin');
    Route::post('/','LogInController@postLogin');

    Route::group(['prefix' => 'register'], function () {
        Route::get('/','LogInController@getregister')->name('UserRegister');
        Route::post('/','LogInController@postregister');
    });

    Route::get('forget-password','LogInController@ForgetPassword')->name('forget.password');
    Route::post('forget-password','LogInController@SendForgetPassword')->name('forget.password');

    Route::get('/reset-password','LogInController@resetPassword')->name('reset.link');
    Route::post('/reset-password','LogInController@postResetPassword')->name('reset.link');

    Route::get('facebook/callback','LogInController@callback')->name('User.Login.facebook');
    Route::post('facebook','LogInController@callback');
});

Route::group(['prefix'=>'user','middleware'=>'checklogin'],function(){
    Route::get('logout','LogInController@getOut')->name('logout');

    Route::get('change-password','LogInController@getChangePassword')->name('password');
    Route::post('change-password','LogInController@postChangePassword')->name('password');

    Route::post('delete.user/{id}','LogInController@DeleteUser')->name('delete.user');

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', 'UserController@getProfile')->name('Profile');

        Route::get('/edit-profile', 'UserController@getEditProfile')->name('EditProfile');
        Route::post('/edit-profile', 'UserController@postEditProfile')->name('EditProfile');

        Route::get('/baihat','UserController@getbaihatmoi')->name('Baihat');

        Route::get('/edit-baihat/{id}','UserController@getEditBaihat')->name('getedit.baihat');

        Route::get('/list-upload','UserController@danhsachupload')->name('danhsachupload');

        Route::resource('/play-music', 'PlaymusicController');

        Route::get('/delete/{id}','UserController@postDeleteBaiHatMoi')->name('delete_Baihatmoi');

        Route::get('/casi','UserController@usercasi');

        Route::get('/upload','UserController@getUserUpload');
        Route::post('/upload','UserController@postUserUpload')->name('UserUpload');
    });

});

Route::group(['prefix'=>'admin'],function(){
    Route::group(['prefix'=>'user'],function(){
        Route::get('/','AdminController@user')->name('userlist');

        Route::get('delete/{id}','AdminController@getdeleteuser')->name('deleteuser');
    });
    Route::group(['prefix'=>'casi'],function(){
        Route::get('/','CasiController@casi')->name('casilist');

        Route::get('/add','CasiController@getaddcasi')->name('addcasi');
        Route::post('/add','CasiController@postaddcasi')->name('postaddcasi');

        Route::get('delete/{id}','CasiController@getdeletecasi')->name('deletecasi');

        Route::get('edit/{id}','CasiController@geteditcasi')->name('editcasi');
        Route::post('edit/{id}','CasiController@posteditcasi')->name('posteditcasi');
    });
    Route::group(['prefix'=>'theloai'],function(){
        Route::get('/','TheloaiController@theloai')->name('theloailist');

        Route::get('/add','TheloaiController@gettheloai')->name('addtheloai');
        Route::post('/add','TheloaiController@posttheloai')->name('postaddtheloai');

        Route::get('delete/{id}','TheloaiController@getdeletetheloai')->name('deletetheloai');

        Route::get('edit/{id}','TheloaiController@getedittheloai')->name('edittheloai');
        Route::post('edit/{id}','TheloaiController@postedittheloai')->name('postedittheloai');
    });
    Route::group(['prefix'=>'baihathot'],function(){
        Route::get('/','BaihathotController@baihathot')->name('baihathotlist');

        Route::get('/add','BaihathotController@getbaihathot')->name('addbaihathot');
        Route::post('/add','BaihathotController@postbaihathot')->name('postbaihathot');

        Route::get('delete/{id}','BaihathotController@getdeletebaihathot')->name('deletebaihathot');

        Route::get('edit/{id}','BaihathotController@geteditbaihathot')->name('editbaihathot');
        Route::post('edit/{id}','BaihathotController@posteditbaihathot')->name('posteditbaihathot');
    });
    Route::group(['prefix'=>'baihatmoi'],function(){
        Route::get('/','BaihatmoiController@baihatmoi')->name('baihatmoi');

        Route::get('kiemduyet/{id}','BaihatmoiController@getkiemduyet')->name('getkiemduyet');
        Route::post('kiemduyet/{id}','BaihatmoiController@postduyet')->name('postduyet');
        Route::post('kiemduyet1/{id}','BaihatmoiController@postkhongduyet')->name('postkhongduyet');
    });
});
