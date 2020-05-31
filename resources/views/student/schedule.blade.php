@extends('layouts.app')

@section('title', "Группа $group")
@section('link-student', 'active')
@section('link-student-'.$branch, 'active')

@section('content')
    <?$name_table_week = get_name_table('w');
    $name_table_schedule = get_name_table('s');
    ?>
<div class="container-fluid pt-2 text-center">
    <h2>Расписание {{ $group }}</h2>
    <div class="row mb-5">
        @if(count($schedules1) > 0 or count($schedules2) > 0)
            <div class="col-12 col-lg-6">
                <?$i=0;$h=1?>
                @foreach($schedules1 as $schedule)
                    <div class="table-container height-<?=$h?>">
                        <span>{{ get_week($i) }}, <?=date('d.m.Y', strtotime($schedule->date))?></span>
                        <div class="table-responsive-md">
                            <table class="table table-sm">
                                <thead class="thead-light">
                                <tr>
                                    <th class="align-middle">№ пары</th>
                                    <th class="align-middle text-left">Предмет</th>
                                    <th class="align-middle">Кабинет</th>
                                    <th class="align-middle text-left">Преподаватель</th>
                                    <th class="align-middle">Время</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th class="align-middle" scope="row">1</th>
                                    <td class="align-middle text-left">{{$schedule->predmet1}}</td>
                                    <td class="align-middle">{!! $schedule->kabinet1 !!}</td>
                                    <td class="align-middle text-left">
                                        {!! $schedule->prepod1 !!}
                                    </td>
                                    <td class="align-middle">08:15-09:55</td>
                                </tr>
                                <tr>
                                    <th class="align-middle" scope="row">2</th>
                                    <td class="align-middle text-left">{{$schedule->predmet2}}</td>
                                    <td class="align-middle">{!! $schedule->kabinet2 !!}</td>
                                    <td class="align-middle text-left">
                                        {!! $schedule->prepod2 !!}
                                    </td>
                                    <td class="align-middle">10:05-11:45</td>
                                </tr>
                                <tr>
                                    <th class="align-middle" scope="row">3</th>
                                    <td class="align-middle text-left">{{$schedule->predmet3}}</td>
                                    <td class="align-middle">{!! $schedule->kabinet3 !!}</td>
                                    <td class="align-middle text-left">
                                        {!! $schedule->prepod3 !!}
                                    </td>
                                    <td class="align-middle">12:10-13:50</td>
                                </tr>
                                <tr>
                                    <th class="align-middle" scope="row">4</th>
                                    <td class="align-middle text-left">{{$schedule->predmet4}}</td>
                                    <td class="align-middle">{!! $schedule->kabinet4 !!}</td>
                                    <td class="align-middle text-left">
                                        {!! $schedule->prepod4 !!}
                                    </td>
                                    <td class="align-middle">14:15-15:55</td>
                                </tr>
                                <tr>
                                    <th class="align-middle" scope="row">5</th>
                                    <td class="align-middle text-left">{{$schedule->predmet5}}</td>
                                    <td class="align-middle">{!! $schedule->kabinet5 !!}</td>
                                    <td class="align-middle text-left">
                                        {!! $schedule->prepod5 !!}
                                    </td>
                                    <td class="align-middle">16:05-17:45</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?$i++;$h++;?>
                @endforeach
            </div>
            <div class="col-12 col-lg-6">

                <?$i=3;$h=1?>
                @foreach($schedules2 as $schedule)
                    <div class="table-container height-<?=$h?>">
                        <span>{{ get_week($i) }}, <?=date('d.m.Y', strtotime($schedule->date))?></span>
                        <div class="table-responsive-md">
                                <table class="table table-sm">
                                    <thead class="thead-light">
                                    <tr>
                                        <th class="align-middle">№ пары</th>
                                        <th class="align-middle text-left">Предмет</th>
                                        <th class="align-middle">Кабинет</th>
                                        <th class="align-middle text-left">Преподаватель</th>
                                        <th class="align-middle">Время</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th class="align-middle" scope="row">1</th>
                                        <td class="align-middle text-left">{{$schedule->predmet1}}</td>
                                        <td class="align-middle">{!! $schedule->kabinet1 !!}</td>
                                        <td class="align-middle text-left">
                                            {!! $schedule->prepod1 !!}
                                        </td>
                                        <td class="align-middle">08:15-09:55</td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle" scope="row">2</th>
                                        <td class="align-middle text-left">{{$schedule->predmet2}}</td>
                                        <td class="align-middle">{!! $schedule->kabinet2 !!}</td>
                                        <td class="align-middle text-left">
                                            {!! $schedule->prepod2 !!}
                                        </td>
                                        <td class="align-middle">10:05-11:45</td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle" scope="row">3</th>
                                        <td class="align-middle text-left">{{$schedule->predmet3}}</td>
                                        <td class="align-middle">{!! $schedule->kabinet3 !!}</td>
                                        <td class="align-middle text-left">
                                            {!! $schedule->prepod3 !!}
                                        </td>
                                        <td class="align-middle">12:10-13:50</td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle" scope="row">4</th>
                                        <td class="align-middle text-left">{{$schedule->predmet4}}</td>
                                        <td class="align-middle">{!! $schedule->kabinet4 !!}</td>
                                        <td class="align-middle text-left">
                                            {!! $schedule->prepod4 !!}
                                        </td>
                                        <td class="align-middle">14:15-15:55</td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle" scope="row">5</th>
                                        <td class="align-middle text-left">{{$schedule->predmet5}}</td>
                                        <td class="align-middle">{!! $schedule->kabinet5 !!}</td>
                                        <td class="align-middle text-left">
                                            {!! $schedule->prepod5 !!}
                                        </td>
                                        <td class="align-middle">16:05-17:45</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    <?$i++;$h++;?>
                @endforeach
            </div>
        @else
            <?
            $date = DB::table($name_table_week)->find($id_week);
            $date = $date->monday;?>
            <div class="col-12 col-lg-6">
                @for($i = 0; $i <=2; $i++)
                    <div class="table-container min-height">
                        <span>{{ get_week($i) }}, <?=date('d.m.Y', strtotime("$date + $i day"))?></span>
                        <div class="table-responsive-md">
                            <table class="table table-sm">
                                <thead class="thead-light">
                                <tr>
                                    <th class="align-middle">№ пары</th>
                                    <th class="align-middle text-left">Предмет</th>
                                    <th class="align-middle">Кабинет</th>
                                    <th class="align-middle text-left">Преподаватель</th>
                                    <th class="align-middle">Время</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                @endfor
            </div>
            <div class="col-12 col-lg-6">
                @for($i = 3; $i <=5; $i++)
                    <div class="table-container min-height">
                        <span>{{ get_week($i) }}, <?=date('d.m.Y', strtotime("$date + $i day"))?></span>
                        <div class="table-responsive-md">
                            <table class="table table-sm">
                                <thead class="thead-light">
                                <tr>
                                    <th class="align-middle">№ пары</th>
                                    <th class="align-middle text-left">Предмет</th>
                                    <th class="align-middle">Кабинет</th>
                                    <th class="align-middle text-left">Преподаватель</th>
                                    <th class="align-middle">Время</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                @endfor
            </div>
        @endif
    </div>
    <?
    $max_week = DB::table($name_table_week)->max('id');
    $last_week = $id_week - 1;
    $next_week = $id_week + 1;
    ?>
    <div class="fixed-bottom">
        @if($last_week >= 1)
        <div class="link-box col-6 col-lg-4 float-left">
            <a href="/student/{{ $branch }}/{{ $short_group }}/{{ $last_week }}" class="link-btn">
                <h4 class="mb-0 d-none d-lg-block">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    Предыдущая неделя
                </h4>
                <h4 class="d-inline d-lg-none">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                </h4>
            </a>
        </div>
        @endif
        @if($next_week <= $max_week)
        <div class="link-box col-6 col-lg-4 float-right">
            <a href="/student/{{ $branch }}/{{ $short_group }}/{{ $next_week }}" class="link-btn">
                <h4 class="mb-0 d-none d-lg-block">
                    Следующая неделя
                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </h4>
                <h4 class="d-inline d-lg-none">
                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </h4>
            </a>
        </div>
        @endif
    </div>
</div>
@endsection
@section('scripts')
    <script>
@if(isset($h) and $h > 0)
    <?$g = array(1, 2, 3);?>
    var mh = 0;
    @foreach($g as $b)
        if($(window).width() > 991){
            $('.height-{{$b}}').each(function () {
                var h_block = parseInt($(this).height());
                if(h_block > mh) {
                    mh = h_block;
                };
            });
            $('.height-{{$b}}').height(mh);
            mh = 0;
        }

    @endforeach
@endif
    </script>
@endsection
