@extends('templates.templates_admin')

@section('main-content')
    <link rel="stylesheet" href="/css/data_table.min.css">
    <script src="/js/data_table.min.js"></script>
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
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
                    alert('{{ $errors->noticeDelete->first() }}');
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
                                    <th><i class="icon_desktop"></i> id đơn hàng</th>
                                    <th><i class="icon_calendar"></i> Họ tên người mua</th>
                                    <th><i class="icon_briefcase"></i> Tổng tiền</th>
                                    <th><i class="icon_cogs"></i> Action</th>


                                </tr>
                            </thead>
                            <tbody class="ds_don_hang">

                            </tbody>
                            {{-- <tbody>

                                @foreach ($ds_don_hang as $don_hang)
                                    <tr>
                                        <td>{{ $don_hang->id }}</td>
                                        <td>{{ $don_hang->ho_ten_nguoi_nhan }}</td>
                                        <td>{{ $don_hang->tong_tien }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-primary"
                                                    href="/admin/ql-san-pham/edit/{{ $don_hang->id }}"><i
                                                        class="icon_pencil"></i></a>
                                                <a class="btn btn-danger" onclick="return confirm_delete();"
                                                    href="/admin/san-pham/delete/{{ $don_hang->id }}"><i
                                                        class="icon_close_alt2"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody> --}}
                        </table>
                    </section>
                </div>
            </div>
            {{-- {{ $so_trang }} --}}
            <h4>Default</h4>
            <ul class="pagination">
                <li class="page-item"><a class="page-link" onclick="process_load_page(0)">First</a></li>
                <li class="page-item"><a class="page-link" onclick="process_load_page_previous()">Previous</a></li>


            </ul>
            {{-- <ul class="pagination">
                <li class="page-item"><a class="page-link" href="/admin/ql-don-hang/?page=0">First</a></li>
                <li class="page-item"><a class="page-link" href="/admin/ql-don-hang/?page={{ ($cur_page - 1 >= 0)?($cur_page - 1):0 }}">Previous</a></li>

                @if ($cur_page >= 5)
                    <li class="page-item"><a class="page-link">...</a></li>
                @endif
            </ul> --}}
            <ul class="pagination list_page">


                {{-- @for ($i = 0; $i < $so_trang; $i++)
                    @if ($i >= $cur_page - 5 && $i <= $cur_page + 5)
                        <li class="page-item"><a class="page-link" href="/admin/ql-don-hang/?page={{ $i }}">{{ $i + 1 }}</a></li>
                    @endif
                @endfor --}}


            </ul>
            <ul class="pagination">

                <li class="page-item"><a class="page-link" onclick="process_load_page_next()">Next</a></li>
                <li class="page-item"><a class="page-link" onclick="process_load_page({{ $so_trang - 1 }})">Last</a></li>
            </ul>
            {{-- <ul class="pagination">
                @if ($cur_page <= $so_trang - 6)
                    <li class="page-item"><a class="page-link">...</a></li>
                @endif
                <li class="page-item"><a class="page-link" href="/admin/ql-don-hang/?page={{ ($cur_page + 1 <= $so_trang)?($cur_page + 1):($so_trang - 1) }}">Next</a></li>
                <li class="page-item"><a class="page-link" href="/admin/ql-don-hang/?page={{ $so_trang - 1 }}">Last</a></li>
            </ul> --}}
            <!-- page end-->
        </section>
        <script>
            var current_page = 0;
            var so_trang = 0;

            function ajax_load_page(cur_page) {
                $.get('/admin/ql-don-hang/pagination/' + cur_page)
                    .then((data) => {
                        // console.log(data);
                        so_trang = data.so_trang;

                        var html_list_page = '';
                        if (cur_page >= 5) {
                            html_list_page += `<li class="page-item"><a class="page-link">...</a></li>`;
                        }
                        for(var i = 0; i < so_trang; i++){
                            if(i >= cur_page - 5 && i <= cur_page + 5)
                            {
                                html_list_page += `
                                <li class="page-item"><a class="page-link" onclick="process_load_page(${i})">${i + 1}</a></li>
                                `
                            }
                        }
                        if(cur_page <= so_trang - 6){
                            html_list_page += `<li><a class="page-link">...</a></li>`;
                        }

                        $('.list_page').html(html_list_page);

                        if (data.ds_don_hang.length > 0) {
                            var html_ds_don_hang = '';
                            
                            for (var i = 0; i < data.ds_don_hang.length; i++) {
                                html_ds_don_hang += `
                                    <tr>
                                        <td>${data.ds_don_hang[i].id}</td>
                                        <td>${data.ds_don_hang[i].ho_ten_nguoi_nhan}</td>
                                        <td>${data.ds_don_hang[i].tong_tien}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-primary"
                                                    href="/admin/ql-don-hang/edit/${data.ds_don_hang[i].id}"><i
                                                        class="icon_pencil"></i></a>
                                                <a class="btn btn-danger" onclick="return confirm_delete();"
                                                    href="/admin/san-pham/delete/${data.ds_don_hang[i].id}"><i
                                                        class="icon_close_alt2"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                `
                            }
                            
                            $('.ds_don_hang').html(html_ds_don_hang);
                        }
                    })
            }
            // lùi 1 trang
            function process_load_page_previous() {
                if (current_page >= 1) {
                    current_page -= 1;
                    ajax_load_page(current_page);
                }
            }
            // tien 1 trang
            function process_load_page_next() {
                if (current_page <= so_trang - 1) {
                    current_page += 1;
                    ajax_load_page(current_page);
                }
            }
            // mỗi khi thay đổi trang
            function process_load_page(cur_page) {
                // console.log(cur_page);
                current_page = cur_page
                ajax_load_page(current_page);
            }
            // chạy lần đàu tiên sau khi load trang
            $(() => {
                ajax_load_page(current_page);
            })
        </script>
    </section>
    {{-- <script>
        $(document).ready( function () {
            $('#ds_san_pham').DataTable();
        } );
    </script> --}}
@endsection
