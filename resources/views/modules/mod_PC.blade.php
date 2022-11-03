<div class="PC">
    <div class="container">
        <div class="title_san_pham">
            <h2>PC</h2>
        </div>
        <div class="content_san_pham">
            <div class="row">
                
                @if ($list_san_pham_PC)
                    @foreach ($list_san_pham_PC as $PC)
                    <div class="col-sm-3 m-2" style="border: 1px solid rgb(211, 212, 203); width:23%">
                        <div class="productinfo">
                            <div class="imgage">
                                <img class="img-fluid" src="/images/san_pham_PC/{{ $PC->hinh }}" alt="">
                            </div>
                            
                            <div class="info_san_pham">
                                <a href="#" data-id-san-pham={{ $PC->id }} class="add-to-cart-link"><i class="bi bi-cart"></i>Thêm vào giỏ hàng</a>
                                <a href="/san_pham/{{ $PC->id }}" class="view-details-link"><i class="bi bi-link"></i>Chi tiết sản phẩm</a>
                            </div>
                            <div class="thong-tin-san-pham">
                                <h2><a href="">{{ $PC->ten_linh_kien }}</a></h2>
                                <ins>{{ $PC->don_gia }} đ</ins></br>
                                <s>{{ $PC->gia_bia }} đ</s>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif

            </div>
        </div>
    </div>
</div>