<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        $app['validator']->extend('captcha', function()
        {
            //fwrite(STDOUT, print_r('Bypassing captcha validation and returning explicit true!', TRUE));
            return true;
        });

        return $app;
    }
}
