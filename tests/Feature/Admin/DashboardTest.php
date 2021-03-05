<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /*START CHECK INDEX*/

    public function test_admin_can_see_dashboard_index()
    {
        $this->actAsAdmin();
        $this->get(route('dashboard'))->assertOk();
    }

    public function test_user_can_not_see_dashboard_index()
    {
        $this->get(route('dashboard'))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK INDEX*/

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
