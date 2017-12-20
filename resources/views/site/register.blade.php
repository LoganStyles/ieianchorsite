@extends('site.layouts.master_site')
<?php $page="register"; ?>
@section('title')
Register
@endsection 

@section('content')


        <!-- //banner -->	
        <div class="banner1">
            <div class="wthree_banner1_info">
                <h3><span>R</span>egister with us</h3>
            </div>
        </div>
        <!-- //banner -->	
        <!-- mail -->
        <div class="team">
            <div class="container">
                <h3 class="w3l_header w3_agileits_header">RSA <span>REGISTRATION</span></h3>
                <form action="{{ route('process_register')}}" method="post">
                <div class="agile_team_grids_top">
                    <div class="col-md-6 agileinfo_mail_grid_left">
                        
                            <span class="input input--nariko">
                                <input class="input__field input__field--nariko" name="title" type="text" id="title" required="" />
                                <label class="input__label input__label--nariko" for="title">
                                    <span class="input__label-content input__label-content--nariko">First Name</span>
                                </label>
                            </span>
                            <span class="input input--nariko">
                                <input class="input__field input__field--nariko" name="phone" type="text" id="phone" required="" />
                                <label class="input__label input__label--nariko" for="input-21">
                                    <span class="input__label-content input__label-content--nariko">Other Names</span>
                                </label>
                            </span>
                            <span class="input input--nariko">
                                <input class="input__field input__field--nariko" name="email" type="email" id="email" required="" />
                                <label class="input__label input__label--nariko" for="input-21">
                                    <span class="input__label-content input__label-content--nariko">Your Email</span>
                                </label>
                            </span>
                            
                            <span class="input input--nariko">
                                <select class="input__field input__field--nariko" name="states" id="states">
                                            <option value="ABIA">ABIA</option>
                                            <option value="ADAMAWA">ADAMAWA</option>
                                            <option value="AKWAIBOM">AKWAIBOM</option>
                                            <option value="ANAMBRA">ANAMBRA</option>
                                        </select>
                                <label class="input__label input__label--nariko" for="input-21">
                                    <span class="input__label-content input__label-content--nariko">Your State</span>
                                </label>
                            </span>
                            
                            <input type="submit" value="Register" name="submit">
                            <input type="hidden" value="{{Session::token()}}" name="_token"/>
                        
                    </div>
                    <div class="col-md-6 agileinfo_mail_grid_right">
                        <span class="input input--nariko">
                                <input class="input__field input__field--nariko" name="title" type="text" id="title" required="" />
                                <label class="input__label input__label--nariko" for="title">
                                    <span class="input__label-content input__label-content--nariko">Last Name</span>
                                </label>
                            </span>
                            <span class="input input--nariko">
                                <input class="input__field input__field--nariko" name="phone" type="text" id="phone" required="" />
                                <label class="input__label input__label--nariko" for="input-21">
                                    <span class="input__label-content input__label-content--nariko">Your Phone</span>
                                </label>
                            </span>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                    </form>
            </div>
        </div>
<!--        <div class="agile_map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3950.3905851087434!2d-34.90500565012194!3d-8.061582082752993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7ab18d90992e4ab%3A0x8e83c4afabe39a3a!2sSport+Club+Do+Recife!5e0!3m2!1sen!2sin!4v1478684415917" style="border:0"></iframe>
        </div>-->
        <!-- //mail -->
        
        @endsection