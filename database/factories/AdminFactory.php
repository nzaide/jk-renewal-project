<?php

namespace Database\Factories;

use App\Http\Enum\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $adminNo = rand(0, 100);
        return [
            'group_id' => 1,
            'fullname' => 'admin' . $adminNo,
            'mail_address' => 'admin' . $adminNo . '@email.com',
            'password' => Hash::make('passworD0'),
            'role' => rand(0, 1) ? Role::Administrator->value : Role::Recruiter->value,
        ];
    }
}
