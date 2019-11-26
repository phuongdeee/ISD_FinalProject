@extends('partialView.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Quản lý hợp đồng
        <!-- <small>advanced tables</small> -->
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> AdminAZ</a></li>
        <li><a href="#">Quản lý hợp đồng</a></li>
        <!-- <li class="active">Quản lý hợp đồng</li> -->
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
                <p>Bảng thông tin hợp đồng</P>
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Số hợp đồng</th>
                                <th>Dự án</th>
                                <th>Căn hộ</th>
                                <th>Khách hàng</th>
                                <th>Sàn</th>
                                <th>Giá trị</th>
                                <th>Ngày ký</th>
                                <th>Ngày thanh toán</th>
                                <th>Hạn đóng</th>
                                <th>Tiến độ đóng tiền</th>
                                <th colspan="2">Hành động</th> <!-- Default pagination disappear after adding colspan = 2-->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contract_array as $item )
                            <tr>
                                <td>{{$item->san}}</td>
                                <td>{{$item->tenduan}}</td>
                                <td>{{$item->tencanho}}</td>
                                <td>{{$item->hoten}}</td>
                                <td>{{$item->san}}</td>
                                <td>{{$item->giatri}}</td>
                                <td>{{$item->ngayky}}</td>
                                <td>{{$item->ngaythanhtoan}}</td>
                                <td>{{$item->han}}</td>
                                <td>{{$item->tiendo}}</td>
                                <td>
                                <a href="contract/{{$item->idhopdong}}/edit" class="btn btn-block btn-primary">Sửa</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $contract_array->links() }}
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
@section('page_script')
<!-- DataTables -->

<script src="{{asset('layouts/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('layouts/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- page script -->
<script>
    $(function () {
    $('#example1').DataTable()
            $('#example2').DataTable({
    'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
    })
    })
</script>
@endsection('page_script')