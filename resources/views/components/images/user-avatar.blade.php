@props(['photo', 'width', 'height'])

@if (Auth::user()->role == 'mahasiswa' && !empty(Auth::user()->student->photo))
    <img src="{{ asset($photo) }}" class="img-radius" style="width:{{ $width }}px; height:{{ $height }}px; object-fit:cover;" alt="user-profile-image">
@elseif(Auth::user()->role == 'administrator')
    <img src="{{ asset('images/user/administrator.jpg') }}" class="img-radius" style="width:{{ $width }}px; height:{{ $height }}px;  object-fit:cover;" alt="user-profile-image">
@else
    <img src="{{ asset('images/user/default-user-2.png') }}" class="img-radius" style="width:{{ $width }}px; height:{{ $height }}px;  object-fit:cover;" alt="user-profile-image">
@endif