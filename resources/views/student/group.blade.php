<?$full_branch = \App\Models\Ymk_branch::where('short_name', $branch)->value('name')?>

@extends('layouts.app')

@section('title', "$full_branch")
@section('link-student', 'active')
@section('link-student-'.$branch, 'active')

@section('content')
    <div class="container-xl pt-2 text-center">
        @if(count($groups1) > 0)
            <h2>1 курс</h2>
            <div class="row">
                @foreach($groups1 as $value)
                    <div class="col-6 col-lg-4 col-xl-3 my-1">
                        <div class="flex-center position-ref link-box">
                            <a href="/student/{{ $branch }}/{{ $value->short_name }}" class="link-btn py-3 d-block">
                                <h3>{{ $value->name }}</h3>
                                <span class="d-none d-lg-block">{{ $value->kod_group }}<br>
                        {{ $value->name_group }}</span>
                            </a>
                        </div>

                    </div>
                @endforeach
            </div>
        @endif

        @if(count($groups2) > 0)
                <h2>2 курс</h2>
                <div class="row">
                    @foreach($groups2 as $value)
                        <div class="col-6 col-lg-4 col-xl-3 my-1">
                            <div class="flex-center position-ref link-box">
                                <a href="/student/{{ $branch }}/{{ $value->short_name }}" class="link-btn py-3 d-block">
                                    <h3>{{ $value->name }}</h3>
                                    <span class="d-none d-lg-block">{{ $value->kod_group }}<br>
                        {{ $value->name_group }}</span>
                                </a>
                            </div>

                        </div>
                    @endforeach
                </div>
        @endif

        @if(count($groups3) > 0)
                <h2>3 курс</h2>
                <div class="row">
                    @foreach($groups3 as $value)
                        <div class="col-6 col-lg-4 col-xl-3 my-1">
                            <div class="flex-center position-ref link-box">
                                <a href="/student/{{ $branch }}/{{ $value->short_name }}" class="link-btn py-3 d-block">
                                    <h3>{{ $value->name }}</h3>
                                    <span class="d-none d-lg-block">{{ $value->kod_group }}<br>
                        {{ $value->name_group }}</span>
                                </a>
                            </div>

                        </div>
                    @endforeach
                </div>
        @endif

        @if(count($groups4) > 0)
                <h2>4 курс</h2>
                <div class="row">
                    @foreach($groups4 as $value)
                        <div class="col-6 col-lg-4 col-xl-3 my-1">
                            <div class="flex-center position-ref link-box">
                                <a href="/student/{{ $branch }}/{{ $value->short_name }}" class="link-btn py-3 d-block">
                                    <h3>{{ $value->name }}</h3>
                                    <span class="d-none d-lg-block">{{ $value->kod_group }}<br>
                        {{ $value->name_group }}</span>
                                </a>
                            </div>

                        </div>
                    @endforeach
                </div>
        @endif
    </div>
@endsection
