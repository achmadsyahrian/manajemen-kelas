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
                  <x-image-profile>
                     <x-slot name="image">
                        <img class="img-fluid d-block w-100" src="{{ asset('images/user/administrator.jpg') }}" alt="First slide">
                     </x-slot>
                  </x-image-profile>
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
                           <input type="text" class="form-control" value="{{ old('username', $user->name) }}" id="Name" name="name" autocomplete="off">
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group mb-4">
                           <label class="floating-label" for="Username">Username</label>
                           <input type="text" class="form-control" value="{{ old('username', $user->username) }}" id="Username" name="username" autocomplete="off">
                        </div>
                     </div>
                     <div class="col-sm-6">
                        @if ($user->role == 'mahasiswa')
                           <div class="form-group mb-4">
                              <label class="floating-label" for="NIM">NIM</label>
                              <input type="text" class="form-control" value="{{ old('nim', $user->student->nim) }}" id="NIM" name="nim" autocomplete="off">
                           </div>
                        @endif
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group mb-4">
                           <label class="floating-label" for="Email">Email</label>
                           <input type="text" class="form-control" value="{{ old('email', $user->email) }}" id="Email" name="email" autocomplete="off">
                        </div>
                     </div>
                  </div>
                  @if ($user->status == 'waiting') 
                     <x-form-status id="{{ $user->id }}"></x-form-status>
                  @elseif ($user->status == 'disabled')
                  <form action="/user/{{ $user->id }}" method="POST">
                     <div class="row justify-content-around mt-4">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="status" value="disable" class="btn btn-danger">
                           <i class="fas fa-trash-alt mr-2"></i>Delete
                        </button>
                     </div>
                 </form>
                  @endif
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection