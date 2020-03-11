<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductsResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $categories = Category::orderBy('order')->get();
        $products = Product::where('category_id', optional($categories->first())->id)->get();

        return response()->json([
            'categories' => CategoryResource::collection($categories),
            'items' => ProductsResource::collection($products)
        ]);
    }

    public function show(Category $category): JsonResponse
    {
        $products = Product::where('category_id', $category->id)->get();

        return response()->json([
            'items' => ProductsResource::collection($products)
        ]);
    }

}
