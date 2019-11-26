<?php
namespace App\Http\Controllers\viewer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Http\Requests;

use Illuminate\Http\Request;


    class CustomerController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $customers = DB::table('khachhang')
                        ->join('canho','khachhang.idcanho','=','canho.idcanho')
                        ->select('khachhang.*','canho.tencanho','canho.idcanho')
                        ->distinct()
                        ->paginate(5);
            return view('viewer.customer.index',['customer_array'=>$customers]);
        }

        public function show($id)
        {
            $customers = DB::table('khachhang')
                        ->join('canho','khachhang.idcanho','=','canho.idcanho')
                        ->select('khachhang.*','canho.tencanho','canho.idcanho')
                        ->where ('idkhachhang','=',$id)
                        ->get();

            return view('viewer.customer.show', compact('customers'));
        }

        
    }