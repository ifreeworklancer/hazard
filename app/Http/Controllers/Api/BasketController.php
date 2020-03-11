<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BasketResource;
use App\Models\Basket;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $basket = Basket::where('user_id', User::current())->whereNull('order_id')->get();

        return response()->json([
            'items' => BasketResource::collection($basket)
        ]);
    }

    public function add(Request $request, Product $product): JsonResponse
    {
        $basket = Basket::where([
            'user_id' => User::current(),
            'product_id' => $product->id,
            'size' => $request->input('size')
        ])->whereNull('order_id')->first();

        if (!$basket) {
            Basket::create([
                'user_id' => User::current(),
                'size' => $request->input('size'),
                'quantity' => $request->input('quantity'),
                'product_id' => $product->id,
                'price' => $product->price
            ]);
        } else {
            $basket->update([
                'quantity' => $basket->quantity + $request->input('quantity'),
            ]);
        }

        return $this->index();
    }

    public function update(Request $request, Basket $basket): JsonResponse
    {
        $basket->update($request->only('quantity', 'size'));

        return $this->index();
    }

    /**
     * @param Basket $basket
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Basket $basket): JsonResponse
    {
        $basket->delete();

        return $this->index();
    }
}
