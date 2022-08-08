<div class="card-body">
    <div class="d-flex align-items-start align-items-sm-center gap-4">
        <img
            src="{{ $src ?? '' }}"
            alt="user-avatar"
            class="d-block rounded"
            height="100"
            width="100"
            id="{{ $imgId ?? 'uploadedAvatar'}}"
            onerror="$(this).attr('src', '{{ $onerror ?? asset('template/img/avatars/1.png') }}')"
            style="object-fit: cover"
        />
        <div class="button-wrapper">
            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                <span class="d-none d-sm-block">{{ __('common.upload') }}</span>
                <i class="bx bx-upload d-block d-sm-none"></i>
                <input
                    type="file"
                    id="{{ $id ?? 'upload'}}"
                    class="account-file-input"
                    hidden
                    accept="image/png, image/jpeg"
                    name="{{ $name ?? 'photo'}}"
                    onchange="previewUploadedImage(this, '#{{ $imgId ?? 'uploadedAvatar'}}')"
                />
                @error($name ?? 'photo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </label>
            <button type="button" class="btn btn-outline-secondary account-image-reset mb-4" onclick="resetUploadedImage('#upload', '#{{ $imgId ?? 'uploadedAvatar'}}')">
                <i class="bx bx-reset d-block d-sm-none"></i>
                <span class="d-none d-sm-block">{{ __('common.reset') }}</span>
            </button>

            <p class="text-muted mb-0">{{ __('common.upload_image_description') }}</p>
        </div>
    </div>
</div>
