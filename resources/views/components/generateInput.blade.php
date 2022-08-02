@foreach ($inputs as $input)
    @php
        $label = $input['label'];
        $id = $input['id'] ?? $input['name'];
        $name = $input['name'];
        $type = $input['type']; // input, select
        $inputType = $input['inputType'] ?? 'text';
        $options = $input['options'] ?? [];
        $required = isset($input['required']) ? 'required' : '';
        $isPassword = 'password' == $inputType;
        $value = $input['value'] ?? old($name);
    @endphp
    <div class="mb-3 {{ $isPassword ? 'form-password-toggle' : '' }}">
        <label for="{{ $id }}" class="form-label">{{ $label }}</label>

        @if ('input' == $type)
            @if ($isPassword)
                <div class="input-group input-group-merge">
            @endif
            <input id="{{ $id }}" type="{{ $inputType }}" class="form-control @error($name) is-invalid @enderror" name="{{$name}}" value="{{ $value }}" {{ $required }} autofocus>
            @if ($isPassword)
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
            @endif
            @error($name)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        @elseif ('select' == $type)
            <div class="col-md-6">
                <select name="{{ $name }}" id="{{ $id }}" class="form-control @error($name) is-invalid @enderror" {{ $required }}>
                    <option value="">-- Choose {{ $label }} --</option>
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
        @endif
    </div>
@endforeach
