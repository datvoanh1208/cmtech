<!doctype html>
<html lang="en">
<head>
    <link rel="SHORTCUT ICON" href="{{asset('source/home/assets/dest/images/logomini.ico')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMTech Mobile </title>
    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    

    <link rel="stylesheet" href="{{asset('source/home/assets/dest/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('source/home/assets/dest/vendors/colorbox/example3/colorbox.css')}}">
    <link rel="stylesheet" href="{{asset('source/home/assets/dest/rs-plugin/css/settings.css')}}">
    <link rel="stylesheet" href="{{asset('source/home/assets/dest/rs-plugin/css/responsive.css')}}">


    <link rel="stylesheet" title="style" href="{{asset('source/home/assets/dest/css/style.css')}}">


    <link rel="stylesheet" href="{{asset('source/home/assets/dest/css/animate.css')}}">
    <link rel="stylesheet" title="style" href="{{asset('source/home/assets/dest/css/huong-style.css')}}">
    <script type="text/javascript" language="javascript" src="{{asset('js/jquery-3.2.1.js')}}" ></script>
    <script type="text/javascript" language="javascript" src="{{asset('js/jquery.elevatezoom.js')}}" ></script>
    <link href="{{asset('rateit/rateit.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('rateit/jquery.rateit.js')}}" type="text/javascript"></script> 
    <script src="{{asset('rateit/jquery.rateit.min.js')}}" type="text/javascript"></script> 
    @yield('head')
</head>
<body>

    @include('home.header')
    
    @yield('content')

    @include('home.footer')


    <!-- include js files -->
    <script src="{{asset('source/home/assets/dest/js/jquery.js')}}"></script>
    <script src="{{asset('source/home/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js')}}"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="{{asset('source/home/assets/dest/vendors/bxslider/jquery.bxslider.min.js')}}"></script>
    <script src="{{asset('source/home/assets/dest/vendors/colorbox/jquery.colorbox-min.js')}}"></script>
    <script src="{{asset('source/home/assets/dest/vendors/animo/Animo.js')}}"></script>
    <script src="{{asset('source/home/assets/dest/vendors/dug/dug.js')}}"></script>
    <script src="{{asset('source/home/assets/dest/js/scripts.min.js')}}"></script>
    <script src="{{asset('source/home/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{asset('source/home/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script src="{{asset('source/home/assets/dest/js/waypoints.min.js')}}"></script>
    <script src="{{asset('source/home/assets/dest/js/wow.min.js')}}"></script>
    <!--customjs-->
    <script src="{{asset('source/home/assets/dest/js/custom2.js')}}"></script>
    <script>
    $(document).ready(function($) {    
        $(window).scroll(function(){
            if($(this).scrollTop()>150){
            $(".header-bottom").addClass('fixNav')
            }else{
                $(".header-bottom").removeClass('fixNav')
            }}
        )
    })
    </script>
    <script type="text/javascript" language="javascript" src="{{asset('source/admin/ckeditor/ckeditor.js')}}" ></script>
    @yield('script')
</body>
</html>
