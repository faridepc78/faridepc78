<?php

namespace App\Repositories;

use App\Models\Expertise;
use App\Models\Portfolio;
use App\Models\Post;
use App\Models\Resume;

class DashboardRepository
{
    public function countExpertise(): int
    {
        return Expertise::query()->count();
    }

    public function countPortfolio(): int
    {
        return Portfolio::query()->count();
    }

    public function countPost(): int
    {
        return Post::query()->count();
    }

    public function countResume(): int
    {
        return Resume::query()->count();
    }
}
