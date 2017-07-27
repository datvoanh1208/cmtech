<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bill_detail;
use App\bills;
use DB;
use Mail;
use Session;



class AdminController extends Controller
{
    //
    public function getBaocao(Request $req)
    {
      $tu_ngay = '';
      $den_ngay = '';
      $quy = '';
      $data = $req->all();
      if($data){

        $tu_ngay = $data['tu_ngay'] ? $data['tu_ngay'] : '' ;
        $tu_ngay = $tu_ngay ? strtotime("$tu_ngay 00:00:00") : '';
        $den_ngay = $data['den_ngay'] ? $data['den_ngay']: '' ;
        $den_ngay = $den_ngay ? strtotime("$den_ngay 23:59:59"): '';
        $quy = $data['quy'] ? $data['quy']: '' ;
      }
      if($quy && !$tu_ngay && !$den_ngay){
        $now = getdate();
        $nam_hien_tai = $now['year'];
        switch ($quy) {
          case '1':
            $tu_ngay = strtotime("1-1-$nam_hien_tai 00:00:00");
            $den_ngay = strtotime("31-3-$nam_hien_tai 23:59:59");
            break;
          case '2':
            $tu_ngay = strtotime("1-4-$nam_hien_tai 00:00:00");
            $den_ngay = strtotime("30-6-$nam_hien_tai 23:59:59");
            break;
          case '3':
            $tu_ngay = strtotime("1-7-$nam_hien_tai 00:00:00");
            $den_ngay = strtotime("30-9-$nam_hien_tai 23:59:59");
            break;
          case '4':
            $tu_ngay = strtotime("1-10-$nam_hien_tai 00:00:00");
            $den_ngay = strtotime("31-12-$nam_hien_tai 23:59:59");
            break;
        }
      }
    	$bill = DB::table('bills')
    		->select('bills.*','bill_detail.id as id_detail','bill_detail.name_product','bill_detail.id_product','bill_detail.quantity','bill_detail.unit_price')
            ->join('bill_detail', 'bill_detail.id_bill', '=', 'bills.id');
      if($tu_ngay){
        $bill->where('bills.date_order','>',$tu_ngay);
      }
      if($den_ngay){
        $bill->where('bills.date_order','<',$den_ngay);
      }
      $bill = $bill->get();
      	
      	// $arrIdProduct = DB::table('bill_detail')->groupBy('id_product')->pluck('id_product');
      	// $arrIdProduct = (array)($arrIdProduct);
      	$arrBill = array();
      	$arrId = array();
      	foreach ($bill as $v) {
      		$id_product = $v->id_product;
      		$id_detail = $v->id_detail;
      		$check = $this->checkUniquePrice($v,$arrBill);
      		if(in_array($id_product, $arrId) && $check){
    			$arrBill[$check]['quantity'] += $v->quantity;
				$arrBill[$check]['total'] += $v->quantity*$v->unit_price;
    			
      		}else{
      			$arrBill[$id_detail]['id_product'] = $id_product;
				$arrBill[$id_detail]['name_product'] = $v->name_product;
				$arrBill[$id_detail]['quantity'] = $v->quantity;
				$arrBill[$id_detail]['unit_price'] = $v->unit_price;
				$arrBill[$id_detail]['total'] = $v->quantity*$v->unit_price;
      		}
      		$arrId[]= $id_product;
      	}
    	return view('admin.bcdoanhthu',compact('arrBill'));
    }

    public function checkUniquePrice($product, $arrProduct){
    	foreach ($arrProduct as $key => $v) {
    		if($v['unit_price']==$product->unit_price && $v['id_product']==$product->id_product){
    			return $key;
    		}
    	}
    	return 0;
    }

