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
button {
    margin-left: 50%;
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
        <li class="active">Sửa thông tin dự án</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
<p> Sửa thông tin dự án</p>
        <form role="form" method="POST" action="{{ route('project.update', $project->idduan) }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif
                <label>Tên dự án</label>
                <input name="project_name" value="{{$project->tenduan}}" required>
                <i>(Tên dự án viết không dấu)</i><br><br>
            
                <label>Công ty trực thuộc</label>
                <input name="company" type="text" value="{{$project->congtytructhuoc}}" required>
                <i>(Tên công ty viết không dấu)</i><br><br>
            
                <label>Vị trí</label>
                <input name="location" type="text" style="width:250px" value="{{$project->vitri}}" required><br><br>
        
                <label>Số tòa nhà</label>
                <input name="apartment_number" type="number" value="{{$project->sotoanha}}" required>
            
                <label>Trị giá</label>
                <input name="project_worth" type="number" value="{{$project->trigia}}" required><br><br>
            
                <!-- <label>Tình trạng</label>
                @if($project->tinhtrang == 1)
                    <select name="status">
                        <option value="1" selected>Đã hoàn thành</option>
                        <option value="0">Chưa hoàn thành</option>
                    </select><br><br> -->
                
                <!-- @elseif($project->tinhtrang == 0)
                    <select name="status">
                        <option value="1">Đã hoàn thành</option>
                        <option value="0" selected>Chưa hoàn thành</option>
                    </select><br><br>
                
                @endif -->
                <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
</section>
@endsection('content')