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
</style>
@extends('partialView.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    Quản lý dự án
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> AdminAZ</a></li>
        <li><a href="{{ url ('admin/project') }}">Quản lý dự án</a></li>
        <li class="active">Thêm dự án</li>
    </ol>
</section>

<!-- Main content -->

<section class="content">
    <div class="container">
    <p> Thêm dự án</p>
        <form method="POST" action="{{ route('project.store') }}">
        {{ csrf_field() }}
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

            <label for="project_name">Tên dự án </label>
            <input type="text" id="project_name" name="project_name" value="{{ old('project_name') }}" 
            required autofocus>
            <i>(Tên dự án viết không dấu)</i><br><br>

            <label>Công ty trực thuộc</label>
            <input type="text" name="company" value="{{ old('company') }}" required>    
            <i>(Tên công ty viết không dấu)</i><br><br>   

            <label>Vị trí </label>&nbsp;&nbsp;
            <input type="text" name="location" value="{{ old('location') }}" required><br><br>

            <label>Trị giá</label>
            <input type="number" name="price" value="{{ old('price') }}" required>  

            <label>Số tòa nhà</label>
            <input type="number" name="apartment_number" value="{{ old('apartment_number') }}" required><br><br>

            <!-- <label for="status">Tình trạng</label>
            <select name="status" id="status" required>
                <option value="1">Đã hoàn thành</option>
                <option value="0">Chưa hoàn thành</option>
            </select><br><br> -->

            <button type="submit" class="btn btn-primary">Lưu</button>
            <button type="reset" class="btn btn-primary">Làm mới trang</button>
        </form>
    </div>
</section>
<!-- /.content -->
@endsection('content')