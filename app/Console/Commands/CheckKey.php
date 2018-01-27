<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CheckKey extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'check:key';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check the ssh public keys from GitHub.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle() {
        print 'test';
    }
}