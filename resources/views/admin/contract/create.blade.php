<style>
form{
    border: 1px solid black;
}
div.header{
    margin-bottom: 50px;	
}
div.first_sentence{
    text-align:center;
    margin-left:30%;
    margin-bottom:45px;
    width:500px;
    border-bottom: 1px solid black;
}
div.contract_content{
    margin-left: 15%;
    width:auto;
    height:auto;
	font-family: "Times New Roman";
	font-size: 18px;
}
input{
    border: 1px solid lightgrey;
    border-radius:5px;
}
</style>
@extends('partialView.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Thêm hợp đồng mới
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> AdminAZ</a></li>
        <li><a href="{{ url ('admin/contract') }}">Quản lý hợp đồng</a></li>
        <li class="active">Thêm hợp đồng</li>
    </ol>
</section>

<!-- Main content -->
@if(session()->has('invalid_notif'))
    <div class="alert alert-warning">{{ session()->get('invalid_notif') }}</div>
@endif
<section class="content">
    <div class="container">
	<p>Thêm hợp đồng</p>
        <form method="POST" action="{{ route('contract.store') }}">
        {{ csrf_field() }}
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <!-- here -->
        <div class="header">
	<div class="first_sentence">
		<h3>CỘNG HOÀ XÃ HỘI CHỦ NGHĨA VIỆT NAM <br> Độc lập - Tự do - Hạnh phúc</h3>
	</div>
	<div style="width: 500px; text-align:center;margin-left:60%;">
		<i>Hà Nội, ngày<input type="date" name="contract_date" value="{{ old('contract_date') }}" autofocus required></i>
	</div>
	<h3 style="text-align:center">HỢP ĐỒNG MUA BÁN NHÀ Ở XÃ HỘI<br><br>
	Số <input type="text" name="contract_code" style="width:80px; text-align:center" value="{{ old('contract_code') }}" required>
	/2019/HĐMBCHXH/BKTL - TL 
	</h3>
	
</div>
<!-- Kết thúc phần mở đầu của hợp đồng -->

<!-- Nội dung hợp đồng -->
<div class="contract_content">
	<strong>CĂN HỘ: </strong><input type="text" name="tencanho" value="{{ old('tencanho') }}" required><br><br>
	<strong>CĂN HỘ TRỰC THUỘC DỰ ÁN:</strong>
	<select name="project_name" id="project_name" required>Dự án: 
		@foreach($projects as $project)
			<option value="{{$project->idduan}}">{{$project->tenduan}}</option>
		@endforeach
    </select><br><br>
	<strong>SÀN GIAO DỊCH:</strong><input type="text" name="san" value="{{ old('san') }}" required>
	
	<h3>BÊN BÁN NHÀ Ở(sau đây gọi tắt là Bên bán):</h3>
	<div class="content">
	- Mã số doanh nghiệp: 0102846070 do Sở Kế hoạch đầu tư thành phố Hà Nội cấp.lần đầu ngày 31/7/2008. Đăng ký thay đổi lần 16 vào ngày 06/06/2016.<br><br>
	- Đại diện bởi: Ông Bùi Viết Sơn  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Chức vụ: Chủ tịch HĐQT<br><br>
	- Địa chỉ: Số 107 Nguyễn Phong Sắc, phường Dịch Vọng Hậu, quận Cầu Giấy, Thành phố Hà Nội.<br><br>
	- Văn phòng giao dịch: Số 4B, ngõ 308 Tây Sơn, quận Đống Đa, Thành phố Hà Nội <br><br>
	- Điện thoại công ty:  024.3537.9372 <br><br>
	- Số tài khoản: 100.002260764 tại Ngân hàng TMCP Quốc Dân – Chi nhánh Hà Nội<br><br>
	- Mã số thuế: 0102846070
	</div>

	<h3>BÊN MUA NHÀ Ở (sau đây gọi tắt là Bên mua):</h3>
	<div class="content">
	- Ông (bà):<input type="text" name="name" value="{{ old('name') }}" required><br><br>
	- Số CMND:<input type="number" name="identity_card" value="{{ old('identity_card') }}" required>
	  Ngày cấp: <input type="date" name="identity_date" value="{{ old('identity_date') }}" required>
		  <!-- /<input type="number" name="identity_month" style="width:45px; text-align:center">
		  /<input type="number" name="identity_year" style="width:45px; text-align:center">   -->
	  &nbsp;&nbsp;&nbsp;&nbsp;
	  Tại: <input type="text" name="noicap" value="{{ old('noicap') }}" required><br><br>
	- Hộ khẩu thường trú:<input type="text" name="inhabitant_number" style="width: 350px" value="{{ old('inhabitant_number') }}" required><br><br>
	- Địa chỉ liên hệ:<input type="text" name="address"style="width: 350px" value="{{ old('address') }}" required><br><br>
	- Điện thoại:	<input type="number" name="phone_number" value="{{ old('phone_number') }}" required><br><br>

	</div>
		<h3>GIÁ BÁN VÀ PHƯƠNG THỨC THANH TOÁN</h3>
		<p>
		Giá bán nhà ở đối với căn hộ nhà ở chung cư được tính theo công thức lấy đơn giá 01 m2 sử dụng nhà ở (x) với tổng diện tích sử dụng nhà ở mua bán,<br><br>
		 cụ thể là:<input type="number" name="square" value="{{ old('square') }}" required>m2 sử dụng (x)<input type="number" name="price_per_square" value="{{ old('price_per_square') }}" required>đồng/1m2 sử dụng <br><br> = <input type="number" name="price" value="{{ old('price') }}" required>đồng. 
		 (Bằng chữ:<input type="text" name="price_to_string" style="width: 350px" value="{{ old('price_to_string') }}" required>).<br><br>
		 Giá bán này đã bao gồm thuế giá trị gia tăng VAT (nếu bên bán thuộc diện phải nộp thuế VAT).<br><br>
		 Phương thức thanh toán: Các khoản thanh toán theo Hợp Đồng này chỉ được thực hiện qua tài khoản của Bên Bán mở tại Ngân hàng TMCP Đầu tư và Phát triển Việt Nam – Chi nhánh Tây Hà Nội (BIDV Tây Hà Nội)<br><br>
		 a. Thanh toán một lần vào 
		 ngày: <input type="date" name="pay_date" style="width:200px;" value="{{ old('pay_date') }}" required>
		 (hoặc trong thời hạn <input type="number"  name="extra_date" style="width:50px;" value="{{ old('extra_date') }}">ngày, kể từ sau ngày kí kết hợp đồng này).<br><br>
		 b. Trường hợp mua nhà ở theo phương thức trả dần thì thực hiện thanh toán vào các đợt: số lần thanh toán là
		 	<select name="contract_kind" required>
                <option value="1">1 lần nộp</option>
                <option value="2">2 lần nộp</option>
                <option value="3">3 lần nộp</option>
                <option value="4">4 lần nộp</option>
                <option value="5">5 lần nộp</option>
                <option value="6">6 lần nộp</option>
                <option value="7">7 lần nộp</option>
                <option value="8">8 lần nộp</option>
            </select><br><br><br>
		</p>
	</div>
	<div style="text-align:center">
		<button type="submit" class="btn btn-primary">Lưu</button>
		<button type="reset" class="btn btn-primary">Làm mới trang</button>
	</div>
        <!-- to here -->
        </form>
    </div>
</section>
<!-- /.content -->
@endsection('content')