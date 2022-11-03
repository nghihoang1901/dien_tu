<?php
    // Form::macro('colorfield', function ($name){
    //     return '<input name="' .$name . '"type="color">';
    // });
?>

<div class="container_mod_dang_ky_form" style="margin-top: 20px">
    <div class="container">
        <div class="panel panel-success" style="padding: 20px">
            <h2>Đăng ký</h2>
            @if ($errors->first())
            <div class="error_message panel panel-danger">
                <div class="panel-heading">Kiểm tra lỗi</div>
                @foreach ($errors->all() as $message_error)
                    <div class="panel-body item_message text-danger">
                        {{ $message_error }}
                    </div>
                @endforeach
            </div>
            @endif
            {!! Form::open(array('route' => 'savecreatenewaccount', 'class' => 'register_form', 'files' => true)) !!}

            {{-- username --}}
            {!! Form::label('username', "Tài khoản") !!}
            {!! Form::text('username', null, array('requite', "class" => "form-control", "placeholder" => 'Tài Khoản')) !!}
            
            {{-- password --}}
            {!! Form::label('password', "Mật khẩu") !!}
            {!! Form::password('password', array("class" => "form-control")) !!}
            
            {{-- email --}}
            {!! Form::label('email', "Email") !!}
            {!! Form::email('email', null, array("requite", "class" => "form-control")) !!}

            {{-- avatar  --}}
            {!! Form::label('avatar', 'Avatar') !!}
            {!! Form::file('avatar', null, array('class' => 'form-control')) !!}


            {{-- birth date --}}
            {!! Form::label('date_of_birth', 'Ngày sinh') !!}
            {!! Form::date('date_of_birth', \Carbon\Carbon::now(), array("class" => "form-control")) !!}
            
            {{-- giới tính --}}
            {!! Form::label('sex', 'Giới tính') !!}
            {!! Form::radio('sex', 1, true, array('id' => 'female')) !!}
            {!! Form::label('female', 'Nữ') !!}
            {!! Form::radio('sex', 0, false, array('id' => 'male')) !!} 
            {!! Form::label('male', 'Nam') !!} 

            <div>
                {!! Form::submit('Đăng ký', array('class' => "btn btn-primary")) !!}
            </div>

            {!! Form::close() !!}

        </div>
    </div>
</div>