    public function getExcel(Request $req)
    {
        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=data.xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        $bill = DB::table('bills')
        ->select('bills.*','bill_detail.id as id_detail','bill_detail.name_product','bill_detail.id_product','bill_detail.quantity','bill_detail.unit_price')
            ->join('bill_detail', 'bill_detail.id_bill', '=', 'bills.id');
      
        $bill = $bill->get();

        $arrBill = array();
        $arrId = array();
        foreach ($bill as $v) {
          $id_product = $v->id_product;
          $id_detail = $v->id_detail;
          $check = $this->checkUniquePrice($v,$arrBill);
          if(in_array($id_product, $arrId) && $check){
          $arrBill[$check]['quantity'] += $v->quantity;
          $arrBill[$check]['total'] += $v->quantity*$v->unit_price;
          
          }else{
            $arrBill[$id_detail]['id_product'] = $id_product;
        $arrBill[$id_detail]['name_product'] = $v->name_product;
        $arrBill[$id_detail]['quantity'] = $v->quantity;
        $arrBill[$id_detail]['unit_price'] = $v->unit_price;
        $arrBill[$id_detail]['total'] = $v->quantity*$v->unit_price;
          }
          $arrId[]= $id_product;
        }

        echo '<meta charset="utf-8" />
        <table width="708" height="128" border="1">
          <tbody>
             <tr>
               <td>STT</td>
               <td>Tên sản phẩm</td>
               <td>Số lượng</td>
               <td>Đơn giá</td>
               <td>Thành tiền</td>
            </tr>';
            $i = 1;
            $tong_tien  = 0;
          foreach ($arrBill as $key => $v) {
           echo ' <tr>
               <td height="43">
                  '.$i.'
               </td>
               <td>
                  '.$v['name_product'].'
               </td>
               <td>
                  '.$v['quantity'].'
               </td>
               <td>
                  '.$v['unit_price'].'
               </td>
               <td>
                  '.$v['total'].'
               </td>
            </tr>';
            $tong_tien += $v['total'];
            $i++;
          }
        echo '<tr>
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
                  '.$tong_tien.'
               </td>
            </tr>';
        echo '  </tbody>
        </table>   ';

    }

    public function getLuuXuly($id)
    {
      
      DB::table('bills')
            ->where('id', $id)
            ->update(['status' => 0]);
            //cái này dẫn qua hàm addFeedback anh còn nhớ ko, uh rồi sao
            //trong controller hồi nảy mình code tương tự như này phải k , thuật toán tương tự nhưng cách làm khác, phải linh động chứ ba, ở đây vì nó đã đăng nhập có id mà ko có mail nên mình phải lấy id để truyền vô lấy mail, bên kia có mail rồi lấy id làm gì
       $this->addFeedback($id);
      return redirect('admin/xulydonhang');
    }

    public function addFeedback($id)
    {
      //hồi trước mình làm như này nè
        $bill = DB::table('bills')
            ->join('customer', 'bills.id_customer', '=', 'customer.id')
            ->where('bills.id','=',$id)
            
            ->first();
// thấy thằng id này truyền vô chỉ là để lấy mail thôi ko à à 
        $email = $bill->email;
         Mail::send('admin.mailsample', array('name'=>$bill->name,'email'=>$bill->email, 'content'=>$bill->total), function($message) use ($email){
            $message->to($email,'chào quý khách')->subject('Phản hồi khách hàng!');
         });
         Session::flash('thongbao', 'Đã gửi mail thành công!');
    }

    public function getXuly()
    {
      $bill = DB::table('bills')
            ->join('customer', 'bills.id_customer', '=', 'customer.id')
            ->select ('customer.*','bills.id as id_bill', 'bills.status','bills.date_order')
            ->get();

      return view('admin.xulydonhang',compact('bill'));
    }

    public function getXoaXuly($id){
       $bill = DB::table('bills')->where('id',$id)->first();
       DB::table('bills')->where('id', '=', $id)->delete();
       DB::table('customer')->where('id', '=', $bill->id_customer)->delete();
       DB::table('bill_Detail')->where('id_bill', '=', $id)->delete();

        return redirect('admin/xulydonhang')->with('thongbao','Đã xóa đơn hàng thành công!');
    }

    public function getXemchitiet($id)
    {
        $bill = DB::table('bills')
            ->join('customer', 'customer.id', '=', 'bills.id_customer')
            ->join('bill_detail', 'bill_detail.id_bill', '=', 'bills.id')
            ->select('bill_detail.id as id_billdetail','bill_detail.name_product','bill_detail.quantity','bill_detail.unit_price', 'customer.name', 'bills.*')
            ->where('bills.id','=',$id)
            ->get();

        return view('admin/xemchitiet',compact('bill'));
    }

    public function getXoachitiet($idbilldetail,$idbill)
    {
      
       DB::table('bill_detail')->where('id', '=', $idbilldetail)->delete();
        return redirect('admin/xemchitiet/'.$idbill)->with('thongbao','Đã xóa chi tiết thành công!');
    }

  
   
}
