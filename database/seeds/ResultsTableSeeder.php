<?php

use App\Models\Result;
use Illuminate\Database\Seeder;

class ResultsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Result::truncate();

        $data = json_decode(File::get(resource_path('datasets/properties.json')), true);
        foreach ($data as $item) {
            Result::create($item);
        }
    }
}
