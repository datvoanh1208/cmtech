<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Session;
use DB;
use App\Bills;
use App\bill_detail;
use App\Customer;


class EmailController extends Controller
{
    //

    public function getaddFeedback($id)
    {
    	$bill = DB::table('bills')
            ->join('customer', 'bills.id_customer', '=', 'customer.id')
            ->where('bills.id','=',$id)
            ->select('bills.id as id_bill','customer.name as name_customer','customer.email','bills.total')
            ->get();

        
        return view('admin.mail',compact('bill'));
    }

     public function addFeedback(Request $request, $id)
    {
    	
        $input = $request->all();
        Mail::send('admin.mailtemplate', array('name'=>$input["name"],'email'=>$input["email"], 'content'=>$input['comment']), function($message){
            $message->to($input["email"],'Chào quý khách')->subject('Thông báo đến quý khách!');
        });
        Session::flash(['thongbao'=>'Gửi mail thành công!']);

        return view('admin.mail');
    }
  
}
