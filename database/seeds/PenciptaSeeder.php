<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenciptaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create admin
        DB::table('pencipta')->insert([
            'pencipta_nama' => "William Shakespeare"
        ]);
    }
}
