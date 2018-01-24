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
        $cnt = 1;

        for ($i = 'a'; $i <= 'z'; $i++) {
            if ($response = @file_get_contents($url . $i . '.keys')) {
                $response = str_replace("\n", ' ', $response);
                $response = explode(' ', $response);
                for ($j = 0; $j < count($response) - 1; $j += 2) {
                    DB::table('ssh_keys')->insert([
                        'key' => $response[$j],
                        'type' => $response[$j + 1]
                    ]);
                }
                echo $this->info("[{$cnt}] Success!");
            } else {
                echo "[{$cnt}] {$http_response_header[5]}\n";
            }
            $cnt++;
        }
    }
}