<div class="header-info">
    <div class="container">
        <div class="header-top-in">
            <ul class="support">
                <li><a href="mailto:info@example.com"><i class="glyphicon glyphicon-envelope">
                        </i>info@example.com</a></li>
                <li><span><i class="glyphicon glyphicon-earphone" class="tele-in"> </i>0616 161 616</span></li>
            </ul>
            <div class="search">
                <input type="text" name="s" class="textbox" value="Search" onfocus="this.value = '';"
                    onblur="if (this.value == '') {this.value = 'Search';}">
                <input type="submit" value="Subscribe" id="submit" name="submit">
                <div id="response"> </div>
            </div>
            <ul class="support-right">
                <li>
                    <a href="/lien-he"><i class="glyphicon glyphicon-phone" class="tele"></i>Liên hệ</a>
                </li>
                <li>
                    <a href="/tin-tuc"><i class="glyphicon glyphicon-book" class="tele"></i>Tin tức</a>
                </li>
                {{-- <li><a href="/dang-ky"><i class="glyphicon glyphicon-lock" class="tele"></i>Đăng ký</a></li> --}}
                @if (session()->has('user_info'))
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="glyphicon glyphicon-user" class="menu"></i>
                            {{ session('user_info')->tai_khoan }}
                        </a>
                        <ul class="dropdown-menu">
                            @if (session('user_info')->id_loai_user >= 5)
                                <li>
                                    <a class="dropdown-item" href="/admins">Go to Admin Dashboard</a>
                                </li>
                            @endif
                            <li>
                                <a class="dropdown-item" href="/logout">Đăng xuất</a>
                            </li>

                        </ul>

                    </li>
                @else
                    <li><a href="/dang-nhap" id="myBtn"><i class="glyphicon glyphicon-user" class="menu"></i>Đăng
                            nhập</a></li>
                @endif
            </ul>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- carousel -->
<div class="container-fluid">
    <div id="carousel-id" class="carousel slide" data-ride="carousel" style="margin-bottom: 0;">
        <ol class="carousel-indicators">
            <li data-target="#carousel-id" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-id" data-slide-to="1" class=""></li>
            <li data-target="#carousel-id" data-slide-to="2" class=""></li>
            <li data-target="#carousel-id" data-slide-to="3" class=""></li>
            <li data-target="#carousel-id" data-slide-to="4" class=""></li>
            <li data-target="#carousel-id" data-slide-to="5" class=""></li>
            <li data-target="#carousel-id" data-slide-to="6" class=""></li>
            <li data-target="#carousel-id" data-slide-to="7" class=""></li>
            {{-- <li data-target="#carousel-id" data-slide-to="8" class=""></li> --}}


        </ol>
        <div class="carousel-inner">
            <div class="item active">
                <img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" alt="First slide"
                    src="/images/carousel-inner/slideshow_1.png">
            </div>
            <div class="item ">
                <img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" alt="First slide"
                    src="/images/carousel-inner/slideshow_2.png">
            </div>
            <div class="item ">
                <img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" alt="First slide"
                    src="/images/carousel-inner/slideshow_3.png">
            </div>
            <div class="item ">
                <img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" alt="First slide"
                    src="/images/carousel-inner/slideshow_5.png">
            </div>
            <div class="item">
                <img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" alt="First slide"
                    src="/images/carousel-inner/slideshow_6.png">
            </div>
            <div class="item ">
                <img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" alt="First slide"
                    src="/images/carousel-inner/slideshow_7.png">
            </div>
            <div class="item ">
                <img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" alt="First slide"
                    src="/images/carousel-inner/slideshow_8.png">
            </div>
            <div class="item ">
                <img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" alt="First slide"
                    src="/images/carousel-inner/slideshow_9.png">
            </div>
        </div>
        <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span
                class="glyphicon glyphicon-chevron-left"></span></a>
        <a class="right carousel-control" href="#carousel-id" data-slide="next"><span
                class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
