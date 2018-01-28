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
            'ecdsa-sha2-nistp521' => 0,
            'ssh-ed25519' => 0,
            'etc' => 0
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
                case 'ecdsa-sha2-nistp521':
                    $cnt['ecdsa-sha2-nistp521']++;
                    break;
                case 'ssh-ed25519':
                    $cnt['ssh-ed25519']++;
                    break;
                default:
                    $cnt['etc']++;
            }
        }

        $length = $max - 1 - $cnt['etc'];
        $precision = 2;

        CheckKey::format('ssh-rsa', $cnt['ssh-rsa'], $length, $precision);
        CheckKey::format('ssh-dss', $cnt['ssh-dss'], $length, $precision);
        CheckKey::format('ecdsa-sha2-nistp256', $cnt['ecdsa-sha2-nistp256'], $length, $precision);
        CheckKey::format('ecdsa-sha2-nistp384', $cnt['ecdsa-sha2-nistp384'], $length, $precision);
        CheckKey::format('ecdsa-sha2-nistp521', $cnt['ecdsa-sha2-nistp521'], $length, $precision);
        CheckKey::format('ssh-ed25519', $cnt['ssh-ed25519'], $length, $precision);
    }

    private static function format($type, $cnt, $length, $precision) {
        echo $type . ': ' . $cnt . ' ' . round($cnt / $length * 100, $precision) . "%\n";
    }
}