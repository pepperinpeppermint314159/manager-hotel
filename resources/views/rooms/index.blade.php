@extends('layouts.main')

@section('title', 'Phòng')

@section('content')
    <div>
        <div class="page-title">
            <div class="title_left">
                <h3>Quản lý Phòng <small>Danh sách</small></h3>
                <a href="{{ route('rooms.add') }}" class="btn btn-success btn-sm">
                    + Thêm mới
                </a>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                    </div>
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
                            <th class="column-title">Số Phòng</th>
                            <th class="column-title">Loại phòng</th>
                            <th class="column-title">Ngày tạo</th>
                            <th class="column-title">Trạng thái</th>
                            <th class="column-title no-link last"><span class="nobr"></span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($rooms as $key => $room){ ?>
                            <tr class="<?php echo $key/2 ? 'even' : 'odd' ?> pointer">
                                <td class="a-center ">
                                    <input type="checkbox" class="flat" name="table_records" value="<?php echo $room->id ?>">
                                </td>
                                <td class=" "><?php echo $key + 1 ?></td>
                                <td class=" "><?php echo $room->name ?></td>
                                <td class=" "><?php echo $room->rank ?></td>
                                <td class=" "><?php echo $room->created_date ?></td>

                                <?php
                                    $statusMessage = [ 1 => 'Trống', 2 => 'Đã đặt', 3 => 'Đang sửa', 4 => 'Hết phòng'];
                                ?>
                                <td class="a-right a-right "><?php echo $statusMessage[$room->status] ?></td>
                                <td class=" last text-right">
                                    <a href="{{ route('rooms.add').'?id='.$room->id  }}" class="btn btn-primary cursor-pointer">
                                        <i class="fa fa-edit text-white"></i>
                                    </a>
                                    <a href="{{ route('rooms.delete', ['id' => $room->id ])  }}" class="btn btn-danger cursor-pointer">
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



