@extends('layouts.main')
@section('content')
   <div class="row">
      <div class="col-md-12">
         <div class="card py-4">
            <div class="row justify-content-evenly">
               <div class="col-sm-4">
                  @if (!empty($student->photo)) 
                     <x-images.image-profile photo="storage/{{ $student->photo }}"></x-images.image-profile>
                  @else
                     <x-images.image-profile photo="images/user/default-user-2.png"></x-images.image-profile>
                  @endif
                  <form action="/student/{{ $student->id }}" method="POST" id="form-save" enctype="multipart/form-data"> {{-- form save --}}
                  @csrf
                  @method('PATCH')         
                  <input type="hidden" name="oldPhoto" value="{{ $student->photo }}">             
                  <div class="custom-file m-2">
                     <input type="file" class="custom-file-input @error('photo') is-invalid @enderror" name="photo" id="photo" onchange="previewImage()">
                     <label class="custom-file-label" for="photo">Choose file</label>
                     @error('photo')
                           <x-forms.invalid-feedback>{{ $message }}</x-forms.invalid-feedback>
                     @enderror
                  </div>
               </div>
               <div class="col-sm-7 m-4">
                  <div class="row">
                     <div class="col-md-12">
                        <h5 class="mt-4">EDIT MAHASISWA</h5>
                        <hr class="border-2" style="border: 1px solid rgb(108, 189, 243);">
                     </div>
                  </div>
                  <div class="row mt-4">
                     <div class="col-sm-6">
                        <x-forms.form-input type="text" label="Name" name="name" value="{{ old('name', $student->user->name) }}"></x-forms.form-input>
                     </div>
                     <div class="col-sm-6">
                        <x-forms.form-input type="username" label="Username" name="username" value="{{ old('username', $student->user->username) }}"></x-forms.form-input>
                     </div>
                     <div class="col-sm-6">
                        <x-forms.form-input type="text" label="NIM" name="nim" value="{{ old('nim', $student->nim) }}"></x-forms.form-input>
                     </div>
                     <div class="col-md-6">
                        <x-forms.form-input type="text" label="Phone" name="phone" value="{{ old('phone', $student->phone) }}"></x-forms.form-input>
                     </div>
                     <div class="col-sm-6">
                        <x-forms.form-input type="text" label="Email" name="email" value="{{ old('email', $student->user->email) }}"></x-forms.form-input>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group mb-4">
                           <select id="gender" name="gender" class="form-control">
                              <option value="pria" {{ $student->gender == 'pria' ? 'selected' : '' }}>Pria</option>
                              <option value="wanita" {{ $student->gender == 'wanita' ? 'selected' : '' }}>Wanita</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="row justify-content-around mt-4">
                     <x-buttons.button-save></x-buttons.button-save>
                     </form> {{-- form save --}}
                     <x-forms.form-user-delete id="/student/{{ $student->id }}"></x-forms.form-user-delete>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection