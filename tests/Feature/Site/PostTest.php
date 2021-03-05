<?php

namespace Tests\Feature\Site;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_admin_can_see_posts_page()
    {
        $this->withoutExceptionHandling();
        $this->actAsAdmin();
        $this->expectException('Facade\Ignition\Exceptions\ViewException');
        $this->get(route('posts'))->assertOk();
    }

    public function test_user_can_see_posts_page()
    {
        $this->withoutExceptionHandling();
        $this->expectException('Facade\Ignition\Exceptions\ViewException');
        $this->get(route('posts'))->assertOk();
    }

    public function test_admin_can_see_search_posts_page()
    {
        $this->withoutExceptionHandling();
        $this->actAsAdmin();
        $this->expectException('Facade\Ignition\Exceptions\ViewException');
        $this->get(route('posts.search', ['keyword' => 'test']))->assertOk();
    }

    public function test_user_can_see_search_posts_page()
    {
        $this->withoutExceptionHandling();
        $this->expectException('Facade\Ignition\Exceptions\ViewException');
        $this->get(route('posts.search', ['keyword' => 'test']))->assertOk();
    }

    public function test_admin_can_see_filter_posts_page()
    {
        $this->withoutExceptionHandling();
        $this->actAsAdmin();
        $post = $this->createPost();
        $this->expectException('Facade\Ignition\Exceptions\ViewException');
        $this->get(route('filterPosts', $post->id . '-' . $post->slug))->assertOk();
    }

    public function test_user_can_see_filter_posts_page()
    {
        $this->withoutExceptionHandling();
        $post = $this->createPost();
        $this->expectException('Facade\Ignition\Exceptions\ViewException');
        $this->get(route('filterPosts', $post->id . '-' . $post->slug))->assertOk();
    }

    public function test_admin_can_see_single_post_page()
    {
        $this->withoutExceptionHandling();
        $this->actAsAdmin();
        $post = $this->createPost();
        $this->expectException('Facade\Ignition\Exceptions\ViewException');
        $this->get(route('singlePost', $post->id . '-' . $post->slug))->assertOk();
    }

    public function test_user_can_see_single_post_page()
    {
        $this->withoutExceptionHandling();
        $post = $this->createPost();
        $this->expectException('Facade\Ignition\Exceptions\ViewException');
        $this->get(route('singlePost', $post->id . '-' . $post->slug))->assertOk();
    }

    //todo write all of test for like && dislike

    //todo write all of test for comment && reply

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
