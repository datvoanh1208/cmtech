<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;
use App\product;
use Session;

class CommentController extends Controller
{
    //
    
    public function getXoa($id,$idSanPham)
    {
    	$comment = Comment::find($id);
    	$comment->delete();
    	return redirect('admin/sanpham/sua/'.$idSanPham)->with('thongbao', 'Đã xóa comment thành công!');
    }

    public function postComment($id, Request $req)
    {
        


    	$idSanPham = $id;
    	$comment = new Comment;
    	
    	$comment->idUser = Auth::user()->id;
    	$comment->idSanPham = $idSanPham;
    	$comment->NoiDung = $req->NoiDung;
        $comment->rate = $req->rate;


    	$comment->save();

    	return redirect()->back()->with('thongbao','Gửi bình luận thành công!');

    }
}
