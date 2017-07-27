@extends('home.master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm {{$sanpham->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trangchu')}}">Home</a> / <span>Thông tin sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">

							<img src="{{asset('source/home/image/product/'.$sanpham->image)}}" alt="" height="250" class="img">

						</div>
						<div class="col-sm-8">
							<div class="single-item-body">

								<p class="single-item-title"><h2>{{$sanpham->name}}</h2></p>
								<p class="single-item-price">
                                                @if(($sanpham->promotion_price)==0)
                                                    <span>{{number_format($sanpham->unit_price)}} đồng</span>
                                                @else
                                                    <span class="flash-del">{{number_format($sanpham->unit_price)}} đồng</span>
                                                    <span class="flash-sale">{{number_format($sanpham->promotion_price)}} đồng</span>
                                                @endif
                                </p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{{$sanpham->description}}</p>
							</div>
							<div class="space20">&nbsp;</div>
							

							
							<div class="rateit" data-rateit-value="{{$rate}}"  data-rateit-readonly="true"></div>
							
							
						
							



							

							<p>Thanh toán:</p>
							<div class="single-item-options">
								

								
								<!-- <select class="wc-select" name="color">
									<option>Số lượng</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select> -->
								<a class="add-to-cart pull-left" href="{{route('themgiohang',$sanpham->id)}}"><i class="fa fa-shopping-cart"></i></a>
								<!-- <a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i></a> -->


								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Mô tả</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>{{$sanpham->description}}</p>
							
						</div>

						
					</div>


					<!-- Comments Form -->
				@if(Auth::check())
                <div class="well">
                	@if(Session('thongbao'))
						{{Session('thongbao')}}
                	@endif
                    <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                   


                    <form action="{{asset('comment/'.$sanpham->id)}}" method="post" role="form">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    	
                        <div class="form-group">

							 <script type="text/javascript">
							    $(document).ready(function(){
							    	//thấy dòng này ko nó chạy khi ấn ngôi sao mà
							    	//lại 1 lần nữa yêu cầu ko rõ ràng.
							    	//vấn đè ở đây là cái ngôi sao nó chỉ xử lý bằng aẫ thôi, submit nó ko hiểu được
							    	//hướng giải quyết:
							    	//khi click function lấy giá trị rồi gáng nó vào cái input hiđen để nó giữ giá trị lại, khi nào submit fỏm thì mới có giá trị..
							    	//mốt yêu cầu coi rõ lại làm cho nó đúng hỏi một đường làm một nẻo sao đúng được mà đúng ok để e thử cái 
							    	//anh ko biết được ko chứ thấy mày code 1 dòng là biết chưa hiểu vấn đề luôn rồi đó, cho mày thêm 20p làm đi anh coi thử cho ok a lặn teamview đi, lát e kêu
							    	//nó hơngs dẫn là lấy biển với gáng biến, mình có biến sẵn rồi coi phhần gán biến vào input thôi
							    	$(".rateit").click(function(){
							    		$(this).bind('rated', function (event, value) {
							    			console.log(value);	
							    			$('.ratedl').val(value);
							    		});
							    	});
							    })
							    function submit_rate_to_controller(datarate){
							    	$.ajax({	
							           type: "POST",
							           url:' {{asset('comment/'.$sanpham->id)}}',
							           data: {
							                datarate: datarate,
							                 _token: "{{ csrf_token() }}",
							           },
							           dataType: "json",
							           success: function(msg){
							                console.log(msg.datarate);
							           }
							         });
							    }
							</script>
							 <!-- @if(Auth::check()) -->
                    		Đánh giá <div class="rateit" data-rateit-value=""  data-rateit-readonly="false"></div>
                    		<input type="hidden" class="ratedl" name="rate" />
                   <!--  @else
                    Đánh giá <div class="rateit" data-rateit-value=""  data-rateit-readonly="true"></div> -->
                       
                       
						<!-- @endif -->

								
                            <textarea id="demo" class="form-control ckeditor" name="NoiDung" rows="3"></textarea>
                        </div>
						
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                </div>
                <hr>
                @endif

                <!-- Posted Comments -->

                <!-- Comment -->
                @foreach($sanpham->comment as $cm)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>

                    <div class="media-body">

                        <h4 class="media-heading">{{$cm->user->full_name}}
                            <small>{{$cm->created_at}}</small>
						<br>
                   		<div class="rateit" data-rateit-value="{{$cm->rate}}"  data-rateit-readonly="true"></div>
                   		<br>
                        {{$cm->NoiDung}}
                        </h4>
                    </div>
                </div>
                @endforeach

					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản phẩm liên quan</h4>

						<div class="row">
							@foreach($sp_tuongtu as $sptt)
							<div class="col-sm-4">
								<div class="single-item">
									@if(($sptt->promotion_price)!=0)
                                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                    @endif
									<div class="single-item-header">
										<a href="{{route('chitietsanpham',$sptt->id)}}"><img src="{{asset('source/home/image/product/'.$sptt->image)}}" alt="" height="250"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$sptt->name}}</p>
										<p class="single-item-price">
											 @if(($sptt->promotion_price)==0)
                                                    <span>{{number_format($sptt->unit_price)}} đồng</span>
                                                @else
                                                    <span class="flash-del">{{number_format($sptt->unit_price)}} đồng</span>
                                                    <span class="flash-sale">{{number_format($sptt->promotion_price)}} đồng</span>
                                                @endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="product.html"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('chitietsanpham',$sptt->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
							<div class="row">{{$sp_tuongtu->links()}}</div>
						</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Sản phẩm khuyến mãi</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($sp_khuyenmai as $spkm)
								<div class="media beta-sales-item">
									<a class="pull-left" href="#"><img src="{{asset('source/home/image/product/'.$spkm->image)}}" alt=""></a>
									<div class="media-body">
										<p style="font-size: 25">{{$spkm->name}} </p>
										<span class="beta-sales-price"> @if(($spkm->promotion_price)==0)
                                                    <span>{{number_format($spkm->unit_price)}} đồng</span>
                                                @else
                                                    <span class="flash-del">{{number_format($spkm->unit_price)}} đồng</span>
                                                    <span class="flash-sale">{{number_format($spkm->promotion_price)}} đồng</span>
                                                @endif</span>
									</div>
								</div>
								@endforeach
								
							</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">Sản phẩm mới</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($new_product as $spm)
								<div class="media beta-sales-item">
									<a class="pull-left" href="#"><img src="{{asset('source/home/image/product/'.$spkm->image)}}" alt=""></a>
									<div class="media-body">
										<p style="font-size: 25">{{$spm->name}}</p>
										<span class="beta-sales-price">@if(($spkm->promotion_price)==0)
                                                    <span>{{number_format($spkm->unit_price)}} đồng</span>
                                                @else
                                                    <span class="flash-del">{{number_format($spkm->unit_price)}} đồng</span>
                                                    <span class="flash-sale">{{number_format($spkm->promotion_price)}} đồng</span>
                                                @endif</span>
                                                </span>
									</div>
								</div>
								@endforeach
								
							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
	<script type="text/javascript">
		$(".img").elevateZoom({
			 zoomWindowFadeIn: 500,
 				zoomWindowFadeOut: 750,
 				cursor: "crosshair",
		});

	</script>>

@endsection

