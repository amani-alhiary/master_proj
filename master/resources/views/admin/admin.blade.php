@extends('admin/master')
@section('content')


    <!-- page content -->
    <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="row" style="display: inline-block;">
            <div class="tile_count">
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
                    <div class="count">{{ $total_users }}</div>
                    <span class="count_bottom"><i class="green">{{ ($total_recently_registered_users/$total_users)*100 }} % </i> From last Week</span>
                    
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-book"></i> Average Sold Books</span>
                    <div class="count">{{ number_format($sold_books_avg) }}</div>
                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>{{number_format(($total_sold_books/$total_books)*100) }}% </i> From last Week</span>
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-book"></i> Total Books</span>
                    <div class="count green">{{ $total_books+$total_user_books }}</div>
                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>{{ $total_user_books }} </i> Are used Books</span>
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-money"></i> Total Profit</span>
                    <div class="count">{{$total_profit}}</div>
                    <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>JOD </i> total profit</span>
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-book"></i> Total Sold Books</span>
                    <div class="count">{{$total_sold_books}}</div>
                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>{{($total_sold_books_last_week/$total_sold_books)*100}}% </i> From last
                        Week</span>
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-comments"></i> Total Comments</span>
                    <div class="count">{{$total_comments}}</div>
                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>{{($total_comments_last_week/$total_comments)*100}}% </i> From last
                        Week</span>
                </div>
            </div>
        </div>
        <!-- /top tiles -->

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="col-md-3   widget widget_tally_box" style="height:70px">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Sold Books Average</h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Settings 1</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                              </div>
                          </li>
                          <li><a class="close-link"><i class="fa fa-close"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">

                        <div style="text-align: center; margin-bottom: 17px">
                          <span class="chart" data-percent="{{$sold_books_avg}}">
                                              <span class="percent"></span>
                          </span>
                        </div>

                        <div class="pie_bg" style="text-align: center; display: none; margin-bottom: 17px">
                          <canvas id="canvas_doughnut" height="130"></canvas>
                        </div>

                 
                      
                       
                    
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3   widget widget_tally_box">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Sold Used Books </h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Settings 1</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                              </div>
                          </li>
                          <li><a class="close-link"><i class="fa fa-close"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">

                        <div style="text-align: center; margin-bottom: 17px">
                          <span class="chart" data-percent="{{$sold_used_books_avg}}">
                                              <span class="percent"></span>
                          </span>
                        </div>

                        <div class="pie_bg" style="text-align: center; display: none; margin-bottom: 17px">
                          <canvas id="canvas_doughnut" height="130"></canvas>
                        </div>

                 
                      
                       
                    
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3   widget widget_tally_box">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Waiting Orders  </h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Settings 1</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                              </div>
                          </li>
                          <li><a class="close-link"><i class="fa fa-close"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">

                        <div style="text-align: center; margin-bottom: 17px">
                          <span class="chart" data-percent="{{$waiting_orders_avg}}">
                                              <span class="percent"></span>
                          </span>
                        </div>

                        <div class="pie_bg" style="text-align: center; display: none; margin-bottom: 17px">
                          <canvas id="canvas_doughnut" height="130"></canvas>
                        </div>

                 
                      
                       
                    
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3   widget widget_tally_box">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Shipped Orders </h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Settings 1</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                              </div>
                          </li>
                          <li><a class="close-link"><i class="fa fa-close"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">

                        <div style="text-align: center; margin-bottom: 17px">
                          <span class="chart" data-percent="{{$shipped_orders_avg}}">
                                              <span class="percent"></span>
                          </span>
                        </div>

                        <div class="pie_bg" style="text-align: center; display: none; margin-bottom: 17px">
                          <canvas id="canvas_doughnut" height="130"></canvas>
                        </div>

                 
                      
                       
                    
                      </div>
                    </div>
                  </div>
               



            </div>

        </div>
        <br />

        <div class="row">



                            </div>
                        </div>

                    </div>
                    <!-- end of weather widget -->
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

    <!-- footer content -->
  
    <!-- /footer content -->
    </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('admindashboard/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('admindashboard/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('admindashboard/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('admindashboard/vendors/nprogress/nprogress.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ asset('admindashboard/vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- gauge.js -->
    <script src="{{ asset('admindashboard/vendors/gauge.js/dist/gauge.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('admindashboard/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('admindashboard/vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Skycons -->
    <script src="{{ asset('admindashboard/vendors/skycons/skycons.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('admindashboard/vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('admindashboard/vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('admindashboard/vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('admindashboard/vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('admindashboard/vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('admindashboard/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('admindashboard/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('admindashboard/vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset('admindashboard/vendors/DateJS/build/date.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('admindashboard/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
    <script src="{{ asset('admindashboard/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('admindashboard/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('admindashboard/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('admindashboard/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('admindashboard/build/js/custom.min.js') }}"></script>
    <script src="{{ asset('admindashboard/vendors/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js') }}"></script>

    </body>

    </html>
@endsection
