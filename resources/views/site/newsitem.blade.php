@extends('site.layouts.master_site')
<?php $page="newsitem"; ?>
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

<!-- News -->

<div class="team">
    <div class="container">
        <div class="agile_team_grids_top">
            <div class="col-md-12 w3ls_banner_bottom_left w3ls_courses_left">
                <div class="col-md-4">
                    <h3>Latest Stories</h3>
                    <table class="table table-bordered">
                        <thead>
                        </thead>
                        <tbody>
                            @foreach($moduleitems as $item)
                            <tr>
                                <td><a href="{{$item['link_label']}}">{{$item['title']}}</a></td>
                            </tr>    
                            @endforeach
                        </tbody>
                    </table>  
                </div>
                <div class="col-md-8">
                    
                    @foreach($fetched_item as $subitem)
                    <h2><strong>{{strtoupper($subitem['title'])}}</strong></h2><br>
                    {{$subitem['details']}}
                    @endforeach
                </div>
            </div>

            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--services-->
@endsection