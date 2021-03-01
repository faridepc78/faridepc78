<?php

namespace Tests\Feature;

use App\Models\Social;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SocialTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /*START CHECK INDEX*/

    public function test_admin_can_see_social_index()
    {
        $this->actAsAdmin();
        $this->get(route('social.index'))->assertOk();
    }

    public function test_user_can_not_see_social_index()
    {
        $this->get(route('social.index'))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK INDEX*/

    /*START CHECK CREATE*/

    public function test_admin_can_see_create_social()
    {
        $this->actAsAdmin();
        $this->get(route('social.create'))->assertOk();
    }

    public function test_user_can_not_see_create_social()
    {
        $this->get(route('social.create'))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK CREATE*/

    /*START CHECK STORE*/

    public function test_admin_can_store_social()
    {
        $this->actAsAdmin();
        $response = $this->post(route('social.store'), $this->socialData());
        $response->assertStatus(302);
        $response->assertRedirect(route('social.create'));
        $this->assertEquals(1, social::all()->count());
    }

    public function test_user_can_not_store_social()
    {
        $response = $this->post(route('social.store'), $this->socialData());
        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
        $this->assertEquals(0, social::all()->count());
    }

    /*END CHECK STORE*/

    /*START CHECK EDIT*/

    public function test_admin_can_see_edit_social()
    {
        $this->actAsAdmin();
        $social = $this->createSocial();
        $this->get(route('social.edit', $social->id))->assertOk();
    }

    public function test_user_can_not_see_edit_social()
    {
        $social = $this->createSocial();
        $this->get(route('social.edit', $social->id))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK EDIT*/

    /*START CHECK UPDATE*/

    public function test_admin_can_update_social()
    {
        $this->actAsAdmin();
        $social = $this->createSocial();
        $this->patch(route('social.update', $social->id), [
            'name' => 'test',
            'icon' => 'fi-telegram',
            'link' => 'http://faridepc78.test/admin/portfolio',
            'color' => '#E1306C'
        ])->assertStatus(302)->assertRedirect(route('social.edit', $social->id));
        $social = $social->fresh();
        $this->assertEquals('test', $social->name);
    }

    public function test_user_can_not_update_social()
    {
        $social = $this->createSocial();
        $this->patch(route('social.update', $social->id), [
            'name' => 'test',
            'icon' => 'fi-telegram',
            'link' => 'http://faridepc78.test/admin/portfolio',
            'color' => '#E1306C'
        ])->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK UPDATE*/

    /*START CHECK DESTROY*/

    public function test_admin_can_delete_social()
    {
        $this->actAsAdmin();
        $social = $this->createSocial();
        $this->delete(route('social.destroy', $social->id))->assertStatus(302)->assertRedirect(route('social.index'));
        $this->assertEquals(0, social::all()->count());
    }

    public function test_user_can_not_delete_social()
    {
        $this->withoutExceptionHandling();
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $social = $this->createSocial();
        $this->delete(route('social.destroy', $social->id))->assertStatus(302)->assertRedirect(route('login'));
        $this->assertEquals(1, social::all()->count());
    }

    /*END CHECK DESTROY*/

    private function createAdminData()
    {
        $this->actingAs(User::factory()->create());
    }

    private function actAsAdmin()
    {
        $this->createAdminData();
        auth()->check();
    }

    private function createSocial()
    {
        $data = $this->socialData();
        return Social::query()->create($data);
    }

    private function socialData()
    {
        return [
            'name' => $this->faker->name,
            'icon' => $this->faker->name,
            'link' => $this->faker->url,
            'color' => $this->faker->hexColor
        ];
    }
}
