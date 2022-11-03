
@if (session()->has('NoticeSuccess'))
    <script>
        alert('{{ session('NoticeSuccess') }}');
    </script>
@endif
<section class="panel container">
    <header class="panel-heading">
       Form Elements
    </header>
    <div class="panel-body">
        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($thong_tin_sp))
                
            <div class="form-group">
                <label class="col-sm-2 control-label">Số seri linh kiện</label>
                <div class="col-sm-4">
                    <input type="text" name="so_seri_linh_kien" class="form-control" value="{{ $thong_tin_sp->so_seri_linh_kien }}">
                    <span class="help-block"></span>
                </div>
                <label class="col-sm-2 control-label" class="form-control">Loại sản phẩm</label>
                <div class="col-sm-4">
                    <select name="id_loai_linh_kien" id=""  class="form-control">
                        @foreach ($ds_loai_san_pham as $loai_san_pham)
                        <option value="{{ $loai_san_pham->id }}" @if( $thong_tin_sp->id_loai_linh_kien == $loai_san_pham->id ) selected = "selected" @endif>
                            {{ $loai_san_pham->ten_loai_linh_kien }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Tên sản phẩm:</label>
                <div class="col-sm-4">
                    <input name="ten_linh_kien" type="text" class="form-control" value="{{ $thong_tin_sp->ten_linh_kien }}">
                </div>
                <label class="col-sm-2 control-label">Hãng sản xuất:</label>
                <div class="col-sm-4">
                    <select name="id_hang_san_xuat" id="" class="form-control">
                        
                            @foreach ($ds_hang_san_xuat as $hang_san_xuat)
                            <option value="{{ $hang_san_xuat->id }}" @if ($thong_tin_sp->id_hang_san_xuat == $hang_san_xuat->id) selected = "selected" @endif>
                                {{ $hang_san_xuat->ten_hang_san_xuat }}
                            </option>
                            @endforeach
                        
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Thời gian bảo hành:</label>
                <div class="col-sm-4">
                    <input name="thong_tin_bao_hanh" type="text" class="form-control" value="{{ $thong_tin_sp->thong_tin_bao_hanh }}">

                </div>
                <label class="col-sm-2 control-label">Năm sản xuất:</label>
                <div class="col-sm-4">
                    <input name="nam_san_xuat" type="text" class="form-control" value="{{ $thong_tin_sp->nam_san_xuat }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Thông số kỹ thuật</label>
                <div class="col-sm-4">
                    <textarea class="form-control ckeditor" name="editor1" rows="6">{{ $thong_tin_sp->thong_so_ky_thuat }}</textarea>
                </div>
                <script>
                    // Replace the <textarea id="editor1"> with an CKEditor instance.
                    $(() => {
                        CKEDITOR.replace( 'editor1', {
                            on: {
                                focus: onFocus,
                                blur: onBlur,
            
                                // Check for availability of corresponding plugins.
                                pluginsLoaded: function( evt ) {
                                    var doc = CKEDITOR.document, ed = evt.editor;
                                    if ( !ed.getCommand( 'bold' ) )
                                        doc.getById( 'exec-bold' ).hide();
                                    if ( !ed.getCommand( 'link' ) )
                                        doc.getById( 'exec-link' ).hide();
                                }
                            }
                        });
                    })
                </script>
                <label class="col-sm-2 control-label">Đánh giá chi tiết</label>
                <div class="col-sm-4">
                    <textarea class="form-control ckeditor" name="editor1" rows="6">{{ $thong_tin_sp->danh_gia_chi_tiet }}</textarea>
                </div>
                <script>
                    // Replace the <textarea id="editor1"> with an CKEditor instance.
                    $(() => {
                        CKEDITOR.replace( 'editor1', {
                            on: {
                                focus: onFocus,
                                blur: onBlur,
            
                                // Check for availability of corresponding plugins.
                                pluginsLoaded: function( evt ) {
                                    var doc = CKEDITOR.document, ed = evt.editor;
                                    if ( !ed.getCommand( 'bold' ) )
                                        doc.getById( 'exec-bold' ).hide();
                                    if ( !ed.getCommand( 'link' ) )
                                        doc.getById( 'exec-link' ).hide();
                                }
                            }
                        });
                    })
                </script>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Giá bìa</label>
                <div class="col-sm-4">
                    <input name="gia_bia" type="text" class="form-control" value="{{ $thong_tin_sp->gia_bia }}">
                </div>
                <label class="col-sm-2 control-label">Đơn giá</label>
                <div class="col-sm-4">
                    <input name="don_gia" type="text" class="form-control" value="{{ $thong_tin_sp->don_gia }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Trạng thái</label>
                <div class="col-sm-4">
                    <select name="trang_thai" id="" class="form-control">
                        <option value="1" @if($thong_tin_sp->trang_thai == 1) selected="true" @endif>
                            Đang bán
                        </option>
                        <option value="0" @if($thong_tin_sp->trang_thai == 0) selected="true" @endif>
                            Ẩn đi
                        </option>
                    </select>
                </div>
                <label class="col-sm-2 control-label">Nổi bật</label>
                <div class="col-sm-4">
                    <select name="noi_bat" id="" class="form-control">
                        <option value="0" @if($thong_tin_sp->noi_bat == 0) selected="true" @endif>
                            Không nổi bật
                        </option>
                        <option value="1" @if($thong_tin_sp->noi_bat == 1) selected="true" @endif>
                            Nổi bật
                        </option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Hình sách</label>
                <div class="col-sm-4">
                    <input type="file" name="hinh_san_pham" id="hinh_san_pham"  class="form-control">
                    <input type="hidden" name="hinh" value="{{ $thong_tin_sp->hinh }}">
                        <div id="image-holder">
                            <img class="avatar" src="/images/san_pham/{{ $thong_tin_sp->hinh }}" alt="thumb-image">
                        </div>
                    <script>
                        $("#hinh_san_pham").on('change', function () {
                        
                            if (typeof (FileReader) != "undefined") {
                    
                                var image_holder = $("#image-holder");
                                image_holder.empty();
                    
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    $("<img />", {
                                        "src": e.target.result,
                                        "class": "thumb-image"
                                    }).appendTo(image_holder);
                    
                                }
                                image_holder.show();
                                reader.readAsDataURL($(this)[0].files[0]);
                            } else {
                                alert("This browser does not support FileReader.");
                            }
                        });
                    
                    </script>
                </div>
            </div>

            @else
                
            
            <div class="form-group">
                <label class="col-sm-2 control-label">Số seri linh kiện</label>
                <div class="col-sm-4">
                    <input type="text" name="so_seri_linh_kien" class="form-control" value="">
                    <span class="help-block"></span>
                </div>
                <label class="col-sm-2 control-label" class="form-control">Loại sản phẩm</label>
                <div class="col-sm-4">
                    <select name="id_loai_linh_kien" id=""  class="form-control">
                        @if (isset($ds_loai_san_pham))
                            @foreach ($ds_loai_san_pham as $loai_san_pham)
                            <option value="">
                                {{ $loai_san_pham->ten_loai_linh_kien }}
                            </option>
                            @endforeach
                        @endif
                        
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Tên sản phẩm:</label>
                <div class="col-sm-4">
                    <input name="ten_linh_kien" type="text" class="form-control">
                </div>
                <label class="col-sm-2 control-label">Hãng sản xuất:</label>
                <div class="col-sm-4">
                    <select name="id_hang_san_xuat" id="" class="form-control">
                        @if (isset($ds_hang_san_xuat))
                            @foreach ($ds_hang_san_xuat as $hang_san_xuat)
                            <option value="">
                                {{ $hang_san_xuat->ten_hang_san_xuat }}
                            </option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Thời gian bảo hành:</label>
                <div class="col-sm-4">
                    <input name="thong_tin_bao_hanh" type="text" class="form-control">

                </div>
                <label class="col-sm-2 control-label">Năm sản xuất:</label>
                <div class="col-sm-4">
                    <input name="nam_san_xuat" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Thông số kỹ thuật</label>
                <div class="col-sm-4">
                    <textarea class="form-control ckeditor" name="editor1" rows="6"></textarea>
                </div>
                <script>
                    // Replace the <textarea id="editor1"> with an CKEditor instance.
                    $(() => {
                        CKEDITOR.replace( 'editor1', {
                            on: {
                                focus: onFocus,
                                blur: onBlur,
            
                                // Check for availability of corresponding plugins.
                                pluginsLoaded: function( evt ) {
                                    var doc = CKEDITOR.document, ed = evt.editor;
                                    if ( !ed.getCommand( 'bold' ) )
                                        doc.getById( 'exec-bold' ).hide();
                                    if ( !ed.getCommand( 'link' ) )
                                        doc.getById( 'exec-link' ).hide();
                                }
                            }
                        });
                    })
                </script>
                <label class="col-sm-2 control-label">Đánh giá chi tiết</label>
                <div class="col-sm-4">
                    <textarea class="form-control ckeditor" name="editor1" rows="6"></textarea>
                </div>
                <script>
                    // Replace the <textarea id="editor1"> with an CKEditor instance.
                    $(() => {
                        CKEDITOR.replace( 'editor1', {
                            on: {
                                focus: onFocus,
                                blur: onBlur,
            
                                // Check for availability of corresponding plugins.
                                pluginsLoaded: function( evt ) {
                                    var doc = CKEDITOR.document, ed = evt.editor;
                                    if ( !ed.getCommand( 'bold' ) )
                                        doc.getById( 'exec-bold' ).hide();
                                    if ( !ed.getCommand( 'link' ) )
                                        doc.getById( 'exec-link' ).hide();
                                }
                            }
                        });
                    })
                </script>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Giá bìa</label>
                <div class="col-sm-4">
                    <input name="gia_bia" type="text" class="form-control">
                </div>
                <label class="col-sm-2 control-label">Đơn giá</label>
                <div class="col-sm-4">
                    <input name="don_gia" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Trạng thái</label>
                <div class="col-sm-4">
                    <select name="trang_thai" id="" class="form-control">
                        <option value="1">
                            Đang bán
                        </option>
                        <option value="0">
                            Ẩn đi
                        </option>
                    </select>
                </div>
                <label class="col-sm-2 control-label">Nổi bật</label>
                <div class="col-sm-4">
                    <select name="noi_bat" id="" class="form-control">
                        <option value="0">
                            Không nổi bật
                        </option>
                        <option value="1">
                            Nổi bật
                        </option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Hình sách</label>
                <div class="col-sm-4">
                    <input type="file" name="hinh_san_pham" id="hinh_san_pham"  class="form-control">
                        <div id="image-holder">
                            <img class="avatar" src="" alt="thumb-image">
                        </div>
                    <script>
                        $("#hinh_san_pham").on('change', function () {
                        
                            if (typeof (FileReader) != "undefined") {
                    
                                var image_holder = $("#image-holder");
                                image_holder.empty();
                    
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    $("<img />", {
                                        "src": e.target.result,
                                        "class": "thumb-image"
                                    }).appendTo(image_holder);
                    
                                }
                                image_holder.show();
                                reader.readAsDataURL($(this)[0].files[0]);
                            } else {
                                alert("This browser does not support FileReader.");
                            }
                        });
                    
                    </script>
                </div>
            </div>

            @endif
            <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary">Lưu thông tin sản phẩm</button>
                </div>
            </div>
        </form>
    </div>
</section>