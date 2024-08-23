<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HomepageSelection;

class HomepageSelectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $selections = [
            [
                'name' => 'Non-priority',
                'description' => 'No se va a mostrar en el home'
            ],
            [
                'name' => 'Priority',
                'description' => 'Se va a mostrar en el home'
            ]
        ];

        foreach ($selections as $selection) {
            HomepageSelection::create($selection);
        }
    }
}
