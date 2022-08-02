@extends('layouts.index', ['withMenu' => false])
@section('content')
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
        <div class="card">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <h4 class="mb-2">{{ __('auth.reset_password') }} 🔒</h4>
                <p class="mb-4">{{ __('auth.forgot_password.description') }}</p>
                <form id="formAuthentication" class="mb-3" action="{{ url('password/email') }}" method="POST">
                    @csrf
                    @include('components.generateInput', ['inputs' => [
                        [
                            'label' => __('Email'),
                            'name' => 'email',
                            'type' => 'input',
                            'inputType' => 'email',
                            'required' => 'required',
                        ],
                    ]])
                    <button class="btn btn-primary d-grid w-100">{{ __('auth.forgot_password.send') }}</button>
                </form>
                <div class="text-center">
                    <a href="{{ url('login') }}" class="d-flex align-items-center justify-content-center">
                        <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                        {{ __('auth.forgot_password.back') }}
                    </a>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
