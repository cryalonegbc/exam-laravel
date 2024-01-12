<?php

namespace App\Http\Controllers;

use App\Models\Thing;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Place;
use App\Models\Usee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Notifications\ThingUpdatedNotification;
class ThingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $things = Thing::all();
        return view('things.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Gate::authorize('create', [self::class]);
        $user = User::find(auth()->id());
        $username = $user->name;

        return view('things.create', ['username' => $username]);
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
            'wrnt' => 'required',
        ]);

        $thing = new Thing;
        $thing->name = $request->name;
        $thing->description = $request->description;
        $thing->wrnt = $request->wrnt;

        $user = User::find(auth()->id());
        $thing->master = $user->name;

        $result = $thing->save();

        if ($result) {
            return redirect()->back()->with('success', 'Thing created successfully.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Thing $thing)
    {
        $uses = Usee::all();
        $things = Thing::all();
        $places = Place::all();
        return view('things.show', ['things' => $things, 'uses' => $uses, 'places' => $places]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Thing $thing)
    {
        // dd($thing);
        $user = User::find(auth()->id());
        $username = $user->name;

        return view('things.edit', ['thing' => $thing, 'username' => $username, 'id' => $thing->id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Thing $thing)
    {
        $users = User::where('id', '!=', auth()->id())->get();

        // Отправляем уведомление всем этим пользователям
        foreach ($users as $user) {
            $user->notify(new ThingUpdatedNotification($thing));
        }
        // dd($thing->id);
        // $thing = Thing::find($id);
        // $request->validate([
        //     'name' => 'required',
        //     'description' => 'required',
        //     'wrnt' => 'wrnt'
        // ]);
        $thing->name = $request->name;
        $thing->description = $request->description;
        $thing->wrnt = $request->wrnt;
        $thing->save();

        // $uses = Usee::all();
        // $things = Thing::all();
        // $places = Place::all();
        return redirect(route('things.show', ['thing' => $thing->id]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Thing $thing)
    {
        // dd($thing);
        $thing->delete();
        return redirect()->back();
    }

    public function user_things()
    {
        $user = Auth::user();
        $things = Thing::where('master', $user->name)->get();
        $things_test = Thing::all();
        return view('things.my_things', ['things' => $things]);
    }
    public function show_users()
    {
        $users = User::all();
        return view('things.users', ['users' => $users]);
    }
}
