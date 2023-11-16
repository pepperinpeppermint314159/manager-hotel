@extends('layouts.main')

@section('title', 'Đặt phòng')

@section('content')
    <div>
        <div class="page-title">
            <div class="title_left">
                <h3>Quản lý Đặt phòng <small>Danh sách</small></h3>
                <a href="{{ route('bookings.add') }}" class="btn btn-success btn-sm">
                    + Thêm mới
                </a>
            </div>

            <div class="title_right">
                <div class="col-md-6 col-sm-6   form-group pull-right top_search">
                    <form method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" value="{{ request()->get('search') }}"
                                   placeholder="Nhập khách hàng, số phòng...">
                            <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">Tìm kiếm</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        @if (session('status'))

            <div class="notifications mt-2">
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ session('status') }}
                </div>
            </div>

        @endif




        <div>
            <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                    <thead>
                        <tr class="headings">
                            <th>
                                <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th class="column-title">STT</th>
                            <th class="column-title">Khách hàng</th>
                            <th class="column-title">Số Phòng</th>
                            <th class="column-title">Ngày đặt phòng</th>
                            <th class="column-title">Ngày nhận phòng</th>
                            <th class="column-title">Ngày trả phòng</th>
                            <th class="column-title"></th>
                            <th class="bulk-actions" colspan="7">
                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($bookings as $key => $booking){ ?>
                            <tr class="<?php echo $key/2 ? 'even' : 'odd' ?> pointer">
                                <td class="a-center ">
                                    <input type="checkbox" class="flat" name="table_records" value="<?php echo $booking->bookingId ?>">
                                </td>
                                <td class=" "><?php echo $key + 1 ?></td>
                                <td class=" "><?php echo $booking->customer->name ?></td>
                                <td class=" "><?php echo $booking->room->name ?></td>
                                <td class=" "><?php echo date('h:i d-m-Y', strtotime($booking->booking_date)) ?></td>
                                <td class=" "><?php echo $booking->received_date ? date('h:i d-m-Y', strtotime($booking->received_date)) : '<span class="badge badge-success">chưa nhận phòng</span>'  ?></td>
                                <td class=" "><?php echo $booking->received_date ? $booking->checkout_date ? date('h:i d-m-Y', strtotime($booking->checkout_date)) : '<span class="badge badge-info">chưa trả phòng</span>' : '<span class="badge badge-success">chưa nhận phòng</span>' ?></td>
                                <td class=" last text-right">
                                    <a href="{{ route('bookings.add').'?id='.$booking->bookingId  }}" class="btn btn-primary cursor-pointer">
                                        <i class="fa fa-edit text-white"></i>
                                    </a>
                                    <a href="{{ route('bookings.delete', ['id' => $booking->bookingId ])  }}" class="btn btn-danger cursor-pointer">
                                        <i class="fa fa-trash text-white"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop



