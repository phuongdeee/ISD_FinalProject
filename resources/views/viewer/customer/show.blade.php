@extends('partialView.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Quản lý khách hàng
        <!-- <small>advanced tables</small> -->
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> AdminAZ</a></li>
        <li><a href="#">Quản lý khách hàng</a></li>
        <li class="active">Thông tin chi tiết</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
<p>Thông tin chi tiết</p>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <!-- <h3 class="box-title">Hover Contract Table</h3> -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Họ tên</th>
                                <th>CMND</th>
                                <th>Ngày cấp</th>
                                <th>Nơi cấp</th>
                                <th>căn hộ</th>
                                <th>Ngày sinh</th>
                                <th>Email</th>
                                <th>SĐT</th>
                                <th>Hộ khẩu</th>
                                <th>Địa chỉ</th>
                                <th>Ghi chú</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $item )
                            <tr>
                                <td>{{$item->hoten}}</td>
                                <td>{{$item->chungminhthu}}</td>
                                <td>{{$item->ngaycap}}</td>
                                <td>{{$item->noicap}}</td>
                                <td>{{$item->tencanho}}</td>
                                <td>{{$item->ngaysinh}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->sodienthoai}}</td>
                                <td>{{$item->hokhau}}</td>
                                <td>{{$item->diachi}}</td>
                                <td>{{$item->ghichu}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@endsection('content')