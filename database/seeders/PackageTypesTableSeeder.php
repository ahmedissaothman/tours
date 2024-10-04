<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('package_types')->insert([
            ['type_name' => 'Island'],
            ['type_name' => 'Boat'],
            ['type_name' => 'Combination'],
            // Add more types as needed
        ]);
    }
}
