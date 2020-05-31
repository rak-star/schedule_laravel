@extends('admin.layouts.app')

@section('title', 'Редактирование преподавателей')
@section('link-home', 'active')
@section('content')
    <?$k_m=array("", "К", "М")?>
    <div class="row my-2">
        <h3 class="col-12 col-lg-9 col-xl-10">Редактирование преподавателей</h3>
        <button type="button" class="btn btn-success col" data-toggle="modal" data-target="#exampleModal">Добавить преподавателя</button>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавление преподавателя</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('add_teacher') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col-12 col-lg-1">
                                <label for="branch">Отделение</label>
                                <select class="custom-select" name="branch_id" id="branch">
                                    @foreach($branches as $branch)
                                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-lg-1">
                                <label for="group">Группа</label>
                                <select class="custom-select" name="group_id" id="group">
                                    @foreach($groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-lg-1">
                                <label for="name">Фамилия И.О.</label>
                                <input type="text" class="form-control" id="name" placeholder="Фамилия И.О." name="name" required>
                            </div>
                            <div class="col-12 col-lg-3">
                                <label for="fullname">Полное ФИО</label>
                                <input type="text" class="form-control" id="fullname" placeholder="Полное ФИО" name="fullname" required>
                            </div>
                            <div class="col-12 col-lg-1">
                                <label for="kabinet">Кабинет</label>
                                <select class="custom-select" name="kabinet" id="kabinet">
                                    @foreach($kabinets as $kabinet)
                                        <option value="{{ $kabinet->id }}">{{ $kabinet->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-lg-1">
                                <label for="km">К/М</label>
                                <select class="custom-select" name="k_m" id="km">
                                    @foreach($k_m as $km)
                                        <option value="{{ $km }}">{{ $km }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-lg-2">
                                <label for="number_phone">E-mail</label>
                                <input type="email" class="form-control" id="email" placeholder="E-mail" name="email">
                            </div>
                            <div class="col-12 col-lg-1">
                                <label for="number_phone">Телефон</label>
                                <input type="text" class="form-control" id="number_phone" placeholder="Телефон" name="number_phone">
                            </div>
                            <div class="col-12 col-lg-1">
                                <label for="status">Статус</label>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="status_teacher" id="customSwitchAdd" checked>
                                    <label class="custom-control-label" for="customSwitchAdd"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="error-box">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="table-responsive-md">
        <table class="table table-bordered table-hover table-sm">
            <thead>
                <tr>
                    <th>ID</th>
                    <th style="width: 7%">Отделение</th>
                    <th style="width: 7%">Группа</th>
                    <th>Имя</th>
                    <th>Полное ФИО</th>
                    <th>Кабинет</th>
                    <th style="width: 5%">К/М</th>
                    <th>E-mail</th>
                    <th>№ телефона</th>
                    <th>Статус</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($teachers as $teacher)
                <form action="{{ route('edit_teacher') }}" method="post">
                    <tr>
                        @csrf
                        <input type="hidden" name="id_teacher" value="{{ $teacher->id }}">
                        <th scope="row">{{ $teacher->id }}</th>
                        <td class="form-group">
                            <select class="custom-select" name="branch_id">
                                @foreach($branches as $branch)
                                    <option value="{{ $branch->id }}" <?if($branch->id == $teacher->branch_id) echo "selected";?>>{{ $branch->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="form-group">
                            <select class="custom-select" name="group_id">
                                @foreach($groups as $group)
                                    <option value="{{ $group->id }}" <?if($group->id == $teacher->group_id) echo "selected";?>>{{ $group->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="form-group">
                            <input class="form-control form-control-sm" type="text" name="name_teacher" placeholder="Имя" value="{{ $teacher->name }}">
                        </td>
                        <td class="form-group">
                            <input class="form-control form-control-sm" type="text" name="fullname_teacher" placeholder="Полное ФИО" value="{{ $teacher->fullname }}">
                        </td>
                        <td class="form-group">
                            <select class="custom-select" name="kabinet_id">
                                @foreach($kabinets as $kabinet)
                                    <option value="{{ $kabinet->id }}" <?if($kabinet->id == $teacher->kabinet_id) echo "selected";?>>{{ $kabinet->name}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="form-group">
                            <select class="custom-select" name="k_m" id="km">
                            @foreach($k_m as $km)
                                <option value="{{ $km }}" <?if($teacher->k_m == $km) echo 'selected'?>>{{ $km }}</option>
                            @endforeach
                        </td>
                        <td class="form-group">
                            <input class="form-control form-control-sm" type="email" name="email_teacher" placeholder="Email" value="{{ $teacher->email }}">
                        </td>
                        <td class="form-group">
                            <input class="form-control form-control-sm" type="text" name="phone_teacher" placeholder="Телефон" value="{{ $teacher->number_phone }}">
                        </td>
                        <td class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="status_teacher" id="customSwitch{{ $teacher->id }}" <?if($teacher->status === 1) echo "checked"?>>
                                <label class="custom-control-label" for="customSwitch{{ $teacher->id }}"></label>
                            </div>
                        </td>
                        <td class="form-group">
                            <button type="submit" name="edit_teacher" class="btn btn-primary">Изменить</button>
                            <button type="submit" name="delete_teacher" class="btn btn-danger">Удалить</button>
                        </td>
                    </tr>
                </form>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection
