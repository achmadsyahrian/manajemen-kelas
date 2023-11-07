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
                           <x-forms.form-input type="password" label="Old Password" name="old_password" value=""></x-forms.form-input>
                        </div>
                        <div class="col-sm-6">
                           <x-forms.form-input type="password" label="New Password" name="new_password" value=""></x-forms.form-input>
                        </div>
                        <div class="col-sm-6">
                           <x-forms.form-input type="password" label="Confirm Password" name="confirm_password" value=""></x-forms.form-input>
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