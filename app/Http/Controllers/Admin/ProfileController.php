<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Profile\UpdateProfileRequest;
use App\Repositories\UserRepository;
use App\Services\Media\MediaFileService;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->middleware('auth:web');
    }

    public function index()
    {
        return view('admin.profile.management');
    }

    public function update(UpdateProfileRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $user = $this->userRepository->findById($id);

                if ($request->hasFile('image')) {
                    $this->userRepository->update($request,null, $id);
                    $image_id = MediaFileService::publicUpload($request->file('image'))->id;
                    $this->userRepository->addImage($image_id, $user->id);
                    if ($user->image) {
                        $user->image->delete();
                    }
                } else {
                    $this->userRepository->update($request,$user->image_id, $id);
                }

                if (!empty($request->input('password'))){
                    Auth::logout();
                }
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('profile');
    }
}
