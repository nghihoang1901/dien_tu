
<section class="chi_tiet_san_pham">
	<div class="row thong_tin_co_ban_san_pham">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="title_module">
				<?php echo $thong_tin_san_pham->ten_linh_kien; ?>
			</div>
		</div>
		
		<form action="them_vao_gio_hang.php" method="post">
			<div class="col-md-4 col-lg-4">
				<div class="thong_tin_hinh">
					<div class="chi_tiet_hinh">
						<img src="images/sach/<?php echo $thong_tin_san_pham->hinh; ?>" alt="" title="" />
					</div>
					<?php
					if($thong_tin_san_pham->hinh)
					{
					?>
						<div class="doc_thu_san_pham" data-toggle="modal" href='#modal-id'>Đọc thử</div>
					<?php
					}
					?>
				</div>
			</div>
			<div class="col-md-8 col-lg-8">
				<div class="thong_tin_san_pham">
					<div class="hang_san_xuat">
						<?php
						if($thong_tin_san_pham->ten_hang_san_xuat)
						{
						?>
							<span>Hãng sản xuất: </span><?php echo $thong_tin_san_pham->ten_hang_san_xuat; ?>
						<?php
						}
						?>
					</div>
					<div class="gia_ban">
						<?php
						if($thong_tin_san_pham->don_gia)
						{
						?>
							<span>Giá bán tại Bookstore: </span><?php echo number_format($thong_tin_san_pham->don_gia,0,",","."); ?> ₫
						<?php
						}
						?>
					</div>
					<div>
						<?php
						if($thong_tin_san_pham->don_gia)
						{
						?>
							<span>Giá bìa: </span><span class="gia_bia"><?php echo number_format($thong_tin_san_pham->gia_bia,0,",","."); ?> ₫</span>
						<?php
						}
						?>
					</div>
					<div class="div_chua_btn_dat_hang">
						<input type="hidden" name="id_san_pham" value="<?php echo $thong_tin_san_pham->id; ?>" />
						<input type="number" name="so_luong_mua" value="1" min="1" max="10" />
						<input type="submit" class="btn_dat_mua" value="Thêm vào giỏ hàng"/>
					</div>

					<!-- facebook like share -->
					<div class="fb-like" data-href="http://locahost:81<?php echo $_SERVER["PHP_SELF"]; ?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
					<div id="fb-root"></div>
					<script>(function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0];
					  if (d.getElementById(id)) return;
					  js = d.createElement(s); js.id = id;
					  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
					  fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));</script>
					<!-- END facebook like share -->
					
					<div class="cac_thong_tin_khac">
						<table class="table table-hover">
							<tbody>
								<?php
								if($thong_tin_san_pham->thong_so_ky_thuat)
								{
								?>
								<tr>
									{{-- <td style="width: 300px;">Hãng sản xuất: </td> --}}
									<td><?php echo $thong_tin_san_pham->thong_so_ky_thuat; ?></td>
								</tr>
								<?php
								}
								?>
							</tbody>
						</table>
                        <div class="danh_gia_chi_tiet">
                            <?php
								if($thong_tin_san_pham->danh_gia_chi_tiet)
								{
								?>
								<tr>
									{{-- <td style="width: 300px;">Hãng sản xuất: </td> --}}
									<td><?php echo $thong_tin_san_pham->danh_gia_chi_tiet; ?></td>
								</tr>
								<?php
								}
								?>
                        </div>
					</div>
				</div>
			</div>
		</form>
	</div>
	<div class="thanh_ngan_cach_module"></div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 gioi_thieu_san_pham">
		<?php echo $thong_tin_san_pham->danh_gia_chi_tiet; ?>
	</div>

	<!-- facebook comment -->
	<div class="fb-comments" data-href="http://<?php echo $_SERVER["HTTP_HOST"] .$_SERVER["REQUEST_URI"]; ?>" data-numposts="5"></div>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<!-- END facebook comment -->

</section>
