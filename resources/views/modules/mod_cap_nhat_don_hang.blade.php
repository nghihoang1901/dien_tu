
@if (isset($NoticeSuccess))
<script>
    alert('{{ $NoticeSuccess }}');
</script>
@endif
<section class="panel container">
<header class="panel-heading">
   Form Elements
</header>
<div class="panel-body">
    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
        @csrf
            
        <div class="form-group">
            <label class="col-sm-4 control-label">ID đơn hàng</label>
            <div class="col-sm-6">
                {{ $thong_tin_don_hang->id }}
                <span class="help-block"></span>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-4 control-label">Họ tên người nhận</label>
            <div class="col-sm-6">
                <input type="text" name="ho_ten_nguoi_nhan" class="form-control" value="{{ $thong_tin_don_hang->ho_ten_nguoi_nhan }}">
                <span class="help-block"></span>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-4 control-label">Email người nhận</label>
            <div class="col-sm-6">
                {{ $thong_tin_don_hang->email_nguoi_nhan }}
                <span class="help-block"></span>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-4 control-label">Trạng thái</label>
                <div class="col-sm-6">
                    <select name="trang_thai" id="" class="form-control">
                        @foreach ($array_trang_thai as $key => $trang_thai)
                            <option value="{{ $key }}" @if ($key == $thong_tin_don_hang->trang_thai)
                                selected
                            @endif>{{ $trang_thai }}</option>
                        @endforeach
                    </select>
                </div>
        </div>

        <div class="form-group">
            <label class="col-sm-4 control-label"></label>
            <div class="col-sm-6">
                <button type="submit" class="btn btn-primary">Lưu thông tin sản phẩm</button>
            </div>
        </div>
    </form>
</div>
</section>