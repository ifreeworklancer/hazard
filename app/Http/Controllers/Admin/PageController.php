<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $pages = Page::all();

        return \view('admin.pages.index', compact('pages'));
    }

    /**
     * @param Page $page
     * @return View
     */
    public function edit(Page $page): View
    {
        return \view('admin.pages.edit', ['page' => $page ]);
    }

    /**
     * @param Request $request
     * @param Page $page
     * @return RedirectResponse
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\InvalidBase64Data
     */
    public function update(Request $request, Page $page): RedirectResponse
    {
        $page->update($request->only('body', 'title'));

        if ($request->has('files')) {
            foreach ($request->input('files') as $file) {
                $page->addMediaFromBase64($file)
                    ->toMediaCollection('pages');
            }
        }

        return \redirect()->route('admin.pages.index');
    }


}
