@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        @php
                            $inputs = [
                                [
                                    'label' => __('Name'),
                                    'name' => 'name',
                                    'type' => 'input',
                                    'required' => 'required',
                                ],
                                [
                                    'label' => __('E-Mail Address'),
                                    'name' => 'email',
                                    'type' => 'input',
                                    'inputType' => 'email',
                                    'required' => 'required',
                                ],
                                [
                                    'label' => __('Password'),
                                    'name' => 'password',
                                    'type' => 'input',
                                    'inputType' => 'password',
                                    'required' => 'required',
                                ],
                                [
                                    'label' => __('Confirm Password'),
                                    'id' => 'password-confirm',
                                    'name' => 'password_confirmation',
                                    'type' => 'input',
                                    'inputType' => 'password',
                                    'required' => 'required',
                                ],
                                [
                                    'label' => __('User Type'),
                                    'id' => 'user-type',
                                    'name' => 'user_type',
                                    'type' => 'select',
                                    'required' => 'required',
                                    'options' => [
                                        ['value' => 'admin', 'text' => 'Admin'],
                                        ['value' => 'mahasiswa', 'text' => 'Mahasiswa'],
                                    ],
                                ],
                            ];
                        @endphp
                        @include('components.generateInput',['inputs' => $inputs])
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
