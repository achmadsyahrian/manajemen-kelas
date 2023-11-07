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
                     <x-images.image-profile photo="storage/{{ $user->student->photo }}"></x-images.image-profile>
                  @else
                     <x-images.image-profile photo="images/user/default-user-2.png"></x-images.image-profile>
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
                                 <x-forms.invalid-feedback>{{ $message }}</x-forms.invalid-feedback>
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
                        <x-forms.form-input type="text" label="Name" name="name" value="{{ old('name', $user->name) }}"></x-forms.form-input>
                     </div>
                     <div class="col-sm-6">
                        <x-forms.form-input type="username" label="Username" name="username" value="{{ old('username', $user->username) }}"></x-forms.form-input>
                     </div>
                     <div class="col-sm-6">
                        @if ($user->role == 'mahasiswa')
                           <x-forms.form-input type="text" label="NIM" name="nim" value="{{ old('nim', $user->student->nim) }}"></x-forms.form-input>
                        @endif
                     </div>
                     <div class="col-sm-{{ $user->role == "mahasiswa" ? '6' : '12' }}">
                        <x-forms.form-input type="text" label="Email" name="email" value="{{ old('email', $user->email) }}"></x-forms.form-input>
                     </div>
                  </div>
                  @if ($user->status == 'waiting') 
                     <div class="row justify-content-around mt-4">
                        <x-forms.form-status id="{{ $user->id }}"></x-forms.form-status>
                     </div>
                  @elseif ($user->status == 'disabled')
                     <div class="row justify-content-around mt-4">
                        <x-forms.form-user-delete id="{{ $user->id }}"></x-forms.form-user-delete>
                     </div>
                  @else
                     <div class="row justify-content-around mt-4">
                        <x-buttons.button-save></x-buttons.button-save>
                        </form> {{-- form save --}}
                        <x-forms.form-user-delete id="{{ $user->id }}"></x-forms.form-user-delete>
                     </div>
                  @endif
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection