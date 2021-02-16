<?php

use Illuminate\Support\Facades\Route;


/*START ADMIN*/

Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

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

    Route::resource('setting', 'SettingController')->except(['show', 'destroy']);

    Route::resource('work', 'WorkController')->except(['show']);

    Route::resource('customer', 'CustomerController')->except(['show']);

    Route::resource('social', 'SocialController')->except(['show']);

    Route::resource('contactInfo', 'ContactInfoController')->except(['show']);

    Route::resource('resume', 'ResumeController')->except(['show']);
});


/*END ADMIN*/

/*START SITE*/

Route::get('/', 'App\Http\Controllers\Site\IndexController@index')->name('index');

Route::get('/terms', 'App\Http\Controllers\Site\PageController@terms')->name('terms');

Route::get('/about-me', 'App\Http\Controllers\Site\PageController@about')->name('about-me');

/*Route::get('/contact-me', 'App\Http\Controllers\Site\ContactController@index')->name('contact-me');*/

Route::get('/expertise', 'App\Http\Controllers\Site\ExpertiseController@index')->name('expertise');
Route::get('/expertise/{slug}', 'App\Http\Controllers\Site\ExpertiseController@show')->name('singleExpertise');

Route::get('/works', 'App\Http\Controllers\Site\PortfolioController@index')->name('works');
Route::get('/works/{slug}', 'App\Http\Controllers\Site\PortfolioController@filter')->name('filterWorks');
Route::get('/work/{slug}', 'App\Http\Controllers\Site\PortfolioController@show')->name('singleWork');

/*Route::get('/blog', 'App\Http\Controllers\Site\PostController@index')->name('blog');
Route::get('/blog/{slug}', 'App\Http\Controllers\Site\PostController@show')->name('singlePost');*/

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
