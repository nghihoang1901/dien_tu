<div class="container">

    <section class="chi_tiet_san_pham" style="margin-top: 70px">
        <div class="row thong_tin_co_ban_san_pham">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="title_module" style="text-align: center; font-weight:600; font-size: 24px">
                    {{ $thong_tin_san_pham->ten_linh_kien }}
                </div>
            </div>

            <form action="" method="post">
                <div class="col-md-4 col-lg-4">
                    <div class="thong_tin_hinh">
                        <div class="chi_tiet_hinh" style="width: 300px">
                            <img src="images/san_pham/{{ $thong_tin_san_pham->hinh }}" class="img-fluid" alt=""
                                title="" />
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-lg-8">
                    <div class="thong_tin_san_pham" style="padding: 15px">
                        <div class="hang_san_xuat">
                            <?php
							if($thong_tin_san_pham->ten_hang_san_xuat)
							{
							?>
                            <span>Thương hiệu: </span>{{ $thong_tin_san_pham->ten_hang_san_xuat }}
                            <?php
							}
							?>
                        </div>
                        <div class="gia_ban">
                            <?php
							if($thong_tin_san_pham->don_gia)
							{
							?>
                            <span>Giá bán: </span>{{ number_format($thong_tin_san_pham->don_gia, 0, ',', '.') }} ₫
                            <?php
							}
							?>
                        </div>
                        <div>
                            <?php
							if($thong_tin_san_pham->don_gia)
							{
							?>
                            <span>Giá bìa: </span><span
                                class="gia_bia">{{ number_format($thong_tin_san_pham->gia_bia, 0, ',', '.') }} ₫</span>
                            <?php
							}
							?>
                        </div>
                        <div class="div_chua_btn_dat_hang" style="margin-bottom: 5px">
                            <input type="hidden" name="id_sach" value="{{ $thong_tin_san_pham->id }}" />
                            <input type="number" name="so_luong_mua" value="1" min="1" max="10" />
                            <input type="submit" class="btn_dat_mua" value="Thêm vào giỏ hàng" />
                        </div>

						<div class="fb-like" data-href="http://{{ $_SERVER["HTTP_HOST"] .$_SERVER["REQUEST_URI"]}}" data-numposts="5" data-width="" data-layout="standard" data-action="like" data-size="large" data-share="true"></div>
                        <!-- END facebook like share -->

                        <div class="cac_thong_tin_khac">
                            <table class="table table-hover" style="margin-top: 10px">
                                <tbody>

									<?php
									if($thong_tin_san_pham->ten_loai_linh_kien)
									{
									?>
                                    <tr>
                                        <td style="width: 300px;">Tên loại sản phẩm: </td>
                                        <td>{{ $thong_tin_san_pham->ten_loai_linh_kien }}</td>
                                    </tr>
                                    <?php
									}
									?>

                                    <?php
									if($thong_tin_san_pham->so_seri_linh_kien)
									{
									?>
                                    <tr>
                                        <td style="width: 300px;">Số seri sản phẩm: </td>
                                        <td>{{ $thong_tin_san_pham->so_seri_linh_kien }}</td>
                                    </tr>
                                    <?php
									}
									?>


                                    <?php
									if($thong_tin_san_pham->nam_san_xuat)
									{
									?>
                                    <tr>
                                        <td style="width: 300px;">Năm sản xuất: </td>
                                        <td>{{ $thong_tin_san_pham->nam_san_xuat }}</td>
                                    </tr>
                                    <?php
									}
									?>

                                    

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </form>
        </div>
		<div class="row chi_tiet_san_pham">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="thong_so_ky_thuat" style="margin-left: 150px">
					<?php
					if($thong_tin_san_pham->thong_so_ky_thuat)
					{
					?>
					<tr>
						<td>
							<?php 
								echo $thong_tin_san_pham->thong_so_ky_thuat 
							?>
						</td>
					</tr>
					<?php
					}
					?>
				</div>
			</div>

		</div>
        <div class="thanh_ngan_cach_module"></div>
        {{-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 gioi_thieu_sach">
			{!!$thong_tin_san_pham->gioi_thieu!!}
		</div> --}}

        <!-- facebook comment -->
        <div class="fb-comments" data-href="http://{{ $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] }}"
            data-numposts="5"></div>
        <div id="fb-root"></div>
        <script>
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        <!-- END facebook comment -->

    </section>

</div>
