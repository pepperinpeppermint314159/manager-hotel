@extends('layouts.main')

@section('title', 'Đặt phòng')

@section('content')
    <div>
        <div class="page-title">
            <div class="title_left">
                <h3>Quản lý Đặt phòng <small>{{ $booking && $booking->bookingId ? 'Cập nhật' : 'Thêm mới'  }}</small></h3>
                <a href="{{ URL::previous() }}" class="btn btn-danger btn-sm"><i class="fa fa-angle-left"></i>&nbsp; Trở lại</a>
            </div>
        </div>

        <div class="x_panel">
            <div class="x_title">
                <h2>{{ $booking && $booking->bookingId ? 'Cập nhật' : 'Thêm mới'  }} Đặt phòng</h2>
                <ul class="nav navbar-right panel_toolbox justify-content-end">
                    <li>
                        <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form method="POST" action="{{ route('bookings.save')  }}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    @csrf
                    <input type="hidden" name="bookingId" value="{{ $booking && $booking->bookingId ? $booking->bookingId : null }}">
                    <div class="item form-group custom-multi-select">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Chọn khách hàng <span class="required text-danger">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select  required="required" class="form-control " name="customerId">
                                <option>---- Chọn khách hàng ----</option>
                                <?php foreach ($customers as $customer){ ?>
                                    <option value="<?php echo $customer->customerId ?>" {{ $booking && $booking->customerId == $customer->customerId ? 'selected' : '' }}><?php echo $customer->name ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="item form-group custom-multi-select">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="room">Chọn phòng <span class="required text-danger">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select  required="required" class="form-control " name="roomId">
                                <option>---- Chọn phòng ----</option>
                                <?php foreach ($rooms as $room){ ?>
                                <option value="<?php echo $room->id ?>" {{ $booking && $booking->roomId == $room->id ? 'selected' : '' }}><?php echo $room->name ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="item form-group custom-multi-select">
                        <label for="equipments[]" class="col-form-label col-md-3 col-sm-3 label-align">Chọn thiết bị</label>
                        <div class="col-md-6 col-sm-6 ">
                            <?php
                            $equipmentIds = [];
                            if ($booking && $booking->bookingId){
                                $data = $booking->equipments->all();
                                foreach ($data as $item) {
                                    $equipmentIds[] = $item->equipmentId;
                                };
                            }
                            ?>
                            <select class="selectpicker custom-multi-selectpicker" data-none-selected-text="---- Chọn thiết bị ----" multiple data-live-search="true" name="equipments[]">
                                <?php foreach ($equipments as $equipment){ ?>
                                <option value="<?php echo $equipment->equipmentId ?>" {{ in_array($equipment->equipmentId, $equipmentIds) ? 'selected' : '' }}><?php echo $equipment->name ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label for="booking_date" class="col-form-label col-md-3 col-sm-3 label-align">Ngày đặt phòng <span class="required text-danger">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="datetime-local" class="form-control" id="booking_date" value="{{ $booking && $booking->booking_date ? date('Y-m-d\TH:i', strtotime($booking->booking_date)) : null  }}" name="booking_date" />
                        </div>
                    </div>

                    <div class="item form-group">
                        <label for="received_date" class="col-form-label col-md-3 col-sm-3 label-align">Ngày nhận phòng</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="datetime-local" class="form-control" id="received_date" value="{{ $booking && $booking->received_date ? date('Y-m-d\TH:i', strtotime($booking->received_date)) : null  }}" name="received_date" />
                        </div>
                    </div>

                    <div class="item form-group">
                        <label for="checkout_date" class="col-form-label col-md-3 col-sm-3 label-align">Ngày trả phòng</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input {{ $booking && $booking->received_date ? '' : 'readonly'  }}  type="datetime-local" class="form-control" id="checkout_date"  value="{{ $booking && $booking->checkout_date ? date('Y-m-d\TH:i', strtotime($booking->checkout_date)) : null  }}" name="checkout_date" />
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button class="btn btn-danger" type="button">Hủy</button>
                            <button class="btn btn-primary" type="reset">Làm mới</button>
                            <button type="submit" class="btn btn-success">Lưu lại</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

@stop



