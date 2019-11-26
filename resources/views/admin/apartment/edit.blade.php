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
    width: 80px;
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
        <li class="active">Sửa thông tin chung cư</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="container">
    <p>Sửa thông tin chung cư</p>
    <form role="form" method="POST" action="{{ route('apartment.update', $apartment->idtoachungcu) }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif
        <label>Dự án</label>
        <select name="project_name" required>
        @foreach($projects as $project)
            <option value="{{$project->idduan}}">{{ $project->tenduan}}</option>
        @endforeach
        </select>
        
        <label>Tên tòa chung cư</label>
        <input name="apartment_name" type="text" value="{{$apartment->tentoa}}" required><br><br>
        
        <label>Tầng thương mại</label>
        Từ: 
        <input class="custom" name="begin_trade_floor" type="number" value="{{$apartment->batdauthuongmai}}" required>
        đến:
        <input class="custom" name="end_trade_floor" type="number" value="{{$apartment->ketthucthuongmai}}" required>
        
        <label>Tầng dân cư</label>
        Từ:
        <input class="custom" name="begin_people_floor" type="number" value="{{$apartment->batdaudancu}}" required>
        đến:
        <input class="custom" name="end_people_floor" type="number" value="{{$apartment->ketthucdancu}}" required><br><br>

        
        <label>Tình trạng</label>
        <input name="manage_team" type="text" value="{{$apartment->donviquanly}}" required>
        <i>(Tên đơn vị quản lý viết không dấu)</i><br><br>

        <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
</section>
<!-- /.content -->
@endsection('content')