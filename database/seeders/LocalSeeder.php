<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Local;

class LocalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Local::factory()->count(100)->create();
    }
}
