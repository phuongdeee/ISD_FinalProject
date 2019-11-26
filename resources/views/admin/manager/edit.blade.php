<style>
label {
    margin-left: 30px;
    margin-right: 10px;
}
form {
    border: 1px solid #3c8dbc;
    border-radius: 5px;
    padding: 30px 5%;
}
input,select,textarea{
    border:none;
    border-radius:5px;
    text-align:center;
}
input.custom{
    width: 300px;
}
input.custom_address{
    width: 350px;
}
button {
    margin-left: 50%;
}
</style>
@extends('partialView.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Quản lý người dùng
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> AdminAZ</a></li>
        <li><a href="{{ url ('admin/manager') }}">Quản lý người dùng</a></li>
        <li class="active">Sửa thông tin người dùng</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
        <div class="container">
        <p>Sửa thông tin người dùng</p>
            <form role="form" method="POST" action="{{ route('manager.update', $manager->idquanly) }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
                <label>Họ và tên</label>
                <input name="name" type="text" value="{{$manager->hoten}}" required>
                     
                <label>Vai trò</label>
                <select name="role">
                    <option value="admin">Admin</option>
                    <option value="viewer">Viewer</option>
                </select><br><br>

                      
                <label>SĐT</label>
                <input name="phone_number" type="number" value="{{$manager->sodienthoai}}" required><br><br>
                       
                <label>Email</label>
                <input name="email" type="email" class="custom" value="{{$manager->email}}" required><br><br>
                       
                <label>Địa chỉ</label>
                <input name="address" type="text" class="custom_address" value="{{$manager->diachi}}" required><br><br>
                
                <button type="submit" class="btn btn-primary">Lưu</button>
                   
            </form>
        </div>
</section>
<!-- /.content -->
@endsection('content')