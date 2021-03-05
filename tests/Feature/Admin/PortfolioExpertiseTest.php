<?php

namespace Tests\Feature\Admin;

use App\Models\Expertise;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\PortfolioExpertise;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class PortfolioExpertiseTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /*START CHECK INDEX*/

    public function test_admin_can_see_portfolio_expertise_index()
    {
        $this->actAsAdmin();
        $portfolio = $this->createPortfolio();
        $this->get(route('portfolio.expertise.index', $portfolio->id))->assertOk();
    }

    public function test_user_can_not_see_portfolio_expertise_index()
    {
        $portfolio = $this->createPortfolio();
        $this->get(route('portfolio.expertise.index', $portfolio->id))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK INDEX*/

    /*START CHECK STORE*/

    public function test_admin_can_store_portfolio_expertise()
    {
        $this->actAsAdmin();
        $data = $this->portfolioExpertiseData();
        $portfolio_id = $data['portfolio_id'];
        $response = $this->post(route('portfolio.expertise.store', $portfolio_id), $data);
        $response->assertStatus(302);
        $response->assertRedirect(route('portfolio.expertise.index', $portfolio_id));
        $this->assertEquals(2, PortfolioExpertise::all()->count());
    }

    public function test_user_can_not_store_portfolio_expertise()
    {
        $data = $this->portfolioExpertiseData();
        $portfolio_id = $data['portfolio_id'];
        $response = $this->post(route('portfolio.expertise.store', $portfolio_id), $data);
        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
        $this->assertEquals(0, PortfolioExpertise::all()->count());
    }

    /*END CHECK STORE*/

    /*START CHECK DESTROY*/

    public function test_admin_can_delete_portfolio_expertise()
    {
        $this->withoutExceptionHandling();
        $this->actAsAdmin();
        $PortfolioExpertise = $this->createPortfolioExpertise();
        //dd($PortfolioExpertise);
        $this->delete(route('portfolio.expertise.destroy', [$PortfolioExpertise->portfolio_id, $PortfolioExpertise->id]))
            ->assertStatus(302)
            ->assertRedirect(route('portfolio.expertise.index', $PortfolioExpertise->portfolio_id));
        $this->assertEquals(0, PortfolioExpertise::all()->count());
    }

    public function test_user_can_not_portfolio_expertise()
    {
        $this->withoutExceptionHandling();
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $PortfolioExpertise = $this->createPortfolioExpertise();
        $this->delete(route('portfolio.expertise.destroy',
            [$PortfolioExpertise->portfolio_id, $PortfolioExpertise->id]))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
        $this->assertEquals(1, PortfolioExpertise::all()->count());
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

    private function createExpertise()
    {
        $data = [
            'name' => $this->faker->name,
            'slug' => $this->faker->slug,
            'image' => UploadedFile::fake()->image('test.jpg'),
            'text' => $this->faker->text
        ];
        unset($data['image']);
        return Expertise::query()->create($data);
    }

    private function portfolioExpertiseData()
    {
        $portfolio = $this->createPortfolio();
        $expertise1 = $this->createExpertise();
        $expertise2 = $this->createExpertise();
        return [
            'portfolio_id' => $portfolio->id,
            'expertise_id' => [$expertise1->id, $expertise2->id]
        ];
    }

    private function createPortfolioExpertise()
    {
        $portfolio = $this->createPortfolio();
        $expertise = $this->createExpertise();
        $data = [
            'portfolio_id' => $portfolio->id,
            'expertise_id' => $expertise->id
        ];
        return PortfolioExpertise::query()->create($data);
    }
}
