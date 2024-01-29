@extends('layouts.main')
@section('content')
<div class="row">
   <div class="col-md-12">
      <div class="card py-4">
         <div class="row justify-content-evenly">
            <div class="col-sm-4">
               @if (!empty($user->student->photo))
               <x-images.image-profile photo="storage/{{ $user->student->photo }}"></x-images.image-profile>
               @else
               <x-images.image-profile photo="images/user/default-user-2.png"></x-images.image-profile>
               @endif
            </div>
            <div class="col-sm-7 m-4">
               <form action="{{ isset($user) ? route('user.update', ['user' => $user->id]) : route('user.store') }}"
                  method="POST" id="form-save   " enctype="multipart/form-data"> {{-- form save --}}
                  @csrf
                  @isset($user)
                  @method('PUT')
                  @endisset
                  <div class="row">
                     <div class="col-md-12">
                        <h5 class="mt-4">EDIT USER</h5>
                        <hr class="border-2" style="border: 1px solid rgb(108, 189, 243);">
                     </div>
                  </div>
                  <div class="row mt-4">
                     <div class="col-sm-6">
                        <div class="form-group mb-4">
                           <label class="floating-label" for="name"><i class="fas fa-user"></i>
                              Name</label>
                           <input type="text" class="form-control bg-transparent @error('name') is-invalid @enderror"
                              name="name" value="{{ isset($user) ? $user->name : old('name') }}" id="name">
                           @error('name')
                           <x-forms.invalid-feedback>{{ $message }}</x-forms.invalid-feedback>
                           @enderror
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group mb-4">
                           <label class="floating-label" for="username"><i class="fas fa-at"></i>
                              Username</label>
                           <input type="username"
                              class="form-control bg-transparent @error('username') is-invalid @enderror"
                              name="username" value="{{ isset($user) ? $user->username : old('username') }}"
                              id="username">
                           @error('username')
                           <x-forms.invalid-feedback>{{ $message }}</x-forms.invalid-feedback>
                           @enderror
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group mb-4">
                           <label class="floating-label" for="email"><i class="fas fa-envelope"></i>
                              Email</label>
                           <input type="email" class="form-control bg-transparent @error('email') is-invalid @enderror"
                              name="email" value="{{ isset($user) ? $user->email : old('email') }}" id="email">
                           @error('email')
                           <x-forms.invalid-feedback>{{ $message }}</x-forms.invalid-feedback>
                           @enderror
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group mb-4">
                           <label class="floating-label" for="password"><i class="fas fa-unlock"></i> Change
                              Password</label>
                           <input type="password"
                              class="form-control bg-transparent @error('password') is-invalid @enderror"
                              name="password" id="password">
                           @error('password')
                           <x-forms.invalid-feedback>{{ $message }}</x-forms.invalid-feedback>
                           @enderror
                           <small id="emailHelp" class="form-text text-muted">Kosongkan jika tidak ingin
                              mengubahnya</small>
                        </div>
                     </div>
                  </div>
                  <div class="row justify-content-around mt-4">
                     <button type="submit" class="btn btn-success">
                        <i class="fas fa-save mr-2"></i>Save
                     </button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection