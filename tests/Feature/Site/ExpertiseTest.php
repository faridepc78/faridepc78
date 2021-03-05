<?php

namespace Tests\Feature\Site;

use App\Models\Expertise;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ExpertiseTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_admin_can_see_expertise_page()
    {
        $this->withoutExceptionHandling();
        $this->actAsAdmin();
        $this->expectException('Facade\Ignition\Exceptions\ViewException');
        $this->get(route('expertise'))->assertOk();
    }

    public function test_user_can_see_expertise_page()
    {
        $this->withoutExceptionHandling();
        $this->expectException('Facade\Ignition\Exceptions\ViewException');
        $this->get(route('expertise'))->assertOk();
    }

    public function test_admin_can_see_single_expertise_page()
    {
        $this->withoutExceptionHandling();
        $this->actAsAdmin();
        $expertise = $this->createExpertise();
        $this->expectException('Facade\Ignition\Exceptions\ViewException');
        $this->get(route('singleExpertise', $expertise->id . '-' . $expertise->slug))->assertOk();
    }

    public function test_user_can_see_single_expertise_page()
    {
        $this->withoutExceptionHandling();
        $expertise = $this->createExpertise();
        $this->expectException('Facade\Ignition\Exceptions\ViewException');
        $this->get(route('singleExpertise', $expertise->id . '-' . $expertise->slug))->assertOk();
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

    private function createExpertise()
    {
        $data = $this->expertiseData();
        unset($data['image']);
        return Expertise::query()->create($data);
    }

    private function expertiseData()
    {
        return [
            'name' => $this->faker->name,
            'slug' => $this->faker->slug,
            'image' => UploadedFile::fake()->image('test.jpg'),
            'text' => $this->faker->text
        ];
    }
}
