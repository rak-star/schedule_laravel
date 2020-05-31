@extends('layouts.app')

@section('title', 'Для преподавателей')
@section('fix_top', 'position-absolute fixed-top')
@section('link-teacher', 'active')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="text-center">
            <div class="col-12">
                <a href="/teacher/schedule/" class="link-btn p-3"><h1>Расписание</h1></a>
            </div>
            <div class="col-12">
                    <a href="/teacher/journal" class="link-btn p-3"><h1>Журнал</h1></a>
            </div>
            <div class="col-12">
                <a href="/teacher/duty/" class="link-btn p-3"><h1>Дежурство</h1></a>
            </div>
        </div>
    </div>
</div>
@endsection
