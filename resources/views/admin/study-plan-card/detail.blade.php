@extends('layouts.index')
@section('content')
<!-- Content -->
    <div class="row">
        <div class="col-md-6 col-12 mb-md-0 mb-4">
            <div class="card mb-3">
                <h5 class="card-header">{{ __('common.study_plan_card') }}</h5>
                <hr class="my-0" />
                <div class="card-body">
                    <div class="row">
                        @include('components.generateInput',[
                            'classAll' => 'col-md-6',
                            'inputs' => [
                                [
                                    'label' => __('common.class_type'),
                                    'name' => 'class_type',
                                    'type' => 'input',
                                    'readonly' => 'readonly',
                                    'value' => $studyPlanCard->class_type,
                                ], [
                                    'label' => __('common.class_group'),
                                    'name' => 'class_group',
                                    'type' => 'input',
                                    'readonly' => 'readonly',
                                    'value' => $studyPlanCard->class_group,
                                ], [
                                    'label' => __('common.semester'),
                                    'name' => 'semester',
                                    'type' => 'input',
                                    'readonly' => 'readonly',
                                    'value' => $studyPlanCard->semester,
                                ]
                            ]
                        ])
                    </div>
                    <a href="{{ url('study-plan-card') }}" class="btn btn-outline-secondary w-100" onclick="">
                        <i class="bx bx-reset d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">{{ __('common.back') }}</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-12 mb-md-0 mb-4">
            <div class="card">
                <h5 class="card-header">{{ __('common.detail') }}</h5>
                <hr class="my-0" />
                <form action="{{ url('study-plan-card/'.$studyPlanCard->id.'/detail') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="row">
                            @include('components.generateInput',[
                                'classAll' => 'col-md-6',
                                'inputs' => [
                                    [
                                        'label' => __('common.class_course'),
                                        'name' => 'class_course_id',
                                        'type' => 'select',
                                        'options' => $classCourses,
                                        'value' => $data->class_course_id,
                                    ], [
                                        'label' => __('common.day'),
                                        'name' => 'day',
                                        'type' => 'select',
                                        'options' => dayOptions(),
                                        'required' => 'required',
                                        'value' => $data->day,
                                    ], [
                                        'label' => __('common.start_time_schedule'),
                                        'name' => 'start_time_schedule',
                                        'type' => 'input',
                                        'inputType' => 'time',
                                        'required' => 'required',
                                        'value' => $data->start_time_schedule,
                                    ], [
                                        'label' => __('common.end_time_schedule'),
                                        'name' => 'end_time_schedule',
                                        'type' => 'input',
                                        'inputType' => 'time',
                                        'required' => 'required',
                                        'value' => $data->end_time_schedule,
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
                    'url' => url('study-plan-card/'.$studyPlanCard->id.'/detail/data'),
                    'columns' => [
                        'class_course_name' => __('common.class_course'),
                        'day' => __('common.day'),
                        'start_time_schedule' => __('common.start_time_schedule'),
                        'end_time_schedule' => __('common.end_time_schedule'),
                        'action' => __('common.action'),
                    ],
                ]])
                </div>
            </div>
        </div>
    </div>
<!-- / Content -->
@endsection
