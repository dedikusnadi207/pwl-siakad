@extends('layouts.index')
@section('content')
<!-- Content -->
    <div class="row">
        <div class="col-md-12 col-12 mb-md-0 mb-4">
            <div class="card">
                <h5 class="card-header">{{ __('common.class') }}</h5>
                <hr class="my-0" />
                <div class="card-body">
                    <form action="{{ url('class') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        @include('components.generateInput',['inputs' => [
                            [
                                'label' => __('common.name'),
                                'name' => 'name',
                                'type' => 'input',
                                'required' => 'required',
                                'value' => $data->name,
                            ], [
                                'label' => __('common.class_type'),
                                'name' => 'type',
                                'type' => 'input',
                                'required' => 'required',
                                'value' => $data->type,
                            ]
                        ]])
                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">{{ __('common.save') }}</button>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                @include('components.generateTable',['data' => [
                    'url' => url('class/data'),
                    'columns' => [
                        'name' => __('common.name'),
                        'type' => __('common.class_type'),
                        'action' => __('common.action'),
                    ],
                ]])
                </div>
            </div>
        </div>
    </div>
<!-- / Content -->
@endsection
