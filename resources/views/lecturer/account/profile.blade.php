@extends('layouts.index')
@section('content')
<!-- Content -->
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{ __('menu.my_profile') }}</h4>
    <div class="row">
        <div class="col-md-6 col-12 mb-md-0 mb-4">
            <div class="card">
                <h5 class="card-header">{{ __('common.profile') }}</h5>
                <hr class="my-0" />
                <div class="card-body">
                    <form action="{{ url('account/profile') }}" method="POST">
                        @csrf
                        @include('components.generateInput',['inputs' => [
                            [
                                'label' => __('common.name'),
                                'name' => 'name',
                                'type' => 'input',
                                'required' => 'required',
                                'value' => Auth::user()->name,
                            ], [
                                'label' => 'Email',
                                'name' => 'email',
                                'type' => 'input',
                                'inputType' => 'email',
                                'required' => 'required',
                                'value' => Auth::user()->email,
                            ]
                        ]])
                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">{{ __('common.save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="card">
                <h5 class="card-header">{{ __('common.password') }}</h5>
                <hr class="my-0">
                <div class="card-body">
                    <form action="{{ url('account/change-password') }}" method="POST">
                        @csrf
                        @include('components.generateInput',['inputs' => [
                            [
                                'label' => __('common.old_password'),
                                'name' => 'old_password',
                                'type' => 'input',
                                'inputType' => 'password',
                                'required' => 'required',
                            ], [
                                'label' => __('common.new_password'),
                                'name' => 'new_password',
                                'type' => 'input',
                                'inputType' => 'password',
                                'required' => 'required',
                            ], [
                                'label' => __('common.confirm_new_password'),
                                'name' => 'new_password_confirmation',
                                'type' => 'input',
                                'inputType' => 'password',
                                'required' => 'required',
                            ]
                        ]])
                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">{{ __('common.save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- / Content -->

<div class="content-backdrop fade"></div>
@endsection
