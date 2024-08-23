<?php

namespace Database\Seeders;
use App\Models\Idiom;
use Illuminate\Database\Seeder;

class IdiomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $idioms = [
            [
                'name' => 'Español',
                'acronym' => 'es'
            ],
            [
                'name' => 'Português',
                'acronym' => 'pt'
            ],
            [
                'name' => 'English',
                'acronym' => 'en'
            ]
        ];

        foreach ($idioms as $idiom) {
            Idiom::create($idiom);
        }
    }
}