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
button {
    margin-left: 50%;
}
input.custom{
    width: 300px;
}
input.custom_address{
    width: 350px;
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
        <li class="active">Thêm người dùng</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="container">
    <p>Thêm người dùng</p>
        <form method="POST" action="{{ route('manager.store') }}">
        {{ csrf_field() }}
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <label>Họ tên</label>
        <input type="text" name="name" value="{{ old('name') }}" required autofocus>
        <i>(Họ tên viết không dấu)</i>

        <label>Vai trò</label>
        <select name="role">
            <option value="admin">Admin</option>
            <option value="viewer">Viewer</option>
        </select><br><br>


        <label>Ngày sinh</label>
        <input type="date" name="dob" value="{{ old('dob') }}" required>


        <label>SĐT</label>
        <input type="number" name="phone_number" value="{{ old('phone_number') }}" required><br><br>

        <label>Email</label>
        <input type="email" name="email" class="custom" value="{{ old('email') }}" required><br><br>

        <label>Địa chỉ</label>
        <input class="custom_address" type="text" name="address" value="{{ old('address') }}"required><br><br>
        
        <button type="submit" class="btn btn-primary">Lưu</button>
        <button type="reset" class="btn btn-primary">Làm mới trang</button>
        </form>
    </div>
</section>
<!-- /.content -->
@endsection('content')