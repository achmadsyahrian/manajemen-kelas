@extends('layouts.main')
@section('content')
   <div class="row">
      <div class="col-md-12">
         <div class="card py-4">
            <div class="row justify-content-evenly">
               <div class="col-sm-4">
                  <x-images.image-profile photo="images/user/default-user-2.png"></x-images.image-profile>                   
               </div>
               <div class="col-sm-7 m-4">
                  <form action="/user" method="POST">
                     @csrf
                     <div class="row">
                        <div class="col-md-12">
                           <h5 class="mt-4">PROFILE</h5>
                           <hr class="border-2" style="border: 1px solid rgb(108, 189, 243);">
                        </div>
                     </div>
                     <div class="row mt-4">
                        <div class="col-sm-6">
                           <x-forms.form-input label="Name" name="name" value="{{ old('name') }}"></x-forms.form-input>
                        </div>
                        <div class="col-sm-6">
                           <x-forms.form-input label="Username" name="username" value="{{ old('username') }}"></x-forms.form-input>
                        </div>
                        <div class="col-sm-12">
                           <x-forms.form-input label="Email" name="email" value="{{ old('email') }}"></x-forms.form-input>
                        </div>
                     </div>
                     <div class="row justify-content-around mt-4">
                        <x-buttons.button-save></x-buttons.button-save>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection