@extends('layouts.main')
@section('content')
   <div class="row">
      <div class="col-md-12">
         <div class="card py-4">
            <div class="row justify-content-evenly">
               <div class="col-sm-4">
                  <x-image-profile photo="images/user/default-user-2.png"></x-image-profile>                   
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
                           <div class="form-group mb-4">
                              <label class="floating-label" for="Name">Name</label>
                              <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="Name" name="name" autocomplete="off">
                              @error('name')
                                 <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
                              @enderror
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group mb-4">
                              <label class="floating-label" for="Username">Username</label>
                              <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" id="Username" name="username" autocomplete="off" placeholder="@username">
                              @error('username')
                                 <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
                              @enderror
                           </div>
                        </div>
                        <div class="col-sm-12">
                           <div class="form-group mb-4">
                              <label class="floating-label" for="Email">Email</label>
                              <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="Email" name="email" autocomplete="off">
                              @error('email')
                                 <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
                              @enderror
                           </div>
                        </div>
                     </div>
                     <div class="row justify-content-around mt-4">
                        <button type="submit" name="status" value="activate" class="btn btn-success">
                           <i class="fas fa-save mr-2"></i>Save
                        </button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection