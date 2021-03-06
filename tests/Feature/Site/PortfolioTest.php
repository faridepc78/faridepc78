<?php

namespace Tests\Feature\Site;

use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class PortfolioTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_admin_can_see_works_page()
    {
        $this->actAsAdmin();
        $this->get(route('works'))->assertOk();
    }

    public function test_user_can_see_works_page()
    {
        $this->get(route('works'))->assertOk();
    }

    public function test_admin_can_see_filter_works_page()
    {
        $this->actAsAdmin();
        $portfolio = $this->createPortfolio();
        $this->get(route('filterWorks', $portfolio->id . '-' . $portfolio->slug))->assertOk();
    }

    public function test_user_can_see_filter_works_page()
    {
        $portfolio = $this->createPortfolio();
        $this->get(route('filterWorks', $portfolio->id . '-' . $portfolio->slug))->assertOk();
    }

    public function test_admin_can_see_single_work_page()
    {
        $this->actAsAdmin();
        $portfolio = $this->createPortfolio();
        $this->get(route('singleWork', $portfolio->id . '-' . $portfolio->slug))->assertOk();
    }

    public function test_user_can_see_single_work_page()
    {
        $portfolio = $this->createPortfolio();
        $this->get(route('singleWork', $portfolio->id . '-' . $portfolio->slug))->assertOk();
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
