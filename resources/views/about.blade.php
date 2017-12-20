@extends('layouts.master_site')

@section('title')
About Us
@endsection   

@section('content')
<!-- small-banner -->
<div class="stats-bottom-banner">
    <div class="container">
        <h3>Don't Simply Retire, <span>Have something</span> to retire to</h3>
    </div>
</div>
<!-- //small-banner -->	
	
<!-- courses -->
<div class="team">
    <div class="container">
        <div class="agile_team_grids_top">
            <div class="col-md-6 w3ls_banner_bottom_left w3ls_courses_left">
                <div class="w3ls_courses_left_grids">
                    @foreach($aboutitems as $aboutitem)
                        <div class="w3ls_courses_left_grid">
                            <h3><i class="fa fa-pencil-square-o" aria-hidden="true"></i>{{$aboutitem->title}}</h3>
                            {{trim($aboutitem->details,'"')}}
                        </div>
                    @endforeach
<!--                    <div class="w3ls_courses_left_grid">
                        <h3><i class="fa fa-pencil-square-o" aria-hidden="true"></i>OUR VISION</h3>
                        <p>"A global financial institution , providing excellent pension solutions to our customers". .</p>
                    </div>
                    <div class="w3ls_courses_left_grid">
                        <h3><i class="fa fa-pencil-square-o" aria-hidden="true"></i>OUR MISSION</h3>
                        <p>"To be a dependable partner, helping our clients to protect and grow their pension assets and creating superior value for all stakeholders". </p>
                    </div>
                    <div class="w3ls_courses_left_grid">
                        <h3><i class="fa fa-pencil-square-o" aria-hidden="true"></i>OWNERSHIP</h3>
                        <p>81% - INTERNATIONAL ENERGY INSURANCE PLC <br>
                            19% - BY NIGERIAN CITIZENS OF PROVEN INTEGRITY AND EMINENT REPUTE </p>
                    </div>-->
                </div>
            </div>
            <div class="col-md-6 agileits_courses_right">
                <img src="images/2.jpg" alt=" " class="img-responsive" />
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //courses -->

<!-- /core values -->
<div class="agile_services">
    <div class="col-md-6 agile_services_img_wthree">
    </div>
    <div class="col-md-6 agile_inner_grids">
        <h3 class="agile_heading two" style="color: #000; font-weight: 600;">OUR CORE VALUES</h3>
        <div class="w3ls-markets-grid_top">
            <div class="col-md-6 w3ls-markets-grid">
                <div class="agileits-icon-grid">
                    <div class="icon-left">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </div>
                    <div class="icon-right">
                        <h5>Proficiency </h5>
                        <p>Having a culture of doing things right, the first time, and all the time</p>
                    </div>
                    <div class="clearfix"> </div>

                </div>
            </div>
            <div class="col-md-6 w3ls-markets-grid">
                <div class="agileits-icon-grid">
                    <div class="icon-left">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </div>
                    <div class="icon-right">
                        <h5>Integrity</h5>
                        <p>Transparent honesty in all dealings with our stakeholders</p>
                    </div>
                    <div class="clearfix"> </div>

                </div>
            </div>
            <div class="col-md-6 w3ls-markets-grid">
                <div class="agileits-icon-grid">
                    <div class="icon-left">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </div>
                    <div class="icon-right">
                        <h5> Innovation </h5>
                        <p>Constant improvement in our ways of doing things</p>
                    </div>
                    <div class="clearfix"> </div>

                </div>
            </div>
            <div class="col-md-6 w3ls-markets-grid">
                <div class="agileits-icon-grid">
                    <div class="icon-left">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </div>
                    <div class="icon-right">
                        <h5>Dependability</h5>
                        <p>We can be counted on, all the time</p>
                    </div>
                    <div class="clearfix"> </div>

                </div>
            </div>
            <div class="col-md-6 w3ls-markets-grid">
                <div class="agileits-icon-grid">
                    <div class="icon-left">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </div>
                    <div class="icon-right">
                        <h5>Friendliness </h5>
                        <p>Phasellus dapibus felis elit, sed accumsan arcu gravida vitae. Nullam aliquam erat..</p>
                    </div>
                    <div class="clearfix"> </div>

                </div>
            </div>
            
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="clearfix"> </div>
</div>

@endsection