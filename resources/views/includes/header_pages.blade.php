
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->     
        <link href="{{ asset('/assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/global/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css" />        
        <link href="{{asset('/assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('/assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css')}}" rel="stylesheet" type="text/css" />
        <!--<link href="{{asset('/assets/global/plugins/bootstrap-wysihtml5/wysiwyg-color.css')}}" rel="stylesheet" type="text/css" />-->
        <!--<link href="{{asset('/assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css')}}" rel="stylesheet" type="text/css" />-->
        <link href="{{asset('/assets/global/plugins/bootstrap-summernote/summernote.css')}}" rel="stylesheet" type="text/css" />
        
        <link href="{{asset('/assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
        
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{ asset('/assets/global/css/components-md.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{ asset('/assets/global/css/plugins-md.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
       
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{ asset('/assets/layouts/layout/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/layouts/layout/css/themes/darkblue.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{ asset('/assets/layouts/layout/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->

        <link rel="shortcut icon" href="{{ asset('/assets/pages/img/favicon.ico')}}" /> </head>
    <!-- END HEAD -->
    
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white page-md">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="{{route('dashboard')}}">
                        <img src="{{asset('/assets/pages/img/login/iei_anchor_small.png')}}" alt="logo" class="logo-default" />
                    </a>
                    <div class="menu-toggler sidebar-toggler">
                        <span></span>
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </a>
                
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <!-- BEGIN NOTIFICATION DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
<!--                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-bell"></i>
                                <span class="badge badge-default"> 7 </span>
                            </a>-->
<!--                            <ul class="dropdown-menu">
                                <li class="external">
                                    <h3>
                                        <span class="bold">12 pending</span> notifications</h3>
                                    <a href="page_user_profile_1.html">view all</a>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">just now</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-success">
                                                        <i class="fa fa-plus"></i>
                                                    </span> New user registered. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">3 mins</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-danger">
                                                        <i class="fa fa-bolt"></i>
                                                    </span> Server #12 overloaded. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">10 mins</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-warning">
                                                        <i class="fa fa-bell-o"></i>
                                                    </span> Server #2 not responding. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">14 hrs</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-info">
                                                        <i class="fa fa-bullhorn"></i>
                                                    </span> Application error. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">2 days</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-danger">
                                                        <i class="fa fa-bolt"></i>
                                                    </span> Database overloaded 68%. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">3 days</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-danger">
                                                        <i class="fa fa-bolt"></i>
                                                    </span> A user IP blocked. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">4 days</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-warning">
                                                        <i class="fa fa-bell-o"></i>
                                                    </span> Storage Server #4 not responding dfdfdfd. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">5 days</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-info">
                                                        <i class="fa fa-bullhorn"></i>
                                                    </span> System Error. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">9 days</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-danger">
                                                        <i class="fa fa-bolt"></i>
                                                    </span> Storage server failed. </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>-->
                        </li>
                        <!-- END NOTIFICATION DROPDOWN -->
                        <!-- BEGIN INBOX DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
<!--                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-envelope-open"></i>
                                <span class="badge badge-default"> 4 </span>
                            </a>-->
<!--                            <ul class="dropdown-menu">
                                <li class="external">
                                    <h3>You have
                                        <span class="bold">7 New</span> Messages</h3>
                                    <a href="app_inbox.html">view all</a>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                        <li>
                                            <a href="#">
                                                <span class="photo">
                                                    <img src="{{asset('/assets/pages/img/avatar.png')}}" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> Lisa Wong </span>
                                                    <span class="time">Just Now </span>
                                                </span>
                                                <span class="message"> Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="photo">
                                                    <img src="{{asset('/assets/pages/img/avatar.png')}}" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> Richard Doe </span>
                                                    <span class="time">16 mins </span>
                                                </span>
                                                <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="photo">
                                                    <img src="{{asset('/assets/pages/img/avatar.png')}}" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> Bob Nilson </span>
                                                    <span class="time">2 hrs </span>
                                                </span>
                                                <span class="message"> Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="photo">
                                                    <img src="{{asset('/assets/pages/img/avatar.png')}}" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> Lisa Wong </span>
                                                    <span class="time">40 mins </span>
                                                </span>
                                                <span class="message"> Vivamus sed auctor 40% nibh congue nibh... </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="photo">
                                                    <img src="{{asset('/assets/pages/img/avatar.png')}}" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> Richard Doe </span>
                                                    <span class="time">46 mins </span>
                                                </span>
                                                <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>-->
                        </li>
                        <!-- END INBOX DROPDOWN -->
                        <!-- BEGIN TODO DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
<!--                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-calendar"></i>
                                <span class="badge badge-default"> 3 </span>
                            </a>-->
<!--                            <ul class="dropdown-menu extended tasks">
                                <li class="external">
                                    <h3>You have
                                        <span class="bold">12 pending</span> tasks</h3>
                                    <a href="app_todo.html">view all</a>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">New release v1.2 </span>
                                                    <span class="percent">30%</span>
                                                </span>
                                                <span class="progress">
                                                    <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">40% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Application deployment</span>
                                                    <span class="percent">65%</span>
                                                </span>
                                                <span class="progress">
                                                    <span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">65% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Mobile app release</span>
                                                    <span class="percent">98%</span>
                                                </span>
                                                <span class="progress">
                                                    <span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">98% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Database migration</span>
                                                    <span class="percent">10%</span>
                                                </span>
                                                <span class="progress">
                                                    <span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">10% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Web server upgrade</span>
                                                    <span class="percent">58%</span>
                                                </span>
                                                <span class="progress">
                                                    <span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">58% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Mobile development</span>
                                                    <span class="percent">85%</span>
                                                </span>
                                                <span class="progress">
                                                    <span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">85% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">New UI release</span>
                                                    <span class="percent">38%</span>
                                                </span>
                                                <span class="progress progress-striped">
                                                    <span style="width: 38%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">38% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>-->
                        </li>
                        <!-- END TODO DROPDOWN -->
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle" src="{{asset('/assets/pages/img/avatar.png')}}" />
                                <span class="username username-hide-on-mobile"> {{session('users_fullname')}} </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="{{route('logout')}}">
                                        <i class="icon-logout"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                        <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-quick-sidebar-toggler">
                            <a target="_blank" href="{{url('/index')}}" class="dropdown-toggle" style="color:#fff;">
                                <i class="fa fa-rocket"></i>Launch Site
                            </a>
                        </li>
                        <!-- END QUICK SIDEBAR TOGGLER -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-light " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                        <li class="sidebar-toggler-wrapper hide">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler">
                                <span></span>
                            </div>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                        </li>
                        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                        <li class="sidebar-search-wrapper">
                            <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                            <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                            <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                            <form class="sidebar-search  " action="#" method="POST">
                                <a href="javascript:;" class="remove">
                                    <i class="icon-close"></i>
                                </a>
                                <div class="input-group">
<!--                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <a href="javascript:;" class="btn submit">
                                            <i class="icon-magnifier"></i>
                                        </a>
                                    </span>-->
                                </div>
                            </form>
                            <!-- END RESPONSIVE QUICK SEARCH FORM -->
                        </li>
                        <li class="nav-item start <?php if($page_name=='dashboard' || $page_name=='setup' || $page_name=='activity'){echo 'active open';}?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                                <span class="<?php if($page_name=='dashboard' || $page_name=='setup'){echo 'selected';}?>"></span>
                                <span class="arrow <?php if($page_name=='dashboard' || $page_name=='setup'){echo 'open';}?>"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item start <?php if($page_name=='dashboard'){echo 'active open';}?>">
                                    <a href="{{route('dashboard')}}" class="nav-link ">
                                        <i class="icon-bar-chart"></i>
                                        <span class="title">Statistics</span>
                                    </a>
                                </li>
                                <li class="nav-item start <?php if($page_name=='activity'){echo 'active open';}?>">
                                    <a href="{{route('activity')}}" class="nav-link ">
                                        <i class="fa fa-globe"></i>
                                        <span class="title">Site Activity</span>
                                    </a>
                                </li>
                                <li class="nav-item start <?php if($page_name=='setup'){echo 'active open';}?>">
                                    <a href="{{route('setup')}}" class="nav-link ">
                                        <i class="fa fa-globe"></i>
                                        <span class="title">Site info</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="heading">
                            <h3 class="uppercase">Items</h3>
                        </li>
                        <li class="nav-item  <?php if($page_name=='about'){echo 'active ';}?>">
                            <a href="{{url('/module/about')}}" class="nav-link ">
                                <i class="fa fa-info-circle"></i>
                                <span class="title">About</span>
                            </a>
                        </li>
                        
                        <li class="nav-item <?php if($page_name=='service'){echo 'active ';}?> ">
                            <a href="{{url('/module/service')}}" class="nav-link ">
                                <i class="fa fa-briefcase"></i>
                                <span class="title">Services</span>
                            </a>
                        </li>
                        
                        <li class="nav-item  <?php if($page_name=='testimonial'){echo 'active ';}?>">
                            <a href="{{url('/module/testimonial')}}" class="nav-link ">
                                <i class="fa fa-thumbs-up"></i>
                                <span class="title">Testimonials</span>
                            </a>
                        </li>
                        
                        <li class="nav-item  <?php if($page_name=='newsitem'){echo 'active ';}?>">
                            <a href="{{url('/module/newsitem')}}" class="nav-link ">
                                <i class="fa fa-newspaper-o"></i>
                                <span class="title">News</span>
                            </a>
                        </li>
                        
                        <li class="nav-item  <?php if($page_name=='board'){echo 'active ';}?>">
                            <a href="{{url('/module/board')}}" class="nav-link ">
                                <i class="fa fa-group"></i>
                                <span class="title">Board</span>
                            </a>
                        </li>
                        
                        <li class="nav-item  <?php if($page_name=='management'){echo 'active ';}?>">
                            <a href="{{url('/module/management')}}" class="nav-link ">
                                <i class="fa fa-group"></i>
                                <span class="title">Management</span>
                            </a>
                        </li>
                        
<!--                        <li class="nav-item  <?php if($page_name=='report'){echo 'active ';}?>">
                            <a href="{{url('/module/report')}}" class="nav-link ">
                                <i class="fa fa-file-pdf-o"></i>
                                <span class="title">Reports</span>
                            </a>
                        </li>-->
                        
                        @if(session()->has('users') && session('users') >1)<!--can view-->
                        <li class="nav-item <?php if($page_name=='personnel' || $page_name=='role'){echo 'active open';}?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-users"></i>
                                <span class="title">Users</span>                                
                                <span class="<?php if($page_name=='personnel' || $page_name=='role'){echo 'selected';}?>"></span>
                                <span class="arrow <?php if($page_name=='personnel' || $page_name=='role'){echo 'open';}?>"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item <?php if($page_name=='personnel'){echo 'active open';}?>">
                                    <a href="{{route('show_users')}}" class="nav-link ">
                                        <i class="fa fa-user"></i>
                                        <span class="title">Personnel</span>
                                    </a>
                                </li>
                                <li class="nav-item <?php if($page_name=='role'){echo 'active open';}?> ">
                                    <a href="{{route('show_usergroups')}}" class="nav-link ">
                                        <i class="fa fa-group"></i>
                                        <span class="title">User Groups</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                        @endif
                        
                        
                        
                    </ul>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->