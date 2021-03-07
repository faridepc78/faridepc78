<?php

namespace Tests\Feature\Admin;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostComment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class PostCommentTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /*START CHECK INDEX*/

    public function test_admin_can_see_postComment_index()
    {
        $this->actAsAdmin();
        $this->get(route('postComment.index'))->assertOk();
    }

    public function test_user_can_not_see_postComment_index()
    {
        $this->get(route('postComment.index'))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK INDEX*/

    /*START CHECK SHOW*/

    public function test_admin_can_see_postComment_show()
    {
        $this->actAsAdmin();
        $post = $this->createPost();
        $this->get(route('postComment.showComment', $post->id))->assertOk();
    }

    public function test_user_can_not_see_postComment_show()
    {
        $post = $this->createPost();
        $this->get(route('postComment.showComment', $post->id))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK SHOW*/

    /*START CHECK PENDING*/

    public function test_admin_can_see_postComment_pending()
    {
        $this->actAsAdmin();
        $post = $this->createPost();
        $this->get(route('postComment.pending', $post->id))->assertOk();
    }

    public function test_user_can_not_see_postComment_pending()
    {
        $post = $this->createPost();
        $this->get(route('postComment.pending', $post->id))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK PENDING*/

    /*START CHECK ACTIVE*/

    public function test_admin_can_see_postComment_active()
    {
        $this->actAsAdmin();
        $post = $this->createPost();
        $this->get(route('postComment.active', $post->id))->assertOk();
    }

    public function test_user_can_not_see_postComment_active()
    {
        $post = $this->createPost();
        $this->get(route('postComment.active', $post->id))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK ACTIVE*/

    /*START CHECK INACTIVE*/

    public function test_admin_can_see_postComment_inactive()
    {
        $this->actAsAdmin();
        $post = $this->createPost();
        $this->get(route('postComment.inactive', $post->id))->assertOk();
    }

    public function test_user_can_not_see_postComment_inactive()
    {
        $post = $this->createPost();
        $this->get(route('postComment.inactive', $post->id))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK INACTIVE*/

    /*START CHECK REPLY*/

    public function test_admin_can_see_postComment_reply()
    {
        $this->actAsAdmin();
        $postComment = $this->createPostComment();
        $this->get(route('postComment.reply', $postComment->id))->assertOk();
    }

    public function test_user_can_not_see_postComment_reply()
    {
        $postComment = $this->createPostComment();
        $this->get(route('postComment.reply', $postComment->id))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK REPLY*/

    /*START CHECK DESTROY*/

    public function test_admin_can_delete_postComment()
    {
        $this->actAsAdmin();
        $postComment = $this->createPostComment();
        $this->delete(route('postComment.destroy', [0, $postComment->id]))->assertStatus(302)
            ->assertRedirect(route('postComment.showComment', $postComment->post_id));
        $this->assertEquals(0, PostComment::all()->count());
    }

    public function test_user_can_not_delete_postComment()
    {
        $postComment = $this->createPostComment();
        $this->delete(route('postComment.destroy', [0, $postComment->id]))->assertStatus(302)->assertRedirect(route('login'));
        $this->assertEquals(1, PostComment::all()->count());
    }

    /*END CHECK DESTROY*/

    /*START CHECK UPDATE TO ACTIVE_STATUS*/

    public function test_admin_can_update_activeStatus_postComment()
    {
        $this->actAsAdmin();
        $postComment = $this->createPostComment();
        $this->patch(route('postComment.active_status', [0, $postComment->id]))
            ->assertStatus(302);
        $postComment = $postComment->fresh();
        $this->assertEquals(PostComment::ACTIVE_STATUS, $postComment->status);
    }

    public function test_user_can_not_update_activeStatus_postComment()
    {
        $postComment = $this->createPostComment();
        $this->patch(route('postComment.active_status', [0, $postComment->id]))
            ->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK UPDATE TO ACTIVE_STATUS*/

    /*START CHECK UPDATE TO INACTIVE_STATUS*/

    public function test_admin_can_update_inactiveStatus_postComment()
    {
        $this->actAsAdmin();
        $postComment = $this->createPostComment();
        $this->patch(route('postComment.inactive_status', [0, $postComment->id]))
            ->assertStatus(302);
        $postComment = $postComment->fresh();
        $this->assertEquals(PostComment::INACTIVE_STATUS, $postComment->status);
    }

    public function test_user_can_not_update_inactiveStatus_postComment()
    {
        $postComment = $this->createPostComment();
        $this->patch(route('postComment.inactive_status', [0, $postComment->id]))
            ->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK UPDATE TO INACTIVE_STATUS*/

    /*START CHECK ADMIN_COMMENT*/

    public function test_admin_can_AdminComment_postComment()
    {
        $this->actAsAdmin();
        $postComment = $this->createPostComment();
        $this->post(route('postComment.admin_comment', [$postComment->id]), [
            'text' => $this->faker->text
        ])->assertStatus(302);
        $this->assertEquals(2, PostComment::all()->count());
    }

    public function test_user_can_not_AdminComment_postComment()
    {
        $postComment = $this->createPostComment();
        $this->post(route('postComment.admin_comment', [$postComment->id]), [
            'text' => $this->faker->text
        ])->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK UPDATE TO ADMIN_COMMENT*/

    /*START CHECK ADMIN_REPLY_COMMENT*/

    public function test_admin_can_AdminReplyComment_postComment()
    {
        $this->actAsAdmin();
        $postComment = $this->createPostComment();
        $this->post(route('postComment.admin_reply', [0, $postComment->id]), [
            'post_comment_id' => $postComment->id,
            'text' => $this->faker->text
        ])->assertStatus(302);
        $this->assertEquals(2, PostComment::all()->count());
    }

    public function test_user_can_not_AdminReplyComment_postComment()
    {
        $postComment = $this->createPostComment();
        $this->post(route('postComment.admin_reply', [0, $postComment->id]), [
            'post_comment_id' => $postComment->id,
            'text' => $this->faker->text
        ])->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK UPDATE TO ADMIN_REPLY_COMMENT*/

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
}
