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
                  @if ($user->role == 'mahasiswa' && !empty($user->student->photo)) 
                     <x-images.image-profile :photo="'storage/'.$user->student->photo"></x-images.image-profile>
                  @else
                     <x-images.image-profile :photo="'images/user/default-user-2.png'"></x-images.image-profile>
                  @endif
               </div>
               <div class="col-sm-7 m-4">
                  <div class="row">
                     <div class="col-md-12">
                        <h3 class="mt-4">{{ $user->name }} <span class="h5">({{ ucfirst($user->role) }})</span></h3>
                        <hr class="border-2" style="border: 1px solid rgb(108, 189, 243);">
                     </div>
                  </div>
                  <div class="row mt-4">
                     <div class="col-sm-6">
                        <div class="form-group mb-4">
                           <label class="floating-label" for="name"><i class="fas fa-user"></i> Username</label>
                           <input type="username" class="form-control bg-transparent" value="{{ $user->username }}" id="username" readonly>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group mb-4">
                           <label class="floating-label" for="name"><i class="fas fa-envelope"></i> Email</label>
                           <input type="text" class="form-control bg-transparent" value="{{ $user->email }}" id="name" readonly>
                        </div>
                     </div>
                     @if ($user->role == 'mahasiswa')
                        <div class="col-sm-6">
                           <div class="form-group mb-4">
                              <label class="floating-label" for="name"><i class="fas fa-venus-mars"></i> Jenis Kelamin</label>
                              <input type="text" class="form-control bg-transparent" value="{{ ucfirst($user->student->gender) }}" id="name" readonly>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group mb-4">
                              <label class="floating-label" for="name"><i class="fas fa-phone"></i> Phone</label>
                              <input type="text" class="form-control bg-transparent" value="{{ $user->student->phone ?? 'Belum Diisi' }}" id="name" readonly>
                           </div>
                        </div>
                     @endif
                     {{-- <div class="col-sm-12">
                        <div class="form-group mb-4">
                           <label class="floating-label" for="password"><i class="fas fa-venus-mars"></i> Password</label>
                           <input type="text" class="form-control bg-transparent" value="{{ $user->password }}" id="password" readonly>
                        </div>
                     </div> --}}
                  </div>
                  <div class="row justify-content-around mt-4">
                     <a href="/user/{{ $user->id }}/edit" class="btn btn-primary text-white">
                        <i class="fas fa-cog mr-2"></i>Edit
                     </a>
                     <form action="/user/{{ $user->id }}" method="POST" id="delete-user">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="showDeleteConfirmation('Ya, Hapus', 'Apakah Anda yakin ingin menghapus data ini?', 'delete-user')" class="btn btn-danger">
                           <i class="fas fa-trash-alt mr-2"></i>Hapus
                        </button>
                    </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection