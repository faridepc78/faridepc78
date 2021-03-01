<?php

namespace Tests\Feature;

use App\Models\contactInfo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ContactInfoTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /*START CHECK INDEX*/

    public function test_admin_can_see_contactInfo_index()
    {
        $this->actAsAdmin();
        $this->get(route('contactInfo.index'))->assertOk();
    }

    public function test_user_can_not_see_contactInfo_index()
    {
        $this->get(route('contactInfo.index'))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK INDEX*/

    /*START CHECK CREATE*/

    public function test_admin_can_see_create_contactInfo()
    {
        $this->actAsAdmin();
        $this->get(route('contactInfo.create'))->assertOk();
    }

    public function test_user_can_not_see_create_contactInfo()
    {
        $this->get(route('contactInfo.create'))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK CREATE*/

    /*START CHECK STORE*/

    public function test_admin_can_store_contactInfo()
    {
        $this->actAsAdmin();
        Storage::fake('local');
        $response = $this->post(route('contactInfo.store'), $this->contactInfoData());
        $response->assertStatus(302);
        $response->assertRedirect(route('contactInfo.create'));
        $this->assertEquals(1, contactInfo::all()->count());
    }

    public function test_user_can_not_store_contactInfo()
    {
        Storage::fake('local');
        $response = $this->post(route('contactInfo.store'), $this->contactInfoData());
        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
        $this->assertEquals(0, contactInfo::all()->count());
    }

    /*END CHECK STORE*/

    /*START CHECK EDIT*/

    public function test_admin_can_see_edit_contactInfo()
    {
        $this->actAsAdmin();
        $contactInfo = $this->createContactInfo();
        $this->get(route('contactInfo.edit', $contactInfo->id))->assertOk();
    }

    public function test_user_can_not_see_edit_contactInfo()
    {
        $contactInfo = $this->createContactInfo();
        $this->get(route('contactInfo.edit', $contactInfo->id))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK EDIT*/

    /*START CHECK UPDATE*/

    public function test_admin_can_update_contactInfo()
    {
        $this->actAsAdmin();
        $contactInfo = $this->createContactInfo();
        $this->patch(route('contactInfo.update', $contactInfo->id), [
            'name' => 'test',
            'val' => '@ABP1236',
            'link' => 'http://www.linkedin.com/in/ABP1236',
            'image' => UploadedFile::fake()->image('test.jpg'),
            'text' => 'this is a test'
        ])->assertStatus(302)->assertRedirect(route('contactInfo.edit', $contactInfo->id));
        $contactInfo = $contactInfo->fresh();
        $this->assertEquals('test', $contactInfo->name);
    }

    public function test_user_can_not_update_contactInfo()
    {
        $contactInfo = $this->createContactInfo();
        $this->patch(route('contactInfo.update', $contactInfo->id), [
            'name' => 'test',
            'val' => '@ABP1236',
            'link' => 'http://www.linkedin.com/in/ABP1236',
            'image' => UploadedFile::fake()->image('test.jpg'),
            'text' => 'this is a test'
        ])->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK UPDATE*/

    /*START CHECK DESTROY*/

    public function test_admin_can_delete_contactInfo()
    {
        $this->actAsAdmin();
        $contactInfo = $this->createContactInfo();
        $this->delete(route('contactInfo.destroy', $contactInfo->id))->assertStatus(302)->assertRedirect(route('contactInfo.index'));
        $this->assertEquals(0, contactInfo::all()->count());
    }

    public function test_user_can_not_delete_contactInfo()
    {
        $this->withoutExceptionHandling();
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $contactInfo = $this->createContactInfo();
        $this->delete(route('contactInfo.destroy', $contactInfo->id))->assertStatus(302)->assertRedirect(route('login'));
        $this->assertEquals(1, contactInfo::all()->count());
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

    private function createContactInfo()
    {
        $data = $this->contactInfoData();
        unset($data['image']);
        return ContactInfo::query()->create($data);
    }

    private function contactInfoData()
    {
        return [
            'name' => $this->faker->name,
            'val' => $this->faker->name,
            'link' => $this->faker->url,
            'image' => UploadedFile::fake()->image('test.jpg'),
            'text' => $this->faker->text
        ];
    }
}
