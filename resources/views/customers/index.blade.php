@extends('layouts.main')

@section('title', 'Khách hàng')

@section('content')
    <div>
        <div class="page-title">
            <div class="title_left">
                <h3>Quản lý Khách hàng <small>Danh sách</small></h3>
                <a href="{{ route('customers.add') }}" class="btn btn-success btn-sm">
                    + Thêm mới
                </a>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                    <form method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ request()->get('search') }}" placeholder="Nhập Tên khách hàng..." name="search">
                            <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">Tìm kiếm</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <div>
            <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                    <thead>
                        <tr class="headings">
                            <th>
                                <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th class="column-title">STT</th>
                            <th class="column-title">Tên khách hàng</th>
                            <th class="column-title">Địa chỉ</th>
                            <th class="column-title">Số điện thoại</th>
                            <th class="column-title">Email</th>
                            <th class="column-title">Ngày tạo</th>
                            <th class="column-title no-link last"><span class="nobr"></span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($customers as $key => $customer){ ?>
                            <tr class="<?php echo $key/2 ? 'even' : 'odd' ?> pointer">
                                <td class="a-center ">
                                    <input type="checkbox" class="flat" name="table_records" value="<?php echo $customer->customerId ?>">
                                </td>
                                <td class=" "><?php echo $key + 1 ?></td>
                                <td class=" "><?php echo $customer->name ?></td>
                                <td class=" "><?php echo $customer->address ?></td>
                                <td class=" "><?php echo $customer->phone ?></td>
                                <td class=" "><?php echo $customer->email ?></td>
                                <td class=" "><?php echo date('h:i d-m-Y', strtotime($customer->created_at)) ?></td>
                                <td class=" last text-right">
                                    <a href="{{ route('customers.add').'?id='.$customer->customerId  }}" class="btn btn-primary cursor-pointer">
                                        <i class="fa fa-edit text-white"></i>
                                    </a>
                                    <a href="{{ route('customers.delete', ['id' => $customer->customerId ])  }}" class="btn btn-danger cursor-pointer">
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



