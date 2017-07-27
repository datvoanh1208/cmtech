@extends('admin.layout.master')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
                            <small>Danh sách</small>
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
                                <th>ID</th>
                                <th>Tên</th>
                                <th>ID Loại SP</th>
                                <th>Mô tả</th>
                                <th>Giá gốc</th>
                                <th>Giá khuyến mãi</th>
                                <th>Link</th>
                                <th>Đơn vị</th>
                                <th>SP mới</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($sanpham as $sp)
                            <tr class="odd gradeX" align="center">
                                <td>{{$sp->id}}</td>
                                <td>{{$sp->name}}
                                    <img width="100px" src="source/home/image/product/{{$sp->image}}" alt="">
                                </td>
                                <td>{{$sp->id_type}}</td>
                                <td>{{$sp->description}}</td>
                                <td>{{$sp->unit_price}}</td>
                                <td>{{$sp->promotion_price}}</td>
                                <td>{{$sp->image}}</td>
                                <td>{{$sp->unit}}</td>
                                <td>
                                    @if($sp->new==0)
                                    {{'Không'}}
                                    @else
                                    {{'Có'}}
                                    @endif
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/sanpham/xoa/{{$sp->id}}"> Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/sanpham/sua/{{$sp->id}}">Sửa</a></td>
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