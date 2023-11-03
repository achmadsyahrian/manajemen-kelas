<div class="form-group mb-4">
    <label class="floating-label" for="{{ $name }}">
        @if ($name == 'name')
            <i class="fas fa-user"></i>
        @elseif ($name == 'username')
            <i class="fas fa-at"></i>
        @elseif ($name == 'email')
            <i class="fas fa-envelope"></i>
        @elseif ($name == 'nim')
            <i class="fas fa-address-card"></i>
        @elseif ($name == 'password')
            <i class="fas fa-lock"></i>
        @elseif ($name == 'phone')
            <i class="fas fa-phone"></i>
        @endif
        {{ $label }}
    </label>
    <input type="text" class="form-control @error($name) is-invalid @enderror" value="{{ old($name, $value) }}" id="{{ $name }}" name="{{ $name }}" autocomplete="off">
    @error($name)
        <x-forms.invalid-feedback>{{ $message }}</x-forms.invalid-feedback>
    @enderror
</div>