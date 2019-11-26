<?php

namespace App\Http\Controllers\admin;
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
        // $apartment = apartment::paginate(2);
        // return view("admin.apartment.index", array('model' => $apartment));
        $apartments = DB::table('toachungcu')
                        ->join('duan','toachungcu.idduan','=','duan.idduan')
                        ->select('toachungcu.*','duan.idduan','duan.tenduan')
                        ->paginate(5);
        return view('admin.apartment.index',['apartment_array'=>$apartments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = DB::table('duan')->distinct()->get();
        return view("admin.apartment.create",['projects'=>$projects]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_name' => 'required',
            'apartment_name' => 'required|regex:/^([a-zA-Z0-9\s\-]*)$/|max:50',
            'begin_trade_floor' => 'required|integer|min:1',
            'end_trade_floor' => 'required|integer|min:0',
            'begin_people_floor' => 'required|integer|min:0',
            'end_people_floor' => 'required|integer|min:0',
            'manage_team' => 'required|regex:/^([a-zA-Z0-9\s\-]*)$/|max:50',
        ],
        [
            'project_name' => 'Tên dự án còn trống',
            //
            'apartment_name.required' => 'Tên tòa chung cư còn trống',
            'apartment_name.regex' => 'Tên tòa chung cư chứa ký tự không hợp lệ',
            'apartment_name.max' => 'Tên  vượt quá số ký tự cho phép',
            //
            'begin_trade_floor.required' => 'Tầng bắt đầu thương mại còn trống',
            'begin_trade_floor.integer' => 'Tầng bắt đầu thương mại phải là số nguyên',
            'begin_trade_floor.min'=> 'Tầng bắt đầu thương mại phải bắt đầu từ 1',
            //
            'end_trade_floor.required' => 'Tầng kết thúc thương mại còn trống',
            'end_trade_floor.integer' => 'Tầng kết thúc thương mại phải là số nguyên',
            'end_trade_floor.min' => 'Tầng kết thúc thương mại phải là số dương',
            //
            'begin_people_floor.required' => 'Tầng bắt đầu dân cư còn trống',
            'begin_people_floor.integer' => 'Tầng bắt đầu dân cư phải là số nguyên',
            'begin_people_floor.min' => 'Tầng bắt đầu dân cư phải là số dương',
            //
            'end_people_floor.required' => 'Tầng kết thúc dân cư còn trống',
            'end_people_floor.integer' => 'Tầng kết thúc dân cư phải là số nguyên',
            'end_people_floor.min' => 'Tầng kết thúc dân cư phải là số dương',
            //
            'manage_team.required' => 'Đơn vị quản lý còn trống',
            'manage_team.regex' => 'Đơn vị quản lý chứa ký tự không hợp lệ',
            'manage_team.max' => 'Tên đơn vị quản lý vượt quá số ký tự cho phép',
        ]);
            $apartment = Apartment::create();
            $apartment->idduan = $request->get('project_name');
            $apartment->tentoa = $request->get('apartment_name');
            $apartment->batdauthuongmai = $request->get('begin_trade_floor');
            $apartment->ketthucthuongmai = $request->get('end_trade_floor');
            $apartment->batdaudancu = $request->get('begin_people_floor');
            $apartment->ketthucdancu = $request->get('end_people_floor');
            $apartment->donviquanly = $request->get('manage_team');

            $apartment->save();
            session()->flash('create_notif','Tạo tòa chung cư thành công!');
            return redirect('/admin/apartment');
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
        $apartment = Apartment::find($id);
        $projects =DB::table('duan')->get();
        return view("admin.apartment.edit", compact('apartment','projects'));
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
        $request->validate([
            'apartment_name' => 'required|regex:/^([a-zA-Z0-9\s\-]*)$/|max:50',
            'begin_people_floor' => 'required|integer|min:0',
            'end_people_floor' => 'required|integer|min:0',
            'begin_trade_floor' => 'required|integer|min:0',
            'end_trade_floor' => 'required|integer|min:0',
            'manage_team' => 'required|regex:/^([a-zA-Z0-9\s\-]*)$/|max:50',
        ],
        [
            'apartment_name.required' => 'Tên tòa chung cư còn trống',
            'apartment_name.regex' => 'Tên tòa chung cư chứa ký tự không hợp lệ',
            'apartment_name.max' => 'Tên tòa chung cư vượt quá số ký tự chp phép',
            //
            'begin_trade_floor.required' => 'Tầng bắt đầu thương mại còn trống',
            'begin_trade_floor.integer' => 'Tầng bắt đầu thương mại phải là dạng số',
            'begin_trade_floor.min' => 'Tầng bắt đầu thương mại phải là số dương',
            //
            'end_trade_floor.required' => 'Tầng kết thúc thương mại còn trống',
            'end_trade_floor.integer' => 'Tầng kết thúc thương mại phải là dạng số',
            'end_trade_floor.min' => 'Tầng kết thúc thương mại phải là số dương',
            //
            'begin_people_floor.required' => 'Tầng bắt đầu dân cư còn trống',
            'begin_people_floor.integer' => 'Tầng bắt đầu dân cư phải là dạng số',
            'begin_people_floor.min' => 'Tầng bắt đầu dân cư phải là số dương',
            //
            'end_people_floor.required' => 'Tầng kết tầng dân cư còn trống',
            'end_people_floor.integer' => 'Tầng kết tầng dân cư phải là dạng số',
            'end_people_floor.min' => 'Tầng kết tầng dân cư phải là số dương',
            //
            'manage_team.required' => 'Đơn vị quản lý còn trống',
            'manage_team.regex' => 'Đơn vị quản lý chứa ký tự không hợp lệ',
            'manage_team.max' => 'Tên đơn vị quản lý vượt quá số ký tự cho phép',
        ]);
            $apartment = Apartment::find($id);
            
            $apartment->idduan= $request->get('project_name');
            $apartment->tentoa= $request->get('apartment_name');
            $apartment->batdauthuongmai= $request->get('begin_trade_floor');
            $apartment->ketthucthuongmai= $request->get('end_trade_floor');
            $apartment->batdaudancu= $request->get('begin_people_floor');
            $apartment->ketthucdancu= $request->get('end_people_floor');
            $apartment->donviquanly = $request->get('manage_team');      

            $apartment->save();
            session()->flash('update_notif','Cập nhật tòa chung cư thành công!');
            return redirect('/admin/apartment');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $apartment = Apartment::find($id);
        $apartment->delete();
        session()->flash('delete_notif','Đã xóa tòa chung cư!');

        return redirect('/admin/apartment');
        // ->with([
        //     'flash_message' => 'Deleted',
        //     'flash_message_important' => false
        // ]);
    }
}
