<?php

namespace App\Http\Controllers\viewer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\apartment;
use App\Http\Requests;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = DB::table('toachungcu')
                        ->join('duan','toachungcu.idduan','=','duan.idduan')
                        ->select('toachungcu.*','duan.idduan','duan.tenduan')
                        ->paginate(5);
        return view('viewer.apartment.index',['apartment_array'=>$apartments]);
    }
}