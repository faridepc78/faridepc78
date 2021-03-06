<?php

namespace Tests\Feature\Site;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostComment;
use App\Models\PostLike;
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
        $this->actAsAdmin();
        $this->get(route('posts'))->assertOk();
    }

    public function test_user_can_see_posts_page()
    {
        $this->get(route('posts'))->assertOk();
    }

    public function test_admin_can_see_search_posts_page()
    {
        $this->actAsAdmin();
        $this->get(route('posts.search', ['keyword' => 'test']))->assertOk();
    }

    public function test_user_can_see_search_posts_page()
    {
        $this->get(route('posts.search', ['keyword' => 'test']))->assertOk();
    }

    public function test_admin_can_see_filter_posts_page()
    {
        $this->actAsAdmin();
        $post = $this->createPost();
        $this->get(route('filterPosts', $post->id . '-' . $post->slug))->assertOk();
    }

    public function test_user_can_see_filter_posts_page()
    {
        $post = $this->createPost();
        $this->get(route('filterPosts', $post->id . '-' . $post->slug))->assertOk();
    }

    public function test_admin_can_see_single_post_page()
    {
        $this->actAsAdmin();
        $post = $this->createPost();
        $this->get(route('singlePost', $post->id . '-' . $post->slug))->assertOk();
    }

    public function test_user_can_see_single_post_page()
    {
        $post = $this->createPost();
        $this->get(route('singlePost', $post->id . '-' . $post->slug))->assertOk();
    }

    public function test_admin_can_like_post()
    {
        $this->actAsAdmin();
        $post = $this->createPost();

        $response = $this->post(route('likePost', $post->id));
        $response->assertStatus(200);
        $this->assertEquals(1, PostLike::all()->count());

        $response = $this->post(route('likePost', $post->id));
        $response->assertStatus(200);
        $this->assertEquals(0, PostLike::all()->count());

        $response = $this->post(route('likePost', $post->id));
        $response->assertStatus(200);
        $this->assertEquals(1, PostLike::all()->count());

        $response = $this->post(route('likePost', $post->id));
        $response->assertStatus(200);
        $this->assertEquals(0, PostLike::all()->count());

        $response = $this->post(route('likePost', $post->id));
        $response->assertStatus(200);
        $this->assertEquals(1, PostLike::all()->count());

        $response = $this->post(route('likePost', $post->id));
        $response->assertStatus(429);
    }

    public function test_user_can_like_post()
    {
        $post = $this->createPost();

        $response = $this->post(route('likePost', $post->id));
        $response->assertStatus(200);
        $this->assertEquals(1, PostLike::all()->count());

        $response = $this->post(route('likePost', $post->id));
        $response->assertStatus(200);
        $this->assertEquals(0, PostLike::all()->count());

        $response = $this->post(route('likePost', $post->id));
        $response->assertStatus(200);
        $this->assertEquals(1, PostLike::all()->count());

        $response = $this->post(route('likePost', $post->id));
        $response->assertStatus(200);
        $this->assertEquals(0, PostLike::all()->count());

        $response = $this->post(route('likePost', $post->id));
        $response->assertStatus(200);
        $this->assertEquals(1, PostLike::all()->count());

        $response = $this->post(route('likePost', $post->id));
        $response->assertStatus(429);
    }

    public function test_admin_can_dislike_post()
    {
        $this->actAsAdmin();
        $post = $this->createPost();

        $response = $this->post(route('dislikePost', $post->id));
        $response->assertStatus(200);
        $this->assertEquals(0, PostLike::all()->count());

        $response = $this->post(route('dislikePost', $post->id));
        $response->assertStatus(200);
        $this->assertEquals(0, PostLike::all()->count());

        $response = $this->post(route('dislikePost', $post->id));
        $response->assertStatus(200);
        $this->assertEquals(0, PostLike::all()->count());

        $response = $this->post(route('dislikePost', $post->id));
        $response->assertStatus(200);
        $this->assertEquals(0, PostLike::all()->count());

        $response = $this->post(route('dislikePost', $post->id));
        $response->assertStatus(200);
        $this->assertEquals(0, PostLike::all()->count());

        $response = $this->post(route('dislikePost', $post->id));
        $response->assertStatus(429);
    }

    public function test_user_can_dislike_post()
    {
        $post = $this->createPost();

        $response = $this->post(route('dislikePost', $post->id));
        $response->assertStatus(200);
        $this->assertEquals(0, PostLike::all()->count());

        $response = $this->post(route('dislikePost', $post->id));
        $response->assertStatus(200);
        $this->assertEquals(0, PostLike::all()->count());

        $response = $this->post(route('dislikePost', $post->id));
        $response->assertStatus(200);
        $this->assertEquals(0, PostLike::all()->count());

        $response = $this->post(route('dislikePost', $post->id));
        $response->assertStatus(200);
        $this->assertEquals(0, PostLike::all()->count());

        $response = $this->post(route('dislikePost', $post->id));
        $response->assertStatus(200);
        $this->assertEquals(0, PostLike::all()->count());

        $response = $this->post(route('dislikePost', $post->id));
        $response->assertStatus(429);
    }

    public function test_admin_can_store_comment()
    {
        $this->actAsAdmin();
        $post = $this->createPost();

        $response = $this->post(route('storeCommentPost', $post->id), [
            'post_id' => $post->id,
            'text' => $this->faker->text,
            'recaptcha_token' => make_token(100)
        ]);
        $response->assertStatus(200);
        $this->assertEquals(1, PostComment::all()->count());

        $response = $this->post(route('storeCommentPost', $post->id), [
            'post_id' => $post->id,
            'text' => $this->faker->text,
            'recaptcha_token' => make_token(100)
        ]);
        $response->assertStatus(200);
        $this->assertEquals(2, PostComment::all()->count());

        $response = $this->post(route('storeCommentPost', $post->id), [
            'post_id' => $post->id,
            'text' => $this->faker->text,
            'recaptcha_token' => make_token(100)
        ]);
        $response->assertStatus(200);
        $this->assertEquals(3, PostComment::all()->count());

        $response = $this->post(route('storeCommentPost', $post->id), [
            'post_id' => $post->id,
            'text' => $this->faker->text,
            'recaptcha_token' => make_token(100)
        ]);
        $response->assertStatus(200);
        $this->assertEquals(4, PostComment::all()->count());

        $response = $this->post(route('storeCommentPost', $post->id), [
            'post_id' => $post->id,
            'text' => $this->faker->text,
            'recaptcha_token' => make_token(100)
        ]);
        $response->assertStatus(200);
        $this->assertEquals(5, PostComment::all()->count());

        $response = $this->post(route('storeCommentPost', $post->id), [
            'post_id' => $post->id,
            'text' => $this->faker->text,
            'recaptcha_token' => make_token(100)
        ]);
        $response->assertStatus(429);
    }

    public function test_user_can_store_comment()
    {
        $post = $this->createPost();

        $response = $this->post(route('storeCommentPost', $post->id), [
            'post_id' => $post->id,
            'user_name' => $this->faker->name,
            'user_email' => $this->faker->email,
            'text' => $this->faker->text,
            'recaptcha_token' => make_token(100)
        ]);
        $response->assertStatus(200);
        $this->assertEquals(1, PostComment::all()->count());

        $response = $this->post(route('storeCommentPost', $post->id), [
            'post_id' => $post->id,
            'user_name' => $this->faker->name,
            'user_email' => $this->faker->email,
            'text' => $this->faker->text,
            'recaptcha_token' => make_token(100)
        ]);
        $response->assertStatus(200);
        $this->assertEquals(2, PostComment::all()->count());

        $response = $this->post(route('storeCommentPost', $post->id), [
            'post_id' => $post->id,
            'user_name' => $this->faker->name,
            'user_email' => $this->faker->email,
            'text' => $this->faker->text,
            'recaptcha_token' => make_token(100)
        ]);
        $response->assertStatus(200);
        $this->assertEquals(3, PostComment::all()->count());

        $response = $this->post(route('storeCommentPost', $post->id), [
            'post_id' => $post->id,
            'user_name' => $this->faker->name,
            'user_email' => $this->faker->email,
            'text' => $this->faker->text,
            'recaptcha_token' => make_token(100)
        ]);
        $response->assertStatus(200);
        $this->assertEquals(4, PostComment::all()->count());

        $response = $this->post(route('storeCommentPost', $post->id), [
            'post_id' => $post->id,
            'user_name' => $this->faker->name,
            'user_email' => $this->faker->email,
            'text' => $this->faker->text,
            'recaptcha_token' => make_token(100)
        ]);
        $response->assertStatus(200);
        $this->assertEquals(5, PostComment::all()->count());

        $response = $this->post(route('storeCommentPost', $post->id), [
            'post_id' => $post->id,
            'user_name' => $this->faker->name,
            'user_email' => $this->faker->email,
            'text' => $this->faker->text,
            'recaptcha_token' => make_token(100)
        ]);
        $response->assertStatus(429);
    }

    public function test_admin_can_store_reply_comment()
    {
        $this->actAsAdmin();
        $post = $this->createPost();
        $postComment = $this->createPostComment();

        $response = $this->post(route('storeCommentPost', $postComment->id), [
            'post_id' => $post->id,
            'text' => $this->faker->text,
            'recaptcha_token' => make_token(100)
        ]);
        $response->assertStatus(200);
        $this->assertEquals(2, PostComment::all()->count());

        $response = $this->post(route('storeCommentPost', $postComment->id), [
            'post_id' => $post->id,
            'text' => $this->faker->text,
            'recaptcha_token' => make_token(100)
        ]);
        $response->assertStatus(200);
        $this->assertEquals(3, PostComment::all()->count());

        $response = $this->post(route('storeCommentPost', $postComment->id), [
            'post_id' => $post->id,
            'text' => $this->faker->text,
            'recaptcha_token' => make_token(100)
        ]);
        $response->assertStatus(200);
        $this->assertEquals(4, PostComment::all()->count());

        $response = $this->post(route('storeCommentPost', $postComment->id), [
            'post_id' => $post->id,
            'text' => $this->faker->text,
            'recaptcha_token' => make_token(100)
        ]);
        $response->assertStatus(200);
        $this->assertEquals(5, PostComment::all()->count());

        $response = $this->post(route('storeCommentPost', $postComment->id), [
            'post_id' => $post->id,
            'text' => $this->faker->text,
            'recaptcha_token' => make_token(100)
        ]);
        $response->assertStatus(200);
        $this->assertEquals(6, PostComment::all()->count());

        $response = $this->post(route('storeCommentPost', $postComment->id), [
            'post_id' => $post->id,
            'text' => $this->faker->text,
            'recaptcha_token' => make_token(100)
        ]);
        $response->assertStatus(429);
    }

    public function test_user_can_store_reply_comment()
    {
        $post = $this->createPost();
        $postComment = $this->createPostComment();

        $response = $this->post(route('storeCommentPost', $postComment->id), [
            'post_id' => $post->id,
            'user_name' => $this->faker->name,
            'user_email' => $this->faker->email,
            'text' => $this->faker->text,
            'recaptcha_token' => make_token(100)
        ]);
        $response->assertStatus(200);
        $this->assertEquals(2, PostComment::all()->count());

        $response = $this->post(route('storeCommentPost', $postComment->id), [
            'post_id' => $post->id,
            'user_name' => $this->faker->name,
            'user_email' => $this->faker->email,
            'text' => $this->faker->text,
            'recaptcha_token' => make_token(100)
        ]);
        $response->assertStatus(200);
        $this->assertEquals(3, PostComment::all()->count());

        $response = $this->post(route('storeCommentPost', $postComment->id), [
            'post_id' => $post->id,
            'user_name' => $this->faker->name,
            'user_email' => $this->faker->email,
            'text' => $this->faker->text,
            'recaptcha_token' => make_token(100)
        ]);
        $response->assertStatus(200);
        $this->assertEquals(4, PostComment::all()->count());

        $response = $this->post(route('storeCommentPost', $postComment->id), [
            'post_id' => $post->id,
            'user_name' => $this->faker->name,
            'user_email' => $this->faker->email,
            'text' => $this->faker->text,
            'recaptcha_token' => make_token(100)
        ]);
        $response->assertStatus(200);
        $this->assertEquals(5, PostComment::all()->count());

        $response = $this->post(route('storeCommentPost', $postComment->id), [
            'post_id' => $post->id,
            'user_name' => $this->faker->name,
            'user_email' => $this->faker->email,
            'text' => $this->faker->text,
            'recaptcha_token' => make_token(100)
        ]);
        $response->assertStatus(200);
        $this->assertEquals(6, PostComment::all()->count());

        $response = $this->post(route('storeCommentPost', $postComment->id), [
            'post_id' => $post->id,
            'user_name' => $this->faker->name,
            'user_email' => $this->faker->email,
            'text' => $this->faker->text,
            'recaptcha_token' => make_token(100)
        ]);
        $response->assertStatus(429);
    }

    private function createAdminData()
    {
        $this->actingAs(User::factory()->create());
    }

    private function actAsAdmin()
    {
        $this->createAdminData();
        auth()->check();
    }

    private function createPostComment()
    {
        $post = $this->createPost();
        $data = [
            'post_id' => $post->id,
            'parent_id' => null,
            'user_name' => $this->faker->name,
            'user_email' => $this->faker->email,
            'user_ip' => '127.0.0.1',
            'text' => $this->faker->text,
            'status' => PostComment::PENDING_STATUS,
            'users' => PostComment::COMMON_USER
        ];
        return PostComment::query()->create($data);
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

    private function postData(): array
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
