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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[
	'as' => 'trangchu',
	'uses' => 'HomeController@getIndex'
]);

Route::get('san-pham/{id}',[
	'as' => 'chitietsanpham',
	'uses' => 'HomeController@getChitiet'
]);

Route::get('loai-san-pham/{type}',[
	'as' => 'loaisanpham',
	'uses' => 'HomeController@getLoaisp'
]);

Route::get('add-to-cart/{id}',[
	'as' => 'themgiohang',
	'uses' => 'HomeController@getAddtocart'
]);

Route::get('del-item-cart/{id}',[
	'as' => 'xoagiohang',
	'uses' => 'HomeController@getDelItemCart'
]);

Route::get('dat-hang',[
	'as' => 'dathang',
	'uses' => 'HomeController@getCheckout'
]);

Route::post('dat-hang',[
	'as' => 'dathang',
	'uses' => 'HomeController@postCheckout'
]);

Route::get('tim-kiem',[
    'as' => 'search',
    'uses' => 'HomeController@getSearch'
]);

Route::get('loc-san-pham',[
	'as' => 'loc',
	'uses' => 'HomeController@getLoc'
	]);

Route::get('loc1','HomeController@getLoc1');
Route::get('loc2','HomeController@getLoc2');
Route::get('loc3','HomeController@getLoc3');
Route::get('loc4','HomeController@getLoc4');


Route::get('lien-he',[
	'as' => 'contact',
	'uses' => 'HomeController@getLienhe'
]);

Route::post('lien-he',[
	'as' => 'contact',
	'uses' => 'HomeController@postLienhe'
]);

Route::get('gioi-thieu',[
	'as' => 'about',
	'uses' => 'HomeController@getGioithieu'
]);

Route::get('dang-ki',[
	'as' => 'signin',
	'uses' => 'HomeController@getSignin'
]);

Route::post('dang-ki',[
	'as' => 'signin',
	'uses' => 'HomeController@postSignin'
]);

Route::get('dang-nhap',[
	'as' => 'login',
	'uses' => 'HomeController@getLogin'
]);

Route::post('dang-nhap',[
	'as' => 'login',
	'uses' => 'HomeController@postLogin'
]);

Route::get('dang-xuat',[
	'as' => 'logout',
	'uses' => 'HomeController@getLogout'
]);

Route::get('thongtincanhan/{id}','HomeController@getThongtincanhan');
Route::post('thongtincanhan/{id}','HomeController@postThongtincanhan');



Route::get('admin','UserController@getDangnhapAdmin');
Route::post('admin','UserController@postDangnhapAdmin');

Route::get('admin/logout','UserController@getLogout');


Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){

	Route::group(['prefix'=>'loaisanpham'],function(){
		Route::get('danhsach','LoaiSPController@getDanhSach');

		Route::get('sua/{id}','LoaiSPController@getSua');
		Route::post('sua/{id}','LoaiSPController@postSua');

		Route::get('them','LoaiSPController@getThem');
		Route::post('them','LoaiSPController@postThem');

		Route::get('xoa/{id}','LoaiSPController@getXoa');
	});

	Route::group(['prefix'=>'sanpham'],function(){
		Route::get('danhsach','SanPhamController@getDanhSach');

		Route::get('sua/{id}','SanPhamController@getSua');
		Route::post('sua/{id}','SanPhamController@postSua');

		Route::get('them','SanPhamController@getThem');
		Route::post('them','SanPhamController@postThem');

		Route::get('xoa/{id}','SanPhamController@getXoa');
	});

	Route::group(['prefix'=>'slide'],function(){
		Route::get('danhsach','SlideController@getDanhSach');

		Route::get('sua/{id}','SlideController@getSua');
		Route::post('sua/{id}','SlideController@postSua');

		Route::get('them','SlideController@getThem');
		Route::post('them','SlideController@postThem');

		Route::get('xoa/{id}','SlideController@getXoa');
	});

	Route::group(['prefix'=>'user'],function(){
		Route::get('danhsach','UserController@getDanhSach');

		Route::get('sua/{id}','UserController@getSua');
		Route::post('sua/{id}','UserController@postSua');

		Route::get('them','UserController@getThem');
		Route::post('them','UserController@postThem');

		Route::get('xoa/{id}','UserController@getXoa');

		Route::post('xoahet',['as'=>'delall','uses'=>'UserController@getXoaHet']);
	});

	Route::group(['prefix'=>'comment'],function(){
	

		Route::get('xoa/{id}/{idSanPham}','CommentController@getXoa');

	});



	Route::any('baocaodoanhthu','AdminController@getBaocao');
	Route::get('xulydonhang','AdminController@getXuly');
	Route::get('luudonhang/{id}','AdminController@getLuuXuly');


	Route::post('xuat-excel','AdminController@getExcel');
	Route::get('xoadonhang/{id}','AdminController@getXoaXuly');

	Route::get('xemchitiet/{id}','AdminController@getXemchitiet');
	
	Route::get('xoachitiet/{idbilldetail}/{idbill}','AdminController@getXoachitiet');
//méo có function getxoahet

});

Route::post('comment/{id}','CommentController@postComment');

Route::get('auth/facebook', 'AuthFacebookController@redirectToProvider');
Route::get('auth/facebook/callback', 'AuthFacebookController@handleProviderCallback');

Route::get('auth/google', 'AuthGoogleController@redirectToProvider');
Route::get('auth/google/callback', 'AuthGoogleController@handleProviderCallback');

//Route::post('senddata','HomeController@getSendData');
Route::post('senddatagoogle','HomeController@getSendDataGoogle');

//Route::post('senddatarate','HomeController@getSendDataRate');

Route::get('auth/twitter', 'AuthTwitterController@redirectToProvider');
Route::get('auth/twitter/callback', 'AuthTwitterController@handleProviderCallback');

Route::get('auth/github', 'AuthGithubController@redirectToProvider');
Route::get('auth/github/callback', 'AuthGithubController@handleProviderCallback');

Route::get('forgotpassword','HomeController@getPassword');
Route::post('forgotpassword','HomeController@postPassword');

Route::get('resetpassword/{token}/{email}','HomeController@getResetPassword');

Route::get('reset','HomeController@test');

Route::post('resetpassword/{token}/{email}','HomeController@postResetPassword');
