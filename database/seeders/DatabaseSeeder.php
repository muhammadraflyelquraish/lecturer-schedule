<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\Role::factory()->create([
            'name' => 'Admin',
        ]);

        \App\Models\Role::factory()->create([
            'name' => 'Pimpinan',
        ]);

        \App\Models\Role::factory()->create([
            'name' => 'Staff',
        ]);

        \App\Models\Role::factory()->create([
            'name' => 'Dosen',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Antoni',
            'email' => 'antoni@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role_id' => 1
        ]);


        \App\Models\ClassModel::factory()->create([
            'name' => 'A',
            'angkatan' => 2021
        ]);

        \App\Models\ClassModel::factory()->create([
            'name' => 'B',
            'angkatan' => 2021
        ]);

        \App\Models\ClassModel::factory()->create([
            'name' => 'C',
            'angkatan' => 2021
        ]);

        \App\Models\ClassModel::factory()->create([
            'name' => 'D',
            'angkatan' => 2021
        ]);


        \App\Models\Matkul::factory()->create([
            'code' => 'FST01',
            'name' => 'Kalkulus 1',
            'semester' => 1,
        ]);

        \App\Models\Matkul::factory()->create([
            'code' => 'FST02',
            'name' => 'Dasar-Dasar Pemrograman',
            'semester' => 1,
        ]);

        \App\Models\Schedule::factory()->create([
            'user_id' => 1,
            'tahun_akademik' => 2021,
        ]);


        \App\Models\ScheduleMatkul::factory()->create([
            'schedule_id' => 1,
            'matkul_id' => 1,
        ]);

        \App\Models\ScheduleMatkul::factory()->create([
            'schedule_id' => 1,
            'matkul_id' => 2,
        ]);

        \App\Models\ScheduleMatkulClass::factory()->create([
            'schedule_matkul_id' => 1,
            'class_id' => 1,
            'sks' => 3,
            'hari' => 'Senin',
            'jam' => '13:00',
            'ruangan' => '5003'
        ]);


        // \App\Models\ScheduleMatkul::factory()->create([
        //     'schedule_id' => 'FST02',
        //     'matkul_id' => 'Dasar-Dasar Pemrograman',
        //     'semester' => 1,
        // ]);
    }
}
