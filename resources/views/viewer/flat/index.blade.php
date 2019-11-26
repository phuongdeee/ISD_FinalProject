
@extends('partialView.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Quản lý căn hộ
        <!-- <small>advanced tables</small> -->
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> AdminAZ</a></li>
        <li><a href="#">Quản lý căn hộ</a></li>
        <!-- <li class="active">Bảng hợp đồng</li> -->
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <!-- <h3 class="box-title">Hover Contract Table</h3> -->
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                <p>Bảng thông tin căn hộ</p>
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Tên căn</th>
                                <th>Tên dự án</th>
                                <th>Tên chung cư</th>
                                <!-- <th>Số phòng ngủ</th> -->
                                <th>Giá trị</th>
                                <th>Chi tiết</th>
                                <th>Tình trạng</th>
                                <th colspan="2">Hành động</th> <!-- Default pagination disappear after adding colspan = 2-->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($flat_array as $item )
                            <tr>
                                <td>{{$item->tencanho}}</td>
                                <td>{{$item->tenduan}}</td>
                                <td>{{$item->tentoa}}</td>
                                <!-- <td>{{$item->sophongngu}}</td> -->
                                <td>{{$item->giatri}}</td>
                                <td>
                                Diện tích: {{$item->dientich}} -
                                Số phòng khách: {{$item->sophongkhach}} -
                                Số phòng ngủ: {{$item->sophongngu}} -
                                Số phòng bếp: {{$item->sophongbep}}
                                </td>
                                @if($item->tinhtrang == 1)
                                    <td>Đã có người mua</td>
                                @elseif($item->tinhtrang == 0)
                                    <td>Còn trống</td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $flat_array->links() }}
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

