
@extends('partialView.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Quản lý chung cư
        <!-- <small>advanced tables</small> -->
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> AdminAZ</a></li>
        <li><a href="#">Quản lý chung cư</a></li>
        <!-- <li class="active">Bảng hợp đồng</li> -->
    </ol>
</section>

<!-- Main content -->
<section class="content">
<div>
<div>
    <!-- Alerts -->
    @if(session()->has('create_notif'))
        <div class="alert alert-success">{{ session()->get('create_notif') }}</div>
    @elseif(session()->has('update_notif'))
        <div class="alert alert-success">{{ session()->get('update_notif') }}</div>
    @elseif(session()->has('delete_notif'))
    <div class="alert alert-success">{{ session()->get('delete_notif') }}</div>
    @endif
    <!-- End alerts -->
</div>
</div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <!-- <h3 class="box-title">Hover Contract Table</h3> -->
                </div>
                <div class="btn">
                    <button type="button" onclick="location.href='{{ url('admin/apartment/create') }}'" class="btn btn-block btn-primary">Thêm chung cư</button>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                <p>Bảng thông tin chung cư</p>                
                    <table id="example2" class="table table-bordered table-hover">                    
                        <thead>
                            <tr>
                                <th>Tên dự án</th>
                                <th>Tòa chung cư</th>
                                <th>Tầng thương mại</th>
                                <th>Tầng dân cư</th>
                                <th>Đơn vị quản lý</th>
                                <th colspan="2">Hành động</th> <!-- Default pagination disappear after adding colspan = 2-->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($apartment_array as $item )
                            <tr>
                                <td>{{$item->tenduan}}</td>
                                <td>{{$item->tentoa}}</td>
                                <td>{{$item->batdauthuongmai}} - {{$item->ketthucthuongmai}}</td>
                                <td>{{$item->batdaudancu}} - {{$item->ketthucdancu}}</td>
                                <td>{{$item->donviquanly}}</td>
                                
                                <td><a href="apartment/{{$item->idtoachungcu}}/edit" class="btn btn-primary">Sửa</a></td>
                                <td>
                                <form action="{{ route('apartment.destroy', $item->idtoachungcu)}}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a onclick="return confirm('Bạn có chắc muốn xóa chung cư?');">
                                    <button class="btn btn-danger" type="submit" > Xóa </button>
                                </a>
                                </form>
                                </td>
                                    
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $apartment_array->links() }}
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