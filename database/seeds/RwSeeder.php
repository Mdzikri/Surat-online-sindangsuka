<?php

use App\Rw;
use Illuminate\Database\Seeder;

class RwSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rw::create([
            'no' => '15',
            'ketua' => 'Cokro',
        ]);
    }
}
