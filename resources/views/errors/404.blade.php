@extends('layouts.app')

@section('title', 'Страница не найдена')
@section('fix_top', 'position-absolute fixed-top')


@section('content')
<div class="flex-center position-ref full-height">
    <div class="code404">404</div>
    <div class="message404">Страница не найдена</div>
</div>
@endsection
