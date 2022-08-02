@extends('layouts.index', ['withMenu' => false])
@section('content')
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-2">{{ env('APP_NAME') }}</h4>
                    <p class="mb-4">{{ __('auth.sign_in.description') }}</p>
                    <form id="formAuthentication" class="mb-3" action="{{ url('login') }}" method="POST">
                        @csrf
                        @php
                            $inputs = [
                                [
                                    'label' => __('Email'),
                                    'name' => 'email',
                                    'type' => 'input',
                                    'inputType' => 'email',
                                    'required' => 'required',
                                ],
                                [
                                    'label' => __('auth.password'),
                                    'name' => 'password',
                                    'type' => 'input',
                                    'inputType' => 'password',
                                    'required' => 'required',
                                ],
                            ];
                        @endphp
                        @include('components.generateInput',['inputs' => $inputs])
                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">{{ __('auth.sign_in.title') }}</button>
                        </div>
                    </form>
                    <p class="text-center">
                        <a href="{{ url('password/reset') }}">
                          <span>{{ __('auth.forgot_password.title') }}</span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
