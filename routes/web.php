<?php

use Illuminate\Support\Facades\Route;


/*START ADMIN*/

Route::get('admin/dashboard', 'App\Http\Controllers\Admin\DashboardController@index')->name('dashboard');

Route::resource('admin/expertise', 'App\Http\Controllers\Admin\ExpertiseController');

Route::resource('admin/portfolio_category', 'App\Http\Controllers\Admin\PortfolioCategoryController');

Route::resource('admin/portfolio', 'App\Http\Controllers\Admin\PortfolioController');

Route::get('admin/portfolio/slider/{id}', 'App\Http\Controllers\Admin\PortfolioSliderController@index')->name('portfolio.slider.index');
Route::post('admin/portfolio/slider/{id}', 'App\Http\Controllers\Admin\PortfolioSliderController@store')->name('portfolio.slider.store');
Route::delete('admin/portfolio/slider/{id}', 'App\Http\Controllers\Admin\PortfolioSliderController@destroy')->name('portfolio.slider.destroy');

Route::get('admin/portfolio/expertise/{id}', 'App\Http\Controllers\Admin\PortfolioExpertiseController@index')->name('portfolio.expertise.index');
Route::post('admin/portfolio/expertise/{id}', 'App\Http\Controllers\Admin\PortfolioExpertiseController@store')->name('portfolio.expertise.store');
Route::delete('admin/portfolio/expertise/{id}', 'App\Http\Controllers\Admin\PortfolioExpertiseController@destroy')->name('portfolio.expertise.destroy');

Route::resource('admin/post_category', 'App\Http\Controllers\Admin\PostCategoryController');

Route::resource('admin/post', 'App\Http\Controllers\Admin\PostController');

Route::resource('admin/setting', 'App\Http\Controllers\Admin\SettingController');

Route::resource('admin/work', 'App\Http\Controllers\Admin\WorkController');

Route::resource('admin/social', 'App\Http\Controllers\Admin\SocialController');

Route::resource('admin/contactInfo', 'App\Http\Controllers\Admin\ContactInfoController');

Route::resource('admin/resume', 'App\Http\Controllers\Admin\ResumeController');

/*END ADMIN*/

/*START SITE*/

Route::get('/', 'App\Http\Controllers\Site\IndexController@index')->name('index');

Route::get('/terms', 'App\Http\Controllers\Site\PageController@terms')->name('terms');

Route::get('/about-me', 'App\Http\Controllers\Site\PageController@about')->name('about-me');

Route::get('/contact-me', 'App\Http\Controllers\Site\ContactController@index')->name('contact-me');

Route::get('/expertise', 'App\Http\Controllers\Site\ExpertiseController@index')->name('expertise');
Route::get('/expertise/{slug}', 'App\Http\Controllers\Site\ExpertiseController@show')->name('singleExpertise');

Route::get('/works', 'App\Http\Controllers\Site\PortfolioController@index')->name('works');
Route::get('/work/{slug}', 'App\Http\Controllers\Site\PortfolioController@show')->name('singleWork');

Route::get('/blog', 'App\Http\Controllers\Site\PostController@index')->name('blog');
Route::get('/blog/{slug}', 'App\Http\Controllers\Site\PostController@show')->name('singlePost');

/*END SITE*/


/*Route::get('test', 'App\Http\Controllers\HomeController@test');*/

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

/*Route::get('/', function () {
    return view('site.index.index');
});*/

/*Route::get('/about', function () {
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
});*/

/*Route::get('/expertise', function () {
    return view('site.expertise.index');
});

Route::get('/expertise/post/{id}', function () {
    return view('site.expertise.post.index');
});*/

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
