@extends('layouts.index')
@section('content')
<!-- Content -->
    <div class="row">
        <div class="col-md-12 col-12 mb-md-0 mb-4">
            <div class="card">
                <h5 class="card-header">{{ __('common.colleger') }}</h5>
                <hr class="my-0" />
                <form action="{{ url('colleger') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('components.uploadPhoto', [
                        'src' => $data->user ? $data->user->publicPhoto() : asset('template/img/avatars/1.png'),
                    ])
                    <div class="card-body">
                        <input type="hidden" name="id" value="{{ $data->user_id }}">
                        <div class="row">
                            @include('components.generateInput', [
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
                                        'label' => 'NPWP',
                                        'name' => 'npwp',
                                        'type' => 'input',
                                        'value' => $data->npwp,
                                    ], [
                                        'label' => __('common.birth_place'),
                                        'name' => 'birth_place',
                                        'type' => 'input',
                                        'value' => $data->birth_place,
                                    ], [
                                        'label' => __('common.birth_date'),
                                        'name' => 'birth_date',
                                        'type' => 'input',
                                        'inputType' => 'date',
                                        'value' => $data->birth_date,
                                    ], [
                                        'label' => __('common.address'),
                                        'name' => 'address',
                                        'type' => 'textarea',
                                        'required' => 'required',
                                        'value' => $data->address,
                                    ], [
                                        'label' => 'NPM',
                                        'name' => 'npm',
                                        'type' => 'input',
                                        'required' => 'required',
                                        'value' => $data->npm,
                                    ], [
                                        'label' => __('common.generation'),
                                        'name' => 'year',
                                        'type' => 'input',
                                        'inputType' => 'year',
                                        'value' => $data->year,
                                    ], [
                                        'label' => 'Status',
                                        'name' => 'status',
                                        'type' => 'select',
                                        'options' => $status,
                                        'value' => $data->status ?? \App\Constants\CollegerStatus::ACTIVE,
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
                                        'value' => $data->class_group,
                                    ], [
                                        'label' => __('common.semester'),
                                        'name' => 'semester',
                                        'type' => 'input',
                                        'value' => $data->semester,
                                    ], [
                                        'label' => __('common.study_program'),
                                        'name' => 'study_program_id',
                                        'type' => 'select',
                                        'options' => $studyPrograms,
                                        'value' => $data->collegerStudyProgram->study_program_id ?? '',
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
                    'url' => url('colleger/data'),
                    'columns' => [
                        'nik' => 'NIK',
                        'npm' => 'NPM',
                        'name' => __('common.name'),
                        'email' => 'Email',
                        'telephone' => __('common.telephone'),
                        'address' => __('common.address'),
                        'npwp' => 'NPWP',
                        'birth_place' => __('common.birth_place'),
                        'birth_date' => __('common.birth_date'),
                        'photo' => __('common.photo'),
                        'year' => __('common.year'),
                        'status' => __('common.status'),
                        'class_type' => __('common.class_type'),
                        'class_group' => __('common.class_group'),
                        'semester' => __('common.semester'),
                        'action' => __('common.action'),
                    ],
                ]])
                </div>
            </div>
        </div>
    </div>
<!-- / Content -->
@endsection
