@extends('layouts.index')
@section('content')
<!-- Content -->
    <div class="row">
        <div class="col-md-12 col-12 mb-md-0 mb-4">
            <div class="card">
                <h5 class="card-header">{{ __('common.study_plan_card') }}</h5>
                <hr class="my-0" />
                <div class="card-body">
                    <form action="{{ url('study-plan-card') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="row">
                            @include('components.generateInput',[
                                'classAll' => 'col-md-6',
                                'inputs' => [
                                    [
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
                    'url' => url('study-plan-card/data'),
                    'columns' => [
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
