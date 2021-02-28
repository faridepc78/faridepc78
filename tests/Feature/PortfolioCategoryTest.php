<?php

namespace Tests\Feature;

use App\Models\PortfolioCategory;
use App\Models\User;
use App\Models\portfolio_category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class PortfolioCategoryTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /*START CHECK INDEX*/

    public function test_admin_can_see_portfolio_category_index()
    {
        $this->actAsAdmin();
        $this->get(route('portfolio_category.index'))->assertOk();
    }

    public function test_user_can_not_see_portfolio_category_index()
    {
        $this->get(route('portfolio_category.index'))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK INDEX*/

    /*START CHECK CREATE*/

    public function test_admin_can_see_create_portfolio_category()
    {
        $this->actAsAdmin();
        $this->get(route('portfolio_category.create'))->assertOk();
    }

    public function test_user_can_not_see_create_portfolio_category()
    {
        $this->get(route('portfolio_category.create'))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK CREATE*/

    /*START CHECK STORE*/

    public function test_admin_can_store_portfolio_category()
    {
        $this->actAsAdmin();
        $response = $this->post(route('portfolio_category.store'), $this->portfolioCategoryData());
        $response->assertStatus(302);
        $response->assertRedirect(route('portfolio_category.create'));
        $this->assertEquals(1, PortfolioCategory::all()->count());
    }

    public function test_user_can_not_store_portfolio_category()
    {
        $response = $this->post(route('portfolio_category.store'), $this->portfolioCategoryData());
        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
        $this->assertEquals(0, PortfolioCategory::all()->count());
    }

    /*END CHECK STORE*/

    /*START CHECK EDIT*/

    public function test_admin_can_see_edit_portfolio_category()
    {
        $this->actAsAdmin();
        $portfolio_category = $this->createPortfolioCategory();
        $this->get(route('portfolio_category.edit', $portfolio_category->id))->assertOk();
    }

    public function test_user_can_not_see_edit_portfolio_category()
    {
        $portfolio_category = $this->createPortfolioCategory();
        $this->get(route('portfolio_category.edit', $portfolio_category->id))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK EDIT*/

    /*START CHECK UPDATE*/

    public function test_admin_can_update_portfolio_category()
    {
        $this->actAsAdmin();
        $portfolio_category = $this->createPortfolioCategory();
        $this->patch(route('portfolio_category.update', $portfolio_category->id), [
            'name' => 'test',
            'slug' => 'test-slug'
        ])->assertStatus(302)->assertRedirect(route('portfolio_category.edit', $portfolio_category->id));
        $portfolio_category = $portfolio_category->fresh();
        $this->assertEquals('test', $portfolio_category->name);
    }

    public function test_user_can_not_update_portfolio_category()
    {
        $portfolio_category = $this->createPortfolioCategory();
        $this->patch(route('portfolio_category.update', $portfolio_category->id), [
            'name' => 'test',
            'slug' => 'test-slug'
        ])->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK UPDATE*/

    /*START CHECK DESTROY*/

    public function test_admin_can_delete_portfolio_category()
    {
        $this->actAsAdmin();
        $portfolio_category = $this->createPortfolioCategory();
        $this->delete(route('portfolio_category.destroy', $portfolio_category->id))->assertStatus(302)->assertRedirect(route('portfolio_category.index'));
        $this->assertEquals(0, PortfolioCategory::all()->count());
    }

    public function test_user_can_not_delete_portfolio_category()
    {
        $this->withoutExceptionHandling();
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $portfolio_category = $this->createPortfolioCategory();
        $this->delete(route('portfolio_category.destroy', $portfolio_category->id))->assertStatus(302)->assertRedirect(route('login'));
        $this->assertEquals(1, PortfolioCategory::all()->count());
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

    private function createPortfolioCategory()
    {
        $data = $this->portfolioCategoryData();
        return PortfolioCategory::query()->create($data);
    }

    private function portfolioCategoryData()
    {
        return [
            'name' => $this->faker->name,
            'slug' => $this->faker->slug
        ];
    }
}
