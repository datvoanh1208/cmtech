<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slide;
use App\product;
use App\User;
use Hash;
use Auth;
use App\type_product;
use Session;
use App\Cart;
use App\bill_detail;
use App\bills;
use App\Customer;
use DB;
use App\Post;
use Mail;



class HomeController extends Controller
{
   
    //
    public function getIndex(Request $req)
    {
       
        $slide = slide::all();
        $new_product = product::where('new',1)->paginate(4);
        $sp_khuyenmai = product::where('promotion_price','<>',0)->paginate(4);
  

        return view('home.page.trangchu',compact('slide','new_product','sp_khuyenmai'));
    }

    public function getPassword()
    {
        return view('home.page.getpassword');
    }
    public function postPassword(Request $req){
        
        $email = $req->email;

        $token_arr = DB::table('users')->where('email', '=', $email)->select('remember_token')->first();
        $token = $token_arr->remember_token;

        Mail::send('home.maillink', array('email'=>$email,'token'=>$token), function($message) use ($email){
            $message->to($email,'chào quý khách')->subject('Phản hồi khách hàng!');
         });
        return "Đã gửi mail thành công!";
    }

    public function getResetPassword($token, $email)
    {
        
        return view('home.page.reset',compact('token','email'));
        
    }

    

    public function postResetPassword(Request $req, $token, $email)
    {
        $this->validate($req,[
            'password'=>'required|min:6|max:12',
            'password_confirmation'=>'required|same:password',
            ],
            [
            'password.required' => 'Vui lòng nhập password',
            'password_confirmation'=>'Password không giống nhau'
            ]);
        $password = Hash::make($req->password);
        DB::table('users')
            ->where('remember_token', $token)
            ->update(['password' => $password]);
        return "Đã đổi password thành công!";

    }

    public function getFB()
    {
        return view('home.page.loginfb');
    }

    public function getSendData(Request $res)
    {
        $data = $res->all();
        $dataFace = $data['dataface'];
        $email = $dataFace['email'];//email nè
        $idface = $dataFace['id'];//id nè
        $name = $dataFace['name'];
        $password = str_random(9);

        $user = new User;
        $user->full_name = $name;
        $user->id_facebook = $idface;
       
        $datauser = DB::table('users')->where('email', '=', $email)->get();

       
        if(!$datauser)
        {
            $user->password = Hash::make($password);
            $user->level = '0';
            $user->phone = '';
            $user->address = '';
            $user->email = $email;
            $user->save();  
        }
        else
        {
            
             echo "Email này đã tồn tại";
        }
        
      
        return json_encode(array('dataface'=>$dataFace));

    }



     public function getSendDataGoogle(Request $res)
    {
   
        

        $data = $res->all();
        $dataGoogle = $data['datagoogle'];
    
        $email = $dataGoogle['Email'];//email nè
        
        $idgoogle = $dataGoogle['id'];//id nè
        $name = $dataGoogle['Name'];
        $password = str_random(9);

        
        $user = new User;
        $user->full_name = $name;
        $user->id_google = $idgoogle;
       
        $datauser = DB::table('users')->where('Email', '=', $email)->get();
      
        if(!$datauser)
        {
            $user->password = Hash::make($password);
            $user->level = '0';
            $user->phone = '';
            $user->address = '';
            $user->email = $email;
            $user->save();
        }
        else
        {
               
            echo "Email này đã tồn tại"; 
        }
        
        
        
    }

   
    public function getChitiet(Request $req)
    {
  
        $rate = DB::table('comment')
                ->avg('rate');

        $sanpham = product::where('id',$req->id)->first();
        $sp_tuongtu = product::where('id_type',$sanpham->id_type)->paginate(3);
        $new_product = product::where('new',1)->paginate(4);
        $sp_khuyenmai = product::where('promotion_price','<>',0)->paginate(4);
        return view('home.page.product',compact('sanpham','sp_tuongtu','new_product','sp_khuyenmai','rate'));
    }

    public function getLoaisp($type)
    {
        $sp_theoloai = Product::where('id_type',$type)->get();
        $sp_khac = Product::where('id_type','<>',$type)->paginate(3);
        $loai = type_product::all();
        $loai_sp = type_product::where('id',$type)->first();
        return view('home.page.typeproduct',compact('sp_theoloai','sp_khac','loai','loai_sp'));
    }

    public function getAddtocart(Request $req, $id)
    {
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }

