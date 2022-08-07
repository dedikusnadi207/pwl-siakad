@extends('layouts.index')
@section('content')
<!-- Content -->
    <div class="row">
        <div class="col-md-12 col-12 mb-md-0 mb-4">
            <div class="card">
                <h5 class="card-header">{{ __('common.lecturer') }}</h5>
                <hr class="my-0" />
                <div class="card-body">
                    <form action="{{ url('lecturer') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->user_id }}">
                        @include('components.generateInput',['inputs' => [
                            [
                                'label' => 'NIK',
                                'name' => 'nik',
                                'type' => 'input',
                                'required' => 'required',
                                'value' => $data->nik,
                            ], [
                                'label' => __('common.name'),
                                'name' => 'name',
                                'type' => 'input',
                                'required' => 'required',
                                'value' => $data->name,
                            ], [
                                'label' => __('common.title'),
                                'name' => 'title',
                                'type' => 'input',
                                'required' => 'required',
                                'value' => $data->title,
                            ], [
                                'label' => 'Email',
                                'name' => 'email',
                                'type' => 'input',
                                'inputType' => 'email',
                                'required' => 'required',
                                'value' => $data->email,
                            ], [
                                'label' => __('common.telephone'),
                                'name' => 'telephone',
                                'type' => 'input',
                                'required' => 'required',
                                'value' => $data->telephone,
                            ], [
                                'label' => __('common.password'),
                                'name' => 'password',
                                'type' => 'input',
                                'inputType' => 'password',
                            ], [
                                'label' => __('common.confirm_password'),
                                'name' => 'password_confirmation',
                                'type' => 'input',
                                'inputType' => 'password',
                            ]
                        ]])
                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">{{ __('common.save') }}</button>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                @include('components.generateTable',['data' => [
                    'url' => url('lecturer/data'),
                    'columns' => [
                        'nik' => 'NIK',
                        'name' => __('common.name'),
                        'title' => __('common.title'),
                        'email' => 'Email',
                        'telephone' => __('common.telephone'),
                        'action' => __('common.action'),
                    ],
                ]])
                </div>
            </div>
        </div>
    </div>
<!-- / Content -->
@endsection
