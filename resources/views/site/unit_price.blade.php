@extends('site.layouts.master_site')
<?php $page="unit_price"; ?>
@section('title')
Unit Price History
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
                    
                    <div class="w3ls_courses_left_grid">
                                              
                        <form action="" class="form-horizontal form-bordered" id="fetch_price_history">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-2">From Date</label>
                                    <div class="col-md-3">
                                        <input id="start_date" name="start_date" class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" />
                                        <span class="help-block"> Click the field to select a date </span>
                                    </div>
                                    
                                    <label class="control-label col-md-2">End Date</label>
                                    <div class="col-md-3">
                                        <input id="end_date" name="end_date" class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" />
                                        <span class="help-block"> Click the field to select a date </span>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <input class="btn green" type="submit" name="submit" value="submit" />
                                    </div>                                   
                                    
                                </div>
                            </div>
                            
                        </form>
                        
                    </div>
                </div>
                
                <div>
                    <div style="padding-bottom: 0.5em;font-size: 1.2em;text-align: center;">Tabular Representation</div>
                        <table id="unit_price_history_table" class="datatable">
                            <thead>
                                <tr>
                                    <th class="text-left">Date</th>
                                    <th class="text-left">RSA</th>
                                    <th class="text-left">Retiree</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                </div>
            </div>
            
            <div class="col-md-12 w3ls_banner_bottom_left w3ls_courses_left">
                <div id="chart1"></div>
            </div>
            
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--services-->
<script type="text/javascript" src="{{ asset('/site/js/jquery-2.1.4.min.js')}}"></script>
<script type="text/javascript">
    
    $(document).ready(function () {
        
        loadUnitPrices('','');
        $('.datatable').dataTable({
            "order": [[0, "desc"]],
             "paging": true
        });
        
//        $('#example').dataTable( {
//            "paging": false
//        } );
        
        $('body').on('submit','#fetch_price_history',function(e){
            e.preventDefault();
            //on form submission, get prices for the selected range
            console.log('submitted');
            var startday=$('#start_date').val();
            var endday=$('#end_date').val();
            loadUnitPrices(startday,endday);
        });
        
        
    });    
    //get a range of unit_prices
    function loadUnitPrices(startday,endday){
        $('#unit_price_history_table tbody').html('');        
        
        $.ajax({
           url:"{{url('/unitprice/range')}}",
           method:'GET',
           data: {'startDate': startday, 'endDate': endday},
           success:function(response){
//             console.log('something')
               
                var jsonData = JSON.parse(response);
                console.log(response);
               if(jsonData.length > 0){
                   $('#unit_price_history_table tbody').find('tr:first-child').remove();
                                        
                      var line1 = [];
                      var line2 = [];
                
                        for (i = 0; i < jsonData.length; i++) {
                            var reportDate = jsonData[i].report_date; //new Date(jsonData[i].ReportDate.substring(0, 10));
                            console.log(reportDate);
                            var formattedReportDate = moment(reportDate).format('MM-DD-YYYY'); //moment(reportDate, 'MM-DD-YYYY').format();// reportDate.toLocaleFormat('%d %b %Y');
                            console.log(formattedReportDate);					
                            var RSA = jsonData[i].rsa;
                            var Retiree = jsonData[i].retiree;

                            line1.push([formattedReportDate, parseFloat(RSA)]);
                            line2.push([formattedReportDate, parseFloat(Retiree)]);

                            $('#unit_price_history_table tbody').append('<tr><td>' + formattedReportDate + '</td><td>' + RSA + '</td><td>' + Retiree + '</td></tr>');
                        }
                
                // display chart				
                    var plot1 = $.jqplot('chart1', [line1, line2], {
                        title: 'Graphical Representation',
                        legend: {
                            show: true,
                            placement: 'outsideGrid'
                        },
                        seriesDefaults: {
                            rendererOptions: {
                                smooth: true,
                                animation: {
                                    show: true
                                }
                            },
                            showMarker: true
                        },
                        series: [
                            {
                                label: 'RSA'
                            },
                            {
                                label: 'Retiree'
                            }
                        ],
                        axes: {
                            xaxis: {
                                renderer: $.jqplot.DateAxisRenderer,
                                tickOptions: {
                                    formatString: '%b&nbsp;%#d'
                                }
                            },
                            yaxis: {
                                tickOptions: {
                                    formatString: '%.4f'
                                }
                            }
                        },
                        highlighter: {
                            show: true
                        },
                        cursor: {
                            show: false
                        }
                        });
                    } else {
                        $('#unitPriceLoader').hide();
                    }

                },
                error: function (jqXHR, textStatus, error) {
                    console.log(JSON.stringify(jqXHR));
                    console.log("Ajax error: " + textStatus + ' : ' + error);
                }

            });
        }
    
</script>
@endsection