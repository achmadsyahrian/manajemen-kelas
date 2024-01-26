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
                  <form action="{{ isset($student) ? route('student.update', ['student' => $student->id]) : route('student.store') }}" method="POST" id="form-save" enctype="multipart/form-data"> {{-- form save --}}
                  @csrf
                  @isset($student)
                      @method('PUT')
                  @endisset
                  @isset($student)
                     <input type="hidden" name="oldPhoto" value="{{ $student->photo }}"> 
                  @endisset ()    
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
                        <h5 class="mt-4">{{ $title }}</h5>
                        <hr class="border-2" style="border: 1px solid rgb(108, 189, 243);">
                     </div>
                  </div>
                  <div class="row mt-4">
                     <div class="col-sm-6">
                        <div class="form-group mb-4">
                           <label class="floating-label" for="name"><i class="fas fa-user"></i> Name</label>
                           <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ isset($student) ? $student->user->name : old('name') }}" id="name">
                           @error('name')
                                 <x-forms.invalid-feedback>{{ $message }}</x-forms.invalid-feedback>
                           @enderror
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group mb-4">
                           <label class="floating-label" for="username"><i class="fas fa-at"></i> Username</label>
                           <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ isset($student) ? $student->user->username : old('username') }}" id="username">
                           @error('username')
                                 <x-forms.invalid-feedback>{{ $message }}</x-forms.invalid-feedback>
                           @enderror
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group mb-4">
                           <label class="floating-label" for="nim"><i class="fas fa-address-card"></i> Nim</label>
                           <input type="number" name="nim" class="form-control @error('nim') is-invalid @enderror" value="{{ isset($student) ? $student->nim : old('nim') }}" id="nim">
                           @error('nim')
                                 <x-forms.invalid-feedback>{{ $message }}</x-forms.invalid-feedback>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group mb-4">
                           <label class="floating-label" for="phone"><i class="fas fa-phone"></i> Phone</label>
                           <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ isset($student) ? $student->phone : old('phone') }}" id="phone">
                           @error('phone')
                                 <x-forms.invalid-feedback>{{ $message }}</x-forms.invalid-feedback>
                           @enderror
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group mb-4">
                           <label class="floating-label" for="email"><i class="fas fa-envelope"></i> Email</label>
                           <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ isset($student) ? $student->user->email : old('email') }}" id="email">
                           @error('email')
                                 <x-forms.invalid-feedback>{{ $message }}</x-forms.invalid-feedback>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group mb-4">
                           <select id="gender" name="gender" class="form-control">
                              <option value="pria" {{ (isset($student) && $student->gender == 'pria') ? 'selected' : '' }}>Pria</option>
                              <option value="wanita" {{ (isset($student) && $student->gender == 'wanita') ? 'selected' : '' }}>Wanita</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="row justify-content-around mt-4">
                     <button type="submit" class="btn btn-success">
                        <i class="fas fa-save mr-2"></i>Save
                     </button>
                     </form> {{-- form save --}}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection