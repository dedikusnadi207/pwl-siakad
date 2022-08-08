@foreach ($inputs as $input)
    @php
        $label = $input['label'];
        $id = $input['id'] ?? $input['name'];
        $name = $input['name'];
        $type = $input['type']; // input, select
        $inputType = $input['inputType'] ?? 'text';
        $options = $input['options'] ?? [];
        $required = isset($input['required']) ? 'required' : '';
        $readonly = isset($input['readonly']) ? 'readonly' : '';
        $isPassword = 'password' == $inputType;
        $value = old($name) ?? $input['value'] ?? '';
    @endphp
    <div class="mb-3 {{ $classAll ?? '' }} {{ $isPassword ? 'form-password-toggle' : '' }}">
        <label for="{{ $id }}" class="form-label">{{ $label }}</label>

        @if ('input' == $type)
            @if ($isPassword)
                <div class="input-group input-group-merge">
            @endif
            <input id="{{ $id }}" type="{{ $inputType }}" class="form-control @error($name) is-invalid @enderror" name="{{$name}}" value="{{ $value }}" {{ $required }} {{ $readonly }} autofocus>
            @if ($isPassword)
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                @error($name)
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            @else
                @error($name)
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            @endif
        @elseif ('select' == $type)
            <div class="col-md-12">
                <select name="{{ $name }}" id="{{ $id }}" class="form-control @error($name) is-invalid @enderror" {{ $required }} {{ $readonly }}>
                    <option value="">-- {{ __('common.choose') }} {{ $label }} --</option>
                    @foreach ($options as $option)
                        <option value="{{ $option['value'] }}" {{ $value == $option['value'] ? 'selected' : '' }}>{{ $option['text'] }}</option>
                    @endforeach
                </select>
                @error($name)
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        @elseif ('textarea' == $type)
            <textarea id="{{ $id }}" class="form-control @error($name) is-invalid @enderror" name="{{$name}}" {{ $required }} {{ $readonly }} rows="3">{{ $value }}</textarea>
        @endif
    </div>
@endforeach
