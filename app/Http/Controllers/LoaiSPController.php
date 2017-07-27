<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\type_product;
use Session;

class LoaiSPController extends Controller
{
    //
    public function getDanhSach()
    {
    	$loaisanpham = type_product::all();
    	return view('admin.loaisanpham.danhsach',compact('loaisanpham'));
    }

    public function getThem()
    {
    	$loaisanpham = type_product::all();
    	return view('admin.loaisanpham.them',compact('loaisanpham'));
    }

    public function postThem(Request $req)
    {
    	$this->validate($req,[
    		'Ten' => 'required|unique:type_product,name|min:2|max:100',
    		
    		'MoTa' => 'required',
    		'LinkAnh' => 'required' 

    		],[
    		'Ten.required'=>'Vui lòng nhập tên loại sản phẩm',
    		'Ten.unique'=>'Loại sản phẩm này đã tồn tại',
    		'Ten.min' => 'Nhập tên từ 2 đến 100 ký tự',
    		'Ten.max' => 'Nhập tên từ 2 đến 100 ký tự',
    		
    		'MoTa.required'=>'Vui lòng nhập mô tả',
    		'LinkAnh.required'=>'Vui lòng nhập link ảnh'

    		]);
    	$loaisp = new type_product;
    	$loaisp->name = $req->Ten;
    	$loaisp->description = $req->MoTa;
    	$loaisp->image = $req->LinkAnh;
    	$loaisp->save();
    	return redirect('admin/loaisanpham/them')->with('thongbao','Đã thêm thành công!');
    }

    public function getSua($id)
    {
    	$loaisanpham = type_product::find($id);
    	return view('admin/loaisanpham/sua',compact('loaisanpham'));
    }

    public function postSua(Request $req, $id)
    {
    	$this->validate($req,[
    		'Ten' => 'required|unique:type_product,name|min:2|max:100',
    		
    		// 'MoTa' => 'required',
    		// 'LinkAnh' => 'required' 

    		],[
    		'Ten.required'=>'Vui lòng nhập tên loại sản phẩm',
    		'Ten.unique'=>'Loại sản phẩm này đã tồn tại',
    		'Ten.min' => 'Nhập tên từ 2 đến 100 ký tự',
    		'Ten.max' => 'Nhập tên từ 2 đến 100 ký tự',
    		
    		// 'MoTa.required'=>'Vui lòng nhập mô tả',
    		// 'LinkAnh.required'=>'Vui lòng nhập link ảnh'

    		]);
    	$loaisp = type_product::find($id);
    	$loaisp->name = $req->Ten;
    	$loaisp->description = $req->MoTa;
    	$loaisp->image = $req->LinkAnh;
    	$loaisp->save();
    	return redirect('admin/loaisanpham/sua/'.$id)->with('thongbao','Đã sửa thành công!');
    }

    public function getXoa($id)
    {
    	$loaisanpham = type_product::find($id);
    	$loaisanpham->delete();
    	return redirect('admin/loaisanpham/danhsach')->with('thongbao', 'Đã xóa loại sản phẩm thành công!');
    }
}
