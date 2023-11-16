@extends('layouts.main')

@section('title', 'Khách hàng')

@section('content')
    <div>
        <div class="page-title">
            <div class="title_left">
                <h3>Quản lý Khách hàng <small>{{ $customer && $customer->customerId ? 'Cập nhật' : 'Thêm mới' }}</small></h3>
                <a href="{{ URL::previous() }}" class="btn btn-danger btn-sm"><i class="fa fa-angle-left"></i>&nbsp; Trở lại</a>
            </div>
        </div>

        <div class="x_panel">
            <div class="x_title">
                <h2>{{ $customer && $customer->customerId ? 'Cập nhật' : 'Thêm mới' }} Khách hàng</h2>
                <ul class="nav navbar-right panel_toolbox justify-content-end">
                    <li>
                        <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form method="POST" action="{{ route('customers.save')  }}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    @csrf
                    <input type="hidden" value="{{ $customer && $customer->customerId ? $customer->customerId : null }}" name="customerId">
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tên khách hàng <span class="required text-danger">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="first-name" required="required" class="form-control " name="name" value="{{ $customer && $customer->customerId ? $customer->name : null }}">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Địa chỉ <span class="required text-danger">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="last-name" name="address" class="form-control" value="{{ $customer && $customer->customerId ? $customer->address : null }}" required>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Số điện thoại <span class="required text-danger">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                            <input id="middle-name" class="form-control" type="text" name="phone" value="{{ $customer && $customer->customerId ? $customer->phone : null }}" required>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Email <span class="required text-danger">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                            <input id="middle-name" class="form-control" type="email" name="email" value="{{ $customer && $customer->customerId ? $customer->email : null }}" required>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Nội dung </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" rows="3" name="content" >{{ $customer && $customer->customerId ? $customer->content : null }}</textarea>
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



