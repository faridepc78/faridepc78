<?php

namespace App\Providers;

use App\Http\View\Composers\AdminHeaderComposer;
use App\Http\View\Composers\SiteComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('admin.layout.header', AdminHeaderComposer::class);
        View::composer('site.*', SiteComposer::class);
    }
}
