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
                  <form action="/profile/{{ $user->id }}" method="POST" id="form-save" enctype="multipart/form-data"> {{-- form save --}}
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
                        <x-forms.form-input label="Name" name="name" value="{{ old('name', $user->name) }}"></x-forms.form-input>
                     </div>
                     <div class="col-sm-6">
                        <x-forms.form-input label="Username" name="username" value="{{ old('username', $user->username) }}"></x-forms.form-input>
                     </div>
                     @if ($user->role == 'mahasiswa')
                        <div class="col-sm-6">
                           <x-forms.form-input label="NIM" name="nim" value="{{ old('nim', $user->student->nim) }}"></x-forms.form-input>
                        </div>
                        <div class="col-md-6">
                           <x-forms.form-input label="Phone" name="phone" value="{{ old('phone', $user->student->phone) }}"></x-forms.form-input>
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
                        <x-forms.form-input label="Email" name="email" value="{{ old('email', $user->email) }}"></x-forms.form-input>
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