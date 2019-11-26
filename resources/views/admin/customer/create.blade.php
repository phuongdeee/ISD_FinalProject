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
    Thêm khách hàng
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> AdminAZ</a></li>
    <li><a href="{{ url ('admin/customer') }}">Quản lý khách hàng</a></li>
    <li class="active">Thêm khách hàng</li>
</ol>
</section>

<!-- Main content -->
<section class="content">
<div class="container">
<p> Thêm khách hàng</p>
    <form method="POST" action="{{ route('customer.store') }}">
    {{ csrf_field() }}
    @if ($errors->any())
        <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
        </div>
    @endif
        <label>Họ tên</label>
        <input type="text" name="name" value="{{ old('name') }}" autofocus required>
        <i>(Họ tên viết không dấu)</i><br><br>

        <label>CMND</label>
        <input type="number" name="identity_card" value="{{ old('identity_card') }}" required>

        <label>Căn hộ</label>
        <select name="flat">
        <!-- hiện ra các căn hộ còn trống -->
        @foreach($flats as $flat)
            <option value="{{$flat->idcanho}}">{{$flat->tencanho}}</option>
        @endforeach
        </select><br><br>

        <!-- <label>Ngày sinh</label> 
        <input type="date" name="dob" value="{{ old('dob') }}" required><i>(tháng/ngày/năm)</i> <br><br> -->
        <!-- /
        <input class="date" type="number" name="month" placeholder="tháng..."> /
        <input class="date" type="number" name="year" placeholder="năm..."> -->
        

        <label>Email</label>
        <input class="custom" type="email" name="email" value="{{ old('email') }}" required>

        <label>SĐT</label>
        <input type="number" name="phone_number" value="{{ old('phone_number') }}" required><br><br>

        <label>Hộ khẩu</label>
        <input class="custom_address" type="text" name="inhabitant_number" value="{{ old('inhabitant_number') }}" required><br><br>

        <label>Địa chỉ</label>
        <input class="custom_address" type="text" name="address" value="{{ old('address') }}" required><br><br>

        <label for="note">Ghi chú :</label><br>
        <textarea rows="4" cols="50" name="note" id="note" value="{{ old('note') }}" ></textarea><br><br>

        <button type="submit" class="btn btn-primary">Lưu</button>
        <button type="reset" class="btn btn-primary">Làm mới trang</button>
    </form>
</div>
</section>
<!-- /.content -->
@endsection('content')