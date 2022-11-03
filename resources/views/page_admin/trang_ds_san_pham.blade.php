@extends('templates.templates_admin')

@section('main-content')
<link rel="stylesheet" href="/css/data_table.min.css">
<script src="/js/data_table.min.js"></script>
    <section id="main-content">
        <section class="wrapper">
            <div class="row" >
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-table"></i>Trang danh sách sản phẩm</h3>
                    {{-- <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                        <li><i class="fa fa-table"></i>Table</li>
                        <li><i class="fa fa-th-list"></i>Basic Table</li>
                    </ol> --}}
                </div>
            </div>
            <!-- page start-->
            @if ($errors->noticeDelete->first())
            <script>
                alert( '{{ $errors->noticeDelete->first() }}');
            </script>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Advanced Table
                        </header>

                        <table id="ds_san_pham" class="table table-striped table-advance table-hover">
                            <thead>
                                <tr>
                                    <th><i class="icon_desktop"></i> Tên sản phẩm</th>
                                    <th><i class="icon_calendar"></i> Năm sản xuất</th>
                                    <th><i class="icon_briefcase"></i> Loại sản phẩm</th>
                                    <th><i class="icon_creditcard"></i> Thương hiệu</th>
                                    <th><i class="icon_check"></i> Nổi Bật</th>
                                    <th><i class="icon_cogs"></i> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($ds_san_pham as $san_pham)
                                <tr>
                                    <td>{{ $san_pham->ten_linh_kien }}</td>
                                    <td>{{ $san_pham->nam_san_xuat }}</td>
                                    <td>{{ $san_pham->ten_loai_linh_kien }}</td>
                                    <td>{{ $san_pham->ten_hang_san_xuat }}</td>
                                    <td>{{ ($san_pham->noi_bat)?1:0 }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-primary" href="/admin/ql-san-pham/edit/{{ $san_pham->id }}"><i class="icon_pencil"></i></a>
                                            <a class="btn btn-danger" onclick="return confirm_delete();" href="/admin/san-pham/delete/{{ $san_pham->id }}"><i class="icon_close_alt2"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <script>
        $(document).ready( function () {
            $('#ds_san_pham').DataTable();
        } );
    </script>
@endsection
