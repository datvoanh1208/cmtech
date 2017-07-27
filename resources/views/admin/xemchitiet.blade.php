@extends('admin.layout.master')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Xem chi tiết đơn hàng
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
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                     
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($bill as $b)
                            <tr class="odd gradeX" align="center">
                                <td>{{$b->name}}</td>
                                <td>{{$b->name_product}}    
                                </td>
                                <td>{{$b->quantity}}</td>
                                <td>{{$b->unit_price}}</td>

                               
                               
                                <td class="center"><i class="fa fa-trash fa-fw"></i> <a href="admin/xoachitiet/{{$b->id_billdetail}}/{{$b->id}}">Xóa</a></td>
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