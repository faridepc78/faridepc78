<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_admin_can_login()
    {
        $user = User::query()->create(
            [
                'full_name' => 'فرید شیشه بری',
                'email' => 'faridnewepc78@gmail.com',
                'image_id' => null,
                'password' => bcrypt('1234f01234')
            ]
        );

        $this->post(route('login'), [
            'email' => $user->email,
            'password' => '1234f01234',
            'g-recaptcha-response'=>make_token(100)
        ]);

        $this->assertAuthenticated();
    }
}
