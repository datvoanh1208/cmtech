@extends('home.master')
@section('content')
	<div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="beta-products-list">
                            <h4>Lọc kết quả</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy {{count($product)}} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                @foreach($product as $sp)
                                <div class="col-sm-3">
                                    <div class="single-item">
                                    @if(($sp->promotion_price)!=0)
                                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                    @endif
                                        <div class="single-item-header">
                                            <a href="{{route('chitietsanpham',$sp->id)}}"><img src="{{asset('source/home/image/product/'.$sp->image)}}" alt="" height="250" width="auto"></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{$sp->name}}</p>
                                            <p class="single-item-price" style="font-size: 18px">
                                                @if(($sp->promotion_price)==0)
                                                    <span>{{number_format($sp->unit_price)}} đồng</span>
                                                @else
                                                    <span class="flash-del">{{number_format($sp->unit_price)}} đồng</span>
                                                    <span class="flash-sale">{{number_format($sp->promotion_price)}} đồng</span>
                                                @endif
                                            </p>

                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="{{route('themgiohang',$sp->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="{{route('chitietsanpham',$sp->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                
                                @endforeach
                                <p>&nbsp</p>
                                <div class="row">{{$product->links()}}</div>
                                
                                
                            </div>
                        </div> <!-- .beta-products-list -->
                        
                        
                    </div>
                </div> <!-- end section with sidebar and main content -->


            </div> <!-- .main-content -->
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection