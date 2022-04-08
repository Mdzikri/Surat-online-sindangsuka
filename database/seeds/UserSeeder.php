<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    public function run()
    {
        $superadmin = User::create([
            'nama' => 'Super Admin',
            'nik' => 'superadmin',
            'no_kk' => 'superadmin',
            'ttl' => 'Bandung, 8 September 1999',
            'agama' => 'Islam',
            'jk' => 'Laki-laki',
            'status' => 'Belum Menikah',
            'nama_ibu' => 'Pipin',
            'nama_ayah' => 'Bambang',
            'pendidikan' => 'S1/Sederajat',
            'pekerjaan' => 'Programmer',
            'rt_id' => '1',
            'rw_id' => '1',
            'alamat' => 'Garut',
            'kewarganegaraan' => 'Indonesia',
            'password' => bcrypt('Des4kAryamukTISprAdm'),
        ]);
        $superadmin->assignRole('superadmin');

        $admin1 = User::create([
            'nama' => 'Petugas Desa 1',
            'nik' => 'admin1',
            'no_kk' => 'admin1',
            'ttl' => 'Bandung, 8 September 1998',
            'agama' => 'Islam',
            'jk' => 'Laki-laki',
            'status' => 'Belum Menikah',
            'nama_ibu' => 'Nina',
            'nama_ayah' => 'Dadang',
            'pendidikan' => 'SMA/Sederajat',
            'pekerjaan' => 'Pegawai Desa',
            'rt_id' => '1',
            'rw_id' => '1',
            'alamat' => 'Garut',
            'kewarganegaraan' => 'Indonesia',
            'password' => bcrypt('Des4kAryamukTI'),
        ]);
        $admin1->assignRole('admin');

        $admin2 = User::create([
            'nama' => 'Petugas Desa 2',
            'nik' => 'admin2',
            'no_kk' => 'admin2',
            'ttl' => 'Bandung, 8 September 1997',
            'agama' => 'Islam',
            'jk' => 'Perempuan',
            'status' => 'Menikah',
            'nama_ibu' => 'Sarimin',
            'nama_ayah' => 'Ujang',
            'pendidikan' => 'S1/Sederajat',
            'pekerjaan' => 'Pegawai Desa',
            'rt_id' => '1',
            'rw_id' => '1',
            'alamat' => 'Garut',
            'kewarganegaraan' => 'Indonesia',
            'password' => bcrypt('Des4kAryamukTI'),
        ]);
        $admin2->assignRole('admin');

        $user1 = User::create([
            'nama' => 'Penduduk A',
            'nik' => '1234567890123456',
            'no_kk' => '1234567890123456',
            'ttl' => 'Bandung, 8 September 1996',
            'agama' => 'Islam',
            'jk' => 'Laki-laki',
            'status' => 'Menikah',
            'nama_ibu' => 'Sarimin',
            'nama_ayah' => 'Ujang',
            'pendidikan' => 'S1/Sederajat',
            'pekerjaan' => 'Wirausaha',
            'rt_id' => '1',
            'rw_id' => '1',
            'alamat' => 'Garut',
            'kewarganegaraan' => 'Indonesia',
            'password' => bcrypt('password'),
        ]);
        $user1->assignRole('user');

        $user2 = User::create([
            'nama' => 'Penduduk B',
            'nik' => '1187050034',
            'no_kk' => '1187050034',
            'ttl' => 'Bandung, 8 September 1997',
            'agama' => 'Islam',
            'jk' => 'Perempuan',
            'status' => 'Belum Menikah',
            'nama_ibu' => 'Sarimin',
            'nama_ayah' => 'Ujang',
            'pendidikan' => 'S1/Sederajat',
            'pekerjaan' => 'Mahasiswa',
            'rt_id' => '1',
            'rw_id' => '1',
            'alamat' => 'Garut',
            'kewarganegaraan' => 'Indonesia',
            'password' => bcrypt('password'),
        ]);
        $user2->assignRole('user');


        Permission::create(['name' => 'setingumum']);
        Permission::create(['name' => 'lengkap']);
        $superadmin = Role::find(1);
        $admin = Role::find(2);
        $superadmin->givePermissionTo('setingumum');
        $admin->givePermissionTo('setingumum');
    }
}
