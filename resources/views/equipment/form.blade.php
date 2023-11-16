@extends('layouts.main')

@section('title', 'Thiết bị')

@section('content')
    <div>
        <div class="page-title">
            <div class="title_left">
                <h3>Quản lý Thiết bị <small>{{ $equipment && $equipment->equipmentId ? 'Cập nhật' : 'Thêm mới' }}</small></h3>
                <a href="{{ URL::previous() }}" class="btn btn-danger btn-sm"><i class="fa fa-angle-left"></i>&nbsp; Trở lại</a>
            </div>
        </div>

        <div class="x_panel">
            <div class="x_title">
                <h2>{{ $equipment && $equipment->equipmentId ? 'Cập nhật' : 'Thêm mới' }} Thiết bị</h2>
                <ul class="nav navbar-right panel_toolbox justify-content-end">
                    <li>
                        <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form method="POST" action="{{ route('equipment.save')  }}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    @csrf
                    <input type="hidden" value="{{ $equipment && $equipment->equipmentId ? $equipment->equipmentId : null }}" name="equipmentId">
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tên Thiết bị <span class="required text-danger">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="first-name" required="required" class="form-control " name="name" value="{{ $equipment && $equipment->equipmentId ? $equipment->name : null }}">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Mô tả </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" rows="3" name="description" >{{ $equipment && $equipment->equipmentId ? $equipment->description : null }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Trạng thái </label>
                        <div class="col-md-6 col-sm-6 mt-2 ">
                            <div class="checkbox">
                                <label class="cursor-pointer">
                                    <input type="checkbox" class="flat" name="status" value="1" {{ $equipment && $equipment->status == 1 ? 'checked' : '' }} {{ request()->get('id') ? '' : 'checked' }}> <span class="ml-2">Hoạt động</span>
                                </label>
                            </div>
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



