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
        $trip->link = $request->link;
        if ($request->hasFile('picture')) 
        {
            $fileName = time() . '.' . $request->picture->extension();
            $file = $request->file('picture');
            $trip->picture = $fileName;
        }
        $trip->save();
        if(isset($file)){
            $file->move(('/home/lara/public_html/images/trips/' . $trip->id), $fileName);
        }
        return redirect('/admin/trips')->with('succes', 'Uitje succesvol aangemaakt.');
    }

    function update(UpdateTripRequest $request, Trip $trip)
    {
        $trip->name = $request->name;
        $trip->school_year = $request->school_year;
        $trip->date = $request->date;
        $trip->time = $request->time;
        $trip->location = $request->location;
        $trip->link = $request->link;
        if ($request->hasFile('picture')) 
        {
            $fileName = time() . '.' . $request->picture->extension();
            $file = $request->file('picture');
            $path = public_path() . '/images/trips/' . $trip->id . '/'. $trip->picture .' ';
        }
        if(isset($file)){
            if(NULL !== $trip->picture){
                unlink('/home/lara/public_html/images/trips/' . $trip->id . '/'. $trip->picture .'');
            }

            $file->move(('/home/lara/public_html/images/trips/' . $trip->id), $fileName);
            $trip->picture = $fileName;
        }
        $trip->update();
        return redirect('/admin/trips')->with('succes', 'Uitje succesvol bewerkt.');
    }

    function destroy(Request $request, Trip $trip)
    {
        $this->authorize('delete', $trip);
        if(NULL !== $trip->picture){
        //unlink('/home/lara/public_html/images/trips/' . $trip->id . '/'. $trip->picture .'');
        }
        $trip->delete();
        return back()->with('succes', 'Uitje succesvol verwijderd.');
    }

    public function searchIndex(Trip $trip, Request $request)
    {
        $this->authorize('view', $trip);
        $trips = Trip::where('name', 'like', '%' . $request->search_term.'%')->latest()->paginate(12);
        return view('admin.trips.index', ['trips' => $trips, 'search_term' => $request->search_term]);
    }

}
