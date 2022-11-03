@extends('templates.templates_gray')

@section('main-content')

    @include('modules.mod_search_form')

    <div class="main">
        <div class="laptop">
            <div class="container">
                <div class="title_san_pham">
                    <h2>Danh sách sản phẩm </h2>
                </div>
                <div class="content_san_pham">
                    <div class="row">
                        @for ($i = 0; $i < count($ds_san_pham); $i++)
                            <div class="col-sm-3 m-2" style="border: 1px solid rgb(211, 212, 203); width:23%">
                                <div class="productinfo">
                                    <img class="img-fluid" src="/images/san_pham/{{ $ds_san_pham[$i]->hinh }}"
                                        alt="">
                                    <div class="info_san_pham">
                                        <a href="#" class="add-to-cart-link"><i class="bi bi-cart"></i>Thêm vào giỏ
                                            hàng</a>
                                        <a href="" class="view-details-link"><i class="bi bi-link"></i>Chi tiết sản
                                            phẩm</a>
                                    </div>
                                    <div class="thong-tin-san-pham">
                                        <h2><a href="">{{ $ds_san_pham[$i]->ten_linh_kien }}</a></h2>
                                        <ins>{{ $ds_san_pham[$i]->don_gia }} đ</ins></br>
                                        <s>{{ $ds_san_pham[$i]->gia_bia }} đ</s>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    @endsection
