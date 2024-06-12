<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class exchanges extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $csvFile = base_path('database/seeders/data/exchanges.csv');
        $data = array_map('str_getcsv', file($csvFile));
        $header = array_shift($data); // Remove header row

        foreach ($data as $row) {
            DB::table('exchanges')->insert(array_combine($header, $row));
        }
    }
}
