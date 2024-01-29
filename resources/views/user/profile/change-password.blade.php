@extends('layouts.main')
@section('content')
@if (session()->has('error')) 
   <x-sweetalert type="error" head="Error!" body="{{ session('error') }}" ></x-sweetalert>
@endif
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
               </div>
               <div class="col-sm-7 m-4">
                  <div class="row">
                     <div class="col-md-12">
                        <h5 class="mt-4">CHANGE PASSWORD</h5>
                        <hr class="border-2" style="border: 1px solid rgb(108, 189, 243);">
                     </div>
                  </div>
                  <form action="/profile/change-password/{{ $user->id }}" method="POST" id="form-save" enctype="multipart/form-data"> {{-- form save --}}
                     @csrf
                     @method('PATCH')
                     <div class="row mt-4">
                        <div class="col-sm-12">
                           <div class="form-group mb-4">
                              <label class="floating-label" for="old_password"><i class="fas fa-key"></i>
                                 Old Password</label>
                              <input type="password" class="form-control bg-transparent @error('old_password') is-invalid @enderror"
                                 name="old_password" value="" id="old_password">
                              @error('email')
                              <x-forms.invalid-feedback>{{ $message }}</x-forms.invalid-feedback>
                              @enderror
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group mb-4">
                              <label class="floating-label" for="new_password"><i class="fas fa-unlock"></i>
                                 New Password</label>
                              <input type="password" class="form-control bg-transparent @error('new_password') is-invalid @enderror"
                                 name="new_password" value="" id="new_password">
                              @error('email')
                              <x-forms.invalid-feedback>{{ $message }}</x-forms.invalid-feedback>
                              @enderror
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group mb-4">
                              <label class="floating-label" for="confirm_password"><i class="fas fa-lock"></i>
                                 Confirm Password</label>
                              <input type="password" class="form-control bg-transparent @error('confirm_password') is-invalid @enderror"
                                 name="confirm_password" value="" id="confirm_password">
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
                  </form> {{-- form save --}}
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection