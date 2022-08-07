@extends('layouts.index')
@section('content')
<!-- Content -->
    <div class="row">
        <div class="col-md-12 col-12 mb-md-0 mb-4">
            <div class="card">
                <h5 class="card-header">Admin</h5>
                <hr class="my-0" />
                <div class="card-body">
                    <form action="{{ url('admin') }}" method="POST">
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
                                'label' => 'Email',
                                'name' => 'email',
                                'type' => 'input',
                                'inputType' => 'email',
                                'required' => 'required',
                                'value' => $data->email,
                            ], [
                                'label' => __('common.password'),
                                'name' => 'password',
                                'type' => 'input',
                                'inputType' => 'password',
                                'required' => 'required',
                            ], [
                                'label' => __('common.confirm_password'),
                                'name' => 'password_confirmation',
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
                <div class="card-body">
                @include('components.generateTable',['data' => [
                    'url' => url('admin/data'),
                    'columns' => [
                        'name' => __('common.name'),
                        'email' => 'Email',
                        'action' => __('common.action'),
                    ],
                ]])
                </div>
            </div>
        </div>
    </div>
<!-- / Content -->
@endsection
