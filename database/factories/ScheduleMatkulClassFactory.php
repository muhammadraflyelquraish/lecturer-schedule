<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ScheduleMatkulClassFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'schedule_matkul_id' => 1,
            'class_id' => 2,
            'sks' => 3,
            'hari' => 'Senin',
            'jam' => '13:00',
            'ruangan' => '5003'
        ];
    }
}
