@extends('teacher.journal.layouts.app')

@section('title', 'Журнал')
@section('link-journal', 'active')

@section('content')
    <?
    $name_table_week = get_name_table('w');
    $monday = DB::table($name_table_week)->find($id_week);
    $monday = $monday->monday;
    $today = date('Y-m-d');
    ?>
    <div class="container-fluid pt-2 text-center mb-5">
        <h2>{{ $name_teacher }}</h2>

                <?$h=1;?>
                <?for ($i = 0; $i < 6; $i++):?>
                <?$date = date('Y-m-d', strtotime("$monday + $i day")); $a = 1?>
                <div class="table-container min-height">
                    <span><?=get_week($i);?>, <?=date('d.m.Y', strtotime($date));?></span>
                    <div class="table-responsive-md">
                        <table class="table table-sm">
                            <thead class="thead-light">
                            <tr>
                                <th class="align-middle w-auto">№ пары</th>
                                <th class="align-middle text-left w-25">Предмет</th>
                                <th class="align-middle w-auto">№ группы</th>
                                <th class="align-middle w-auto">Отделение</th>
                                <th class="align-middle w-auto">Кабинет</th>
                                <th class="align-middle text-left w-auto">Преподаватель</th>
                                <th class="align-middle w-50">Добавить ресурс</th>
                                <th class="align-middle w-auto">Отметка о проведении</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?foreach($predmets as $predmet):?>
                                <?$para = $predmet['para'];?>
                                <?if(!preg_match('/Производственная/',$predmet["predmet$para"])):?>
                                    <?if($predmet['date'] == $date):?>
                                    <tr>
                                        <th class="align-middle" scope="row"><?=$predmet['para']?></th>
                                        <td class="align-middle text-left"><?=$predmet["predmet$para"]?></td>
                                        <td class="align-middle"><?=$predmet['group_name']?></td>
                                        <td class="align-middle">{{ $name_branch = \App\Models\Ymk_branch::find($predmet['branch_id'])->name }}</td>
                                        <td class="align-middle"><?=$predmet["kabinet$para"]?></td>
                                        <td class="align-middle text-left">
                                            <?=$predmet["prepod$para"]?>
                                        </td>
                                        <td class="align-middle text-left">
                                            <form action="{{ route('add_link_teacher') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id_teacher" value="{{ $id_teacher }}">
                                                <input type="hidden" name="num_date" value="{{ $date }}">
                                                <input type="hidden" name="num_para" value="{{ $predmet['para'] }}">
                                                <input type="hidden" name="id_branch" value="{{ $predmet['branch_id'] }}">
                                                <input type="hidden" name="name_group" value="{{ $predmet['group_name'] }}">
                                                <div class="form-row">
                                                    <div class="input-group col-11 col-lg-4">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="inputGroupFile<?=$i.$a?>" name="filename">
                                                            <label class="custom-file-label" for="inputGroupFile<?=$i.$a?>">Выберите файлы</label>
                                                        </div>
                                                    </div>
                                                    или
                                                    <div class="col-12 col-lg-4">
                                                        <input type="text" class="form-control" placeholder="Ссылка" name="link">
                                                    </div>
                                                    <div class="col-2">
                                                        <input type="submit" class="form-control btn btn-primary" value="Добавить">
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                        <td class="align-middle">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" name="status_teacher" id="customSwitch<?=$i.$a?>">
                                                <label class="custom-control-label" for="customSwitch<?=$i.$a?>"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <?endif;?>
                                <?endif;?>
                                    <?$a++?>
                            <?endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?endfor;?>

    </div>
    <?
    $last_week = $id_week - 1;
    $next_week = $id_week + 1;
    $max_week = DB::table($name_table_week)->max('id');
    ?>
    <div class="fixed-bottom">
        @if($last_week >= 1)
            <div class="link-box col-6 col-lg-4 float-left">
                <a href="/teacher/journal/{{ $short_name }}/{{ $last_week }}" class="link-btn">
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
                <a href="/teacher/journal/{{ $short_name }}/{{ $next_week }}" class="link-btn">
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
@endsection

