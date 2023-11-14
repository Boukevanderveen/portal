<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use App\Http\Requests\StoreTripRequest;
use App\Http\Requests\UpdateTripRequest;

class TripController extends Controller
{
    function index(Trip $trip){
        $trips1 = Trip::where('school_year', 1)->get();
        $trips2 = Trip::where('school_year', 2)->get();
        $trips3 = Trip::where('school_year', 3)->get();
        $trips4 = Trip::where('school_year', 4)->get();

        return view('trips.index', compact(['trips1', 'trips2','trips3','trips4']));
    }

    function adminIndex(Trip $trip){
        $this->authorize('view', $trip);
        return view('admin.trips.index', ['trips' => Trip::All()]);
    }
    
    function create(Trip $trip){
        $this->authorize('create', $trip);
        return view('admin.trips.create');
    }

    function edit(Trip $trip){
        $this->authorize('update', $trip);
        return view('admin.trips.edit', compact(['trip']));
    }

    function store(StoreTripRequest $request)
    {
        $trip = new Trip;
        $trip->name = $request->name;
        $trip->school_year = $request->school_year;
        $trip->date = $request->date;
        $trip->time = $request->time;
        $trip->location = $request->location;
        $trip->save();
        return redirect('/admin/trips')->with('succes', 'Uitje succesvol aangemaakt.');
    }

    function update(UpdateTripRequest $request, Trip $trip)
    {
        $trip->name = $request->name;
        $trip->school_year = $request->school_year;
        $trip->date = $request->date;
        $trip->time = $request->time;
        $trip->location = $request->location;
        $trip->update();
        return redirect('/admin/trips')->with('succes', 'Uitje succesvol bewerkt.');
    }

    function destroy(Request $request, Trip $trip)
    {
        $this->authorize('delete', $trip);
        $trip->delete();
        return back()->with('succes', 'Uitje succesvol verwijderd.');
    }

    public function searchIndex(Trip $trip, Request $request)
    {
        $this->authorize('view', $trip);
        $trips = Test::where('name', 'like', '%' . $request->search_term.'%')->latest()->paginate(12);
        return view('admin.trips.index', ['trips' => $trips, 'search_term' => $request->search_term]);
    }
}
