<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        //permission for kriteria
        Permission::create(['name' => 'kriteria.index']);
        Permission::create(['name' => 'kriteria.create']);
        Permission::create(['name' => 'kriteria.edit']);
        Permission::create(['name' => 'kriteria.delete']);

        //permission for sub-kriteria
        Permission::create(['name' => 'sub-kriteria.index']);
        Permission::create(['name' => 'sub-kriteria.create']);
        Permission::create(['name' => 'sub-kriteria.edit']);
        Permission::create(['name' => 'sub-kriteria.delete']);

        //permission for sekolah
        Permission::create(['name' => 'sekolah.index']);
        Permission::create(['name' => 'sekolah.create']);
        Permission::create(['name' => 'sekolah.edit']);
        Permission::create(['name' => 'sekolah.delete']);

        //permission for list-asessment
        Permission::create(['name' => 'list-asessment.index']);
        Permission::create(['name' => 'list-asessment.create']);
        Permission::create(['name' => 'list-asessment.edit']);
        Permission::create(['name' => 'list-asessment.delete']);

        //permission for normalisasi-asessment
        Permission::create(['name' => 'normalisasi-asessment.index']);
        Permission::create(['name' => 'normalisasi-asessment.create']);
        Permission::create(['name' => 'normalisasi-asessment.edit']);
        Permission::create(['name' => 'normalisasi-asessment.delete']);

        //permission for perhitungan-normalisasi
        Permission::create(['name' => 'perhitungan-normalisasi.index']);
        Permission::create(['name' => 'perhitungan-normalisasi.create']);
        Permission::create(['name' => 'perhitungan-normalisasi.edit']);
        Permission::create(['name' => 'perhitungan-normalisasi.delete']);

        //permission for perangkingan-asessment
        Permission::create(['name' => 'perangkingan-asessment.index']);
        Permission::create(['name' => 'perangkingan-asessment.create']);
        Permission::create(['name' => 'perangkingan-asessment.edit']);
        Permission::create(['name' => 'perangkingan-asessment.delete']);

        //permission for roles
        Permission::create(['name' => 'roles.index']);
        Permission::create(['name' => 'roles.create']);
        Permission::create(['name' => 'roles.edit']);
        Permission::create(['name' => 'roles.delete']);

        //permission for permissions
        Permission::create(['name' => 'permissions.index']);

        //permission for users
        Permission::create(['name' => 'users.index']);
        Permission::create(['name' => 'users.create']);
        Permission::create(['name' => 'users.edit']);
        Permission::create(['name' => 'users.delete']);
    }
}
