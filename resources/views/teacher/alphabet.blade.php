@extends('layouts.app')

@section('title', 'Выбор преподавателя')
@section('link-teacher', 'active')
@section('link-teacher-schedule', 'active')

@section('content')
<div class="container-xl pt-2 text-center">
    <ul class="nav nav-tabs row px-3" id="myTab" role="tablist">
        <?foreach ($alphabet as $symbol):?>
        <li class="nav-item d-block col-3 col-sm-2 col-lg-1">
            <a class="nav-link<?if($alphabet[0] == $symbol) echo ' active'?>" id="<?=$symbol?>-tab" data-toggle="tab" href="#<?=$symbol?>" role="tab" aria-controls="<?=$symbol?>" aria-selected="true"><?=$symbol?></a>
        </li>

        <?endforeach;?>
    </ul>
    <div class="tab-content" id="myTabContent">
        <? foreach ($alphabet as $symbol):?>
            <div class="tab-pane fade<?if($alphabet[0] == $symbol) echo ' show active'?>" id="<?=$symbol?>" role="tabpanel" aria-labelledby="<?=$symbol?>-tab">
                <?$teachers = \App\Models\Ymk_teacher::where('name', 'like', "$symbol%")->get();?>
                <div class="row">
                @foreach($teachers as $teacher)
                    <div class="col-6 col-lg-4 col-xl-3 px-1 px-sm-3 my-1">
                        <div class="flex-center position-ref link-box">
                                <a href="/teacher/schedule/{{$teacher->short_name}}" class="link-btn py-3 d-block">
                                    <h3>{{$teacher->name}}</h3>
                                </a>
                            </div>
                    </div>
                @endforeach
                </div>
            </div>
        <?endforeach;?>
    </div>
</div>
@endsection
