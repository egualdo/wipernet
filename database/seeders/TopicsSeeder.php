<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Seeder;

class TopicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $topics = [
            [
                
                'name' => 'Creatividad'
            ],
            [
                
                'name' => 'Estrategia'
            ],
            [
                
                'name' => 'Redes Sociales'
            ],
            [
                
                'name' => 'E-Commerce'
            ],
            [
                
                'name' => 'Influencers'
            ],
             [
                
                'name' => "NFT's"
            ],
            [
                'name'=>'Marketing B2B'
            ]
        ];

        foreach ($topics as $topic) {
            Topic::create($topic);
        }
    }
}
