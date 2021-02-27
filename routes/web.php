<?php

use Illuminate\Support\Facades\Route;


/*START ADMIN*/

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth'], 'namespace' => 'App\Http\Controllers\Admin'], function () {

    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('profile', 'ProfileController@index')->name('profile');
    Route::patch('profile/{id}', 'ProfileController@update')->name('profile.update');

    Route::resource('expertise', 'ExpertiseController')->except(['show']);

    Route::resource('portfolio_category', 'PortfolioCategoryController')->except(['show']);

    Route::resource('portfolio', 'PortfolioController');

    Route::get('portfolio/{id}/slider', 'PortfolioSliderController@index')->name('portfolio.slider.index');
    Route::post('portfolio/{id}/slider', 'PortfolioSliderController@store')->name('portfolio.slider.store');
    Route::delete('portfolio/{id}/slider', 'PortfolioSliderController@destroy')->name('portfolio.slider.destroy');

    Route::get('portfolio/{id}/expertise', 'PortfolioExpertiseController@index')->name('portfolio.expertise.index');
    Route::post('portfolio/{id}/expertise', 'PortfolioExpertiseController@store')->name('portfolio.expertise.store');
    Route::delete('portfolio/{id}/expertise', 'PortfolioExpertiseController@destroy')->name('portfolio.expertise.destroy');

    Route::resource('post_category', 'PostCategoryController')->except(['show']);

    Route::resource('post', 'PostController');

    Route::get('payment', 'PaymentController@index')->name('payment.index');
    Route::get('payment/success', 'PaymentController@success')->name('payment.success');
    Route::get('payment/fail', 'PaymentController@fail')->name('payment.fail');
    Route::get('payment/show/{id}', 'PaymentController@show')->name('payment.show');
    Route::delete('payment/{id}', 'PaymentController@destroy')->name('payment.destroy');

    Route::get('contact', 'ContactController@index')->name('contact.index');
    Route::get('contact/read', 'ContactController@read')->name('contact.read');
    Route::get('contact/unread', 'ContactController@unread')->name('contact.unread');
    Route::get('contact/show/{id}', 'ContactController@show')->name('contact.show');
    Route::delete('contact/{id}', 'ContactController@destroy')->name('contact.destroy');
    Route::patch('contact/{id}', 'ContactController@change_status')->name('contact.change_status');

    Route::get('post_comment', 'PostCommentController@index')->name('postComment.index');
    Route::get('post_comment/active', 'PostCommentController@active')->name('postComment.active');
    Route::get('post_comment/inactive', 'PostCommentController@inactive')->name('postComment.inactive');
    Route::get('post_comment/show/{id}', 'PostCommentController@show')->name('postComment.show');
    Route::get('post_comment/reply/{id}', 'PostCommentController@reply')->name('postComment.reply');
    Route::delete('post_comment/{id}', 'PostCommentController@destroy')->name('postComment.destroy');
    Route::patch('post_comment/{id}', 'PostCommentController@change_status')->name('postComment.change_status');

    Route::resource('setting', 'SettingController')->except(['show', 'destroy']);

    Route::resource('work', 'WorkController')->except(['show']);

    Route::resource('customer', 'CustomerController')->except(['show']);

    Route::resource('social', 'SocialController')->except(['show']);

    Route::resource('contactInfo', 'ContactInfoController')->except(['show']);

    Route::resource('resume', 'ResumeController')->except(['show']);
});

/*END ADMIN*/

/*START AUTH*/

Route::group(['prefix' => '/', 'middleware' => ['web'], 'namespace' => 'App\Http\Controllers\Auth'], function () {
// login
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login')->name('login')->middleware('throttle:5,1');

// logout
    Route::any('/logout', 'LoginController@logout')->name('logout');
});

/*END AUTH*/

/*START SITE*/

Route::group(['prefix' => '/', 'namespace' => 'App\Http\Controllers\Site'], function () {
    Route::get('', 'IndexController@index')->name('index');

    Route::get('terms', 'PageController@terms')->name('terms');

    Route::get('about-me', 'PageController@about')->name('about-me');

    Route::get('contact-me', 'ContactController@index')->name('contact-me');
    Route::post('contact/store', 'ContactController@store')->name('contact.store')->middleware('throttle:5,1');

    Route::get('payment', 'PaymentController@index')->name('payment');
    Route::get('payment/result/{order_number}', 'PaymentController@result')->name('payment.result');
    Route::post('payment/request', 'PaymentController@request')->name('payment.request');
    Route::get('payment/verify', 'PaymentController@verify')->name('payment.verify');

    Route::get('expertise', 'ExpertiseController@index')->name('expertise');
    Route::get('expertise/{slug}', 'ExpertiseController@show')->name('singleExpertise');

    Route::get('works', 'PortfolioController@index')->name('works');
    Route::get('works/{slug}', 'PortfolioController@filter')->name('filterWorks');
    Route::get('work/{slug}', 'PortfolioController@show')->name('singleWork');

    Route::get('posts', 'PostController@index')->name('posts');
    Route::get('posts/search', 'PostController@search')->name('posts.search');
    Route::get('posts/{slug}', 'PostController@filter')->name('filterPosts');
    Route::get('post/{slug}', 'PostController@show')->name('singlePost');
    Route::post('post/like/{id}', 'PostController@like')->name('likePost')->middleware('throttle:5,1');
    Route::post('post/dislike/{id}', 'PostController@dislike')->name('dislikePost')->middleware('throttle:5,1');
    Route::post('post/storeComment/{id}', 'PostController@storeComment')->name('storeCommentPost')->middleware('throttle:5,1');
    Route::post('post/replyComment/{id}', 'PostController@replyComment')->name('replyCommentPost')->middleware('throttle:5,1');
});

/*END SITE*/
