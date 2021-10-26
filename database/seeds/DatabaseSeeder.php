<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(RwSeeder::class);
        $this->call(RtSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(KeperluanSeeder::class);
        $this->call(KadesSeeder::class);
        $this->call(PesanPenolakanSeeder::class);
    }
}
