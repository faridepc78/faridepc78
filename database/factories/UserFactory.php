<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'full_name' => 'فرید شیشه بری',
            'email' => 'faridnewepc78@gmail.com',
            'image_id' => null,
            'password' => bcrypt('1234f01234')
        ];
    }
}
