<?php

namespace Tests\Feature;

use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class PostCategoryTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /*START CHECK INDEX*/

    public function test_admin_can_see_post_category_index()
    {
        $this->actAsAdmin();
        $this->get(route('post_category.index'))->assertOk();
    }

    public function test_user_can_not_see_post_category_index()
    {
        $this->get(route('post_category.index'))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK INDEX*/

    /*START CHECK CREATE*/

    public function test_admin_can_see_create_post_category()
    {
        $this->actAsAdmin();
        $this->get(route('post_category.create'))->assertOk();
    }

    public function test_user_can_not_see_create_post_category()
    {
        $this->get(route('post_category.create'))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK CREATE*/

    /*START CHECK STORE*/

    public function test_admin_can_store_post_category()
    {
        $this->actAsAdmin();
        $response = $this->post(route('post_category.store'), $this->postCategoryData());
        $response->assertStatus(302);
        $response->assertRedirect(route('post_category.create'));
        $this->assertEquals(1, PostCategory::all()->count());
    }

    public function test_user_can_not_store_post_category()
    {
        $response = $this->post(route('post_category.store'), $this->postCategoryData());
        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
        $this->assertEquals(0, PostCategory::all()->count());
    }

    /*END CHECK STORE*/

    /*START CHECK EDIT*/

    public function test_admin_can_see_edit_post_category()
    {
        $this->actAsAdmin();
        $postCategory = $this->createPostCategory();
        $this->get(route('post_category.edit', $postCategory->id))->assertOk();
    }

    public function test_user_can_not_see_edit_post_category()
    {
        $postCategory = $this->createPostCategory();
        $this->get(route('post_category.edit', $postCategory->id))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK EDIT*/

    /*START CHECK UPDATE*/

    public function test_admin_can_update_post_category()
    {
        $this->actAsAdmin();
        $postCategory = $this->createPostCategory();
        $this->patch(route('post_category.update', $postCategory->id), [
            'name' => 'test',
            'slug' => 'test-slug',
            'image' => UploadedFile::fake()->image('test.jpg')
        ])->assertStatus(302)->assertRedirect(route('post_category.edit', $postCategory->id));
        $postCategory = $postCategory->fresh();
        $this->assertEquals('test', $postCategory->name);
    }

    public function test_user_can_not_update_post_category()
    {
        $postCategory = $this->createPostCategory();
        $this->patch(route('post_category.update', $postCategory->id), [
            'name' => 'test',
            'slug' => 'test-slug',
            'image' => UploadedFile::fake()->image('test.jpg')
        ])->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK UPDATE*/

    /*START CHECK DESTROY*/

    public function test_admin_can_delete_post_category()
    {
        $this->actAsAdmin();
        $postCategory = $this->createPostCategory();
        $this->delete(route('post_category.destroy', $postCategory->id))->assertStatus(302)->assertRedirect(route('post_category.index'));
        $this->assertEquals(0, postCategory::all()->count());
    }

    public function test_user_can_not_delete_post_category()
    {
        $this->withoutExceptionHandling();
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $postCategory = $this->createPostCategory();
        $this->delete(route('post_category.destroy', $postCategory->id))->assertStatus(302)->assertRedirect(route('login'));
        $this->assertEquals(1, postCategory::all()->count());
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

    private function createPostCategory()
    {
        $data = $this->postCategoryData();
        unset($data['image']);
        return PostCategory::query()->create($data);
    }

    private function postCategoryData()
    {
        return [
            'name' => $this->faker->name,
            'slug' => $this->faker->slug,
            'image' => UploadedFile::fake()->image('test.jpg')
        ];
    }
}
