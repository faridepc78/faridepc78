<?php

namespace App\Repositories;

use App\Models\Contact;
use App\Models\Expertise;
use App\Models\Portfolio;
use App\Models\Post;
use App\Models\PostComment;
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

    public function countPendingPostComment()
    {
        return PostComment::query()->where('status', '=', PostComment::PENDING_STATUS)->count();
    }

    public function countUnreadContact()
    {
        return Contact::query()->where('status','=',Contact::UNREAD_STATUS)->count();
    }
}
