<?php

namespace App\Http\Controllers\Admin;

use App\Models\Data;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function showPerformance()
    {
        // $datas = DB::table('data')
        //             ->join('users', 'users.id', '=', 'data.user_id')        
        //             ->select( 'users.name', 'data.user_id', DB::raw('count(*) as total'))    
        //             ->groupBy('user_id', 'users.name')
        //             ->get();

        $datas = User::where('role_id', 2)->paginate(10);
        return view('admin.performance', compact('datas'));
    }
}
