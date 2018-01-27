<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Console\Commands\GetKey;
use App\Console\Commands\CheckKey;

class CommandServiceProvider extends ServiceProvider {

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        $this->app->singleton('command.get.key', function () {
            return new Getkey;
        });

        $this->commands(
            'command.get.key'
        );

        $this->app->singleton('command.check.key', function () {
            return new CheckKey;
        });

        $this->commands(
            'command.check.key'
        );
    }
}