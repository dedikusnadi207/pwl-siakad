@extends('layouts.index', ['withMenu' => false])
@section('content')
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-2">{{ __('auth.reset_password') }} 🔒</h4>
                <form id="formAuthentication" class="mb-3" action="{{ url('password/reset') }}" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    @include('components.generateInput', ['inputs' => [
                        [
                            'label' => __('Email'),
                            'name' => 'email',
                            'type' => 'input',
                            'inputType' => 'email',
                            'required' => 'required',
                            'value' => $email ?? '',
                        ],
                        [
                            'label' => __('auth.password'),
                            'name' => 'password',
                            'type' => 'input',
                            'inputType' => 'password',
                            'required' => 'required',
                        ],
                        [
                            'label' => __('auth.confirm_password'),
                            'name' => 'password_confirmation',
                            'type' => 'input',
                            'inputType' => 'password',
                            'required' => 'required',
                        ],
                    ]])
                    <button class="btn btn-primary d-grid w-100">{{ __('auth.reset_password') }}</button>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
