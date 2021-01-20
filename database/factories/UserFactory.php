<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'admin',
            'email' => 'admin@user.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$0PtlFz8rb0tBwRn3cw9YdusnEcWeSv02EQMmkbRPn6J9JWAXIMtPm',
            'remember_token' => Str::random(10),
        ];
    }
}
