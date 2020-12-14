<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Product List | Admin</title>
    <link rel="stylesheet" type="text/css" href="{{asset('perky_com/css/reset.css')}}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{asset('perky_com/css/text.css')}}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{asset('perky_com/css/grid.css')}}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{asset('perky_com/css/layout.css')}}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{asset('perky_com/css/nav.css')}}" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" type="text/css" href="{{asset('perky_com/css/ie6.css')}}" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" type="text/css" href="{{asset('perky_com/css/ie.css')}}" media="screen" /><![endif]-->
    <link href="{{asset('perky_com/css/table/demo_page.css')}}" rel="stylesheet" type="text/css" />
    <!-- BEGIN: load jquery -->
    <script src="{{asset('perky_com/js/jquery-1.6.4.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('perky_com/js/jquery-ui/jquery.ui.core.min.js')}}"></script>
    <script src="{{asset('perky_com/js/jquery-ui/jquery.ui.widget.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('perky_com/js/jquery-ui/jquery.ui.accordion.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('perky_com/js/jquery-ui/jquery.effects.core.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('perky_com/js/jquery-ui/jquery.effects.slide.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('perky_com/js/jquery-ui/jquery.ui.mouse.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('perky_com/js/jquery-ui/jquery.ui.sortable.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('perky_com/js/table/jquery.dataTables.min.js')}}" type="text/javascript"></script>
    <!-- END: load jquery -->
    <script type="text/javascript" src="{{asset('perky_com/js/table/table.js')}}"></script>
    <script src="{{asset('perky_com/js/setup.js')}}" type="text/javascript"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
            setSidebarHeight();


        });
    </script>
</head>
<body>
<div class="container_12">
    <div class="grid_12 header-repeat">
        <div id="branding">
            <div class="floatleft logo">
                <img src="{{asset('perky_com/img/livelogo.png')}}" alt="Logo" />
            </div>
            <div class="floatleft middle">
                <h1>Perky Rabbit Demo Project</h1>
                <p>www.perkyrabbitDemo.com</p>
            </div>
            <div class="floatright">
                <div class="floatleft">
                    <img src="{{asset('perky_com/img/img-profile.jpg')}}" alt="Profile Pic" /></div>
                <div class="floatleft marginleft10">
                    <ul class="inline-ul floatleft">
                        <li>Hello Admin</li>
                        <li><a href="#">Config</a></li>
                        <li><a href="#">Logout</a></li>
                    </ul>
                </div>
            </div>
            <div class="clear">
            </div>
        </div>
    </div>
    <div class="clear">
    </div>
    <div class="grid_12">
        <ul class="nav main">
            <li class="ic-dashboard"><a href="/"><span>Dashboard</span></a> </li>
        </ul>
    </div>
    <div class="clear">
    </div>
    <div class="grid_2">
        <div class="box sidemenu">
            <div class="block" id="section-menu">
                <ul class="section menu">

                    <li><a class="menuitem">Product Option</a>
                        <ul class="submenu">
                            <li><a href="{{asset('productAdd')}}">Add Product</a> </li>
                            <li><a href="{{asset('showProduct')}}">Product List</a> </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @yield('content')
    <div class="clear">
 </div>


</div>
<div class="clear">
</div>
<div id="site_info">
    <p>
        &copy; Copyright <a href="#">Demo Project</a>. All are Done
    </p>
</div>
</body>
</html>
