<?php

namespace App\Http\Controllers\Sales;

use DateTime;
use App\Models\Data;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Datapic;
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
        $searchs = null;
        if ($request->tgl1 !== null) {
            $datas = Data::whereBetween('tanggal', [$request->tgl1, $request->tgl2])->paginate(10);
        } else if ($request->key !== null) {
            $datas = DB::table('data')
            ->join('users', 'users.id', '=', 'data.user_id')        
            ->where('no_rek', 'like', "%$request->key%")
            ->select('users.*', 'data.*')
            ->paginate(10);
            $searchs =  DB::table('data')
                    ->join('users', 'users.id', '=', 'data.user_id')        
                    ->where('no_rek', 'like', "%$request->key%")
                    ->select('users.*', 'data.*')
                    ->paginate(10);
        } else {
            $datas = Data::orderBy('created_at', 'desc')->paginate(10);
        } 
        return view('data.index', compact('datas', 'searchs'));
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
            'rekening' => 'required',
            'pics' => 'required'
        ]);

        $data = Data::create([
            'no_rek' => $request->rekening,
            'tanggal' => date('Y-m-d'),
            'user_id' => Auth::user()->id
        ]);

        if ($request->hasfile('pics')) {
            $pics = $request->file('pics');

            $name_slug = Str::slug(Auth::user()->name);
            $datetime = new DateTime();

            $i = 0;
            foreach($pics as $pic) {
                $i++;
                $name = $pic->getClientOriginalName();
                $pictureUrl = $pic->storeAs("images/data", "{$name_slug}{$i}-{$datetime->format('Y-m-d-s')}.{$pic->extension()}");

                Datapic::create([
                    'data_id' => $data->id,
                    'pic' => $pictureUrl
                  ]);
            }
         }

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

    public function showIdCard()
    {
        return view('data.id-card');
    }

    public function showAllResult()
    {
        $datas = Data::orderBy('tanggal', 'desc')->paginate(2);
        return view('data.result', compact('datas'));
    }
}
