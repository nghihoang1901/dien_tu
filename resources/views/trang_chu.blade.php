@extends('templates.templates_gray')

@section('main-content')

    @if ($errors->noticeOrder->first())
        <script>
            alert('{{ $errors->noticeOrder->first() }}')
        </script>
    @endif
    
    @include('modules.mod_carousel')

    @include('modules.mod_laptop')

    @include('modules.mod_PC')
    
    @include('modules.mod_linh_phu_kien')

@endsection