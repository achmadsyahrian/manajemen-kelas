@extends('layouts.main')
@section('content')
   <div class="row">
      <div class="col-md-12">
         <div class="card py-4">
            <div class="row justify-content-evenly">
               <div class="col-sm-4">
                  @if ($user->role == 'mahasiswa' && !empty($user->student->photo)) 
                     <x-image-profile photo="storage/{{ $user->student->photo }}"></x-image-profile>
                  @elseif($user->role == 'administrator')
                     <x-image-profile photo="images/user/administrator.jpg"></x-image-profile>
                  @else
                     <x-image-profile photo="images/user/default-user-2.png"></x-image-profile>
                  @endif
                  <form action="/profile/{{ $user->id }}" method="POST" id="form-save" enctype="multipart/form-data"> {{-- form save --}}
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
                           <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username', $user->username) }}" id="Username" name="username" autocomplete="off" placeholder="@username">
                           @error('username')
                              <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
                           @enderror
                        </div>
                     </div>
                     @if ($user->role == 'mahasiswa')
                        <div class="col-sm-6">
                           <div class="form-group mb-4">
                              <label class="floating-label" for="NIM">NIM</label>
                              <input type="text" class="form-control @error('nim') is-invalid @enderror" value="{{ old('nim', $user->student->nim) }}" id="NIM" name="nim" autocomplete="off">
                              @error('nim')
                                 <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group mb-4">
                              <label class="floating-label" for="phone">Phone</label>
                              <input type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $user->student->phone) }}" id="phone" name="phone" autocomplete="off">
                              @error('phone')
                                 <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group mb-4">
                              <select id="gender" name="gender" class="form-control">
                                 <option value="pria" {{ $user->student->gender == 'pria' ? 'selected' : '' }}>Pria</option>
                                 <option value="wanita" {{ $user->student->gender == 'wanita' ? 'selected' : '' }}>Wanita</option>
                             </select>
                          </div>
                        </div>
                        @endif
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
                  <div class="row justify-content-around mt-4">
                     <x-buttons.button-save></x-buttons.button-save>
                     </form> {{-- form save --}}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection