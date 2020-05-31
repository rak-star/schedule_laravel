@extends('layouts.app')

@section('title', 'Сброс пароля')
@section('fix_top', 'position-absolute fixed-top')
@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">

                        <div class="form-group row">
                            <label for="old_password" class="col-12 col-form-label">{{ __('Старый пароль') }}</label>

                            <div class="col-12">
                                <input id="old_password" type="password" class="form-control" name="old_password" required>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="new-password" class="col-12 col-form-label">{{ __('Новый пароль') }}</label>

                            <div class="col-12">
                                <input id="new-password" type="password" class="form-control" name="new-password" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Сменить пароль') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
