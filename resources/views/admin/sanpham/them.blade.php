@extends('admin.layout.master')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
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
                        <form action="admin/sanpham/them" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group" >
                                <label>Loại sản phẩm</label>
                                <select class="form-control" name="LoaiSP" id="LoaiSP">
                                    @foreach($loaisanpham as $loai)
                                    <option value="{{$loai->id}}">
                                    {{$loai->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input class="form-control" name="TenSP" placeholder="Nhập tên sản phẩm" />
                            </div>
                            
                            
                            <div class="form-group">
                                <label>Nhập mô tả</label>
                                <textarea id="demo" class="form-control ckeditor" rows="3" name="MoTa"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Giá gốc</label>
                                <input class="form-control" name="GiaGoc" placeholder="Nhập giá gốc" />
                            </div>

                            <div class="form-group">
                                <label>Giá khuyến mãi</label>
                                <input class="form-control" name="GiaKM" placeholder="Nhập giá khuyến mãi" />
                            </div>

                            <!-- <div class="form-group">
                                <label>Link ảnh</label>
                                <input class="form-control" name="LinkAnh" placeholder="Please Enter Category Order" />
                            </div> -->
                            

                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input class="form-control" type="file" name="UploadHinh"  />
                            </div>


                            <div class="form-group">
                                <label>Đơn vị</label>
                                <input class="form-control" name="DonVi" placeholder="Cái" />
                            </div>



                            <div class="form-group">
                                <label>Nổi bật</label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="1" checked="" type="radio">Có
                                </label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="0" type="radio">Không
                                </label>
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