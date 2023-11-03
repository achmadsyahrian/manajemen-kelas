@extends('layouts.main')
@section('content')
   <div class="row">
      <div class="col-sm-12">
         @php
             if ($user->status == 'active') {
               $widgetColor = 'green';
             } elseif ($user->status == 'waiting') {
               $widgetColor = 'yellow'; 
             } else {
               $widgetColor = 'red'; 
             }
         @endphp
         <x-widget-simple color="{{ $widgetColor }}">
            <x-slot name="status">{{ $user->status }}</x-slot>
            <x-slot name="icon">
               @if ($user->status == 'active') 
                  <i class="fas fa-user-check f-20 text-c-green"></i> 
               @elseif($user->status == 'waiting')
                  <i class="far fa-clock f-20 text-c-yellow"></i>
               @else
                  <i class="fas fa-user-times f-20 text-c-red"></i>
               @endif
            </x-slot>
         </x-widget-simple> 
      </div>
   </div>
   <div class="row">
      <div class="col-md-12">
         <div class="card py-4">
            <div class="row justify-content-evenly">
               <div class="col-sm-4">
                  @if ($user->role == 'mahasiswa' && !empty($user->student->photo)) 
                     <x-image-profile photo="storage/{{ $user->student->photo }}"></x-image-profile>
                  @else
                     <x-image-profile photo="images/user/default-user-2.png"></x-image-profile>
                  @endif
                  @if ($user->status == 'active')
                  <form action="/user/{{ $user->id }}" method="POST" id="form-save" enctype="multipart/form-data"> {{-- form save --}}
                     @csrf
                     @method('PUT')
                     @if ($user->role == 'mahasiswa')                         
                        <input type="hidden" name="oldPhoto" value="{{ $user->student->photo }}">
                        <div class="custom-file m-2">
                           <input type="file" class="custom-file-input @error('photo') is-invalid @enderror" name="photo" id="photo" onchange="previewImage()">
                           <label class="custom-file-label" for="photo">Choose file</label>
                           @error('photo')
                                 <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
                           @enderror
                        </div>
                     @endif
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
                           <label class="floating-label" for="Name">Name</label>
                           <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" id="Name" name="name" autocomplete="off">
                           @error('name')
                              <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
                           @enderror
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group mb-4">
                           <label class="floating-label" for="Username">Username</label>
                           <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username', $user->username) }}" id="Username" name="username" autocomplete="off">
                           @error('username')
                              <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
                           @enderror
                        </div>
                     </div>
                     <div class="col-sm-6">
                        @if ($user->role == 'mahasiswa')
                           <div class="form-group mb-4">
                              <label class="floating-label" for="NIM">NIM</label>
                              <input type="text" class="form-control @error('nim') is-invalid @enderror" value="{{ old('nim', $user->student->nim) }}" id="NIM" name="nim" autocomplete="off">
                              @error('nim')
                                 <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
                              @enderror
                           </div>
                        @endif
                     </div>
                     <div class="col-sm-{{ $user->role == "mahasiswa" ? '6' : '12' }}">
                        <div class="form-group mb-4">
                           <label class="floating-label" for="Email">Email</label>
                           <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" id="Email" name="email" autocomplete="off">
                           @error('email')
                              <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
                           @enderror
                        </div>
                     </div>
                  </div>
                  @if ($user->status == 'waiting') 
                     <div class="row justify-content-around mt-4">
                        <x-form-status id="{{ $user->id }}"></x-form-status>
                     </div>
                  @elseif ($user->status == 'disabled')
                     <div class="row justify-content-around mt-4">
                        <x-user-delete id="{{ $user->id }}"></x-user-delete>
                     </div>
                  @else
                     <div class="row justify-content-around mt-4">
                        <button type="submit" name="status" value="activate" class="btn btn-success">
                           <i class="fas fa-save mr-2"></i>Save
                        </button>
                        </form> {{-- form save --}}
                        <x-user-delete id="{{ $user->id }}"></x-user-delete>
                     </div>
                  @endif
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection