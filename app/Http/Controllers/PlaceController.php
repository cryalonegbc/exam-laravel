<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\User;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index()
    {
        $place = Place::all();
        return view('place.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Gate::authorize('create', [self::class]);
        $user = User::find(auth()->id());
        $username = $user->name;

        return view('place.create', ['username' => $username]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Gate::authorize('create', [self::class]);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'repair' => 'required',
        ]);

        $place = new Place;
        $place->name = $request->name;
        $place->description = $request->description;
        $place->repair = $request->repair;
        if ($request->work) {
            $place->work = 'В работе';
        } else {
            $place->work = 'Не в работе';
        }


        $result = $place->save();

        if ($result) {
            return redirect()->back()->with('success', 'Place created successfully.');
        } else {
            dd('false');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Place $place)
    {
        $places = Place::all();
        return view('place.show', ['places' => $places]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Place $place)
    {
        $user = User::find(auth()->id());
        $username = $user->name;

        return view('place.edit', ['place' => $place, 'username' => $username]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Place $place)
    {
        $place->name = $request->name;
        $place->description = $request->description;
        $place->repair = $request->repair;
        $place->save();

        // $uses = Usee::all();
        // $things = Thing::all();
        // $places = Place::all();
        return redirect(route('place.show', ['place' => $place->id]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Place $place)
    {
        $place->delete();
        return redirect()->back();
    }
}
