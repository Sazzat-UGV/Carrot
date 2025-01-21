<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::latest('id')->get();
        return view('backend.pages.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon'        => 'required|string|max:255',
            'title'       => 'required|string|max:255',
            'description' => 'required|string|max:500',
        ]);
        Service::create([
            'icon'        => $request->icon,
            'title'       => $request->title,
            'description' => $request->description,
        ]);
        return redirect()->route('admin.service.index')->with('success', "Service added successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service = Service::findOrFail($id);
        return view("backend.pages.service.edit", compact("service"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'icon'        => 'required|string|max:255',
            'title'       => 'required|string|max:255',
            'description' => 'required|string|max:500',
        ]);
        $service = Service::findOrFail($id);
        $service->update([
            'icon'        => $request->icon,
            'title'       => $request->title,
            'description' => $request->description,
        ]);
        return redirect()->route('admin.service.index')->with('success', "Service updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Service::findOrFail($id)->delete();
        return redirect()->route('admin.service.index')->with('success', "Service deleted successfully.");
    }

    public function changeStatus($id)
    {
        $service = Service::findOrFail($id);
        if ($service->status == 1) {
            $service->status = 0;
        } else {
            $service->status = 1;
        }
        $service->update();
        return response()->json([
            'type'    => 'success',
            'message' => 'Status Updated',
        ]);
    }
}
