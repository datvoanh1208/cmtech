@extends('home.master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm {{$loai_sp->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trangchu')}}">Home</a> / <span>Sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach($loai as $l)
							<li><a href="{{route('loaisanpham',$l->id)}}">{{$l->name}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>Danh sách sản phẩm</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($sp_theoloai)}} 									sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($sp_theoloai as $sptl)
								<div class="col-sm-4">
									<div class="single-item">
									@if(($sptl->promotion_price)!=0)
                                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                    @endif
										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$sptl->id)}}"><img src="{{asset('source/home/image/product/'.$sptl->image)}}" alt="" height="250pdx"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$sptl->name}}</p>
											<p class="single-item-price" style="font-size: 18px">
												
                                                @if(($sptl->promotion_price)==0)
                                                    <span>{{$sptl->unit_price}} đồng</span>
                                                @else
                                                    <span class="flash-del">{{$sptl->unit_price}} đồng</span>
                                                    <span class="flash-sale">{{$sptl->promotion_price}} đồng</span>
                                                @endif
                                            
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$sptl->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham',$sptl->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
										<div class="space50">&nbsp;</div>
									</div>
								</div>
								@endforeach
								
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm khác</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($sp_khac)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
							@foreach($sp_khac as $spk)
								<div class="col-sm-4">
									<div class="single-item">
									@if(($spk->promotion_price)!=0)
                                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                    @endif
										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$spk->id)}}"><img src="{{asset('source/home/image/product/'.$spk->image)}}" alt="" height="250pdx"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$spk->name}}</p>
											<p class="single-item-price" style="font-size: 18px">
												
                                                @if(($spk->promotion_price)==0)
                                                    <span>{{$spk->unit_price}} đồng</span>
                                                @else
                                                    <span class="flash-del">{{$spk->unit_price}} đồng</span>
                                                    <span class="flash-sale">{{$spk->promotion_price}} đồng</span>
                                                @endif
                                            
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							@endforeach
							</div>
							<div class="row">{{$sp_khac->links()}}</div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection