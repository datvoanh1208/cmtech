@extends('admin.layout.master')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <form action="{{route('delall')}}" id="frmDeleteAll">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <table class="table table-striped table-bordered table-hover" id="hehe">
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
                        <thead>
                            <tr align="center">
                                <th></th>
                                <th>ID</th>
                                <th>Họ Tên</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th>SĐT</th>
                                <th>Địa chỉ</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($user as $usr)
                            <tr class="odd gradeX" align="center">
                                <td>
                                   <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                   <input type="checkbox" class="checkboxes" name="checkbox" value="{{$usr->id}}">
                                   <span></span>
                                   </label>
                                </td>
                                <td>{{$usr->id}}</td>
                                <td>{{$usr->full_name}}</td>
                                <td>{{$usr->email}}</td>
                                <td>
                                    @if($usr->level==0)
                                    {{"Thường"}}
                                    @else
                                    {{"Admin"}}
                                    @endif
                                </td>
                                <td>{{$usr->phone}}</td>
                                <td>{{$usr->address}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/user/xoa/{{$usr->id}}"> Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/sua/{{$usr->id}}">Sửa</a></td>
                            </tr>
                            @endforeach
                            
                           </tbody>

                        </table>
                        <input type="checkbox" id="checkAll" > Check All
                        <a type="submit" id="sample_editable_1_new" class="btn sbold red destroy pull-right xoahet"> Xóa hết
                            <i class="fa fa-trash"></i>
                            </a>

                    </form>
                    <div class="row">{{$user->links()}}</div>
                    <!-- /.col-lg-12 -->
                    

                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection
@section('script')
<script>
   $('.xoahet').click(function() {
    //ko biết nó vô hay chưa k biết luôn :
    //phải tét coi nó vô chưa... méo vô
    //cái class xóa hết đâu
    //k co r :3
    //giừ làm theo hướng mày đang làm nha chứ bình thường cái này xà function .ok
//mử router đó lên coi phát
//ok hiểu r
//đọc có hiểu gì đâu :))

       var _form = $("#frmDeleteAll");
       var arr = [];
       var set = $('#hehe').find('.checkboxes');
       $(set).each(function () {
           if ($(this).prop("checked")) {
              arr.push($(this).val());
           }
       });
       $.ajax({
           type: "POST",
           data: {ids:arr, _token: $('input[name=_token]').val()},
           url: _form.attr('action'),
           success: function (data) {
               if (data === 'true') {
                 location.reload();
               }
           }
       });
   });
//chỗ nào click thì gắn id = checkAll gắn đi
    $('#checkAll').click(function () {    
        $(':checkbox.checkboxes').prop('checked', this.checked);    
    });
</script>
@endsection