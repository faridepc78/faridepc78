<?php


namespace App\Http\View\Composers;

use App\Repositories\DashboardRepository;
use Illuminate\View\View;

class AdminHeaderComposer
{
    protected $dashboardRepository;

    public function __construct(DashboardRepository $dashboardRepository)
    {
        $this->dashboardRepository = $dashboardRepository;
    }

    public function compose(View $view)
    {
        $countAllPendingPostComment = $this->dashboardRepository->countAllPendingPostComment();
        $countAllPendingContact = $this->dashboardRepository->countAllPendingContact();

        $view->with([
            'countAllPendingPostComment' => $countAllPendingPostComment,
            'countAllPendingContact' => $countAllPendingContact
        ]);
    }
}
