<?php

namespace Tests\Feature\Site;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PaymentTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_admin_can_see_payment_page()
    {
        $this->actAsAdmin();
        $this->get(route('payment'))->assertOk();
    }

    public function test_user_can_see_payment_page()
    {
        $this->get(route('payment'))->assertOk();
    }

    public function test_admin_can_request_payment_page()
    {
        $this->actAsAdmin();
        $response = $this->post(route('payment.request'), $this->paymentData());
        $response->assertStatus(302);
    }

    public function test_user_can_request_payment_page()
    {
        $response = $this->post(route('payment.request'), $this->paymentData());
        $response->assertStatus(302);
    }

    private function createAdminData()
    {
        $this->actingAs(User::factory()->create());
    }

    private function actAsAdmin()
    {
        $this->createAdminData();
        auth()->check();
    }

    private function paymentData(): array
    {
        return [
            'user_name' => $this->faker->name,
            'user_email' => $this->faker->email,
            'user_mobile' => '09123456789',
            'title' => $this->faker->name,
            'price' => '1,000,000',
            'g-recaptcha-response' => make_token(100)
        ];
    }
}
