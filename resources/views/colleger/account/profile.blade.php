@extends('layouts.index')
@section('content')
<!-- Content -->
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{ __('menu.my_profile') }}</h4>
    <div class="row">
        <div class="col-md-6 col-12 mb-md-0 mb-4">
            <div class="card">
                <h5 class="card-header">{{ __('common.profile') }}</h5>
                <hr class="my-0" />

                <form action="{{ url('account/profile') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img
                                src="{{ Auth::user()->publicPhoto() }}"
                                alt="user-avatar"
                                class="d-block rounded"
                                height="100"
                                width="100"
                                id="uploadedAvatar"
                                onerror="$(this).attr('src', '{{ Auth::user()->publicPhoto() }}')"
                                style="object-fit: cover"
                            />
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">{{ __('common.upload') }}</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input
                                        type="file"
                                        id="upload"
                                        class="account-file-input"
                                        hidden
                                        accept="image/png, image/jpeg"
                                        name="photo"
                                        onchange="previewUploadedImage(this, '#uploadedAvatar')"
                                    />
                                    @error('photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </label>
                                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4" onclick="resetUploadedImage('#upload', '#uploadedAvatar')">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">{{ __('common.reset') }}</span>
                                </button>

                                <p class="text-muted mb-0">{{ __('common.upload_image_description') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('components.generateInput',['inputs' => [
                            [
                                'label' => 'NIK',
                                'name' => 'nik',
                                'type' => 'input',
                                'value' => Auth::user()->colleger->nik,
                            ], [
                                'label' => 'NPWP',
                                'name' => 'npwp',
                                'type' => 'input',
                                'value' => Auth::user()->colleger->npwp,
                            ], [
                                'label' => __('common.name'),
                                'name' => 'name',
                                'type' => 'input',
                                'required' => 'required',
                                'value' => Auth::user()->name,
                            ], [
                                'label' => __('common.birth_place'),
                                'name' => 'birth_place',
                                'type' => 'input',
                                'required' => 'required',
                                'value' => Auth::user()->colleger->birth_place,
                            ], [
                                'label' => __('common.birth_date'),
                                'name' => 'birth_date',
                                'type' => 'input',
                                'inputType' => 'date',
                                'required' => 'required',
                                'value' => Auth::user()->colleger->birth_date,
                            ], [
                                'label' => 'Email',
                                'name' => 'email',
                                'type' => 'input',
                                'inputType' => 'email',
                                'required' => 'required',
                                'value' => Auth::user()->email,
                            ], [
                                'label' => __('common.telephone'),
                                'name' => 'telephone',
                                'type' => 'input',
                                'required' => 'required',
                                'value' => Auth::user()->colleger->telephone,
                            ], [
                                'label' => __('common.address'),
                                'name' => 'address',
                                'type' => 'textarea',
                                'required' => 'required',
                                'value' => Auth::user()->colleger->address,
                            ]
                        ]])
                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">{{ __('common.save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="card mb-4">
                <h5 class="card-header">{{ __('common.academic') }}</h5>
                <hr class="my-0">
                <div class="card-body">
                    <form action="{{ url('account/change-password') }}" method="POST">
                        @csrf
                        @include('components.generateInput',['inputs' => [
                            [
                                'label' => 'NPM',
                                'name' => 'npm',
                                'type' => 'input',
                                'readonly' => 'readonly',
                                'value' => Auth::user()->colleger->npm,
                            ], [
                                'label' => __('common.generation'),
                                'name' => 'year',
                                'type' => 'input',
                                'readonly' => 'readonly',
                                'value' => Auth::user()->colleger->year,
                            ], [
                                'label' => __('common.status'),
                                'name' => 'status',
                                'type' => 'input',
                                'readonly' => 'readonly',
                                'value' => Auth::user()->colleger->status,
                            ], [
                                'label' => __('common.class_type'),
                                'name' => 'class_type',
                                'type' => 'input',
                                'readonly' => 'readonly',
                                'value' => Auth::user()->colleger->class_type,
                            ], [
                                'label' => __('common.class_group'),
                                'name' => 'class_group',
                                'type' => 'input',
                                'readonly' => 'readonly',
                                'value' => Auth::user()->colleger->class_group,
                            ], [
                                'label' => __('common.semester'),
                                'name' => 'semester',
                                'type' => 'input',
                                'readonly' => 'readonly',
                                'value' => Auth::user()->colleger->semester,
                            ]
                        ]])
                    </form>
                </div>
            </div>
            <div class="card mb-4">
                <h5 class="card-header">{{ __('common.password') }}</h5>
                <hr class="my-0">
                <div class="card-body">
                    <form action="{{ url('account/change-password') }}" method="POST">
                        @csrf
                        @include('components.generateInput',['inputs' => [
                            [
                                'label' => __('common.old_password'),
                                'name' => 'old_password',
                                'type' => 'input',
                                'inputType' => 'password',
                                'required' => 'required',
                            ], [
                                'label' => __('common.new_password'),
                                'name' => 'new_password',
                                'type' => 'input',
                                'inputType' => 'password',
                                'required' => 'required',
                            ], [
                                'label' => __('common.confirm_new_password'),
                                'name' => 'new_password_confirmation',
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
            </div>
        </div>
    </div>
<!-- / Content -->

<div class="content-backdrop fade"></div>
@endsection
