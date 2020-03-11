<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\UploadResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MediaUpload;
use Illuminate\Http\JsonResponse;
use Spatie\MediaLibrary\Models\Media;


class MediaController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(Request $request)
    {
        $media = null;

        if ($request->hasFile('image')) {
            /** @var MediaUpload $media */
            $media = MediaUpload::create();
            $media->addMediaFromRequest('image')
                ->toMediaCollection('uploads');
        }

        return response()->json($media ? new UploadResource($media->getFirstMedia('uploads')) : null);
    }

    /**
     * @param Media $media
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Media $media)
    {
        $media->delete();
        return \response()->json([]);
    }
}
