<?php

namespace App\Http\Controllers\Backend;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::latest('id')->get();
        return view('backend.pages.faq.index', compact('faqs'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.faq.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string|max:2000',
        ]);
        $faq = Faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);
        return redirect()->route('admin.faq.index')->with('success', 'Faq added successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $faq = Faq::findOrFail($id);
        return view('backend.pages.faq.edit', compact('faq'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $faq = Faq::findOrFail($id);
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string|max:2000',
        ]);
        $faq->update([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);
        return redirect()->route('admin.faq.index')->with('success', 'Faq updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();
        return redirect()->route('admin.faq.index')->with('success', 'Faq deleted successfully.');
    }

}
