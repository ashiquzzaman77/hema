<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// use Config;
// use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // if (Schema::hasTable('smtps'))
        // {
        //     $smtpsetting = Smtp::first();

        //     if ($smtpsetting) {
        //        $data = [
        //          'driver' => $smtpsetting->mailer,
        //          'host' => $smtpsetting->host,
        //          'port' => $smtpsetting->port,
        //          'username' => $smtpsetting->username,
        //          'password' => $smtpsetting->password,
        //          'encryption' => $smtpsetting->encryption,
        //          'from' => [
        //              'address' => $smtpsetting->from_address,
        //              'name' => 'Ecommerce'
        //          ]

        //        ];

        //        Config::set('mail',$data);
        //     }

        // }
    }
}
