<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promotions = Promotion::latest()->get();
        return view('admin.promotions.index', compact('promotions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.promotions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'=> 'required',
            'title'=> 'required',
            'description'=> 'required'
        ]);
        // image
        $image = $request->file('image');
        $ext = $image->getClientOriginalExtension();
        $filename = uniqid('promotion') . '.' . $ext; // Generate a unique filename
        $image->move(public_path('assets/img/promotions/'), $filename); // Save the file

        $promotion = Promotion::create([
            'image'=> $filename,
            'title'=> $request->title,
            'description'=> $request->description
        ]);
        return redirect()->route('admin.promotions.index')->with('success','New Promotion Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Promotion $promotion)
    {
        return view('admin.promotions.show', compact('promotion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promotion $promotion)
    {
        return view('admin.promotions.edit', compact('promotion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Promotion $promotion)
    {
        $request->validate([
            'title'=> 'required',
            'description'=> 'required'
        ]);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $filename = uniqid('promotion') . '.' . $ext;
            $image->move(public_path('assets/img/promotions/'), $filename);
            $promotion->update([
                'image'=> $filename,
                'title'=> $request->title,
                'description'=> $request->description
            ]);
            return redirect()->route('admin.promotions.index')->with('success','Promotion Updated');
        }else{
            $promotion->update([
                'title'=> $request->title,
                'description'=> $request->description
            ]);
            return redirect()->route('admin.promotions.index')->with('success','Promotion Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promotion $promotion)
    {
        File::delete(public_path('assets/img/promotions/'.$promotion->image));
        $promotion->delete();
        return redirect()->route('admin.promotions.index')->with('success','Promotion Deleted.');
    }
}
