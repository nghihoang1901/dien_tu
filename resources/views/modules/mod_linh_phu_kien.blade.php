<div class="linh_phu_kien">
    <div class="container">
        <div class="title_san_pham">
            <h2>LINH PHỤ KIỆN</h2>
        </div>
        <div class="row">
            <div class="col-sm-12 ">
                <div class="category-tab">
                    <!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#ban_phim" data-toggle="tab">Bàn phím</a></li>
                            <li><a href="#chuot" data-toggle="tab">Chuột</a></li>
                            <li><a href="#lot_chuot" data-toggle="tab">Lót chuột</a></li>
                            <li><a href="#tai_nghe" data-toggle="tab">Tai nghe</a></li>
                            <li><a href="#phu_kien" data-toggle="tab">Phụ kiện</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="ban_phim">
                            <div class="row">
                            @if ($list_san_pham_ban_phim)
                                @foreach ($list_san_pham_ban_phim as $ban_phim)
                                    <div class="col-sm-3 m-2" style="border: 1px solid rgb(211, 212, 203); width:23%">
                                        <div class="product-image-wrapper">
                                            <div class="productinfo">
                                                <div class="image">
                                                    <img class="img-fluid"
                                                    src="./images/san_pham_ban_phim/{{ $ban_phim->hinh }}"
                                                    alt="">
                                                </div>
                                                
                                                <div class="info_san_pham">
                                                    <a href="" data-id-san-pham={{ $ban_phim->id }}
                                                        class="add-to-cart-link"><i class="bi bi-cart"></i>Thêm vào giỏ
                                                        hàng</a>
                                                    <a href="/san_pham/{{ $ban_phim->id }}" class="view-details-link"><i
                                                            class="bi bi-link"></i>Chi tiết sản phẩm</a>
                                                </div>
                                                <div class="thong-tin-san-pham">
                                                    <h2><a href="">{{ $ban_phim->ten_linh_kien }}</a>
                                                    </h2>
                                                    <ins>{{ $ban_phim->don_gia }} đ</ins></br>
                                                    <s>{{ $ban_phim->gia_bia }} đ</s>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            </div>
                        </div>

                        <div class="tab-pane fade" id="chuot">
                            @if ($list_san_pham_chuot)
                                @foreach ($list_san_pham_chuot as $chuot)
                                    <div class="col-sm-3"
                                        style="border: 1px solid rgb(211, 212, 203); width: 23%; margin: 5px;">
                                        <div class="product-image-wrapper">
                                            <div class="productinfo">
                                                <div class="image">
                                                    <img class="img-fluid" src="./images/san_pham_chuot/{{ $chuot->hinh }}"
                                                    alt="">
                                                </div>
                                                
                                                <div class="info_san_pham">
                                                    <a href="#" data-id-san-pham={{ $chuot->id }}
                                                        class="add-to-cart-link"><i class="bi bi-cart"></i>Thêm vào giỏ
                                                        hàng</a>
                                                    <a href="/san_pham/{{ $chuot->id }}" class="view-details-link"><i
                                                            class="bi bi-link"></i>Chi tiết sản phẩm</a>
                                                </div>
                                                <div class="thong-tin-san-pham">
                                                    <h2><a href="">{{ $chuot->ten_linh_kien }}</a></h2>
                                                    <ins>{{ $chuot->don_gia }} đ</ins></br>
                                                    <s>{{ $chuot->gia_bia }} đ</s>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <div class="tab-pane fade" id="lot_chuot">
                            @if ($list_san_pham_lot_chuot)
                                @foreach ($list_san_pham_lot_chuot as $lot_chuot)
                                    <div class="col-sm-3"
                                        style="border: 1px solid rgb(211, 212, 203); width: 23%; margin: 5px;">
                                        <div class="product-image-wrapper">
                                            <div class="productinfo">
                                                <div class="image">
                                                    <img class="img-fluid"
                                                    src="./images/san_pham_lot_chuot/{{ $lot_chuot->hinh }}"
                                                    alt="">
                                                </div>
                                                
                                                <div class="info_san_pham">
                                                    <a href="#" data-id-san-pham={{ $lot_chuot->id }}
                                                        class="add-to-cart-link"><i class="bi bi-cart"></i>Thêm vào giỏ
                                                        hàng</a>
                                                    <a href="/san_pham/{{ $lot_chuot->id }}"
                                                        class="view-details-link"><i class="bi bi-link"></i>Chi tiết sản
                                                        phẩm</a>
                                                </div>
                                                <div class="thong-tin-san-pham">
                                                    <h2><a href="">{{ $lot_chuot->ten_linh_kien }}</a></h2>
                                                    <ins>{{ $lot_chuot->don_gia }} đ</ins></br>
                                                    <s>{{ $lot_chuot->gia_bia }} đ</s>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <div class="tab-pane fade" id="tai_nghe">
                            @if ($list_san_pham_tai_nghe)
                                @foreach ($list_san_pham_tai_nghe as $tai_nghe)
                                    <div class="col-sm-3"
                                        style="border: 1px solid rgb(211, 212, 203); width: 23%; margin: 5px;">
                                        <div class="product-image-wrapper">

                                            <div class="productinfo">
                                                <div class="image">
                                                    <img class="img-fluid"
                                                        src="./images/san_pham_tai_nghe/{{ $tai_nghe->hinh }}"
                                                        alt="">
                                                </div>
                                                <div class="info_san_pham">
                                                    <a href="#" data-id-san-pham={{ $tai_nghe->id }}
                                                        class="add-to-cart-link"><i class="bi bi-cart"></i>Thêm vào giỏ
                                                        hàng</a>
                                                    <a href="/san_pham/{{ $tai_nghe->id }}"
                                                        class="view-details-link"><i class="bi bi-link"></i>Chi tiết sản
                                                        phẩm</a>
                                                </div>
                                                <div class="thong-tin-san-pham">
                                                    <h2><a href="">{{ $tai_nghe->ten_linh_kien }}</a></h2>
                                                    <ins>{{ $tai_nghe->don_gia }} đ</ins></br>
                                                    <s>{{ $tai_nghe->gia_bia }} đ</s>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <div class="tab-pane fade" id="phu_kien">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
