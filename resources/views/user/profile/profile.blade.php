@extends('layouts.main')
@section('content')
<div class="row">
   <div class="col-md-12">
      <div class="card py-4">
         <div class="row justify-content-evenly">
            <div class="col-sm-4">
               @if ($user->role == 'mahasiswa' && !empty($user->student->photo))
               <x-images.image-profile photo="storage/{{ $user->student->photo }}"></x-images.image-profile>
               @elseif($user->role == 'administrator')
               <x-images.image-profile photo="images/user/administrator.jpg"></x-images.image-profile>
               @else
               <x-images.image-profile photo="images/user/default-user-2.png"></x-images.image-profile>
               @endif
               <form action="/profile/{{ $user->id }}" method="POST" id="form-save" enctype="multipart/form-data"> {{--
                  form save --}}
                  @csrf
                  @method('PUT')
                  @if ($user->role == 'mahasiswa')
                  <input type="hidden" name="oldPhoto" value="{{ $user->student->photo }}">
                  <div class="custom-file m-2">
                     <input type="file" class="custom-file-input @error('photo') is-invalid @enderror" name="photo"
                        id="photo" onchange="previewImage()">
                     <label class="custom-file-label" for="photo">Choose file</label>
                     @error('photo')
                     <x-forms.invalid-feedback>{{ $message }}</x-forms.invalid-feedback>
                     @enderror
                  </div>
                  @endif
            </div>
            <div class="col-sm-7 m-4">
               <div class="row">
                  <div class="col-md-12">
                     <h5 class="mt-4">PROFILE</h5>
                     <hr class="border-2" style="border: 1px solid rgb(108, 189, 243);">
                  </div>
               </div>
               <div class="row mt-4">
                  <div class="col-sm-6">
                     <div class="form-group mb-4">
                        <label class="floating-label" for="name"><i class="fas fa-user"></i>
                           Name</label>
                        <input type="text" class="form-control bg-transparent @error('name') is-invalid @enderror"
                           name="name" value="{{ old('name', $user->name) }}" id="name">
                        @error('name')
                        <x-forms.invalid-feedback>{{ $message }}</x-forms.invalid-feedback>
                        @enderror
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group mb-4">
                        <label class="floating-label" for="username"><i class="fas fa-at"></i>
                           Username</label>
                        <input type="text" class="form-control bg-transparent @error('username') is-invalid @enderror"
                           name="username" value="{{ old('username', $user->username) }}" id="username">
                        @error('username')
                        <x-forms.invalid-feedback>{{ $message }}</x-forms.invalid-feedback>
                        @enderror
                     </div>
                  </div>
                  @if ($user->role == 'mahasiswa')
                  <div class="col-sm-6">
                     <div class="form-group mb-4">
                        <label class="floating-label" for="nim"><i class="fas fa-address-card"></i>
                           Nim</label>
                        <input type="text" class="form-control bg-transparent @error('nim') is-invalid @enderror"
                           name="nim" value="{{ old('nim', $user->student->nim) }}" id="nim">
                        @error('nim')
                        <x-forms.invalid-feedback>{{ $message }}</x-forms.invalid-feedback>
                        @enderror
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group mb-4">
                        <label class="floating-label" for="phone"><i class="fas fa-phone"></i>
                           Phone</label>
                        <input type="text" class="form-control bg-transparent @error('phone') is-invalid @enderror"
                           name="phone" value="{{ old('phone', $user->student->phone) }}" id="phone">
                        @error('phone')
                        <x-forms.invalid-feedback>{{ $message }}</x-forms.invalid-feedback>
                        @enderror
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group mb-4">
                        <select id="gender" name="gender" class="form-control">
                           <option value="pria" {{ $user->student->gender == 'pria' ? 'selected' : '' }}>Pria</option>
                           <option value="wanita" {{ $user->student->gender == 'wanita' ? 'selected' : '' }}>Wanita
                           </option>
                        </select>
                     </div>
                  </div>
                  @endif
                  <div class="col-sm-{{ $user->role == "mahasiswa" ? '6' : '12' }}">
                     <div class="form-group mb-4">
                        <label class="floating-label" for="email"><i class="fas fa-envelope"></i>
                           Email</label>
                        <input type="text" class="form-control bg-transparent @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email', $user->email) }}" id="email">
                        @error('email')
                        <x-forms.invalid-feedback>{{ $message }}</x-forms.invalid-feedback>
                        @enderror
                     </div>
                  </div>
               </div>
               <div class="row justify-content-around mt-4">
                  <button type="submit" class="btn btn-success">
                     <i class="fas fa-save mr-2"></i>Save
                  </button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection