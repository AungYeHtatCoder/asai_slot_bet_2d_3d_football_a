<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::latest()->get();
        return view('admin.games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.games.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            // 'link' => 'required'
        ]);

        // image
        $image = $request->file('image');
        $ext = $image->getClientOriginalExtension();
        $filename = uniqid('game') . '.' . $ext; // Generate a unique filename
        $image->move(public_path('assets/img/games/'), $filename); // Save the file

        Game::create([
            'name' => $request->name,
            'image' => $filename,
            'link' => $request->link
        ]);
        return redirect(route('admin.games.index'))->with('success', "New Game Created Successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        return view('admin.games.show', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        return view('admin.games.edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable',
            'link' => 'required'
        ]);
        if($request->hasFile('image')){
            //file delete
            File::delete(public_path('assets/img/games/' . $game->image));
            // image
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $filename = uniqid('game') . '.' . $ext; // Generate a unique filename
            $image->move(public_path('assets/img/games/'), $filename); // Save the file
        }else{
            $filename = $game->image;
        }
        $game->update([
            'name' => $request->name,
            'link' => $request->link,
            'image' => $filename
        ]);
        return redirect(route('admin.games.index'))->with('success', "Game Link Updated Successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        File::delete(public_path('assets/img/games/' . $game->image));
        $game->delete();
        return redirect()->back()->with('success', "Game Link Deleted Successfully.");
    }
}