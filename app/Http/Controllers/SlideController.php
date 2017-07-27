<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
    //
    public function getDanhSach()
    {
    	$slide = Slide::all();
    	return view('admin.slide.danhsach',compact('slide'));
    }

    public function getSua($id)
    {
    	$slide = Slide::find($id);
    	return view('admin.slide.sua',compact('slide'));
    }

    public function postSua(Request $req, $id)
    {
    	$this->validate($req,[
    		'TenSlide'=>'required|unique:Slide,name|min:2',
    		
    		],[
    		'TenSlide.required' => "Vui lòng nhập tên slide",
            'TenSlide.unique'=> "Tên slide đã tồn tại",
            'TenSlide.min' => "Tên slide không được ngắn hơn 3 kí tự",
    		]);
    	$slide = Slide::find($id);
    	$slide->name = $req->TenSlide;
        if($req->hasFile('UploadHinh'))
        {
            $file = $req->file('UploadHinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'png' && $duoi != 'jpg')
            {
                return redirect('admin/slide/sua'.$id)->with('thongbao', 'Bạn chỉ được upload ảnh có đuôi jpg, png!');
            }
            $name = $file->getClientOriginalName();

            $file->move("source/home/image/slide/",$name);
            $slide->image = $name;
        }
       
        
        
        $slide->save();

        return redirect('admin/slide/sua/'.$id)->with('thongbao', 'Bạn đã sửa slide thành công!');
    }

    public function getThem()
    {
    	
    	return view('admin.slide.them');
    }

    public function postThem(Request $req)
    {
    	$this->validate($req,[
    		'TenSlide'=>'required|unique:Slide,name|min:2',
    		
    		],[
    		'TenSlide.required' => "Vui lòng nhập tên slide",
            'TenSlide.unique'=> "Tên slide đã tồn tại",
            'TenSlide.min' => "Tên slide không được ngắn hơn 3 kí tự",
    		]);
    	$slide = new Slide;
    	$slide->name = $req->TenSlide;
        if($req->hasFile('UploadHinh'))
        {
            $file = $req->file('UploadHinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'png' && $duoi != 'jpg')
            {
                return redirect('admin/slide/them')->with('thongbao', 'Bạn chỉ được upload ảnh có đuôi jpg, png!');
            }
            $name = $file->getClientOriginalName();

            $file->move("source/home/image/slide/",$name);
            $slide->image = $name;
        }
        else
        {
            $slide->image = "";
        }
        
        
        $slide->save();

        return redirect('admin/slide/them')->with('thongbao', 'Bạn đã thêm slide thành công!');
    }

    public function getXoa($id)
    {
    	$slide = Slide::find($id);
    	$slide->delete();
    	return redirect('admin/slide/danhsach')->with('thongbao', 'Bạn đã xóa slide thành công!');

    }

}
