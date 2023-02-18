<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Room;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.room.index',[
            'rooms' => Room::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.room.create', [
            'rooms' => Room::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:rooms'
        ]);

        $validated['name'] = ucfirst(strtolower($validated['name']));

        Room::create($validated);
        return redirect('/rooms')->with('create', '');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return view('dashboard.room.edit', [
            'rooms' => Room::all(),
            'room' => $room
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:rooms'
        ]);

        Room::where('id',$room->id)->update($validated);
        return redirect('/rooms')->with('update', '');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        Room::destroy($room->id);
        return redirect('/rooms')->with('delete', '');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Room::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}