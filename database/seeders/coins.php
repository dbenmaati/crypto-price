<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class coins extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $csvFile = base_path('database/seeders/data/coins.csv');
        $data = array_map('str_getcsv', file($csvFile));
        $header = array_shift($data); // Remove header row

        foreach ($data as $row) {
            DB::table('coins')->insert(array_combine($header, $row));
        }
    }
}
