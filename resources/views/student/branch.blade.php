@extends('layouts.app')

@section('title', 'Для студентов')
@section('fix_top', 'position-absolute fixed-top')
@section('link-student', 'active')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="text-center">
            @foreach($branch as $value)
                <div class="col-12">
                    <a href="student/{{$value->short_name}}" class="link-btn p-3"><h1>{{$value->name}}</h1></a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
