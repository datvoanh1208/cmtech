@extends('admin.layout.master')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
                            <small>{{$sanpham->name}}</small>
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
                        <form action="admin/sanpham/sua/{{$sanpham->id}}" method="POST" enctype="multipart/form-data">
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
                                <input class="form-control" name="TenSP" placeholder="Nhập tên sản phẩm" value="{{$sanpham->name}}" />
                            </div>
                            
                            
                            <div class="form-group">
                                <label>Nhập mô tả</label>
                                <textarea id="demo" class="form-control ckeditor" rows="3" name="MoTa" value="" >
                                    {{$sanpham->description}}
                                </textarea>
                            </div>

                            <div class="form-group">
                                <label>Giá gốc</label>
                                <input class="form-control" name="GiaGoc" placeholder="Nhập giá gốc" value="{{$sanpham->unit_price}}"/>
                            </div>

                            <div class="form-group">
                                <label>Giá khuyến mãi</label>
                                <input class="form-control" name="GiaKM" placeholder="Nhập giá khuyến mãi" value="{{$sanpham->promotion_price}}"/>
                            </div>

                            <!-- <div class="form-group">
                                <label>Link ảnh</label>
                                <input class="form-control" name="LinkAnh" placeholder="Please Enter Category Order" />
                            </div> -->
                            

                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <img width="auto" src="{{asset('source/home/image/product/'.$sanpham->image)}}" alt="">
                                <input class="form-control" type="file" name="UploadHinh" />
                            </div>


                            <div class="form-group">
                                <label>Đơn vị</label>
                                <input class="form-control" name="DonVi" placeholder="Cái" value="{{$sanpham->unit}}"/>
                            </div>



                            <div class="form-group">
                                <label>Nổi bật</label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="1" 
                                    @if($sanpham->new == 1)
                                    {{"Checked"}}
                                    @endif

                                     type="radio">Có
                                </label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="0" 
                                    @if($sanpham->new == 0)
                                    {{"Checked"}}
                                    @endif
                                    type="radio">Không
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        <form>
                    </div>
                </div>


                <!-- /.row binh luan-->
                 <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bình luận
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
                                <th>Người dùng</th>
                                <th>Nội dung</th>
                                <th>Ngày đăng</th>
                               
                                <th>Delete</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($sanpham->comment as $cm)
                            <tr class="odd gradeX" align="center">
                                <td>{{$cm->id}}</td>
                                <td>{{$cm->user->full_name}}</td>
                                <td>{{$cm->NoiDung}}</td>
                                <td>{{$cm->created_at}}</td>
                                
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comment/xoa/{{$cm->id}}/{{$sanpham->id}}"> Xóa</a></td>
                              
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.end row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection