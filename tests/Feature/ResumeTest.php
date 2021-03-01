<?php

namespace Tests\Feature;

use App\Models\Resume;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResumeTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /*START CHECK INDEX*/

    public function test_admin_can_see_resume_index()
    {
        $this->actAsAdmin();
        $this->get(route('resume.index'))->assertOk();
    }

    public function test_user_can_not_see_resume_index()
    {
        $this->get(route('resume.index'))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK INDEX*/

    /*START CHECK CREATE*/

    public function test_admin_can_see_create_resume()
    {
        $this->actAsAdmin();
        $this->get(route('resume.create'))->assertOk();
    }

    public function test_user_can_not_see_create_resume()
    {
        $this->get(route('resume.create'))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK CREATE*/

    /*START CHECK STORE*/

    public function test_admin_can_store_resume()
    {
        $this->actAsAdmin();
        $response = $this->post(route('resume.store'), $this->resumeData());
        $response->assertStatus(302);
        $response->assertRedirect(route('resume.create'));
        $this->assertEquals(1, resume::all()->count());
    }

    public function test_user_can_not_store_resume()
    {
        $response = $this->post(route('resume.store'), $this->resumeData());
        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
        $this->assertEquals(0, resume::all()->count());
    }

    /*END CHECK STORE*/

    /*START CHECK EDIT*/

    public function test_admin_can_see_edit_resume()
    {
        $this->actAsAdmin();
        $resume = $this->createResume();
        $this->get(route('resume.edit', $resume->id))->assertOk();
    }

    public function test_user_can_not_see_edit_resume()
    {
        $resume = $this->createResume();
        $this->get(route('resume.edit', $resume->id))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK EDIT*/

    /*START CHECK UPDATE*/

    public function test_admin_can_update_resume()
    {
        $this->actAsAdmin();
        $resume = $this->createResume();
        $this->patch(route('resume.update', $resume->id), [
            'name' => 'test',
            'customer' => 'test',
            'year' => '1399'
        ])->assertStatus(302)->assertRedirect(route('resume.edit', $resume->id));
        $resume = $resume->fresh();
        $this->assertEquals('test', $resume->name);
    }

    public function test_user_can_not_update_resume()
    {
        $resume = $this->createResume();
        $this->patch(route('resume.update', $resume->id), [
            'name' => 'test',
            'customer' => 'test',
            'year' => '1399'
        ])->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK UPDATE*/

    /*START CHECK DESTROY*/

    public function test_admin_can_delete_resume()
    {
        $this->actAsAdmin();
        $resume = $this->createResume();
        $this->delete(route('resume.destroy', $resume->id))->assertStatus(302)->assertRedirect(route('resume.index'));
        $this->assertEquals(0, resume::all()->count());
    }

    public function test_user_can_not_delete_resume()
    {
        $this->withoutExceptionHandling();
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $resume = $this->createResume();
        $this->delete(route('resume.destroy', $resume->id))->assertStatus(302)->assertRedirect(route('login'));
        $this->assertEquals(1, resume::all()->count());
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

    private function createResume()
    {
        $data = $this->resumeData();
        return Resume::query()->create($data);
    }

    private function resumeData()
    {
        return [
            'name' => $this->faker->name,
            'customer' => $this->faker->name,
            'year' => '1399'
        ];
    }
}
