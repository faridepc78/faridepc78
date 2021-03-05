<?php

namespace Tests\Feature\Site;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AboutMeTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_see_about_page()
    {
        $this->withoutExceptionHandling();
        $this->actAsAdmin();
        $this->expectException('Facade\Ignition\Exceptions\ViewException');
        $this->get(route('about-me'))->assertOk();
    }

    public function test_user_can_see_about_page()
    {
        $this->withoutExceptionHandling();
        $this->expectException('Facade\Ignition\Exceptions\ViewException');
        $this->get(route('about-me'))->assertOk();
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
}
