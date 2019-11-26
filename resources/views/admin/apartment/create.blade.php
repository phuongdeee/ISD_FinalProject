<style>
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
label {
    margin-left: 30px;
    margin-right: 10px;
}
input.detail{
    width: 50px;
}
input.custom{
    width: 300px;
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
        Quản lý chung cư
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> AdminAZ</a></li>
        <li><a href="{{ url ('admin/apartment') }}">Quản lý chung cư</a></li>
        <li class="active">Thêm tòa chung cư</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="container">
    <p>Thêm tòa chung cư</p>
        <form method="POST" action="{{ route('apartment.store') }}">
        {{ csrf_field() }}
        @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif
            <label>Tên dự án</label>
            <select name="project_name"  autofocus>
            @foreach($projects as $project)
                <option value="{{$project->idduan}}">{{$project->tenduan}}</option>
                <!-- <option value="2">AZ Five Stars</option>
                <option value="3">AZ SKY Tower</option>
                <option value="4">AZ Vân Canh Tower</option>
                <option value="5">AZ Starry Night</option> -->
            @endforeach
            </select><br><br>

            <label>Tòa chung cư</label>
            <input class="custom" type="text" name="apartment_name" value="{{ old('apartment_name') }}" 
            required><br><br>

            <label>Tầng thương mại</label>
            Từ tầng <input class="detail" type="number" name="begin_trade_floor" 
            value="{{ old('begin_trade_floor') }}" required> 
            đến <input class="detail" type="number" name="end_trade_floor"
            value="{{ old('end_trade_floor') }}" required>

            <label>Tầng dân cư</label>
            Từ tầng <input class="detail" type="number" name="begin_people_floor"
            value="{{ old('begin_people_floor') }}" required>
            đến <input class="detail" type="number" name="end_people_floor"
            value="{{ old('end_people_floor') }}" required><br><br>

            <label for="status">Đơn vị quản lý</label>
            <input  type="text" name="manage_team" value="{{ old('apartment_name') }}" 
            required><i>(Tên đơn vị quản lý viết không dấu)</i><br><br>

            <button type="submit" class="btn btn-primary">Lưu</button>
            <button type="reset" class="btn btn-primary">Làm mới trang</button>
        </form>
    </div>
</section>
<!-- /.content -->
@endsection('content')