</div>
<div class="header">
    <div class="header-top">
        <div class="header-bottom">
            <div class="container">
                <div class="logo">
                    <h1><a href="">I-<span>newbie</span></a></h1>
                </div>
                <div class="top-nav">
                    <ul class="memenu skyblue">
                        <li class="active"><a href="/">Trang chủ</a></li>
                        <li class="grid"><a href="#">Laptop</a>
                            <div class="mepanel">
                                <div class="row">
                                    <div class="col1 me-one">
                                        <h4>Thương hiệu</h4>
                                        <ul>
                                            <li><a href="">ASUS</a></li>
                                            <li><a href="">ACER</a></li>
                                            <li><a href="">MSI</a></li>
                                            <li><a href="">LENOVO</a></li>
                                            <li><a href="">HP</a></li>
                                            <li><a href="">DELL</a></li>
                                            <li><a href="">GIGABYTE</a></li>
                                            <li><a href="">LG</a></li>
                                            <li><a href="">HUAWEI</a></li>
                                        </ul>
                                    </div>
                                    <div class="col1 me-one">
                                        <h4>Laptop theo giá bán</h4>
                                        <ul>
                                            <li><a href="">Dưới 15 triệu</a></li>
                                            <li><a href="">Từ 15 đến 20 triệu</a></li>
                                            <li><a href="">Trên 20 triệu</a></li>
                                        </ul>
                                    </div>
                                    <div class="col1 me-one">
                                        <h4>Laptop theo CPU</h4>
                                        <ul>
                                            <li><a href="">Intel Core i3</a></li>
                                            <li><a href="">Intel Core i5</a></li>
                                            <li><a href="">Intel Core i7</a></li>
                                        </ul>
                                    </div>
                                    <div class="col1 me-one">
                                        <h4>Laptop theo nhu cầu</h4>
                                        <ul>
                                            <li><a href="">Laptop văn phòng</a></li>
                                            <li><a href="">Laptop Gaming</a></li>
                                            <li><a href="">Laptop học sinh - sinh viên</a></li>
                                            <li><a href="">Laptop mỏng nhẹ cao cấp</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="grid"><a href="#">PC</a>
                            <div class="mepanel">
                                <div class="row">
                                    <div class="col1 me-one">
                                        <h4>Thương hiệu</h4>
                                        <ul>
                                            <li><a href="">Phantom</a></li>
                                            <li><a href="">Minion</a></li>
                                            <li><a href="">Viper</a></li>
                                            <li><a href="">Titan</a></li>
                                            <li><a href="">ASUS</a></li>
                                            <li><a href="">ACER</a></li>
                                            <li><a href="">MSI</a></li>
                                            <li><a href="">LENOVO</a></li>
                                            <li><a href="">HP</a></li>
                                            <li><a href="">DELL</a></li>
                                        </ul>
                                    </div>
                                    <div class="col1 me-one">
                                        <h4>PC theo giá bán</h4>
                                        <ul>
                                            <li><a href="">Dưới 20 triệu</a></li>
                                            <li><a href="">Từ 20 đến 30 triệu</a></li>
                                            <li><a href="">Trên 30 triệu</a></li>
                                        </ul>
                                    </div>
                                    <div class="col1 me-one">
                                        <h4>PC theo cấu hình CPU</h4>
                                        <ul>
                                            <li><a href="">Intel Core i3</a></li>
                                            <li><a href="">Intel Core i5</a></li>
                                            <li><a href="">Intel Core i7</a></li>
                                            <li><a href="">Pentium/Celeron</a></li>
                                            <li><a href="">Xeon</a></li>
                                            <li><a href="">Ryzen</a></li>
                                        </ul>
                                    </div>
                                    <div class="col1 me-one">
                                        <h4>PC theo nhu cầu</h4>
                                        <ul>
                                            <li><a href="">PC văn phòng</a></li>
                                            <li><a href="">PC Gaming</a></li>
                                            <li><a href="">PC đồ họa</a></li>
                                            <li><a href="">PC All-In-One</a></li>
                                            <li><a href="">PC Mini</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="grid"><a href="#">Bàn phím</a>
                            <div class="mepanel">
                                <div class="row">
                                    <div class="col1 me-one">
                                        <h4>Thương hiệu</h4>
                                        <ul>
                                            <li><a href="">Akko</a></li>
                                            <li><a href="">Logitech</a></li>
                                            <li><a href="">Razer</a></li>
                                            <li><a href="">Corsair</a></li>
                                            <li><a href="">Leopold</a></li>
                                            <li><a href="">iKBC</a></li>
                                            <li><a href="">Steelseries</a></li>
                                            <li><a href="">Asus</a></li>
                                            <li><a href="">Dare-U</a></li>
                                            <li><a href="">HyperX</a></li>
                                            <li><a href="">Havit</a></li>
                                            <li><a href="">FL-Esport</a></li>
                                        </ul>
                                    </div>
                                    <div class="col1 me-one">
                                        <h4>Theo giá bán</h4>
                                        <ul>
                                            <li><a href="">Dưới 1 triệu</a></li>
                                            <li><a href="">Từ 1 đến 2 triệu</a></li>
                                            <li><a href="">Từ 2 đên 3 triệu</a></li>
                                            <li><a href="">Từ 3 đến 4 triệu</a></li>
                                            <li><a href="">Trên 4 triệu</a></li>
                                        </ul>
                                    </div>
                                    <div class="col1 me-one">
                                        <h4>Kết nối</h4>
                                        <ul>
                                            <li><a href="">Bluetooth</a></li>
                                            <li><a href="">Wireless</a></li>
                                        </ul>
                                    </div>
                                    <div class="col1 me-one">
                                        <h4>Phụ kiện bàn phím cơ</h4>
                                        <ul>
                                            <li><a href="">Keycaps</a></li>
                                            <li><a href="">Kê tay</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="grid"><a href="typography.html">chuột</a>
                            <div class="mepanel">
                                <div class="row">
                                    <div class="col1 me-one">
                                        <h4>Thương hiệu</h4>
                                        <ul>
                                            <li><a href="">Akko</a></li>
                                            <li><a href="">Logitech</a></li>
                                            <li><a href="">Razer</a></li>
                                            <li><a href="">Corsair</a></li>
                                            <li><a href="">MSI</a></li>
                                            <li><a href="">Steelseries</a></li>
                                            <li><a href="">Asus</a></li>
                                            <li><a href="">Dare-U</a></li>
                                            <li><a href="">HyperX</a></li>
                                            <li><a href="">Havit</a></li>
                                            <li><a href="">Fuhlen</a></li>
                                        </ul>
                                    </div>
                                    <div class="col1 me-one">
                                        <h4>Theo giá bán</h4>
                                        <ul>
                                            <li><a href="">Dưới 500 nghìn</a></li>
                                            <li><a href="">Từ 500 nghìn đến 1 triệu</a></li>
                                            <li><a href="">Từ 1 đên 2 triệu</a></li>
                                            <li><a href="">Từ 2 đến 3 triệu</a></li>
                                            <li><a href="">Trên 3 triệu</a></li>
                                        </ul>
                                    </div>
                                    <div class="col1 me-one">
                                        <h4>Kết nối</h4>
                                        <ul>
                                            <li><a href="">Bluetooth</a></li>
                                            <li><a href="">Wireless</a></li>
                                        </ul>
                                    </div>
                                    <div class="col1 me-one">
                                        <h4>Theo nhu cầu</h4>
                                        <ul>
                                            <li><a href="">Gaming</a></li>
                                            <li><a href="">Văn phòng</a></li>
                                            <li><a href="">Học sinh - Sinh viên</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="grid"><a href="contact.html">Lót chuột</a>
                            <div class="mepanel">
                                <div class="row">
                                    <div class="col1 me-one">
                                        <h4>Thương hiệu</h4>
                                        <ul>
                                            <li><a href="">Akko</a></li>
                                            <li><a href="">Logitech</a></li>
                                            <li><a href="">Razer</a></li>
                                            <li><a href="">Corsair</a></li>
                                            <li><a href="">Rapoo</a></li>
                                            <li><a href="">Steelseries</a></li>
                                            <li><a href="">Asus</a></li>
                                            <li><a href="">Dare-U</a></li>
                                            <li><a href="">HyperX</a></li>
                                            <li><a href="">Havit</a></li>
                                            <li><a href="">Couga</a></li>
                                        </ul>
                                    </div>
                                    <div class="col1 me-one">
                                        <h4>Theo giá bán</h4>
                                        <ul>
                                            <li><a href="">Dưới 300 nghìn</a></li>
                                            <li><a href="">Từ 300 đến 500 nghìn</a></li>
                                            <li><a href="">Từ 500 đên 700 nghìn</a></li>
                                            <li><a href="">Từ 700 nghìn đến 1 triệu</a></li>
                                            <li><a href="">Trên 1 triệu</a></li>
                                        </ul>
                                    </div>
                                    <div class="col1 me-one">
                                        <h4>Các loại lót chuột</h4>
                                        <ul>
                                            <li><a href="">Mềm</a></li>
                                            <li><a href="">Cứng</a></li>
                                            <li><a href="">Dày</a></li>
                                            <li><a href="">Mỏng</a></li>
                                            <li><a href="">Viền có LED</a></li>
                                        </ul>
                                    </div>
                                    <div class="col1 me-one">
                                        <h4>Lót chuột theo size</h4>
                                        <ul>
                                            <li><a href="">Nhỏ</a></li>
                                            <li><a href="">Vừa</a></li>
                                            <li><a href="">Lớn</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="grid"><a href="contact.html">tai nghe</a>
                            <div class="mepanel">
                                <div class="row">
                                    <div class="col1 me-one">
                                        <h4>Thương hiệu</h4>
                                        <ul>
                                            <li><a href="">Akko</a></li>
                                            <li><a href="">Logitech</a></li>
                                            <li><a href="">Razer</a></li>
                                            <li><a href="">Corsair</a></li>
                                            <li><a href="">AOC</a></li>
                                            <li><a href="">Sony</a></li>
                                            <li><a href="">Steelseries</a></li>
                                            <li><a href="">Asus</a></li>
                                            <li><a href="">Dare-U</a></li>
                                            <li><a href="">HyperX</a></li>
                                            <li><a href="">Havit</a></li>
                                        </ul>
                                    </div>
                                    <div class="col1 me-one">
                                        <h4>Tai nghe theo giá</h4>
                                        <ul>
                                            <li><a href="">Dưới 1 triệu</a></li>
                                            <li><a href="">Từ 1 đến 2 triệu</a></li>
                                            <li><a href="">Từ 2 đên 3 triệu</a></li>
                                            <li><a href="">Từ 3 đến 4 triệu</a></li>
                                            <li><a href="">Trên 4 triệu</a></li>
                                        </ul>
                                    </div>
                                    <div class="col1 me-one">
                                        <h4>Kết nối</h4>
                                        <ul>
                                            <li><a href="">Bluetooth</a></li>
                                            <li><a href="">Wireless</a></li>
                                        </ul>
                                    </div>
                                    <div class="col1 me-one">
                                        <h4>Kiểu tai nghe</h4>
                                        <ul>
                                            <li><a href="">Tai nghe Over-ear</a></li>
                                            <li><a href="">Tai nghe Gaming In-ear</a></li>
                                            <li><a href="">Tai nghe Audio</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="grid"><a href="contact.html">phụ kiện</a>
                    </ul>
                    <div class="clearfix"> </div>
                </div>
        
                <div class="cart box_1">
                    <div class="number_item_cart @if(!session()->has('tong_so_luong')) hidden @endif">
                        @if(session()->has('tong_so_luong'))
                            {{(session('tong_so_luong'))?:''}}
                        @endif
                    </div>

                    <a href="/gio-hang" class="simpleCart_empty"><i class="glyphicon glyphicon-shopping-cart"
                            style="font-size: 20px; padding-right: 10px; margin-bottom: 10px"></i>GIỎ HÀNG</a>
                </div>
            </div>
        </div>
    </div>
</div>

@if(session()->has('user_info'))
    @if(session('user_info')->id_loai_user < 5)
    <script>
        $(() => {
            setInterval(() => {
                //console.log('call ajax');
                $.get('/notice/' + '{{session('user_info')->email}}')
                    .then((data) => {
                        console.log(data);
                        if(data.message){
                            alert(data.message);
                        }
                    });
            }, 2000);
        })
    </script>
    @endif
@endif




