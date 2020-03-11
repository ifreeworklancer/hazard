<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;


class ProductsController extends Controller
{
    public function show(Category $category, Product $product): JsonResponse
    {

        return response()->json([
            'items' => new ProductResource($product),
        ]);

    }

}
