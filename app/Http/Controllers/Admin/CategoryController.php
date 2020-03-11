<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $categories = Category::query()->paginate(10);
        return \view('admin.categories.index', compact('categories'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return \view('admin.categories.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response|View
     */
    public function store(Request $request)
    {
        Category::create([
            'title' => $request->get('title'),
            'order' => $request->input('order')
        ]);

        return $this->index();
    }

    /**
     * @param Category $category
     * @return View
     */
    public function show(Category $category): View
    {
        return \view('admin.categories.show', compact('category'));
    }

    /**
     * @param Category $category
     * @return View
     */
    public function edit(Category $category): View
    {
        return \view('admin.categories.edit', ['category' => $category]);
    }

    public function update(Request $request, Category $category)
    {
        $category->update($request->only(['title', 'order']));
        return $this->index();
    }

    /**
     * @param Category $category
     * @return \Illuminate\Http\Response|View
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return $this->index();
    }
}
