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
button {
    margin-left: 50%;
}
</style>
@extends('partialView.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Thêm vị trí
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> AdminAZ</a></li>
        <li><a href="{{ url ('admin/location') }}">Bảng vị trí</a></li>
        <li class="active">Thêm vị trí</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="container">
        <form method="POST" action="{{ url('/admin/location/store') }}">
        {{ csrf_field() }}
        <label>Tên vị trí</label>
            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
            <input type="text" name="location_name">

            <label>Tổng số dự án</label>
            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
            <input type="number" name="project_number"><br><br><br>
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
</section>
<!-- /.content -->
@endsection('content')