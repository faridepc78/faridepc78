<?php

namespace Tests\Feature\Site;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_see_index_page()
    {
        $this->actAsAdmin();
        $this->get(route('index'))->assertOk();
    }

    public function test_user_can_see_index_page()
    {
        $this->get(route('index'))->assertOk();
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
