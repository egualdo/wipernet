<?php

namespace Database\Seeders;
use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            [
                'name' => 'Buenos Aires'
            ],
            [
                'name' => 'Nueva York'
            ],
            [
                'name' => 'Lima'
            ]
        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }
}
