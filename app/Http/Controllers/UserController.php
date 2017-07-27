<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;
use Session;

class UserController extends Controller
{
    //
    public function getDanhSach()
    {
    	$user = User::paginate(4);
    	return view('admin.user.danhsach',compact('user'));
    }

    public function getSua($id)
    {
    	$user = User::find($id);
    	return view('admin.user.sua',compact('user'));
    }

    public function postSua(Request $req, $id)
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
    	$user->level = $req->level;
    	$user->save();

    	return redirect('admin/user/sua/'.$id)->with('thongbao', 'Bạn đã sửa user thành công!');
    }

    public function getThem()
    {
    	
    	return view('admin/user/them');
    }

    public function postThem(Request $req)
    {
    	$this->validate($req,[
    		'name'=>'required|unique:users,full_name|min:3|max:25',
    		'email'=>'required|email|unique:users,email|min:4',
    		'phone'=>'required|min:9|max:11|alpha_num',
    		'address'=>'required|min:3|max:40',
    		'password'=>'required|min:6|max:20',
    		're_password'=>'required|same:password'
    		],[
    		'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Nhập đúng định dạng email',
            'email.unique' => 'Email đã có người sử dụng',
            'name.required' => 'Vui lòng nhập tên đầy đủ',
            'name.min'=>'Tên quá ngắn hơn 3 kí tự',
            'name.max'=>'Tên dài hơn 25 kí tự',
            'address.required' => 'Vui lòng nhập địa chỉ đầy đủ',
            'address.min'=>'Địa chỉ quá ngắn hơn 3 kí tự',
            'address.max'=>'Địa chỉ dài hơn 40 kí tự',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.min'=>'SĐT quá ngắn hơn 9 kí tự',
            'phone.max'=>'SĐT không được dài hơn 11 kí tự',
            'password.required' => 'Vui lòng nhập password',
            'password.min'=>'Password quá ngắn hơn 6 kí tự',
            'password.max'=>'Password dài hơn 20 kí tự',
            're_password'=>'Password không giống nhau'
    		]);
    	$user = new User;
    	$user->full_name = $req->name;
    	$user->password = Hash::make($req->password);
    	$user->email = $req->email;
    	$user->phone = $req->phone;
    	$user->address = $req->address;
    	$user->level = $req->level;
    	$user->save();

    	return redirect('admin/user/them')->with('thongbao', 'Bạn đã thêm user thành công!');
    }



      public function getXoaHet(Request $request)
     
      {
        $ids = $request->input('ids');
        //ids là một cái mảng nên nó foreach được

        $current_user = User::find(Auth::id())->id;
        foreach($ids as $id)
        {
          if (User::find($id)->id != $current_user) {
            $user = User::find($id);
            $user->delete();
          }
        }
        return 'true';
      }



    public function getXoa($id)
    {
    	$user = User::find($id);
    	$user->delete();

    	return redirect('admin/user/danhsach')->with('thongbao', 'Bạn đã xóa user thành công!');
    }

    public function getDangnhapAdmin(){
    	return view('admin.login');
    }

    public function postDangnhapAdmin(Request $req){
			
			$this->validate($req,[
    		'email'=>'required|email|min:4',
    		'password'=>'required|min:6|max:20'
    		],[
    		'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Nhập đúng định dạng email',
          
            'password.required' => 'Vui lòng nhập password',
            'password.min'=>'Password quá ngắn hơn 6 kí tự',
            'password.max'=>'Password dài hơn 20 kí tự'
    		]);
    	       
			if(Auth::attempt(['email'=>$req->email,'password'=>$req->password]))
			{
				return redirect('admin/baocaodoanhthu');
			}
			else
			{
                
				return redirect('admin/login')->with('thongbao','Đăng nhập không thành công');
			}
    }

    public function getLogout()
    {
    	Auth::logout();
    	return redirect('admin/')->with('thongbao','Bạn đã đăng xuất thành công!');
    }
}
