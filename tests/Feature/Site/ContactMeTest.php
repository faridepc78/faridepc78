<?php

namespace Tests\Feature\Site;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactMeTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_admin_can_see_contact_page()
    {
        $this->actAsAdmin();
        $this->get(route('contact-me'))->assertOk();
    }

    public function test_user_can_see_contact_page()
    {
        $this->get(route('contact-me'))->assertOk();
    }

    public function test_admin_can_store_contact()
    {
        $this->actAsAdmin();
        $response = $this->post(route('contact.store'), $this->contactData());
        $response->assertStatus(200);
        $this->assertEquals(1, Contact::all()->count());
    }

    public function test_user_can_store_contact()
    {
        $response = $this->post(route('contact.store'), $this->contactData());
        $response->assertStatus(200);
        $this->assertEquals(1, Contact::all()->count());
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

    private function contactData(): array
    {
        return [
            'user_name' => $this->faker->name,
            'user_email' => $this->faker->email,
            'user_mobile' => '09123456789',
            'know' => $this->faker->name,
            'text' => $this->faker->text,
            'recaptcha_token'=>make_token(100)
        ];
    }
}
