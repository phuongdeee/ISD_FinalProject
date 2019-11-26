<?php

namespace App\Http\Controllers\viewer;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Customer;
use App\Http\Requests;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;

class ContractController extends Controller
{

    public function index()
    { 
        $contracts = DB::table('hopdong')
                        ->join('duan','hopdong.idduan','=','duan.idduan')
                        ->join('canho','hopdong.idcanho','=','canho.idcanho')
                        ->join('khachhang','hopdong.idkhachhang','=','khachhang.idkhachhang')
                        ->select('hopdong.*','duan.tenduan','canho.tencanho','khachhang.idkhachhang','khachhang.hoten')
                        ->paginate(5);
        return view('viewer.contract.index',['contract_array'=>$contracts]);
    }
}
