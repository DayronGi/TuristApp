<?php

namespace Database\Seeders;

use App\Models\Plan as ModelsPlan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Plan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsPlan::factory()->count(15)->create();
    }
}