    public function getDelItemCart($id)
    {
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0)
        {
            Session::put('cart',$cart);
        }
        else
        {
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function getCheckout()
    {
        
        return view('home.page.dathang');
    }

    public function postCheckout(Request $req)
    {
        // đúng hông zay :3, chạy thử coi
        $cart = Session::get('cart');
        
        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes;
        $customer->save();

        $bill = new Bills;
        $bill->id_customer = $customer->id;
        $bill->date_order = time();
       
        $bill->total = $cart->totalPrice;
        $bill->status = "1";
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->save();

        foreach ($cart->items as $key => $value) {
            # code...
            $billdetail = new bill_detail;
            $billdetail->id_bill = $bill->id;
            $billdetail->id_product = $key;
            $billdetail->name_product = $value['item']['name'];
            $billdetail->quantity = $value['qty'];
            $billdetail->unit_price = ($value['price']/$value['qty']);
            $billdetail->save();
        }

        $emailnl = $req->email;
        $totalnl = $cart->totalPrice;
        
        if($req->submit=='nganluong'){
        return redirect("https://www.nganluong.vn/button_payment.php?receiver={{$emailnl}}&product_name=(Mã đơn đặt hàng)&price={{$totalnl}}&return_url={{route('trangchu')}}&comments=no");
        }

        
        if($req->submit=='baokim'){
        return redirect("https://www.baokim.vn/payment/product/version11?business={{$emailnl}}&id=&order_description=&product_name=&product_price=&product_quantity=1&total_amount={{$totalnl}}&url_cancel=&url_detail=&url_success=");
            
        }


        Session::forget('cart');
        return redirect('trangchu')->with('thongbao','Đặt hàng thành công!');
        
    }

    public function getSearch(Request $req)
    {
        $product = Product::where('name','like','%'.$req->key.'%')
        ->orWhere('unit_price','like','%'.$req->key.'%')->get();

        return view('home.page.search',compact('product'));
    }

    public function getLoc()
    {
        
        $product = DB::table('product')->where('unit_price', '<', 5000000)->get();

        return view('home.page.loc', compact('product'));

    }

    public function getLoc1()
    {
        
        $product = DB::table('product')
                    ->whereBetween('unit_price', [5000000, 10000000])->get();

        return view('home.page.loc', compact('product'));

    }

    public function getLoc2()
    {
        
        $product = DB::table('product')
                    ->whereBetween('unit_price', [10000000, 15000000])->get();

        return view('home.page.loc', compact('product'));

    }

    public function getLoc3()
    {
        
        $product = DB::table('product')
                    ->whereBetween('unit_price', [15000000, 20000000])->get();

        return view('home.page.loc', compact('product'));

    }

    public function getLoc4()
    {
        
        $product = DB::table('product')
                    ->whereBetween('unit_price', [20000000, 25000000])->get();

        return view('home.page.loc', compact('product'));

    }

    public function getLienhe()
    {
        return view('home.page.lienhe');
    }

    public function getGioithieu()
    {
        return view('home.page.gioithieu');
    }



    public function getSignin()
    {
        return view('home.page.dangki');
    }

    public function postSignin(Request $req)
    {
        $this->validate($req,[
            'email'=>'required|email|unique:users,email',
            'fullname' =>'required',
            'password'=>'required|min:6|max:12',
            're_password'=>'required|same:password',
            ],
            [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Nhập đúng định dạng email',
            'email.unique' => 'Email đã có người sử dụng',
            'fullname.required' => 'Vui lòng nhập tên đầy đủ',
            'password.required' => 'Vui lòng nhập password',
            'password.min'=>'Password quá ngắn hơn 6 kí tự',
            'password.max'=>'Password dài hơn 12 kí tự',
            're_password'=>'Password không giống nhau'
            ]);
        $user = new User();
        $user->email = $req->email;
        $user->full_name = $req->fullname;
        $user->phone = $req->phone;
        $user->level = '0';
        $user->address= $req->address;
        $user->password = Hash::make($req->password);
        $user->save();
        return redirect()->back()->with('thanhcong', 'Đăng kí thành công!');
    }

    public function getLogin()
    {

        return view('home.page.dangnhap');
    }

    public function postLogin(Request $req)
    {
        $this->validate($req,[
            'email'=>'required|email',
            'password'=>'required|min:6|max:12',
            // 'g-recaptcha-response' => 'required|recaptcha',

            
            ],
            [
            'email.required'=>'Chưa nhập email',
            'password.required'=>'Vui lòng nhập password',
            'password.min'=>'Email ít hơn 6 kí tự',
            'password.max'=>'Email dài hơn 12 kí tự',
            // 'g-recaptcha-response.required' => 'Vui lòng check vào ô',
            // 'g-recaptcha-response.recaptcha' => 'Vui lòng check lại'
            
            ]
        );
        
        if($req->has('remember'))
        {
            $remember = true;
        }
        else
            $remember = false;

        

        // $remember = ($req->has('remember'))?true:false;
        $credentials = array('email'=>$req->email,'password'=>$req->password);
        

        if(Auth::attempt($credentials,$remember))
        {
            //nó đây
            return redirect(route('trangchu'));
            
            // ->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công!']);
        }
        else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công!']);
        }
    }

    public function getThongtincanhan($id)
    {
        $user = User::find($id);
        return view('home.page.thongtincanhan',compact('user'));
    }

    public function postThongtincanhan(Request $req, $id)
    {
        $this->validate($req,[
            'name'=>'required|unique:users,full_name|min:3|max:25',
            'phone'=>'required|min:9|max:11|alpha_num',
            'address'=>'required|min:3|max:40',
            
            ],[
            
            'name.required' => 'Vui lòng nhập tên đầy đủ',
            'name.min'=>'Tên quá ngắn hơn 3 kí tự',
            'name.max'=>'Tên dài hơn 25 kí tự',
            'address.required' => 'Vui lòng nhập địa chỉ đầy đủ',
            'address.min'=>'Địa chỉ quá ngắn hơn 3 kí tự',
            'address.max'=>'Địa chỉ dài hơn 40 kí tự',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.min'=>'SĐT quá ngắn hơn 9 kí tự',
            'phone.max'=>'SĐT không được dài hơn 11 kí tự',
            
            ]);
        $user = User::find($id);
        $user->full_name = $req->name;
        
        if($req->changePassword == 'on'){
            $this->validate($req,[
            
            'password'=>'required|min:6|max:20',
            're_password'=>'required|same:password'
            ],[
            
            'password.required' => 'Vui lòng nhập password',
            'password.min'=>'Password quá ngắn hơn 6 kí tự',
            'password.max'=>'Password dài hơn 20 kí tự',
            're_password'=>'Password không giống nhau'
            ]);
            $user->password = bcrypt($req->password);
        }
        
        
        $user->phone = $req->phone;
        $user->address = $req->address;
       
        $user->save();

        return redirect()->back()->with('thongbao', 'Bạn đã sửa user thành công!');
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect(route('trangchu'));
    }

    
}
