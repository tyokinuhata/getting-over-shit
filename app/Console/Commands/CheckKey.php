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
        $max = DB::table('ssh_keys')->max('id');
        $response = DB::table('ssh_keys')->get();
        $cnt = [
            'ssh-rsa' => 0,
            'ssh-dss' => 0,
            'ecdsa-sha2-nistp256' => 0,
            'ecdsa-sha2-nistp384' => 0,
            'ssh-ed25519' => 0
        ];
        for ($i = 1; $i <= $max - 1; $i++) {
            switch ($response[$i]->key) {
                case 'ssh-rsa':
                    $cnt['ssh-rsa']++;
                    break;
                case 'ssh-dss':
                    $cnt['ssh-dss']++;
                    break;
                case 'ecdsa-sha2-nistp256':
                    $cnt['ecdsa-sha2-nistp256']++;
                    break;
                case 'ecdsa-sha2-nistp384':
                    $cnt['ecdsa-sha2-nistp384']++;
                    break;
                case 'ssh-ed25519':
                    $cnt['ssh-ed25519']++;
                    break;
            }
        }

        echo 'ssh-rsa: ' . round($cnt['ssh-rsa'] / ($max - 1) * 100, 2) . "%\n";
        echo 'ssh-dss: ' . round($cnt['ssh-dss'] / ($max - 1) * 100, 2) . "%\n";
        echo 'ecdsa-sha2-nistp256: ' . round($cnt['ecdsa-sha2-nistp256'] / ($max - 1) * 100, 2) . "%\n";
        echo 'ecdsa-sha2-nistp384: ' . round($cnt['ecdsa-sha2-nistp384'] / ($max - 1) * 100, 2) . "%\n";
        echo 'ssh-ed25519: ' . round($cnt['ssh-ed25519'] / ($max - 1) * 100) . "%\n";
    }
}