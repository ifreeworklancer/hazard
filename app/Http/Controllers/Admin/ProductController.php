<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Spatie\MediaLibrary\Models\Media;

class ProductController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $products = Product::query()->paginate(10);

        return \view('admin.products.index', compact('products'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function create()
    {
        return view('admin.products.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $product = Product::create([
           'size' => $request->input('size', []),
           'title' => $request->input('title'),
           'price' => $request->input('price'),
           'category_id' => $request->input('category_id'),
           'material' => $request->input('material'),
           'description' =>$request->input('description'),
        ]);

        $this->handleMedia($request, $product);

        return \redirect()->route('admin.products.index');
    }

    /**
     * @param Product $product
     * @return View
     */
    public function edit(Product $product): View
    {
        return \view('admin.products.edit', [
            'product' => $product,
            'categories' => Category::get(),
        ]);
    }


    public function update(Request $request, Product $product)
    {
        $product->update([
            'title' => $request->input('title'),
            'material' => $request->input('material'),
            'size' => $request->input('size'),
            'price' => $request->input('price'),
            'description' =>$request->input('description'),
        ]);
        $this->handleMedia($request, $product);

        return \redirect()->route('admin.products.index');

    }

    /**
     * @param Product $product
     * @return View
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->clearMediaCollection('product');
        $product->delete();
        return $this->index();
    }

    private function handleMedia(Request $request, Product $product): void
    {
        if ($request->filled('media')) {
            foreach ($request->input('media') as $media) {
                Media::find($media)->update([
                    'model_type' => Product::class,
                    'model_id' => $product->id,
                ]);
            }
        }
    }
}
