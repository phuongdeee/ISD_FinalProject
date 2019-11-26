<?php

namespace App\Http\Controllers\viewer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Flat;
use App\Http\Requests;

use Illuminate\Http\Request;

class FlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // query 2 tables seperately to get distinct property
        $flats = DB::table('canho')
                        ->join('toachungcu','canho.idtoachungcu','=','toachungcu.idtoachungcu')
                        ->join('duan','canho.idduan','=','duan.idduan')
                        ->select('canho.*','toachungcu.tentoa','duan.tenduan')
                        ->distinct()
                        ->paginate(5);

        return view('viewer.flat.index',['flat_array'=>$flats]);
    }

    
}
