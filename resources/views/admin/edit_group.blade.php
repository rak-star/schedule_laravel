@extends('admin.layouts.app')

@section('title', 'Редактирование групп')
@section('link-group', 'active')
@section('content')
    <div class="row my-2">
        <h3 class="col-12 col-lg-9 col-xl-10">Редактирование рупп</h3>
        <button type="button" class="btn btn-success col" data-toggle="modal" data-target="#exampleModal">Добавить группу</button>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавление группы</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('add_group') }}" method="post">
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
                                <label for="kurs">Курс</label>
                                <input type="text" class="form-control" id="kurs" placeholder="Курс" name="kurs" required>
                            </div>
                            <div class="col-12 col-lg-2">
                                <label for="name">Группа</label>
                                <input type="text" class="form-control" id="name" placeholder="Группа" name="name" required>
                            </div>
                            <div class="col-12 col-lg-3">
                                <label for="fullname">Полное название</label>
                                <input type="text" class="form-control" id="fullname" placeholder="Полное название" name="fullname" required>
                            </div>
                            <div class="col-12 col-lg-2">
                                <label for="kod">Код</label>
                                <input type="text" class="form-control" id="kod" placeholder="Код" name="kod" required>
                            </div>
                            <div class="col-12 col-lg-2">
                                <label for="display_order">Порядок отображения</label>
                                <input type="text" class="form-control" id="display_order" placeholder="Порядок" name="display_order" required>
                            </div>
                            <div class="col-12 col-lg-1">
                                <label for="status">Статус</label>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="status_group" id="customSwitchAdd" checked>
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
    <div class="table-responsive-md">
        <table class="table table-bordered table-hover table-sm">
            <thead>
            <tr>
                <th>ID</th>
                <th>Отделение</th>
                <th style="width: 10%">Курс</th>
                <th>Группа</th>
                <th>Полное название</th>
                <th style="width: 10%">Код</th>
                <th style="width: 7%">Отображение</th>
                <th>Статус</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($groups as $group)
                <form action="{{ route('edit_group') }}" method="post">
                    @csrf
                    <input type="hidden" value="{{ $group->id }}" name="id_group">
                    <tr>
                        <td class="form-group">{{ $group->id }}</td>
                        <td class="form-group">
                            <select class="custom-select" name="branch_id">
                                @foreach($branches as $branch)
                                    <option value="{{ $branch->id }}" <?if($branch->id == $group->branch_id) echo "selected";?>>{{ $branch->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="form-group">
                            <input class="form-control form-control-sm" type="text" name="kurs" value="{{ $group->kurs }}">
                        </td>
                        <td class="form-group">
                            <input class="form-control form-control-sm" type="text" name="name" value="{{ $group->name }}">
                        </td>
                        <td class="form-group">
                            <input class="form-control form-control-sm" type="text" name="fullname" value="{{ $group->name_group }}">
                        </td>
                        <td class="form-group">
                            <input class="form-control form-control-sm" type="text" name="kod" value="{{ $group->kod_group }}">
                        </td>
                        <td class="form-group">
                            <input class="form-control form-control-sm" type="text" name="display_order" value="{{ $group->display_order }}">
                        </td>
                        <td class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="status_group" id="customSwitch{{ $group->id }}" <?if($group->status === 1) echo "checked"?>>
                                <label class="custom-control-label" for="customSwitch{{ $group->id }}"></label>
                            </div>
                        </td>
                        <td class="form-group">
                            <button type="submit" name="edit_group" class="btn btn-primary">Изменить</button>
                            <button type="submit" name="delete_group" class="btn btn-danger">Удалить</button>
                        </td>
                    </tr>
                </form>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection


