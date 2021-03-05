<?php

namespace Tests\Feature\Admin;

use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\PortfolioSlider;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PortfolioSliderTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /*START CHECK INDEX*/

    public function test_admin_can_see_portfolio_slider_index()
    {
        $this->actAsAdmin();
        $portfolio = $this->createPortfolio();
        $this->get(route('portfolio.slider.index', $portfolio->id))->assertOk();
    }

    public function test_user_can_not_see_portfolio_slider_index()
    {
        $portfolio = $this->createPortfolio();
        $this->get(route('portfolio.slider.index', $portfolio->id))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK INDEX*/

    /*START CHECK STORE*/

    public function test_admin_can_store_portfolio_slider()
    {
        $this->actAsAdmin();
        Storage::fake('local');
        $data = $this->portfolioSliderData();
        $portfolio_id = $data['portfolio_id'];
        $response = $this->post(route('portfolio.slider.store', $portfolio_id), $data);
        $response->assertStatus(302);
        $response->assertRedirect(route('portfolio.slider.index', $portfolio_id));
        $this->assertEquals(1, PortfolioSlider::all()->count());
    }

    public function test_user_can_not_store_portfolio_slider()
    {
        Storage::fake('local');
        $data = $this->portfolioSliderData();
        $portfolio_id = $data['portfolio_id'];
        $response = $this->post(route('portfolio.slider.store', $portfolio_id), $data);
        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
        $this->assertEquals(0, PortfolioSlider::all()->count());
    }

    /*END CHECK STORE*/

    /*START CHECK DESTROY*/

    public function test_admin_can_delete_portfolio_slider()
    {
        $this->actAsAdmin();
        $portfolioSlider = $this->createPortfolioSlider();
        $this->delete(route('portfolio.slider.destroy', [$portfolioSlider->portfolio_id, $portfolioSlider->id]))
            ->assertStatus(302)
            ->assertRedirect(route('portfolio.slider.index', $portfolioSlider->portfolio_id));
        $this->assertEquals(0, PortfolioSlider::all()->count());
    }

    public function test_user_can_not_portfolio_slider()
    {
        $this->withoutExceptionHandling();
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $portfolioSlider = $this->createPortfolioSlider();
        $this->delete(route('portfolio.slider.destroy',
            [$portfolioSlider->portfolio_id, $portfolioSlider->id]))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
        $this->assertEquals(1, PortfolioSlider::all()->count());
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
        $PortfolioCategory = $this->createPortfolioCategory();
        return Portfolio::query()->create(
            [
                'name' => $this->faker->name,
                'headline' => $this->faker->name,
                'slug' => $this->faker->slug,
                'portfolio_category_id' => $PortfolioCategory->id,
                'image' => UploadedFile::fake()->image('test.jpg'),
                'text' => $this->faker->text,
                'customer' => $this->faker->name,
                'start_date' => '1399-12-11',
                'end_date' => '1399-12-20'
            ]
        );
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

    private function portfolioSliderData()
    {
        $portfolio = $this->createPortfolio();
        return [
            'portfolio_id' => $portfolio->id,
            'image' => UploadedFile::fake()->image('test.jpg')
        ];
    }

    private function createPortfolioSlider()
    {
        $data = $this->portfolioSliderData();
        unset($data['image']);
        return PortfolioSlider::query()->create($data);
    }
}
