<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactInfo\CreateContactInfoRequest;
use App\Http\Requests\Admin\ContactInfo\UpdateContactInfoRequest;
use App\Repositories\ContactInfoRepository;
use App\Services\Media\MediaFileService;
use Exception;
use Illuminate\Support\Facades\DB;

class ContactInfoController extends Controller
{
    private $contactInfoRepository;

    public function __construct(ContactInfoRepository $contactInfoRepository)
    {
        $this->contactInfoRepository = $contactInfoRepository;
    }

    public function index()
    {
        $contactInfo = $this->contactInfoRepository->paginate();
        return view('admin.contact_info.index',compact('contactInfo'));
    }

    public function create()
    {
        return view('admin.contact_info.create');
    }

    public function store(CreateContactInfoRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $contactInfo = $this->contactInfoRepository->store($request);
                $image_id = MediaFileService::publicUpload($request->file('image'))->id;
                $this->contactInfoRepository->addImage($image_id, $contactInfo->id);
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return back();
    }

    public function edit($id)
    {
        $contactInfo = $this->contactInfoRepository->findById($id);
        return view('admin.contact_info.edit', compact('contactInfo'));
    }

    public function update(UpdateContactInfoRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $contactInfo = $this->contactInfoRepository->findById($id);

                if ($request->hasFile('image')) {
                    $this->contactInfoRepository->update($request, null, $id);
                    $image_id = MediaFileService::publicUpload($request->file('image'))->id;
                    $this->contactInfoRepository->addImage($image_id, $contactInfo->id);
                    if ($contactInfo->image) {
                        $contactInfo->image->delete();
                    }
                } else {
                    $this->contactInfoRepository->update($request,$contactInfo->image_id, $id);
                }

            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return back();
    }

    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $contactInfo = $this->contactInfoRepository->findById($id);
                if ($contactInfo->image) {
                    $contactInfo->image->delete();
                }
                $contactInfo->delete();
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return back();
    }
}
