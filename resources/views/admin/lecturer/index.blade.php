@extends('layouts.index')
@section('content')
<!-- Content -->
    <div class="row">
        <div class="col-md-12 col-12 mb-md-0 mb-4">
            <div class="card">
                <h5 class="card-header">{{ __('common.lecturer') }}</h5>
                <hr class="my-0" />
                <form action="{{ url('lecturer') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('components.uploadPhoto', [
                        'src' => $data->user ? $data->user->publicPhoto() : asset('template/img/avatars/1.png'),
                    ])
                    <div class="card-body">
                        <input type="hidden" name="id" value="{{ $data->user_id }}">
                        <div class="row">
                            @include('components.generateInput',[
                                'classAll' => 'col-md-6',
                                'inputs' => [
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
                                    ]
                                ]
                            ])
                            @include('components.generateInput', ['inputs' => [
                                [
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
                        </div>
                        {{-- <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">{{ __('common.save') }}</button>
                        </div> --}}
                        <div class="row">
                            <div class="mb-3 {{ $data->id ? 'col-md-6' : 'col-md-12'}}">
                                <button class="btn btn-primary d-grid w-100" type="submit">{{ $data->id ? __('common.edit') : __('common.save') }}</button>
                            </div>
                            @if ($data->id)
                                <div class="mb-3 col-md-6">
                                    <a href="{{ $activeUrl }}" class="btn btn-outline-secondary w-100" onclick="">
                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">{{ __('common.cancel') }}</span>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </form>
                <div class="card-body">
                @include('components.generateTable',['data' => [
                    'url' => url('lecturer/data'),
                    'columns' => [
                        'nik' => 'NIK',
                        'name' => __('common.name'),
                        'title' => __('common.title'),
                        'email' => 'Email',
                        'telephone' => __('common.telephone'),
                        'photo' => __('common.photo'),
                        'action' => __('common.action'),
                    ],
                ]])
                </div>
            </div>
        </div>
    </div>
<!-- / Content -->
@endsection
