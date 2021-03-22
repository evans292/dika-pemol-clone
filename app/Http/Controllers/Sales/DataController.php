<?php

namespace App\Http\Controllers\Sales;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $datas = null;
        if ($request->tgl1 !== null) {
            $datas = Data::whereBetween('tanggal', [$request->tgl1, $request->tgl2])->paginate(10);
        } else if ($request->key !== null) {
            $datas =  DB::table('data')
                    ->join('users', 'users.id', '=', 'data.user_id')        
                    ->where('no_rek', 'like', "%$request->key%")
                    ->select('users.*', 'data.*')
                    ->paginate(10);
        } else {
            $datas = Data::orderBy('created_at', 'desc')->paginate(10);
        } 
        return view('data.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('data.create');
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
            'rekening' => 'required'
        ]);

        Data::create([
            'no_rek' => $request->rekening,
            'tanggal' => date('Y-m-d'),
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('data.index')->with('success', 'lol');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function show(Data $data)
    {
        //
        return view('data.show', compact('data'));
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
        //
    }
}
