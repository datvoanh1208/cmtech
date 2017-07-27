@extends('admin.layout.master')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại sản phẩm
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                    @if(count($errors) > 0)
                    <div class="elert alert-danger">
                    @foreach($errors->all() as $err)
                        {{$err}}<br>
                         @endforeach
                    </div>
                    @endif
                    @if(Session('thongbao'))
                        <div class="alert alert-success">
                            {{Session('thongbao')}}
                        </div> 
                    @endif
                        <form action="admin/loaisanpham/them" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                            
                            <div class="form-group">
                                <label>Thêm loại sản phẩm</label>
                                <input class="form-control" name="Ten" placeholder="Nhập tên loại sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <input class="form-control" name="MoTa" placeholder="Nhập mô tả" />
                            </div>
                            <div class="form-group">
                                <label>Link ảnh</label>
                                <input class="form-control" name="LinkAnh" placeholder="Nhập link ảnh vd: abc.png" />
                            </div>
                           
                            <button type="submit" class="btn btn-default">Thêm</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection