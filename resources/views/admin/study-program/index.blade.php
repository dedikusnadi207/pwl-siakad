@extends('layouts.index')
@section('content')
<!-- Content -->
    <div class="row">
        <div class="col-md-12 col-12 mb-md-0 mb-4">
            <div class="card">
                <h5 class="card-header">{{ __('common.study_program') }}</h5>
                <hr class="my-0" />
                <div class="card-body">
                    <form action="{{ url('study-program') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="row">
                            @include('components.generateInput',[
                                'classAll' => 'col-md-6',
                                'inputs' => [
                                    [
                                        'label' => __('common.faculty'),
                                        'name' => 'faculty_id',
                                        'type' => 'select',
                                        'options' => $faculties,
                                        'required' => 'required',
                                        'value' => $data->faculty_id,
                                    ], [
                                        'label' => __('common.name'),
                                        'name' => 'name',
                                        'type' => 'input',
                                        'required' => 'required',
                                        'value' => $data->name,
                                    ], [
                                        'label' => __('common.accreditation'),
                                        'name' => 'accreditation',
                                        'type' => 'input',
                                        'required' => 'required',
                                        'value' => $data->accreditation,
                                    ]
                                ],
                            ])
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
                    </form>
                </div>
                <div class="card-body">
                @include('components.generateTable',['data' => [
                    'url' => url('study-program/data'),
                    'columns' => [
                        'faculty.name' => __('common.faculty'),
                        'name' => __('common.name'),
                        'accreditation' => __('common.accreditation'),
                        'action' => __('common.action'),
                    ],
                ]])
                </div>
            </div>
        </div>
    </div>
<!-- / Content -->
@endsection
