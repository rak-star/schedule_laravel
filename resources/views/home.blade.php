@extends('layouts.app')

@section('title', 'Главная')
@section('fix_top', 'position-absolute fixed-top')
@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="text-center">
            <div class="col-12">
                <a href="{{ route('home_student') }}" class="link-btn p-3">
                    <h1>Студенты</h1>
                </a>
            </div>
            <div class="col-12">
                <a href="{{ route('home_teacher') }}" class="link-btn p-3"><h1>Преподаватели</h1></a>
            </div>
            <div class="col-12">
                <a href="{{ route('home_ads') }}" class="link-btn p-3"><h1>Объявления</h1></a>
            </div>
        </div>
    </div>
</div>
@endsection
