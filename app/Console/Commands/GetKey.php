<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GetKey extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'get:key';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get ssh keys from GitHub.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle() {
        $url =  'https://github.com/';
        $user = 'ymgn';
        $key = file_get_contents($url . $user . '.keys');
        print $key;
    }
}