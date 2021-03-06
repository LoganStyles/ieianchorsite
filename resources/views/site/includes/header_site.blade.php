
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- custom-theme -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="iei anchor pensions, pensions,pfa,nigeria,best,highest,top pfa" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
            function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- //custom-theme -->
        <link href="{{ asset('/site/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ asset('/site/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
        <!--<link rel="stylesheet" href="{{ asset('/site/css/mainStyles.css')}}" />-->
        <link rel='stylesheet' href="{{ asset('/site/css/dscountdown.css')}}" type='text/css' media='all' />
        <link href="{{ asset('/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset('/site/css/flexslider.css')}}" type="text/css" media="screen" property="" />
        <!-- gallery -->
        <link href="{{ asset('/site/css/lsb.css')}}" rel="stylesheet" type="text/css">
        <!-- //gallery -->
        <!-- font-awesome-icons -->
        <link href="{{ asset('/site/css/font-awesome.css')}}" rel="stylesheet"> 
        <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,600i,700,900" rel="stylesheet">
        
        <link href="{{asset('/site/css/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" />
        <style>
            .dataTables_filter, .dataTables_length, .dataTables_info, .dataTables_paginate {
                /*display: none;*/
            } 

            .datatable thead {
                background-color: #e2e2e2;
            }
        </style>

        <link rel="stylesheet" type="text/css" href="{{asset('/site/js/jqPlot/jquery.jqplot.css')}}" />
      
    </head>	
    <body>
        <!-- banner -->
        <div class="header">

            <div class="w3layouts_header_right">
                <div class="agileits-social top_content">
                    <ul>                       
                        <li><a href="{{$siteitems[0]->facebook}}" target="_blank"><img src="{{asset('/site/images/icons/facebook.png')}}" /></a></li>
                        <li><a href="{{$siteitems[0]->twitter}}" target="_blank"><img src="{{asset('/site/images/icons/twitter.png')}}" /></a></li>
                        <li><a href="{{$siteitems[0]->instagram}}" target="_blank"><img src="{{asset('/site/images/icons/instagram.png')}}" /></a></li>
                        <li><a href="{{$siteitems[0]->youtube}}" target="_blank"><img src="{{asset('/site/images/icons/youtube.png')}}" /></a></li>
                        <li><a href="{{$siteitems[0]->linkedin}}" target="_blank"><img src="{{asset('/site/images/icons/linkedin.png')}}" /></a></li>
                    </ul>
                </div>
            </div>
            <div class="w3layouts_header_left">
                <ul>
                    <li><a target="_blank" title="Login to Client Portal" href="{{$siteitems[0]->client_url}}">RSA Account Login</a></li>
                </ul>

            </div>
<!--            <div class="w3layouts_header_left">
                <div class="w3_agile_search">
                    <form action="#" method="post">
                        <input type="search" name="Search" placeholder="Type your email.." required="" />
                        <input type="submit" value="Subscribe to Newsletter">
                    </form>
                </div>
            </div>-->
            <div class="clearfix"> </div>
        </div>
        <div class="header_mid">
            <div class="w3layouts_header_mid">
                <ul>
                    <li>
                        <div class="header_contact_details_agile"><i class="fa fa-envelope-o" aria-hidden="true"></i>
                            <div class="w3l_header_contact_details_agile">
                                <div class="header-contact-detail-title">Send us a Message</div> 
                                {{$siteitems[0]->email}}
                                <br><br><br><br>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="header_contact_details_agile"><i class="fa fa-phone" aria-hidden="true"></i>
                            <div class="w3l_header_contact_details_agile">
                                <div class="header-contact-detail-title">Give us a Call</div> 
                                <span class="w3l_header_contact_details_agile-info_inner">{{$siteitems[0]->phone1}}, {{$siteitems[0]->phone2}} </span>
                                <br><br><br><br>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="header_contact_details_agile"><i class="fa fa-map-marker" aria-hidden="true"></i>
                            <div class="w3l_header_contact_details_agile">
                                <div class="header-contact-detail-title">Head Office</div> 
                                <span class="w3l_header_contact_details_agile-info_inner">{{$siteitems[0]->office}} </span>
                                <br><br>
                            </div>
                        </div>
                    </li>
                     <li>
                        <div class="header_contact_details_agile"><i class="fa fa-list-alt" aria-hidden="true"></i>
                            <div class="w3l_header_contact_details_agile">
                                <div class="header-contact-detail-title">Unit Prices as at {{date("F j, Y",strtotime($latest_unitprices->report_date))}}</div> 
                                <span class="w3l_header_contact_details_agile-info_inner">RSA Unit Price: {{$latest_unitprices->rsa}} </span><br>
                                <span class="w3l_header_contact_details_agile-info_inner">Retiree Unit Price: {{$latest_unitprices->retiree}} </span><br>
                                <span class="w3l_header_contact_details_agile-info_inner">Administrative Fee: 100 </span><br>
                                <a href="{{url('/single/unit_price/')}}"><span class="label label-primary">View History</span></a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="" style="position: relative;">
            <nav class="navbar navbar-default">
                <div class="navbar-header navbar-left">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{route('home')}}">
                        <img src="{{ asset('/site/img/'.$siteitems[0]->filename)}}" alt="IEI Anchor Pensions" class="img-responsive" style="max-width: 80%;" />
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                    <nav class="link-effect-2" id="link-effect-2">
                        <ul class="nav navbar-nav">
                            <li class="<?php if($page=="home"){echo "active";}?>"><a href="{{route('home')}}"><span data-hover="Home">Home</span></a></li>
                            <li class="<?php if($page=="about"||$page=="board"){echo "active";}?>">
                                <!--<a href="{{url('/page/about')}}"><span data-hover="About Us">About Us</span></a>-->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span data-hover="About Us">About Us</span> <b class="caret"></b></a>
                                <ul class="dropdown-menu agile_short_dropdown">
                                    <li><a href="{{url('/page/about')}}"></a>About Us</li>
                                    <li><a href="{{url('/page/board')}}"></a>The Board of Directors</li>
                                    <li><a href="{{url('/page/management')}}"></a>The Management Team</li>
                                </ul>
                            </li>
                            <li class="<?php if($page=="service"){echo "active";}?> dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span data-hover="Services">Services</span> <b class="caret"></b></a>
                                <ul class="dropdown-menu agile_short_dropdown">
                                    @foreach($serviceitems as $subservice)
                                    <?php $link=$subservice['link_label']; ?>
                                        <li><a href="{{url('/page/service/'.$link)}}">{{$subservice['title']}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            
                            <li class="<?php if($page=="investment"){echo "active";}?>"><a href="{{route('investment')}}"><span data-hover="Investment">Investment</span></a></li>
                            <?php $link=$newsitem->link_label; ?>
                            <li class="<?php if($page=="newsitem"){echo "active";}?>"><a href="{{url('/page/newsitem/'.$link)}}"><span data-hover="News">News</span></a></li>
                            <li class="<?php if($page=="contact"){echo "active";}?>"><a href="{{url('/single/contact/')}}"><span data-hover="Contact Us">Contact Us</span></a></li>
                        </ul>
                    </nav>

                </div>
                <div style="position: absolute;top:10px;z-index: 10;right: 1%;">
                    @if($page =="home")
                <img src="{{ asset('/site/img/Award1_colored.png')}}" alt="IEI Anchor Pensions" class="img-responsive" style="float: right;" />
                @endif
                <!--<img src="{{ asset('/site/img/award2.jpg')}}" alt="IEI Anchor Pensions" class="img-responsive" style="max-width: 20%;float: right;" />-->
                <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </nav>
            
            
        </div>
