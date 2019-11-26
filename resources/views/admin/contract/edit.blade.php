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
    text-align:center;
}
</style>
@extends('partialView.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Quản lý hợp đồng
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> AdminAZ</a></li>
        <li><a href="{{ url ('admin/contract') }}">Bảng hợp đồng</a></li>
        <li class="active">Sửa thông tin hợp đồng</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="container">
	<p>Sửa thông tin hợp đồng</p>
        <form role="form" method="POST" action="{{ route('contract.update', $contract->idhopdong) }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                        @endforeach
                </div>
            @endif
            <div class="header">
	<div class="first_sentence">
		<h3>CỘNG HOÀ XÃ HỘI CHỦ NGHĨA VIỆT NAM <br> Độc lập - Tự do - Hạnh phúc</h3>
	</div>
	<div style="width: 500px; text-align:center;margin-left:60%;">
		<i>Hà Nội, ngày<input type="date" name="contract_date" value="{{$contract->ngayky}}" style="width:150px; text-align:center" required></i>
		<i>(tháng-ngày-năm)</i>
	</div>
	<h3 style="text-align:center">HỢP ĐỒNG MUA BÁN NHÀ Ở XÃ HỘI<br><br>
	Số <input type="text" name="contract_code" value="{{$contract->mahopdong}}" style="width:80px; text-align:center" required>/2019/HĐMBCHXH/BKTL - TL </h3>
	
</div>
<!-- Kết thúc phần mở đầu của hợp đồng -->

<!-- Nội dung hợp đồng -->
<div class="contract_content">
	<strong>CĂN HỘ: </strong><input type="text" name="tencanho" value="{{$flat->tencanho}}" required><br><br>
	<strong>CĂN HỘ TRỰC THUỘC DỰ ÁN:</strong>
	<select name="project_name" id="project_name">Dự án: 
		@foreach($projects as $project)
			<option value="{{$project->idduan}}">{{$project->tenduan}}</option>
		@endforeach
    </select><br><br>
	<strong>SÀN GIAO DỊCH:</strong><input type="text" name="san" value="{{$contract->san}}" required>

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
	- Ông (bà):<input type="text" name="name" value="{{ $customer->hoten }}" required><br><br>
	- Số CMND:<input type="number" name="identity_card" value="{{ $customer->chungminhthu }}" required>
	  Ngày cấp<input type="date" name="identity_date" style="width:200px" value="{{ $customer->ngaycap }}" required>
	  &nbsp;&nbsp;
	  Tại<input type="text" name="noicap" value="{{ $customer->noicap }}" required><br><br>
	- Hộ khẩu thường trú:<input type="text" name="inhabitant_number" style="width: 350px" value="{{ $customer->hokhau }}" required><br><br>
	- Địa chỉ liên hệ:<input type="text" name="address"style="width: 350px" value="{{ $customer->diachi }}" required><br><br>
	- Điện thoại:	<input type="number" name="phone_number" value="{{ $customer->sodienthoai }}" required><br><br>

	</div>
		<h3>GIÁ BÁN VÀ PHƯƠNG THỨC THANH TOÁN</h3>
		<p>
		Giá bán nhà ở đối với căn hộ nhà ở chung cư được tính theo công thức lấy đơn giá 01 m2 sử dụng nhà ở (x) với tổng diện tích sử dụng nhà ở mua bán,<br><br>
		 cụ thể là:<input type="number" name="square" value="{{ $flat->dientich }}" required>m2 sử dụng (x)<input type="number" required>đồng/1m2 sử dụng = <input type="number" name="price" value="{{$flat->giatri}}" required>đồng. 
		 (Bằng chữ:<input type="text" style="width: 350px">).<br><br>
		 Giá bán này đã bao gồm thuế giá trị gia tăng VAT (nếu bên bán thuộc diện phải nộp thuế VAT).<br><br>
		 Phương thức thanh toán: Các khoản thanh toán theo Hợp Đồng này chỉ được thực hiện qua tài khoản của Bên Bán mở tại Ngân hàng TMCP Đầu tư và Phát triển Việt Nam – Chi nhánh Tây Hà Nội (BIDV Tây Hà Nội)<br><br>
		 a. Thanh toán một lần vào 
		 ngày
		 @if(is_null($contract->ngaythanhtoan))
		 	<input type="date" name="pay_date" style="width:200px;" required> 
		 @else
		 	<input type="date" name="pay_date" style="width:200px;" value="{{$contract->ngaythanhtoan}}" required>
		 @endif

		 (hoặc trong thời hạn 
		 @if(is_null($contract->han))
		 	<input type="number" name="extra_date" style="width:50px;" required>
		 @else
		 	<input type="number" name="extra_date" style="width:50px;" value="{{$contract->han}}" required>
		 @endif
		 ngày, kể từ sau ngày kí kết hợp đồng này).<br><br>
		 b. Trường hợp mua nhà ở theo phương thức trả dần thì thực hiện thanh toán vào các đợt:  số lần thanh toán là
		 	<select name="contract_kind">
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
	</div>
        <!-- to here -->
        </form>
    </div>
</section>
<!-- /.content -->
@endsection('content')