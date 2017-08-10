@extends('admin.layout.master')
@section('content')
<?php
  $tu_ngay =  isset($_GET['tu_ngay']) ? $_GET['tu_ngay'] : '';
  $den_ngay =  isset($_GET['den_ngay']) ? $_GET['den_ngay'] : '';
  $quy =  isset($_GET['quy']) ? $_GET['quy'] : '';
?>
<div id="page-wrapper">
<div class="container-fluid">
   <div class="row">
      <form action="" action="Get">
          <h1>BÁO CÁO BÁN HÀNG</h1>
      <p>
         Từ ngày : 
         <!-- <label for="date">Date:</label> -->
         <input type="date" name="tu_ngay" id="tu_ngay" value="{{$tu_ngay}}">
      </p>
      <p>
         Đến ngày : 
         <!-- <label for="date2">Date:</label> -->
         <input type="date" name="den_ngay" id="den_ngay" value="{{$den_ngay}}">
      </p>
      <p>
         Theo quý : 
         <!-- <label for="select">Select:</label> -->
         <select name="quy" id="quy">
            <option value="">Chọn quý</option>
            <option value="1" @if($quy==1) selected @endif>1</option>
            <option value="2" @if($quy==2) selected @endif>2</option>
            <option value="3" @if($quy==3) selected @endif>3</option>
            <option value="4" @if($quy==4) selected @endif>4</option>
         </select>
      </p>
   
      <input type="submit" value="search">
      <p>&nbsp;</p>
      </form>
      
      <table width="708" height="128" border="1">
         <tbody>
            <tr>
               <td>STT</td>
               <td>Tên sản phẩm</td>
               <td>Số lượng</td>
               <td>Đơn giá</td>
               <td>Thành tiền</td>
            </tr>
            <?php $i=1;
                  $tong_tien = 0;
            ?>
            @foreach($arrBill as $b)
            <tr>
               <td height="43">
                  {{$i}}
               </td>
               <td>
                  {{$b['name_product']}}
               </td>
               <td>
                  {{$b['quantity']}}
               </td>
               <td>
                  {{$b['unit_price']}}
               </td>
               <td>
                  {{$b['total']}}
               </td>
            </tr>
            <?php $i++;
                  $tong_tien += $b['total'];
            ?>
            @endforeach
            <tr>
               <td height="43">
                  
               </td>
               <td>
                  
               </td>
               <td>
                  
               </td>
               <td>
                  Tổng tiền
               </td>
               <td>
                  {{$tong_tien}}
               </td>
            </tr>
            
         </tbody>
      </table>
      <p>&nbsp;</p>
     
      <form action="{{asset('admin/xuat-excel')}}" method="post">
         <input type="hidden" name="_token" value="{{csrf_token()}}">

         <input type="submit" name="button" id="button" value="Xuất Excel">
      </form>
      <p>&nbsp;</p>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
<script type="text/javascript">
   $( "#tu_ngay" ).datepicker({ dateFormat: 'dd-mm-yy' });
   $( "#den_ngay" ).datepicker({ dateFormat: 'dd-mm-yy' });
   
</script>
@endsection