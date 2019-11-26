<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Manager;
use App\Http\Requests;

use Illuminate\Http\Request;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manager = manager::paginate(5);
        return view("admin.manager.index", array('model' => $manager));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.manager.create");
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
            'name' => 'required|regex:/^([a-zA-Z\s\-]*)$/|max:50',
            'dob' => 'required|before_or_equal:today',
            'phone_number' => 'required|numeric|digits_between:9,10|unique:nguoiquanly,sodienthoai',
            'email' => 'required|email|unique:nguoiquanly,email',
            'address' => 'required'
        ],
        [
            'name.required' => 'Họ tên còn trống',
            'name.regex' => 'Họ tên chứa ký tự không hợp lệ',
            'name.max' => 'Họ tên vượt quá số ký tự cho phép',
            //
            'role.required' => 'Vai trò còn trống',
            //
            'dob.required' => 'Ngày sinh còn trống',
            'dob.before_or_equal' => 'Ngày sinh không hợp lệ',
            //
            'phone_number.required' => 'Số điện thoại còn trống',
            'phone_number.numeric' => 'Số điện thoại phải là số',
            'phone_number.digits_between' => 'Số điện thoại không hợp lệ',
            'phone_number.unique' => 'Số điện thoại đã tồn tại',
            //
            'email.required' => 'Email còn trống',
            'email' => 'Email không hợp lệ',
            'email.unique' => 'Email đã tồn tại',
            //
            'address.required' => 'Địa chỉ còn trống',
            
        ]);
            $manager = Manager::create();
            $manager->hoten= $request->get('name');
            $manager->vaitro= $request->get('role');
            $manager->sodienthoai = $request->get('phone_number');//sđt dài từ 9-10 số
            $manager->email = $request->get('email');
            $manager->diachi = $request->get('address');

            $manager->save();
            
            session()->flash('create_notif','Thêm người quản lý thành công!');
            return redirect('/admin/manager');
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
        $manager = manager::find($id);
        return view("admin.manager.edit", compact('manager'));
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
            'name' => 'required|regex:/^([a-zA-Z\s\-]*)$/|max:50',
            'dob' => 'required|before_or_equal:today',
            'phone_number' => 'required|numeric|digits_between:9,10',//sđt dài từ 9-10 số
            'email' => 'required|email|unique:nguoiquanly,email',
            'address' => 'required'
        ],
        [
            'name.required' => 'Họ tên còn trống',
            'name.regex' => 'Họ tên chứa ký tự không hợp lệ',
            'name.max' => 'Họ tên vượt quá số ký tự cho phép',
            //
            'dob.required' => 'Ngày sinh còn trống',
            'dob.before_or_equal' => 'Ngày sinh không hợp lệ',
            //
            'phone_number.required' => 'Số điện thoại còn trống',
            'phone_number.numeric' => 'Số điện thoại chứa ký tự không hợp lệ',
            'phone_number.digits_between' => 'Độ dài số điện thoại không hợp lệ',
            //
            'email.required' => 'Email còn trống',
            'email.unique' => 'Email đã tồn tại',
            'email' => 'Email không hợp lệ',
            //
            'address.required' => 'Địa chỉ còn trống',
        ]);
            $manager = Manager::find($id);

            $manager->hoten= $request->get('name');
            $manager->vaitro= $request->get('role');
            $manager->sodienthoai = $request->get('phone_number');
            $manager->email = $request->get('email');
            $manager->diachi = $request->get('address');

            $manager->save();
            
            session()->flash('update_notif','Chỉnh sửa người quản lý thành công!');
            return redirect('/admin/manager');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $manager = Manager::find($id);
        $manager->delete();

        session()->flash('delete_notif','Xóa người quản lý thành công!');
        return redirect('/admin/manager');
    }
}
