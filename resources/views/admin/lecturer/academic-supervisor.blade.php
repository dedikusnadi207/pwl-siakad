@extends('layouts.index')
@section('content')
<!-- Content -->
    <div class="row">
        <div class="col-md-6 col-12 mb-md-0 mb-4">
            <div class="card mb-3">
                <h5 class="card-header">{{ __('common.lecturer') }}</h5>
                <hr class="my-0" />
                <div class="card-body">
                    <img
                        src="{{ $lecturer->user->publicPhoto() }}"
                        alt="user-avatar"
                        class="d-block rounded"
                        height="100"
                        width="100"
                        onerror="$(this).attr('src', '{{ asset('template/img/avatars/1.png') }}')"
                        style="object-fit: cover"
                    />
                    <div class="row">
                        @include('components.generateInput',[
                            'classAll' => 'col-md-6',
                            'inputs' => [
                                [
                                    'label' => 'NIK',
                                    'name' => 'nik',
                                    'type' => 'input',
                                    'readonly' => 'readonly',
                                    'value' => $lecturer->nik,
                                ], [
                                    'label' => __('common.name'),
                                    'name' => 'name',
                                    'type' => 'input',
                                    'readonly' => 'readonly',
                                    'value' => $lecturer->name,
                                ], [
                                    'label' => __('common.title'),
                                    'name' => 'title',
                                    'type' => 'input',
                                    'readonly' => 'readonly',
                                    'value' => $lecturer->title,
                                ], [
                                    'label' => 'Email',
                                    'name' => 'email',
                                    'type' => 'input',
                                    'inputType' => 'email',
                                    'readonly' => 'readonly',
                                    'value' => $lecturer->email,
                                ], [
                                    'label' => __('common.telephone'),
                                    'name' => 'telephone',
                                    'type' => 'input',
                                    'readonly' => 'readonly',
                                    'value' => $lecturer->telephone,
                                ]
                            ]
                        ])
                    </div>
                    <a href="{{ url('lecturer') }}" class="btn btn-outline-secondary w-100" onclick="">
                        <i class="bx bx-reset d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">{{ __('common.back') }}</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-12 mb-md-0 mb-4">
            <div class="card">
                <h5 class="card-header">{{ __('common.academic_supervisor') }}</h5>
                <hr class="my-0" />
                <form action="{{ url('lecturer/'.$lecturer->id.'/academic-supervisor') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="row">
                            @include('components.generateInput',[
                                'classAll' => 'col-md-6',
                                'inputs' => [
                                    [
                                        'label' => __('common.year'),
                                        'name' => 'year',
                                        'type' => 'input',
                                        'required' => 'required',
                                        'value' => $data->year,
                                    ], [
                                        'label' => __('common.class_type'),
                                        'name' => 'class_type',
                                        'type' => 'select',
                                        'options' => $classTypes,
                                        'value' => $data->class_type,
                                    ], [
                                        'label' => __('common.class_group'),
                                        'name' => 'class_group',
                                        'type' => 'input',
                                        'required' => 'required',
                                        'value' => $data->class_group,
                                    ]
                                ]
                            ])
                        </div>
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
                    'url' => url('lecturer/'.$lecturer->id.'/academic-supervisor/data'),
                    'columns' => [
                        'year' => __('common.year'),
                        'class_type' => __('common.class_type'),
                        'class_group' => __('common.class_group'),
                        'action' => __('common.action'),
                    ],
                ]])
                </div>
            </div>
        </div>
    </div>
<!-- / Content -->
@endsection
