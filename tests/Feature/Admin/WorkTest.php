<?php

namespace Tests\Feature\Admin;

use App\Models\work;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class WorkTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /*START CHECK INDEX*/

    public function test_admin_can_see_work_index()
    {
        $this->actAsAdmin();
        $this->get(route('work.index'))->assertOk();
    }

    public function test_user_can_not_see_work_index()
    {
        $this->get(route('work.index'))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK INDEX*/

    /*START CHECK CREATE*/

    public function test_admin_can_see_create_work()
    {
        $this->actAsAdmin();
        $this->get(route('work.create'))->assertOk();
    }

    public function test_user_can_not_see_create_work()
    {
        $this->get(route('work.create'))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK CREATE*/

    /*START CHECK STORE*/

    public function test_admin_can_store_work()
    {
        $this->actAsAdmin();
        Storage::fake('local');
        $response = $this->post(route('work.store'), $this->workData());
        $response->assertStatus(302);
        $response->assertRedirect(route('work.create'));
        $this->assertEquals(1, Work::all()->count());
    }

    public function test_user_can_not_store_work()
    {
        Storage::fake('local');
        $response = $this->post(route('work.store'), $this->workData());
        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
        $this->assertEquals(0, Work::all()->count());
    }

    /*END CHECK STORE*/

    /*START CHECK EDIT*/

    public function test_admin_can_see_edit_work()
    {
        $this->actAsAdmin();
        $work = $this->creatework();
        $this->get(route('work.edit', $work->id))->assertOk();
    }

    public function test_user_can_not_see_edit_work()
    {
        $work = $this->creatework();
        $this->get(route('work.edit', $work->id))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK EDIT*/

    /*START CHECK UPDATE*/

    public function test_admin_can_update_work()
    {
        $this->actAsAdmin();
        $work = $this->createWork();
        $this->patch(route('work.update', $work->id), [
            'title' => 'test',
            'text' => $this->faker->text,
            'image' => UploadedFile::fake()->image('test.jpg')
        ])->assertStatus(302)->assertRedirect(route('work.edit', $work->id));
        $work = $work->fresh();
        $this->assertEquals('test', $work->title);
    }

    public function test_user_can_not_update_work()
    {
        $work = $this->creatework();
        $this->patch(route('work.update', $work->id), [
            'title' => 'test',
            'text' => $this->faker->text,
            'image' => UploadedFile::fake()->image('test.jpg')
        ])->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK UPDATE*/

    /*START CHECK DESTROY*/

    public function test_admin_can_delete_work()
    {
        $this->actAsAdmin();
        $work = $this->creatework();
        $this->delete(route('work.destroy', $work->id))->assertStatus(302)->assertRedirect(route('work.index'));
        $this->assertEquals(0, Work::all()->count());
    }

    public function test_user_can_not_delete_work()
    {
        $this->withoutExceptionHandling();
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $work = $this->creatework();
        $this->delete(route('work.destroy', $work->id))->assertStatus(302)->assertRedirect(route('login'));
        $this->assertEquals(1, Work::all()->count());
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

    private function createWork()
    {
        $data = $this->workData();
        unset($data['image']);
        return Work::query()->create($data);
    }

    private function workData()
    {
        return [
            'title' => $this->faker->title,
            'text' => $this->faker->text,
            'image' => UploadedFile::fake()->image('test.jpg')
        ];
    }
}
