@extends('admin.layout.master')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Xử lý đơn hàng
                            <small></small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(Session('thongbao'))
                        <div class="alert alert-success">
                            {{Session('thongbao')}}
                        </div> 
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>Tên khách hàng</th>
                                <th>SĐT</th>
                                <th>Ngày mua</th>
                                <th>Địa chỉ</th>
                                <th>Trạng thái xử lý</th>
                                <th>Xem chi tiết</th>
                                <th>Chấp nhận</th>
                                <th>Hủy</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($bill as $b)
                            <tr class="odd gradeX" align="center">
                                <td>{{$b->name}}</td>
                                <td>{{$b->phone_number}}    
                                </td>
                                <td>{{date('d-m-y', $b->date_order)}}</td>
                                <td>{{$b->address}}</td>
                                <td>
                                    @if($b->status==1)
                                    {{'Đang chờ xử lý'}}
                                    @else
                                    {{'Đã xử lý'}}
                                    @endif
                                </td>
                                
                                <td><a href="admin/xemchitiet/{{$b->id_bill}}">Chi tiết</a></td>

                               

                                <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin/luudonhang/{{$b->id_bill}}">Chấp nhận</a></td>
                                <td class="center"><i class="fa fa-trash fa-fw"></i> <a href="admin/xoadonhang/{{$b->id_bill}}">Hủy đơn hàng</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection