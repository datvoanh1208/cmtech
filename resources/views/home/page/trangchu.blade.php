@extends('home.master')
@section('content')
<div class="rev-slider">
    <div class="fullwidthbanner-container">
                    <div class="fullwidthbanner">
                        <div class="bannercontainer" >
                        <div class="banner" >
                                <ul>
                                @foreach($slide as $sl)
                                    <!-- THE FIRST SLIDE -->
                                    <li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                                    <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                                    <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="{{asset('source/home/image/slide/'.$sl->image)}}" data-src="{{asset('source/home/image/slide/'.$sl->image)}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('{{asset('source/home/image/slide/'.$sl->image)}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                                    </div>
                                                </div>
                                </li>
                                @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="tp-bannertimer"></div>
                    </div>
                </div>
                <!--slider-->
    </div>
<div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-3">
                        <ul class="aside-menu">
                            <p>Lọc theo giá bán</p>
                            <li></li>
                            <li><a href="{{route('loc')}}">Dưới 5 triệu</a></li>
                            <li><a href="{{asset('loc1')}}">Từ 5 đến 10 triệu</a></li>
                            <li><a href="{{asset('loc2')}}">Từ 10 đến 15 triệu</a></li>
                            <li><a href="{{asset('loc3')}}">Từ 15 đến 20 triệu</a></li>
                            <li><a href="{{asset('loc4')}}">Từ 20 đến 25 triệu</a></li>

                        </ul>
                    </div>
                    <div class="col-sm-9">
                        <div class="beta-products-list">
                            <h4>Sản phẩm mới</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">
                                Tìm thấy {{count($new_product)}} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                @foreach($new_product as $sp)
                                <div class="col-sm-3">
                                    <div class="single-item">
                                    @if(($sp->promotion_price)!=0)
                                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                    @endif
                                        <div class="single-item-header">
                                            <a href="{{route('chitietsanpham',$sp->id)}}"><img src="{{asset('source/home/image/product/'.$sp->image)}}" alt="" height="200" width="200"></a>
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
                                <div class="row">{{$new_product->links()}}</div>
                                
                            </div>
                        </div> <!-- .beta-products-list -->
                        
                        <div class="space50">&nbsp;</div>

                        <div class="beta-products-list">
                            <h4>Sản phẩm khuyến mãi</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy {{count($sp_khuyenmai)}} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                @foreach($sp_khuyenmai as $spkm)
                                <div class="col-sm-3">
                                    <div class="single-item">
                                    @if(($spkm->promotion_price)!=0)
                                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                    @endif
                                        <div class="single-item-header">
                                            <a href="{{route('chitietsanpham',$spkm->id)}}"><img src="{{asset('source/home/image/product/'.$spkm->image)}}" alt="" height="200" width="200"></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{$spkm->name}}</p>
                                            <p class="single-item-price" style="font-size: 18">
                                                @if(($spkm->promotion_price)==0)
                                                    <span>{{number_format($spkm->unit_price)}} đồng</span>
                                                @else
                                                    <span class="flash-del">{{number_format($spkm->unit_price)}} đồng</span>
                                                    <span class="flash-sale">{{number_format($spkm->promotion_price)}} đồng</span>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="{{route('themgiohang',$spkm->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="{{route('chitietsanpham',$spkm->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class="row">{{$sp_khuyenmai->links()}}</div>
                            </div>
                            <div class="space40">&nbsp;</div>
                            
                        </div> <!-- .beta-products-list -->
                    </div>
                    <div class="col-sm-6">
                    <?php 
                        session_start(); 

                        /** 
                        * Calculate the number of users online by 
                        * counting the number of session files. Returns the 
                        * number of users on success, or -1 on failure. 
                        */ 
                        function getUsersOnline() { 
                        $count = 0; 

                        $handle = opendir(session_save_path()); 
                        if ($handle == false) return -1; 

                        while (($file = readdir($handle)) != false) { 
                        if (preg_match("/^sess/", $file)) $count++; 
                        } 
                        closedir($handle); 
                        return $count; 
                        } 
                        echo "Lượt truy cập : " . getUsersOnline();
                    ?>
                    </div> <!-- end section with sidebar and main content -->

            </div> <!-- .row -->
            </div> <!-- .main-content -->
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection