@extends('home.master')
@section('content')
	<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            @if(Session::has('flag'))
					<div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
					@endif
                <h4>Đăng nhập</h4>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                             <!-- {!! Recaptcha::render() !!} -->
                                <button type="submit" class="btn btn-primary btn-block">
                                    Login
                                </button>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Nhớ mật khẩu
                                    </label>
                                </div>

                                <a class="btn btn-link" href="{{asset('forgotpassword')}}">
                                    Quên mật khẩu?
                                </a>
                            </div>
                        </div>
                        
                        <!-- start login fb
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                               

                                <div id="status">
                                </div>
                                
                                
                                <div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="true" data-use-continue-as="false"></div>

                            </div>
                        </div>
                        end login fb -->

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">

                             <a href="{{asset('auth/facebook')}}" class="btn btn-default facebook"> <i class="fa fa-facebook modal-icons"></i> Đăng nhập với Facebook </a>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                        <a href="{{asset('auth/google')}}" class="btn btn-default google"> <i class="fa fa-google-plus modal-icons"></i> Đăng nhập với Google </a>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                        <a href="{{asset('auth/twitter')}}" class="btn btn-default twitter"> <i class="fa fa-twitter modal-icons"></i> Đăng nhập với Twitter </a>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                        <a href="{{asset('auth/github')}}" class="btn btn-default github"> <i class="fa fa-github modal-icons"></i> Đăng nhập với Github </a>
                            </div>
                        </div>




                        <!-- <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                               
                               <div class="g-signin2" data-onsuccess="onSignIn"></div>
                                <a href="#" onclick="signOut();">Sign out</a>
                                <script>
                                  function signOut() {
                                    var auth2 = gapi.auth2.getAuthInstance();
                                    auth2.signOut().then(function () {
                                      console.log('User signed out.');
                                    });
                                  }
                                </script>

                            </div>
                        </div> -->
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')

<!-- start login fb
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=826299240880431";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script>

  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    //console.log('statusChangeCallback');
    //console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else {
      // The person is not logged into your app or we are unable to tell.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
  
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '826299240880431',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.8' // use graph api version 2.8
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };
  

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    //chỗ này nó có thể lấy được thông tin cái mình cần
    //demo những cái mình có thể lấy 
    //https://developers.facebook.com/tools/explorer/?method=GET&path=me%3Ffields%3Did%2Cname%2Cemail%2Cgender&version=v2.9
    FB.api('/me?fields=name,email,id', function(response) {
        //response là mảng chứa cái mình có thể lấy
        //câu lệnh lấy sao ta lưu zo 
     // console.log('Successful login for: ' +response.email);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.email + '!';
        submit_face_to_controller(response);
    });
  }
  //hàm này rảnh tự đặt tên sau
  function submit_face_to_controller(dataface){

    $.ajax({
          
           type: "POST",
           //url này chạy tới router định nghĩa nó vô controller nào tùy
           //sao no ko hieu cai cmtech o day ta @@
           //cho nay anh set cung tam, sau nay set dong nha, ko doi ten mien la no ko chay doi
           //ddc ko. hinh` nhu chay roi ak' link
           url:' {{asset('senddata')}}',
           data: {
                dataface: dataface,
                 _token: "{{ csrf_token() }}",
           },
           dataType: "json",
         //khoan  //Ko biet luon @@ ki vay ka`
           success: function(msg){
            
                console.log(msg.dataface);
           }
         });
     
  }
</script>
endloginfb -->
 
 <!-- Script google -->
<!-- <script>

  function onSignIn(googleUser) {
          var profile = googleUser.getBasicProfile();
          console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
          console.log('Name: ' + profile.getName());
          console.log('Image URL: ' + profile.getImageUrl());
          console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
          //console quaần què gì ở đây vậy ba
          // console.log(submit_google_to_controller(profile));
          //thấy nó có cái ngoặc ko nó sao nó là cái function gọi luôn ko phải biến, phải gán nữa

          submit_google_to_controller(profile)
          
        }

  function submit_google_to_controller(profile){
    var datagoogle = {
      id : profile.getId(),
      Name : profile.getName(),
      Email :  profile.getEmail()
    };
    //anh tạo cái datagoole để lưu nó lại bây gờ gõ datagoogle.Name nó sẽ ra
    //ok chưa ok ddeer em chạy thử coi nó lưu vô chưa, chưa đâu thiếu id nó ra lỗit ại okbên kia có gọi id, truyền id vô cái hàm trên của anh đi
    //đề nghị đọc hiểu văn bản kêu truyền ở trên chứ ko phải controller
    //rồi id đó lấy đâu ra anh đã làm mẫu cái email với naime rồi giờ kêu truyền id ko biết hả ba thanh niên này coppy paste cũng hông xong
    $.ajax({
          
           type: "POST",
           url:'{{asset('senddatagoogle')}}',
           data: {
                datagoogle: datagoogle,
                 _token: "{{ csrf_token() }}",
           },
           dataType: "json",
        
           success: function(msg){
            
                console.log(msg.a);
           }
         });
     
  }
</script> -->

@endsection

<!-- @section('head')
<meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="186296433306-pktvaa43ktvtffm31ojk1020grgmj5bp.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
@endsection -->
