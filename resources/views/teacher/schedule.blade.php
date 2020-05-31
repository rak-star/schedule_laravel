@extends('layouts.app')

@section('title', "Расписание преподавателя $name_teacher")
@section('link-teacher', 'active')
@section('link-teacher-schedule', 'active')

@section('content')
<?
    $name_table_week = get_name_table('w');
    $monday = DB::table($name_table_week)->find($id_week);
    $monday = $monday->monday;
    $today = date('Y-m-d');
?>
<div class="container-fluid pt-2 text-center">
    <h2>{{ $name_teacher }}</h2>
    <div class="row mb-5">
        <div class="col-12 col-lg-6">
            <?$h=1;?>
            <?for ($i = 0; $i < 3; $i++):?>
            <?$date = date('Y-m-d', strtotime("$monday + $i day"))?>
                <div class="table-container min-height height-<?=$h?>">
                    <span><?=get_week($i);?>, <?=date('d.m.Y', strtotime($date));?></span>
                    <div class="table-responsive-md">
                        <table class="table table-sm">
                            <thead class="thead-light">
                            <tr>
                                <th class="align-middle">№ пары</th>
                                <th class="align-middle text-left">Предмет</th>
                                <th class="align-middle">№ группы</th>
                                <th class="align-middle">Кабинет</th>
                                <th class="align-middle text-left">Преподаватель</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?foreach($predmet1 as $predmet):?>
                            <?$para = $predmet['para']?>
                                <?if(!preg_match('/Производственная/',$predmet["predmet$para"])):?>
                                    <?if($predmet['date'] == $date):?>
                                        <tr>
                                            <th class="align-middle" scope="row"><?=$predmet['para']?></th>
                                            <td class="align-middle text-left"><?=$predmet["predmet$para"]?></td>
                                            <td class="align-middle"><?=$predmet['group_name']?></td>
                                            <td class="align-middle"><?=$predmet["kabinet$para"]?></td>
                                            <td class="align-middle text-left">
                                                <?=$predmet["prepod$para"]?>
                                            </td>
                                        </tr>
                                    <?endif;?>
                                <?endif;?>
                            <?endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?$h++;?>
            <?endfor;?>
        </div>
        <div class="col-12 col-lg-6">
            <?$h = 1;?>
            <?for ($i = 3; $i < 6; $i++):?>
            <?$date = date('Y-m-d', strtotime("$monday + $i day"))?>
            <div class="table-container min-height height-<?=$h?>">
                <span><?=get_week($i);?>, <?=date('d.m.Y', strtotime($date));?></span>
                <div class="table-responsive-md">
                    <table class="table table-sm">
                        <thead class="thead-light">
                        <tr>
                            <th class="align-middle">№ пары</th>
                            <th class="align-middle text-left">Предмет</th>
                            <th class="align-middle">№ группы</th>
                            <th class="align-middle">Кабинет</th>
                            <th class="align-middle text-left">Преподаватель</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?foreach($predmet2 as $predmet):?>
                        <?$para = $predmet['para']?>
                            <?if(!preg_match('/Производственная/',$predmet["predmet$para"])):?>
                                <?if($predmet['date'] == $date):?>
                                <tr>
                                    <th class="align-middle" scope="row"><?=$predmet['para']?></th>
                                    <td class="align-middle text-left"><?=$predmet["predmet$para"]?></td>
                                    <td class="align-middle"><?=$predmet['group_name']?></td>
                                    <td class="align-middle"><?=$predmet["kabinet$para"]?></td>
                                    <td class="align-middle text-left">
                                        <?=$predmet["prepod$para"]?>
                                    </td>
                                </tr>
                                <?endif;?>
                            <?endif;?>
                        <?endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
                <?$h++;?>
            <?endfor;?>
        </div>
    </div>
    <?
    $last_week = $id_week - 1;
    $next_week = $id_week + 1;
    $max_week = DB::table($name_table_week)->max('id');
    ?>
    <div class="fixed-bottom">
        @if($last_week >= 1)
            <div class="link-box col-6 col-lg-4 float-left">
                <a href="/teacher/schedule/{{ $short_name }}/{{ $last_week }}" class="link-btn">
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
                <a href="/teacher/schedule/{{ $short_name }}/{{ $next_week }}" class="link-btn">
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
