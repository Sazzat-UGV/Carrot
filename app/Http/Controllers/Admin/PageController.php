<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageUpdateRequest;
use App\Models\Page;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::latest('id')->get();
        return view('admin.pages.setting.page.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.setting.page.create');
    }

    public function store(PageUpdateRequest $request)
    {
        Page::create([
            'page_position' => $request->page_position,
            'page_name' => $request->page_name,
            'page_slug' => Str::slug($request->page_name),
            'page_title' => $request->page_title,
            'page_description' => $request->page_description,
        ]);
        Toastr::success('Page created successfully!');
        return redirect()->route('page.index');
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view('admin.pages.setting.page.edit', compact('page'));
    }

    public function update(PageUpdateRequest $request, $id)
    {
        $page = Page::findOrFail($id);
        $page->update([
            'page_position' => $request->page_position,
            'page_name' => $request->page_name,
            'page_slug' => Str::slug($request->page_name),
            'page_title' => $request->page_title,
            'page_description' => $request->page_description,
        ]);
        Toastr::success('Page updated successfully!');
        return redirect()->route('page.index');
    }

    public function delete($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();
        Toastr::success('Page deleted successfully!');
        return redirect()->route('page.index');
    }
}
