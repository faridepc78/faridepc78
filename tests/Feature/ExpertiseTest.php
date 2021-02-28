<?php

namespace Tests\Feature\Admin;

use App\Models\Expertise;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ExpertiseTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /*START CHECK INDEX*/

    public function test_admin_can_see_expertise_index()
    {
        $this->actAsAdmin();
        $this->get(route('expertise.index'))->assertOk();
    }

    public function test_user_can_not_see_expertise_index()
    {
        $this->get(route('expertise.index'))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK INDEX*/

    /*START CHECK CREATE*/

    public function test_admin_can_see_create_expertise()
    {
        $this->actAsAdmin();
        $this->get(route('expertise.create'))->assertOk();
    }

    public function test_user_can_not_see_create_expertise()
    {
        $this->get(route('expertise.create'))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK CREATE*/

    /*START CHECK STORE*/

    public function test_admin_can_store_expertise()
    {
        $this->actAsAdmin();
        Storage::fake('local');
        $response = $this->post(route('expertise.store'), $this->expertiseData());
        $response->assertStatus(302);
        $response->assertRedirect(route('expertise.create'));
        $this->assertEquals(1, Expertise::all()->count());
    }

    public function test_user_can_not_store_expertise()
    {
        Storage::fake('local');
        $response = $this->post(route('expertise.store'), $this->expertiseData());
        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
        $this->assertEquals(0, Expertise::all()->count());
    }

    /*END CHECK STORE*/

    /*START CHECK EDIT*/

    public function test_admin_can_see_edit_expertise()
    {
        $this->actAsAdmin();
        $expertise = $this->createExpertise();
        $this->get(route('expertise.edit', $expertise->id))->assertOk();
    }

    public function test_user_can_not_see_edit_expertise()
    {
        $expertise = $this->createExpertise();
        $this->get(route('expertise.edit', $expertise->id))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK EDIT*/

    /*START CHECK UPDATE*/

    public function test_admin_can_update_expertise()
    {
        $this->actAsAdmin();
        $expertise = $this->createExpertise();
        $this->patch(route('expertise.update', $expertise->id), [
            'name' => 'test',
            'slug' => $this->faker->slug,
            'image' => UploadedFile::fake()->image('test.jpg'),
            'text' => $this->faker->text
        ])->assertStatus(302)->assertRedirect(route('expertise.edit', $expertise->id));
        $expertise = $expertise->fresh();
        $this->assertEquals('test', $expertise->name);
    }

    public function test_user_can_not_update_expertise()
    {
        $expertise = $this->createExpertise();
        $this->patch(route('expertise.update', $expertise->id), [
            'name' => 'test',
            'slug' => $this->faker->slug,
            'image' => UploadedFile::fake()->image('test.jpg'),
            'text' => $this->faker->text
        ])->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK UPDATE*/

    /*START CHECK DESTROY*/

    public function test_admin_can_delete_expertise()
    {
        $this->actAsAdmin();
        $expertise = $this->createExpertise();
        $this->delete(route('expertise.destroy', $expertise->id))->assertStatus(302)->assertRedirect(route('expertise.index'));
        $this->assertEquals(0, Expertise::all()->count());
    }

    public function test_user_can_not_delete_expertise()
    {
        $this->withoutExceptionHandling();
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $expertise = $this->createExpertise();
        $this->delete(route('expertise.destroy', $expertise->id))->assertStatus(302)->assertRedirect(route('login'));
        $this->assertEquals(1, Expertise::all()->count());
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

    private function createExpertise()
    {
        $data = $this->expertiseData();
        unset($data['image']);
        return Expertise::query()->create($data);
    }

    private function expertiseData()
    {
        return [
            'name' => $this->faker->name,
            'slug' => $this->faker->slug,
            'image' => UploadedFile::fake()->image('test.jpg'),
            'text' => $this->faker->text
        ];
    }
}
