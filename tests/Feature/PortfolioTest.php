<?php

namespace Tests\Feature;

use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PortfolioTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /*START CHECK INDEX*/

    public function test_admin_can_see_portfolio_index()
    {
        $this->actAsAdmin();
        $this->get(route('portfolio.index'))->assertOk();
    }

    public function test_user_can_not_see_portfolio_index()
    {
        $this->get(route('portfolio.index'))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK INDEX*/

    /*START CHECK CREATE*/

    public function test_admin_can_see_create_portfolio()
    {
        $this->actAsAdmin();
        $this->get(route('portfolio.create'))->assertOk();
    }

    public function test_user_can_not_see_create_portfolio()
    {
        $this->get(route('portfolio.create'))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK CREATE*/

    /*START CHECK STORE*/

    public function test_admin_can_store_portfolio()
    {
        $this->actAsAdmin();
        Storage::fake('local');
        $response = $this->post(route('portfolio.store'), $this->portfolioData());
        $response->assertStatus(302);
        $response->assertRedirect(route('portfolio.create'));
        $this->assertEquals(1, Portfolio::all()->count());
    }

    public function test_user_can_not_store_portfolio()
    {
        Storage::fake('local');
        $response = $this->post(route('portfolio.store'), $this->portfolioData());
        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
        $this->assertEquals(0, Portfolio::all()->count());
    }

    /*END CHECK STORE*/

    /*START CHECK EDIT*/

    public function test_admin_can_see_edit_portfolio()
    {
        $this->actAsAdmin();
        $portfolio = $this->createPortfolio();
        $this->get(route('portfolio.edit', $portfolio->id))->assertOk();
    }

    public function test_user_can_not_see_edit_portfolio()
    {
        $portfolio = $this->createPortfolio();
        $this->get(route('portfolio.edit', $portfolio->id))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK EDIT*/

    /*START CHECK UPDATE*/

    public function test_admin_can_update_portfolio()
    {
        $this->actAsAdmin();
        $portfolio = $this->createPortfolio();
        $this->patch(route('portfolio.update', $portfolio->id), [
            'name' => 'test',
            'headline' => $this->faker->name,
            'slug' => $this->faker->slug,
            'portfolio_category_id' => $portfolio->category->id,
            'image' => UploadedFile::fake()->image('test.jpg'),
            'text' => $this->faker->text,
            'customer' => $this->faker->name,
            'start_date' => '1399-12-11',
            'end_date' => '1399-12-20'
        ])->assertStatus(302)->assertRedirect(route('portfolio.edit', $portfolio->id));
        $portfolio = $portfolio->fresh();
        $this->assertEquals('test', $portfolio->name);
    }

    public function test_user_can_not_update_portfolio()
    {
        $portfolio = $this->createportfolio();
        $this->patch(route('portfolio.update', $portfolio->id), [
            'name' => 'test',
            'headline' => $this->faker->name,
            'slug' => $this->faker->slug,
            'portfolio_category_id' => $portfolio->category->id,
            'image' => UploadedFile::fake()->image('test.jpg'),
            'text' => $this->faker->text,
            'customer' => $this->faker->name,
            'start_date' => '1399-12-11',
            'end_date' => '1399-12-20'
        ])->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK UPDATE*/

    /*START CHECK DESTROY*/

    public function test_admin_can_delete_portfolio()
    {
        $this->actAsAdmin();
        $portfolio = $this->createPortfolio();
        $this->delete(route('portfolio.destroy', $portfolio->id))->assertStatus(302)->assertRedirect(route('portfolio.index'));
        $this->assertEquals(0, Portfolio::all()->count());
    }

    public function test_user_can_not_delete_portfolio()
    {
        $this->withoutExceptionHandling();
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $portfolio = $this->createportfolio();
        $this->delete(route('portfolio.destroy', $portfolio->id))->assertStatus(302)->assertRedirect(route('login'));
        $this->assertEquals(1, Portfolio::all()->count());
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

    private function createPortfolio()
    {
        $data = $this->portfolioData();
        unset($data['image']);
        return Portfolio::query()->create($data);
    }

    private function createPortfolioCategory()
    {
        return PortfolioCategory::query()->create(
            [
                'name' => $this->faker->name,
                'slug' => $this->faker->slug
            ]
        );
    }

    private function portfolioData()
    {
        $PortfolioCategory = $this->createPortfolioCategory();
        return [
            'name' => $this->faker->name,
            'headline' => $this->faker->name,
            'slug' => $this->faker->slug,
            'portfolio_category_id' => $PortfolioCategory->id,
            'image' => UploadedFile::fake()->image('test.jpg'),
            'text' => $this->faker->text,
            'customer' => $this->faker->name,
            'start_date' => '1399-12-11',
            'end_date' => '1399-12-20'
        ];
    }
}
