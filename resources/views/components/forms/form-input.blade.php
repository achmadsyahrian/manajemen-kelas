<div class="form-group mb-4">
    <label class="floating-label" for="{{ $name }}">
    @switch($name)
        @case('name')
            <i class="fas fa-user"></i>
            @break
        @case('username')
            <i class="fas fa-at"></i>
            @break
        @case('email')
            <i class="fas fa-envelope"></i>
            @break
        @case('nim')
            <i class="fas fa-address-card"></i>
            @break
        @case('password')
        @case('verifPassword')
            <i class="fas fa-lock"></i>
            @break
        @case('phone')
            <i class="fas fa-phone"></i>
            @break
        @case('oldPassword')
            <i class="fas fa-key"></i>
            @break
        @case('newPassword')
            <i class="fas fa-unlock"></i>
            @break
    @endswitch
    {{ $label }}
    </label>
<input type="{{ $type }}" class="form-control @error($name) is-invalid @enderror" value="{{ old($name, $value) }}" id="{{ $name }}" name="{{ $name }}" autocomplete="off">
    @error($name)
        <x-forms.invalid-feedback>{{ $message }}</x-forms.invalid-feedback>
    @enderror
</div>