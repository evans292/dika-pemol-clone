<?php

namespace App\Http\Controllers\Sales;

use DateTime;
use App\Models\Activity;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Activitypic;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $activities = Activity::orderBy('tanggal', 'desc')->paginate(2);
        return view('activity.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('activity.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'pics' => 'required',
            'tanggal' => 'required|date'
        ]); 

        $act = Activity::create([
            'user_id' => Auth::user()->id,
            'tanggal' => $request->tanggal
        ]);

        if ($request->hasfile('pics')) {
            $pics = $request->file('pics');

            $name_slug = Str::slug(Auth::user()->name);
            $datetime = new DateTime();

            $i = 0;
            foreach($pics as $pic) {
                $i++;
                $name = $pic->getClientOriginalName();
                $pictureUrl = $pic->storeAs("images/activity", "{$name_slug}{$i}-{$datetime->format('Y-m-d-s')}.{$pic->extension()}");

                Activitypic::create([
                    'activity_id' => $act->id,
                    'pic' => $pictureUrl
                  ]);
            }
         }

        return redirect()->route('activity.index')->with('create', 'lol');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
