<?php

use Illuminate\Database\Seeder;
use App\Models\Users\UserScore;

class UserScoresTableSeeder extends Seeder
{
    public function run()
    {
        UserScore::create([
            'user_id' => 1,
            'score' => rand(1, 500),
        ]);

        UserScore::create([
            'user_id' => 4,
            'score' => rand(1, 500),
        ]);

        UserScore::create([
            'user_id' => 7,
            'score' => rand(1, 500),
        ]);

        UserScore::create([
            'user_id' => 8,
            'score' => rand(1, 500),
        ]);

        UserScore::create([
            'user_id' => 9,
            'score' => rand(1, 500),
        ]);

        UserScore::create([
            'user_id' => 10,
            'score' => rand(1, 500),
        ]);

        UserScore::create([
            'user_id' => 11,
            'score' => rand(1, 500),
        ]);

        UserScore::create([
            'user_id' => 12,
            'score' => rand(1, 500),
        ]);

        UserScore::create([
            'user_id' => 13,
            'score' => rand(1, 500),
        ]);

        UserScore::create([
            'user_id' => 14,
            'score' => rand(1, 500),
        ]);

        UserScore::create([
            'user_id' => 15,
            'score' => rand(1, 500),
        ]);

        UserScore::create([
            'user_id' => 16,
            'score' => rand(1, 500),
        ]);

        UserScore::create([
            'user_id' => 17,
            'score' => rand(1, 500),
        ]);

        UserScore::create([
            'user_id' => 18,
            'score' => rand(1, 500),
        ]);

        UserScore::create([
            'user_id' => 19,
            'score' => rand(1, 500),
        ]);

        UserScore::create([
            'user_id' => 20,
            'score' => rand(1, 500),
        ]);

        UserScore::create([
            'user_id' => 21,
            'score' => '500',
        ]);

        UserScore::create([
            'user_id' => 22,
            'score' => rand(1, 500),
        ]);

        UserScore::create([
            'user_id' => 23,
            'score' => rand(1, 500),
        ]);
    }
}
