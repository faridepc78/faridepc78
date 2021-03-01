<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /*START CHECK INDEX*/

    public function test_admin_can_see_profile_index()
    {
        $this->actAsAdmin();
        $this->get(route('profile'))->assertOk();
    }

    public function test_user_can_not_see_profile_index()
    {
        $this->get(route('profile'))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK INDEX*/

    /*START CHECK UPDATE*/

    public function test_admin_can_update_proofile()
    {
        $this->actAsAdmin();
        $data = auth()->user();
        $this->patch(route('profile.update', $data->id), [
            'full_name' => 'farid',
            'email' => 'farid@gmail.com',
            'image' => UploadedFile::fake()->image('test.jpg'),
            'password' => '$2y$04$20BCuxkJsAVE6IXCBmLzbObxAYEti1lRlFnPFQVTEb70FcM0d8IYa',
            'password_confirmation' => '$2y$04$20BCuxkJsAVE6IXCBmLzbObxAYEti1lRlFnPFQVTEb70FcM0d8IYa'
        ])->assertStatus(302)->assertRedirect(route('profile'));
        $data = $data->fresh();
        $this->assertEquals('farid', $data->full_name);
    }

    /*END CHECK UPDATE*/

    private function createAdminData()
    {
        $this->actingAs(User::factory()->create());
    }

    private function actAsAdmin()
    {
        return $this->createAdminData();
        auth()->check();
    }
}
