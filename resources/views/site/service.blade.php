@extends('site.layouts.master_site')
<?php $page="service"; ?>
@section('title')
Services
@endsection 

@section('content')

<!-- small-banner -->
<div class="stats-bottom-banner">
    <div class="container">
        <h3>Wouldn't You Like <span>To</span> Retire Happy</h3>
    </div>
</div>
<!-- //small-banner -->	

<!-- services -->

<div class="team">
    <div class="container">
        <div class="agile_team_grids_top">
            <div class="col-md-12 w3ls_banner_bottom_left w3ls_courses_left">
                <div class="w3ls_courses_left_grids">
                    @foreach($fetched_item as $subitem)
                        <div class="w3ls_courses_left_grid">
                            <h2><i class="fa fa-pencil-square-o" aria-hidden="true"></i>{{$subitem['title']}}</h2><br>
                        {{$subitem['details']}}
                    </div>
                    @endforeach
                </div>
            </div>
            
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--services-->
@endsection