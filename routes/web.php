<?php

use Illuminate\Support\Facades\Route;

Route::get('admin/dashboard', 'App\Http\Controllers\Admin\DashboardController@index')->name('dashboard');

Route::resource('admin/expertise', 'App\Http\Controllers\Admin\ExpertiseController');

Route::resource('admin/portfolio_category', 'App\Http\Controllers\Admin\PortfolioCategoryController');

Route::resource('admin/portfolio', 'App\Http\Controllers\Admin\PortfolioController');

Route::get('admin/portfolio/slider/{id}','App\Http\Controllers\Admin\PortfolioSliderController@index')->name('portfolio.slider.index');
Route::post('admin/portfolio/slider/{id}','App\Http\Controllers\Admin\PortfolioSliderController@store')->name('portfolio.slider.store');
Route::delete('admin/portfolio/slider/{id}','App\Http\Controllers\Admin\PortfolioSliderController@destroy')->name('portfolio.slider.destroy');

/*Route::resource('admin/portfolio/slider/{id}', 'App\Http\Controllers\Admin\PortfolioSliderController', [
    'names' => [
        'index' => 'portfolio.slider.index',
        'store' => 'portfolio.slider.store',
        'destroy' => 'portfolio.slider.destroy'
    ]
])->except('create', 'show', 'edit', 'update');*/
/*Route::resource('admin/portfolio/expertise/{id}', 'App\Http\Controllers\Admin\PortfolioExpertiseController');*/
/*Route::get('admin/portfolio/slider/{id}','App\Http\Controllers\Admin\PortfolioController@show_slider')->name('portfolio.show_slider');
Route::post('admin/portfolio/slider/{id}','App\Http\Controllers\Admin\PortfolioController@store_slider')->name('portfolio.store_slider');
Route::delete('admin/portfolio/slider/{id}','App\Http\Controllers\Admin\PortfolioController@destroy_slider')->name('portfolio.destroy_slider');*/

/*Route::get('/admin/dashboard',function (){
    return view('admin.dashboard.index');
});*/

Route::get('/', function () {
    return view('site.index.index');
});

Route::get('/about', function () {
    return view('site.about.index');
});

Route::get('/contact', function () {
    return view('site.contact.index');
});

Route::get('/blog', function () {
    return view('site.blog.index');
});

Route::get('/blog/post/{id}', function () {
    return view('site.blog.post.index');
});

Route::get('/portfolio', function () {
    return view('site.portfolio.index');
});

Route::get('/portfolio/work/{id}', function () {
    return view('site.portfolio.work.index');
});

Route::get('/payment', function () {
    return view('site.payment.index');
});

Route::get('/expertise', function () {
    return view('site.expertise.index');
});

Route::get('/expertise/post/{id}', function () {
    return view('site.expertise.post.index');
});

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
