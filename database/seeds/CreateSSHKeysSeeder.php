<?php

use Illuminate\Database\Seeder;

class CreateSSHKeysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ssh_keys')->insert([
            'key' => 'test key',
            'type' => 'test type'
        ]);
    }
}
