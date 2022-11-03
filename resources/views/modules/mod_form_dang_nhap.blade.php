<div class="container_mod_nhap_form" style="margin-top: 20px">
    <div class="container">
        <div class="panel panel-success" style="padding: 20px">
            <h2>Đăng nhập</h2>
            @if ($errors->loginErrors->first())
            <div class="error_message panel panel-danger">
                <div class="panel-heading">Kiểm tra lỗi</div>
                @foreach ($errors->loginErrors->all() as $message_error)
                    <div class="panel-body item_message text-danger">
                        {{ $message_error }}
                    </div>
                @endforeach
            </div>
            @endif
            {!! Form::open(array('route' => 'loginaccount', 'class' => 'register_form', 'files' => true)) !!}

            <div class="imgcontainer">
                <img src="/images/avatar/login.png" alt="Avatar" class="avatar">
            </div>

           
            {!! Form::label('username', "Tên đăng nhập") !!}
            {!! Form::text('username', null, ['requite', "class" => "form-control", "placeholder" => 'Tên đăng nhập']) !!}
            
            
            {!! Form::label('password', "Mật khẩu") !!}
            {!! Form::password('password', ["class" => "form-control"]) !!}
    
            <div>
                {!! Form::submit('Đăng nhập', ['class' => "btn btn-primary"]) !!}
            </div>
            
            {!! Form::checkbox('remeber_me') !!}
            {!! Form::label('remember_me', "Nhớ mật khẩu") !!}

            <div>
                {!! Form::submit('Hủy', ["class" => "btn btn-danger"]) !!}
                <span class="psw">Bạn chưa là thành viên? <a href="/dang-ky">Đăng ký</a></span>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
</div>