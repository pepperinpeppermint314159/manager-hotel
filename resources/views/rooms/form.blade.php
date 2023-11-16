@extends('layouts.main')

@section('title', 'Phòng')

@section('content')
    <div>
        <div class="page-title">
            <div class="title_left">
                <h3>Quản lý Phòng <small>{{ $room && $room->id ? 'Cập nhật' : 'Thêm mới' }}</small></h3>
                <a href="{{ URL::previous() }}" class="btn btn-danger btn-sm"><i class="fa fa-angle-left"></i>&nbsp; Trở lại</a>
            </div>
        </div>

        <div class="x_panel">
            <div class="x_title">
                <h2>{{ $room && $room->id ? 'Cập nhật' : 'Thêm mới' }} Phòng</h2>
                <ul class="nav navbar-right panel_toolbox justify-content-end">
                    <li>
                        <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form method="POST" action="{{ route('rooms.save')  }}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    @csrf
                    <input type="hidden" name="roomId" value="{{ $room && $room->id ? $room->id : null }}">
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Số Phòng <span class="required text-danger">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="first-name" required="required" class="form-control " name="name" value="{{ $room && $room->id ? $room->name : null }}">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Mô tả <span class="required text-danger">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="last-name" name="description" class="form-control" value="{{ $room && $room->id ? $room->description : null }}" required>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Loại Phòng <span class="required text-danger">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                            <input id="middle-name" class="form-control" type="text" name="rank" value="{{ $room && $room->id ? $room->rank : null }}" required>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Số người tối đa <span class="required text-danger">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                            <input id="middle-name" class="form-control" type="text" name="max_people" value="{{ $room && $room->id ? $room->max_people : null }}" required>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Thiết bị <span class="required text-danger">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" rows="3" name="equipment" required>{{ $room && $room->id ? $room->equipment : null }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Trạng thái <span class="required text-danger">*</span></label>
                        <?php
                            $status = [
                                ['id' => 1, 'name' => 'Hoạt động'],
                                ['id' => 2, 'name' => 'Không hoạt động'],
                            ];
                        ?>
                        <div class="col-md-6 col-sm-6 mt-2 ">
                            <?php foreach ($status as $value){ ?>
                                <div class="radio">
                                    <label class="cursor-pointer">
                                        <input required type="radio" class="flat" name="status" value="<?php echo $value['id']  ?>" {{ $room && $room->status === $value['id'] ? 'checked' : '' }}> <span class="ml-2"><?php echo $value['name']  ?></span>
                                    </label>
                                </div>
                            <?php } ?>
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



