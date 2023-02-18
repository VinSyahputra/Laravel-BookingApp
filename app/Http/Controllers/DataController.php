<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Room;
use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.index', [
            'data' => Data::with(['user', 'room'])->paginate(10)->onEachSide(1), //error ini bisa diakali dengan memindahkan return view ke controller
            'rooms' => Room::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $id = Room::select('id')->where('slug', $slug)->first();
        return view('dashboard.data.create', [
            'rooms' => Room::all(),
            'data' => Data::where('room_id', $id->id)->get(),
            'slug' => $slug,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Responseqq
     */
    public function store(Request $request, $slug)
    {
        $request['room_id'] = Room::select('id')->where('slug', $slug)->first();
        $request['room_id'] = $request['room_id']->id;
        // $request['date'] = date('Y-m-d', strtotime($request['date']));
        // return $request;

        $validated = $request->validate([
            'room_id' => 'required',
            'user_id' => 'required',
            'room_owner' => 'required',
            'contact' => 'required',
            'event_name' => 'required',
            'date' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
            'description' => 'required',
        ]);


        Data::create($validated);
        return redirect('/data/'.$slug)->with('create', '');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function show(Data $data, $slug)
    {
        $id = Room::select('id')->where('slug', $slug)->first();
        $name = Room::select('name')->where('slug', $slug)->first();
        return view('dashboard.data.show', [
            'rooms' => Room::all(),
            'data' => Data::where('room_id', $id->id)->paginate(10)->onEachSide(1),
            'slug' => $slug,
            'name' => $name->name,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function edit(Data $data)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Data $data)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Data $data)
    {
        Data::destroy($data->id);
        return redirect()->back()->with('delete', '');
    }
}
