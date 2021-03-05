<?php

namespace Tests\Feature\Admin;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class SettingTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /*START CHECK CREATE*/

    public function test_admin_can_see_create_setting()
    {
        $this->actAsAdmin();
        $this->get(route('setting.create'))->assertOk();
    }

    public function test_user_can_not_see_create_setting()
    {
        $this->get(route('setting.create'))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK CREATE*/

    /*START CHECK STORE*/

    public function test_admin_can_store_setting()
    {
        $this->actAsAdmin();
        Storage::fake('local');
        $response = $this->post(route('setting.store'), $this->settingData());
        $response->assertStatus(302);
        $response->assertRedirect(route('setting.create'));
        $this->assertEquals(1, Setting::all()->count());
    }

    public function test_admin_can_again_store_setting()
    {
        $this->actAsAdmin();
        Storage::fake('local');
        $setting = $this->createsetting();
        $response = $this->post(route('setting.store'), $this->settingData());
        $response->assertStatus(302);
        $response->assertRedirect(route('setting.edit', $setting->id));
        $this->assertEquals(1, Setting::all()->count());
    }

    public function test_user_can_not_store_setting()
    {
        Storage::fake('local');
        $response = $this->post(route('setting.store'), $this->settingData());
        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
        $this->assertEquals(0, setting::all()->count());
    }

    /*END CHECK STORE*/

    /*START CHECK EDIT*/

    public function test_admin_can_see_edit_setting()
    {
        $this->actAsAdmin();
        $setting = $this->createSetting();
        $this->get(route('setting.edit', $setting->id))->assertOk();
    }

    public function test_user_can_not_see_edit_setting()
    {
        $setting = $this->createSetting();
        $this->get(route('setting.edit', $setting->id))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK EDIT*/

    /*START CHECK UPDATE*/

    public function test_admin_can_update_setting()
    {
        $this->actAsAdmin();
        $setting = $this->createsetting();
        $this->patch(route('setting.update', $setting->id), [
            'rule' => $this->faker->text,
            'full_name' => 'farid',
            'bio' => $this->faker->name,
            'trust' => $this->faker->text,
            'trust_reason1' => $this->faker->text,
            'trust_reason2' => $this->faker->text,
            'trust_reason3' => $this->faker->text,
            'trust_reason4' => $this->faker->text,
            'blog_text' => $this->faker->text,
            'portfolio_text' => $this->faker->text,
            'work_text' => $this->faker->text,
            'contact_text' => $this->faker->text,
            'telegram_text' => $this->faker->text,
            'telegram_channel_link' => $this->faker->url,
            'about1' => $this->faker->text,
            'about2' => $this->faker->text,
            'image' => UploadedFile::fake()->image('test.jpg'),
            'footer_text' => $this->faker->text
        ])->assertStatus(302)->assertRedirect(route('setting.edit', $setting->id));
        $setting = $setting->fresh();
        $this->assertEquals('farid', $setting->full_name);
    }

    public function test_user_can_not_update_setting()
    {
        $setting = $this->createsetting();
        $this->patch(route('setting.update', $setting->id), [
            'rule' => $this->faker->text,
            'full_name' => 'farid',
            'bio' => $this->faker->name,
            'trust' => $this->faker->text,
            'trust_reason1' => $this->faker->text,
            'trust_reason2' => $this->faker->text,
            'trust_reason3' => $this->faker->text,
            'trust_reason4' => $this->faker->text,
            'blog_text' => $this->faker->text,
            'portfolio_text' => $this->faker->text,
            'work_text' => $this->faker->text,
            'contact_text' => $this->faker->text,
            'telegram_text' => $this->faker->text,
            'telegram_channel_link' => $this->faker->url,
            'about1' => $this->faker->text,
            'about2' => $this->faker->text,
            'image' => UploadedFile::fake()->image('test.jpg'),
            'footer_text' => $this->faker->text
        ])->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK UPDATE*/

    private function createAdminData()
    {
        $this->actingAs(User::factory()->create());
    }

    private function actAsAdmin()
    {
        $this->createAdminData();
        auth()->check();
    }

    private function createSetting()
    {
        $data = $this->settingData();
        unset($data['image']);
        return Setting::query()->create($data);
    }

    private function settingData()
    {
        return [
            'rule' => $this->faker->text,
            'full_name' => $this->faker->name,
            'bio' => $this->faker->name,
            'trust' => $this->faker->text,
            'trust_reason1' => $this->faker->text,
            'trust_reason2' => $this->faker->text,
            'trust_reason3' => $this->faker->text,
            'trust_reason4' => $this->faker->text,
            'blog_text' => $this->faker->text,
            'portfolio_text' => $this->faker->text,
            'work_text' => $this->faker->text,
            'contact_text' => $this->faker->text,
            'telegram_text' => $this->faker->text,
            'telegram_channel_link' => $this->faker->url,
            'about1' => $this->faker->text,
            'about2' => $this->faker->text,
            'image' => UploadedFile::fake()->image('test.jpg'),
            'footer_text' => $this->faker->text
        ];
    }
}
