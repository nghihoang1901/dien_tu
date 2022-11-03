@if ($errors->noticeSuccess->first())
    <script>
        alert('{{ $errors->noticeSuccess->first() }}');
    </script>
@endif

<section class="container">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <form action="" method="POST" class="form-horizontal" role="form">
            @csrf
            <div class="form-group">
                <legend>Bạn muốn liên hệ với chúng tôi?</legend>
            </div>
            <div class="form-group">
                <div class="col-md-3">
                    Email
                </div>
                <div class="col-md-9">
                    <input type="text" name="email" id="email" class="form-control" value="" required="required"
                        title="">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3">
                    Tiêu đề
                </div>
                <div class="col-md-9">
                    <input type="text" name="tieu_de" id="tieu_de" class="form-control" value="" required="required"
                        title="">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3">
                    Nội dung
                </div>
                <div class="col-md-9">
                    <textarea name="noi_dung" id="noi_dung" class="form-control" rows="3"
                        required="required"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-primary">Gửi mail liên hệ</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1959.8100255563254!2d106.67490673916134!3d10.76373748381525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xea5265c93a04fdf4!2zVHJ1bmcgdMOibSBUaW4gaOG7jWMgxJBIIEtIVE4!5e0!3m2!1svi!2s!4v1457063296831&quot;"
            width="100%" height="300" frameborder="0" style="border:0" allowfullscreen=""></iframe>
    </div>
</section>