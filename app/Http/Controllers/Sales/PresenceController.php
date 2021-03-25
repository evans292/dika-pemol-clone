<?php

namespace App\Http\Controllers\Sales;

use DateTime;
use App\Models\Presence;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PresenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Presence::where('tanggal', date('Y-m-d'))->where('user_id', Auth::user()->id)->first();
        $datas = Presence::paginate(10);
        return view('presence.index', compact('data', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('presence.create');
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
            'pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $name_slug = Str::slug(request('name'));
        $datetime = new DateTime();

        $picture = $request->file('pic');
        $pictureUrl = $picture->storeAs("images/presence", "{$name_slug}-{$datetime->format('Y-m-d-s')}.{$picture->extension()}");
        
        Presence::create([
            'user_id' => $request->user_id,
            'tanggal' => $request->tanggal,
            'absen_pagi' => $request->absen,
            'latitude' => $request->lat,
            'longitude' => $request->long,
            'pic' => $pictureUrl,
        ]);

        return redirect()->route('presence.index')->with('create', 'lol');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Presence $presence)
    {
        //
        return view('presence.show', compact('presence'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Presence $presence)
    {
        //
        return view('presence.edit', compact('presence'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presence $presence)
    {
        //
        $presence->update([
            'latitude' => $request->lat,
            'longitude' => $request->long,
            'closing' => $request->closing
        ]);

        return redirect()->route('presence.index')->with('update', 'lol');
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
