<?php

namespace Tests\Feature\Admin;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /*START CHECK INDEX*/

    public function test_admin_can_see_post_index()
    {
        $this->actAsAdmin();
        $this->get(route('post.index'))->assertOk();
    }

    public function test_user_can_not_see_post_index()
    {
        $this->get(route('post.index'))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK INDEX*/

    /*START CHECK CREATE*/

    public function test_admin_can_see_create_post()
    {
        $this->actAsAdmin();
        $this->get(route('post.create'))->assertOk();
    }

    public function test_user_can_not_see_create_post()
    {
        $this->get(route('post.create'))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK CREATE*/

    /*START CHECK STORE*/

    public function test_admin_can_store_post()
    {
        $this->actAsAdmin();
        Storage::fake('local');
        $response = $this->post(route('post.store'), $this->postData());
        $response->assertStatus(302);
        $response->assertRedirect(route('post.create'));
        $this->assertEquals(1, Post::all()->count());
    }

    public function test_user_can_not_store_post()
    {
        Storage::fake('local');
        $response = $this->post(route('post.store'), $this->postData());
        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
        $this->assertEquals(0, Post::all()->count());
    }

    /*END CHECK STORE*/

    /*START CHECK EDIT*/

    public function test_admin_can_see_edit_post()
    {
        $this->actAsAdmin();
        $post = $this->createPost();
        $this->get(route('post.edit', $post->id))->assertOk();
    }

    public function test_user_can_not_see_edit_post()
    {
        $post = $this->createPost();
        $this->get(route('post.edit', $post->id))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK EDIT*/

    /*START CHECK UPDATE*/

    public function test_admin_can_update_post()
    {
        $this->actAsAdmin();
        $post = $this->createPost();
        $this->patch(route('post.update', $post->id), [
            'name' => 'test',
            'slug' => 'slug-test',
            'post_category_id' => $post->category->id,
            'image' => UploadedFile::fake()->image('test.jpg'),
            'text' => 'this is a test'
        ])->assertStatus(302)->assertRedirect(route('post.edit', $post->id));
        $post = $post->fresh();
        $this->assertEquals('test', $post->name);
    }

    public function test_user_can_not_update_post()
    {
        $post = $this->createPost();
        $this->patch(route('post.update', $post->id), [
            'name' => 'test',
            'slug' => 'slug-test',
            'post_category_id' => $post->category->id,
            'image' => UploadedFile::fake()->image('test.jpg'),
            'text' => 'this is a test'
        ])->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK UPDATE*/

    /*START CHECK DESTROY*/

    public function test_admin_can_delete_post()
    {
        $this->actAsAdmin();
        $post = $this->createPost();
        $this->delete(route('post.destroy', $post->id))->assertStatus(302)->assertRedirect(route('post.index'));
        $this->assertEquals(0, Post::all()->count());
    }

    public function test_user_can_not_delete_post()
    {
        $this->withoutExceptionHandling();
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $post = $this->createPost();
        $this->delete(route('post.destroy', $post->id))->assertStatus(302)->assertRedirect(route('login'));
        $this->assertEquals(1, Post::all()->count());
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

    private function createPost()
    {
        $data = $this->postData();
        unset($data['image']);
        return Post::query()->create($data);
    }

    private function createPostCategory()
    {
        $data = [
            'name' => $this->faker->name,
            'slug' => $this->faker->slug,
            'image' => UploadedFile::fake()->image('test.jpg')
        ];
        unset($data['image']);
        return PostCategory::query()->create($data);
    }

    private function postData()
    {
        $PostCategory = $this->createPostCategory();
        return [
            'name' => $this->faker->name,
            'slug' => $this->faker->slug,
            'post_category_id' => $PostCategory->id,
            'image' => UploadedFile::fake()->image('test.jpg'),
            'text' => $this->faker->text
        ];
    }
}
