@extends('layouts.main')
@section('content')
   <div class="row">
      <div class="col-md-12">
         <div class="card py-4">
            <div class="row justify-content-evenly">
               <div class="col-sm-4">
                  <x-images.image-profile photo="images/user/default-user-2.png"></x-images.image-profile>
                  <form action="/student" method="POST" id="form-save" enctype="multipart/form-data"> {{-- form save --}}
                  @csrf
                  @method('POST')                      
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
                        <h5 class="mt-4">MAHASISWA</h5>
                        <hr class="border-2" style="border: 1px solid rgb(108, 189, 243);">
                     </div>
                  </div>
                  <div class="row mt-4">
                     <div class="col-sm-6">
                        <x-forms.form-input type="text" label="Name" name="name" value="{{ old('name') }}"></x-forms.form-input>
                     </div>
                     <div class="col-sm-6">
                        <x-forms.form-input type="username" label="Username" name="username" value="{{ old('username') }}"></x-forms.form-input>
                     </div>
                     <div class="col-sm-6">
                        <x-forms.form-input type="text" label="NIM" name="nim" value="{{ old('nim') }}"></x-forms.form-input>
                     </div>
                     <div class="col-md-6">
                        <x-forms.form-input type="text" label="Phone" name="phone" value="{{ old('phone') }}"></x-forms.form-input>
                     </div>
                     <div class="col-sm-6">
                        <x-forms.form-input type="text" label="Email" name="email" value="{{ old('email') }}"></x-forms.form-input>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group mb-4">
                           <select id="gender" name="gender" class="form-control">
                              <option value="pria" selected>Pria</option>
                              <option value="wanita">Wanita</option>
                           </select>
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