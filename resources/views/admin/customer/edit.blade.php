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
textarea{
    margin-left:30px;
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
        Sửa thông tin khách hàng
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> AdminAZ</a></li>
        <li><a href="{{ url ('admin/customer') }}">Quản lý khách hàng</a></li>
        <li class="active">Sửa thông tin khách hàng</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
        <div class="container">
        <p>Sửa thông tin khách hàng</p>
            <form role="form" method="POST" action="{{ route('customer.update', $customer->idkhachhang) }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    <label for="name">Họ và tên</label>
                    <input name="name" type="text" id="name" value="{{$customer->hoten}}" required>
                
                    <label for="identity_card">CMND</label>
                    <input name="identity_card" type="number" id="identity_card" value="{{$customer->chungminhthu}}" required><br><br>
                
                    <!-- <label for="dob">Ngày sinh</label>
                    <input name="dob" type="text" id="dob" value="{{$customer->ngaysinh}}" required><i>(tháng/ngày/năm)</i><br><br> -->
                
                    <label for="email">Email</label>
                    <input name="email" type="email" class="custom" id="email" value="{{$customer->email}}" required>
                
                    <label for="phone_number">SĐT</label>
                    <input name="phone_number" type="number" id="phone_number" value="{{$customer->sodienthoai}}" required><br><br>
                
                    <label for="inhabitant_number">Hộ khẩu</label>
                    <input name="inhabitant_number" type="text" class="custom_address" id="inhabitant_number" value="{{$customer->hokhau}}" required><br><br>
                
                    <label>Địa chỉ</label>
                    <input name="address" type="text" class="custom_address" value="{{$customer->diachi}}" required><br><br>
                
                    <label for="note">Ghi chú</label><br>
                    <textarea name="note" type="text" name="note" rows="4" cols="50">{{$customer->ghichu}}</textarea><br><br>
                
                    <button type="submit" class="btn btn-primary">Lưu</button>
                
            </form>
        </div>
</section>
<!-- /.content -->
@endsection('content')