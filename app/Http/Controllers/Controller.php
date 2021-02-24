<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /*public function store(CreateExpertiseRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $expertise = $this->expertiseRepository->store($request);
                $image_id = MediaFileService::publicUpload($request->file('image'))->id;
                $this->expertiseRepository->addImage($image_id, $expertise->id);
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return back();
    }

    public function update(UpdateExpertiseRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $expertise = $this->expertiseRepository->findById($id);

                if ($request->hasFile('image')) {
                    $this->expertiseRepository->update($request, null, $id);
                    $image_id = MediaFileService::publicUpload($request->file('image'))->id;
                    $this->expertiseRepository->addImage($image_id, $expertise->id);
                    if ($expertise->image) {
                        $expertise->image->delete();
                    }
                } else {
                    $this->expertiseRepository->update($request, $expertise->image_id, $id);
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

    public function addImage($image_id, $id)
    {
        return Expertise::query()->where('id', $id)->update([
            'image_id' => $image_id,
        ]);
    }*/
}
