<?php

namespace App\Http\Controllers;

use App\Activity;
use App\ActivityStatus;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::all();

        return view('activity/index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activities_status = ActivityStatus::all();
        return view('activity/create', compact("activities_status"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:20',
            'activity_statuses_id' => "required"
        ]);

        $show = Activity::create($validatedData);
   
        return redirect('/activities')->with('success', 'Activity saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activity = Activity::findOrFail($id);
        $activities_status = ActivityStatus::all();

        return view('activity/edit')->with([
            "activity" => $activity,
            "activities_status" => $activities_status
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:20',
            'activity_statuses_id' => "required"
        ]);
        
        Activity::whereId($id)->update($validatedData);

        return redirect('/activities')->with('success', 'Activity was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);
        $activity->delete();

        return redirect('/activities')->with('success', 'Activity deleted');
    }
}
