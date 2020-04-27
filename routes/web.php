<?php

use Illuminate\Support\Facades\Route;
use App\Event\FormSubmitted;


Route::get('/admin', function () {
    return view('welcome');
});

Auth::routes(['verify'=>true]);

Route::get('/testhome', 'HomeController@index')->name('testhome');
Route::get('/message/{id}','HomeController@getmessage')->name('get.message');
Route::post('/message','HomeController@sendmessage')->name('send.message');



Route::get('/',function (){
    return redirect()->route('login');
});

// Route::resource('email',"ChangeEmailController")->middleware(['auth','verified']);
//redrammer login Auth



Route::get('/conter',function(){
    return view('conter');
});

Route::get('/sender',function(){
    return view('sender');
});


Route::post('/sender',function(){
    $text = request()->text;
    event(new FormSubmitted($text));
});

Route::middleware('auth')->group(function(){
Route::get('/home',"redrammer\HomeController@index")->name('home');
Route::get('/post',"redrammer\HomeController@post_create")->name('post.create');
Route::post('/post',"redrammer\HomeController@post_store")->name('post.store');
Route::get('/explore',"redrammer\HomeController@explore")->name('explore');
Route::get('/chat',"redrammer\HomeController@chat")->name('chat');
Route::get('/setting',"redrammer\HomeController@setting")->name('setting');
Route::get('/profile',"redrammer\ProfileController@profile")->name('profile');
Route::delete('/profile/destroy/{id}',"redrammer\ProfileController@profile_destroy")->name('profile.destroy');
Route::resource('/edit_profile',"redrammer\ProfileController");
//Route::resource('/follower',"redrammer\FollowerController");
Route::resource('/following',"redrammer\FollowingController");
Route::post('/follow/{user}', 'redrammer\FollowerController@store')->name('follow.store');
Route::get('/following','redrammer\FollowerController@following')->name('following');
Route::get('/follower','redrammer\FollowerController@follower')->name('follower');
Route::get('/password_change','redrammer\ChnagePasswordController@index')->name('password');
Route::post('/password_change','redrammer\ChnagePasswordController@store')->name('password.store');
Route::get('/notification','redrammer\HomeController@notification')->name('notification');
Route::post('post/like/{post}','redrammer\PostLikeController@store')->name('like.store');
});



Route::view('/verify', 'phone-verification');
Route::post('/verify', 'TwilioController@verifyPhone')->name('verify-phone');
Route::post('/verify-code', 'TwilioController@verifyCode')->name('verify-code');



Route::get('/help',function(){
    return view('redrammer.other.help_center');
})->name('help');

Route::get('/about',function(){
    return view('redrammer.other.about');
})->name('about');


Route::get('/data',function(){
    return view('redrammer.other.data_policy');
})->name('data');

Route::get('/terms',function(){
    return view('redrammer.other.term');
})->name('terms');

Route::get('/privacy',function(){
    return view('redrammer.other.privacy_policy');
})->name('privacy');


// Route::resource('photos.comments', 'HomeController');
