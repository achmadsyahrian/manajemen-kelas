<div class="form-group mb-4">
    <label class="floating-label" for="{{ $name }}">
        @if ($name == 'name')
            <i class="fas fa-user mr-1"></i>
        @elseif ($name == 'username')
            <i class="fas fa-at mr-1"></i>
        @elseif ($name == 'email')
            <i class="fas fa-envelope mr-1"></i>
        @elseif ($name == 'nim')
            <i class="fas fa-address-card"></i>
        @elseif ($name == 'password')
            <i class="fas fa-lock"></i>
        @endif
        {{ $label }}
    </label>
    <input type="text" class="form-control @error($name) is-invalid @enderror" value="{{ old($name, $value) }}" id="{{ $name }}" name="{{ $name }}" autocomplete="off">
    @error($name)
        <x-forms.invalid-feedback>{{ $message }}</x-forms.invalid-feedback>
    @enderror
</div>