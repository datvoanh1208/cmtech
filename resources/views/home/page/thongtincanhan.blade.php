@extends('home.master')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row" >
                    <div class="col-lg-12">
                        <h1 class="page-header">Thông tin tài khoản
                            <small>{{$user->full_name}}</small>
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
                        <form action="thongtincanhan/{{$user->id}}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                            <div class="form-group">
                                <label>Họ Tên</label>
                                <input class="form-control" name="name" placeholder="Nhập tên" value="{{$user->full_name}}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" readonly="true" value="{{$user->email}}" placeholder="Nhập email" />
                            </div>
                            <div class="form-group">
                                <label>Số ĐT</label>
                                <input class="form-control" name="phone" value="{{$user->phone}}" placeholder="SĐT" />
                            </div>
                            <div class="form-group">

                                <label>Địa chỉ</label>
                                <input class="form-control" value="{{$user->address}}" name="address" placeholder="Địa chỉ" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="changePassword" name="changePassword">
                                <label>Đổi mật khẩu</label>
                                <input type="password" class="form-control password" name="password" placeholder="Nhập password" disabled="" />
                            </div>
                            <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input type="password" class="form-control password" name="re_password" placeholder="Nhập lại password" disabled="" />
                            </div>
                            
                            <button type="submit" class="btn btn-default">Cập nhật</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        $("#changePassword").change(function(){
            if($(this).is(":checked"))
            {
                $(".password").removeAttr('disabled');
            }
            else
            {
                $(".password").attr('disabled','');
            }
        });

    });
</script>
@endsection