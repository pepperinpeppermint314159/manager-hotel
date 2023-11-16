@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <!-- top tiles -->
    <div class="mt-5">
        <div class="tile_count row pt-4">
            <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Tổng khách hàng</span>
                <div class="count mt-2">{{ $totalCustomer }}</div>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-bed"></i> Tổng Phòng</span>
                <div class="count mt-2">{{ $totalRoom }}</div>
            </div>

            <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-laptop"></i> Tổng thiết bị</span>
                <div class="count mt-2">{{ $totalEquipment }}</div>
            </div>

            <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-laptop"></i> Tổng lịch đặt</span>
                <div class="count mt-2">{{ $totalBooking }}</div>
            </div>
        </div>
    </div>
    <!-- /top tiles -->

    <br />

    <div class="row">


        <div class="col-md-4 col-sm-4 ">
            <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                    <h2>Đặt trước</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <div class="widget_summary">
                        <div class="w_left w_25">
                            <span>Đã đặt</span>
                        </div>
                        <div class="w_center w_55">
                            <div class="progress">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{ $bookingDaDat ? ($bookingDaDat / $totalBooking)*100 : 0 }}%;">
                                </div>
                            </div>
                        </div>
                        <div class="w_right w_20">
                            <span>{{ $bookingDaDat  }}</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="widget_summary">
                        <div class="w_left w_25">
                            <span>Đang sử dụng</span>
                        </div>
                        <div class="w_center w_55">
                            <div class="progress">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{ $bookingDangSudung ? ($bookingDangSudung / $totalBooking)*100 : 0 }}%;">
                                </div>
                            </div>
                        </div>
                        <div class="w_right w_20">
                            <span>{{ $bookingDangSudung  }}</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="widget_summary">
                        <div class="w_left w_25">
                            <span>Đã trả</span>
                        </div>
                        <div class="w_center w_55">
                            <div class="progress">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{ $bookingDaTra ? ($bookingDaTra / $totalBooking)*100 : 0 }}%;">
                                </div>
                            </div>
                        </div>
                        <div class="w_right w_20">
                            <span>{{ $bookingDaTra }}</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-4 ">
            <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                    <h2>Phòng</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <div class="widget_summary">
                        <div class="w_left w_25">
                            <span>Hoạt động</span>
                        </div>
                        <div class="w_center w_55">
                            <div class="progress">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{ $roomHoatDong ? ($roomHoatDong / $totalRoom)*100 : 0 }}%;">
                                </div>
                            </div>
                        </div>
                        <div class="w_right w_20">
                            <span>{{ $roomHoatDong }}</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="widget_summary">
                        <div class="w_left w_25">
                            <span>Tạm dừng</span>
                        </div>
                        <div class="w_center w_55">
                            <div class="progress">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{ $roomKhongHoatDong ? ($roomKhongHoatDong / $totalRoom)*100 : 0 }}%;">
                                </div>
                            </div>
                        </div>
                        <div class="w_right w_20">
                            <span>{{ $roomKhongHoatDong }}</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>


                </div>
            </div>
        </div>



    </div>


@stop
