<?php

use Illuminate\Database\Seeder;
use App\Models\Users\UserPersonCharge;

class UserPersonChargesTableSeeder extends Seeder
{
    public function run()
    {
        UserPersonCharge::create([
            'user_id' => 4,
            'japanese_language_user_id' => 6,
            'math_teacher_user_id' => 2,
        ]);

        UserPersonCharge::create([
            'user_id' => 7,
            'japanese_language_user_id' => 6,
            'math_teacher_user_id' => 5,
        ]);

        UserPersonCharge::create([
            'user_id' => 8,
            'math_teacher_user_id' => 5,
        ]);

        UserPersonCharge::create([
            'user_id' => 9,
            'japanese_language_user_id' => 6,
            'math_teacher_user_id' => 2,
        ]);

        UserPersonCharge::create([
            'user_id' => 10,
            'japanese_language_user_id' => 3,
            'math_teacher_user_id' => 5,
        ]);

        UserPersonCharge::create([
            'user_id' => 11,
            'japanese_language_user_id' => 3,
            'math_teacher_user_id' => 2,
        ]);

        UserPersonCharge::create([
            'user_id' => 12,
            'math_teacher_user_id' => 2,
        ]);

        UserPersonCharge::create([
            'user_id' => 13,
            'japanese_language_user_id' => 3,
            'math_teacher_user_id' => 2,
        ]);

        UserPersonCharge::create([
            'user_id' => 14,
            'japanese_language_user_id' => 6,
            'math_teacher_user_id' => 2,
        ]);

        UserPersonCharge::create([
            'user_id' => 15,
            'math_teacher_user_id' => 5,
        ]);

        UserPersonCharge::create([
            'user_id' => 16,
            'math_teacher_user_id' => 5,
        ]);

        UserPersonCharge::create([
            'user_id' => 17,
            'japanese_language_user_id' => 3,
            'math_teacher_user_id' => 5,
        ]);

        UserPersonCharge::create([
            'user_id' => 18,
            'japanese_language_user_id' => 3,
        ]);

        UserPersonCharge::create([
            'user_id' => 19,
            'japanese_language_user_id' => 3,
        ]);

        UserPersonCharge::create([
            'user_id' => 20,
            'japanese_language_user_id' => 3,
            'math_teacher_user_id' => 2,
        ]);

        UserPersonCharge::create([
            'user_id' => 21,
            'math_teacher_user_id' => 2,
        ]);

        UserPersonCharge::create([
            'user_id' => 22,
            'japanese_language_user_id' => 3,
            'math_teacher_user_id' => 5,
        ]);

        UserPersonCharge::create([
            'user_id' => 23,
            'japanese_language_user_id' => 6,
        ]);
    }
}
