<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\type_product;
use App\Comment;

class SanPhamController extends Controller
{
    //
    public function getDanhSach()
    {
    	$sanpham = Product::all();
    	return view('admin/sanpham/danhsach',compact('sanpham'));
    }

    public function getSua($id)
    {
        $sanpham = Product::find($id);
        $loaisanpham = type_product::all();
        return view('admin/sanpham/sua',compact('sanpham','loaisanpham'));
    }

    public function postSua(Request $req, $id)
    {
        $this->validate($req,[
            'LoaiSP' => 'required',
            'TenSP' => 'required|unique:product,name|min:3',
            'MoTa' => 'required'
            ],[
            'LoaiSP.required' => "Vui lòng chọn loại sản phẩm",
            'TenSP.required' => "Vui lòng nhập tên sản phẩm",
            'TenSP.unique'=> "Tên sản phẩm đã tồn tại",
            'TenSP.min' => "Tên sản phẩm không được ngắn hơn 3 kí tự",
            'MoTa.required' => "Vui lòng nhập phần mô tả"
            ]);
        $sanpham = Product::find($id);
        $sanpham->name = $req->TenSP;
        $sanpham->id_type = $req->LoaiSP;
        $sanpham->description = $req->MoTa;
        $sanpham->unit_price = $req->GiaGoc;
        $sanpham->promotion_price = $req->GiaKM;
        $sanpham->unit = $req->DonVi;
        $sanpham->new = $req->NoiBat;
        if($req->hasFile('UploadHinh'))
        {
            $file = $req->file('UploadHinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'png' && $duoi != 'jpg')
            {
                return redirect('admin/sanpham/sua/'.$id)->with('thongbao', 'Bạn chỉ được upload ảnh có đuôi jpg, png!');
            }
            $name = $file->getClientOriginalName();

            $file->move("source/home/image/product/",$name);
            unlink('source/home/image/product/'.$sanpham->id);
            $sanpham->image = $name;
        }
       
        
        
        $sanpham->save();

        return redirect('admin/sanpham/sua/'.$id)->with('thongbao', 'Bạn đã sửa sản phẩm thành công!');
    }

    public function getThem()
    {
        $loaisanpham = type_product::all();
    	return view('admin/sanpham/them',compact('loaisanpham'));
    }

    public function postThem(Request $req)
    {
    	$this->validate($req,[
            'LoaiSP' => 'required',
            'TenSP' => 'required|unique:product,name|min:3',
            'MoTa' => 'required'
            ],[
            'LoaiSP.required' => "Vui lòng chọn loại sản phẩm",
            'TenSP.required' => "Vui lòng nhập tên sản phẩm",
            'TenSP.unique'=> "Tên sản phẩm đã tồn tại",
            'TenSP.min' => "Tên sản phẩm không được ngắn hơn 3 kí tự",
            'MoTa.required' => "Vui lòng nhập phần mô tả"
            ]);
        $sanpham = new Product;
        $sanpham->name = $req->TenSP;
        $sanpham->id_type = $req->LoaiSP;
        $sanpham->description = $req->MoTa;
        $sanpham->unit_price = $req->GiaGoc;
        $sanpham->promotion_price = $req->GiaKM;
        $sanpham->unit = $req->DonVi;
        $sanpham->new = $req->NoiBat;
        if($req->hasFile('UploadHinh'))
        {
            $file = $req->file('UploadHinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'png' && $duoi != 'jpg')
            {
                return redirect('admin/sanpham/them')->with('thongbao', 'Bạn chỉ được upload ảnh có đuôi jpg, png!');
            }
            $name = $file->getClientOriginalName();

            $file->move("source/home/image/product/",$name);
            $sanpham->image = $name;
        }
        else
        {
            $sanpham->image = "";
        }
        
        
        $sanpham->save();

        return redirect('admin/sanpham/them')->with('thongbao', 'Bạn đã thêm sản phẩm thành công!');

    }

    public function getXoa($id)
    {
        $sanpham = Product::find($id);
        $sanpham->delete();
        return redirect('admin/sanpham/danhsach')->with('thongbao', 'Bạn đã xóa sản phẩm thành công!');

    }

    
}
