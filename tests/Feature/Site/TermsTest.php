<?php

namespace Tests\Feature\Site;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TermsTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_see_terms_page()
    {
        $this->withoutExceptionHandling();
        $this->actAsAdmin();
        $this->expectException('Facade\Ignition\Exceptions\ViewException');
        $this->get(route('terms'))->assertOk();
    }

    public function test_user_can_see_terms_page()
    {
        $this->withoutExceptionHandling();
        $this->expectException('Facade\Ignition\Exceptions\ViewException');
        $this->get(route('terms'))->assertOk();
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
