<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\PageResource;
use App\Models\Page;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{

    public function shipping (): JsonResponse
    {
        $shipping = Page::whereSlug('shipping')->first();;

        return response()->json([
            'page' => new PageResource($shipping)
        ]);
    }

    public function contact (): JsonResponse
    {
        $contact = Page::whereSlug('contact')->first();;

        return response()->json([
            'page' => new PageResource($contact)
        ]);
    }

    public function privacy (): JsonResponse
    {
        $privacy = Page::whereSlug('privacy-policy')->first();;

        return response()->json([
            'page' => new PageResource($privacy)
        ]);
    }

    public function quality (): JsonResponse
    {
        $quality = Page::whereSlug('quality')->first();;

        return response()->json([
            'page' => new PageResource($quality)
        ]);
    }

}
