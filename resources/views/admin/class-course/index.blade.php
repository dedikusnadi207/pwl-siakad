@extends('layouts.index')
@section('content')
<!-- Content -->
    <div class="row">
        <div class="col-md-12 col-12 mb-md-0 mb-4">
            <div class="card">
                <h5 class="card-header">{{ __('common.class_course') }}</h5>
                <hr class="my-0" />
                <div class="card-body">
                    <form action="{{ url('class-course') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="row">
                            @include('components.generateInput',['classAll' => 'col-md-6', 'inputs' => [
                                [
                                    'label' => __('common.class'),
                                    'name' => 'class_id',
                                    'type' => 'select',
                                    'required' => 'required',
                                    'options' => $classes,
                                    'value' => $data->class_id,
                                ], [
                                    'label' => __('common.course'),
                                    'name' => 'course_id',
                                    'type' => 'select',
                                    'required' => 'required',
                                    'options' => $courses,
                                    'value' => $data->course_id,
                                ], [
                                    'label' => __('common.lecturer'),
                                    'name' => 'lecturer_id',
                                    'type' => 'select',
                                    'required' => 'required',
                                    'options' => $lecturers,
                                    'value' => $data->lecturer_id,
                                ],
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
                    </form>
                </div>
                <div class="card-body">
                @include('components.generateTable',['data' => [
                    'url' => url('class-course/data'),
                    'columns' => [
                        'id' => 'ID',
                        'class.name' => __('common.class'),
                        'course.name' => __('common.course'),
                        'lecturer.name' => __('common.lecturer'),
                        'action' => __('common.action'),
                    ],
                ]])
                </div>
            </div>
        </div>
    </div>
<!-- / Content -->
@endsection
