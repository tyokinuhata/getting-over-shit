<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

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

        for ($i = 0; $i < 26; $i++) {
            $user =  chr(97 + $i);
            if ($key = @file_get_contents($url . $user . '.keys')) {
                DB::table('ssh_keys')->insert([ 'keys' => $key ]);
                echo $this->info('Success!');
            } else {
                echo $http_response_header[5] . "\n";
            }
        }
    }
}