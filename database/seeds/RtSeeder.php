<?php

use App\Rt;
use Illuminate\Database\Seeder;

class RtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rt::create([
            'rw_id' => '1',
            'no' => '01',
        ]);
    }
}
