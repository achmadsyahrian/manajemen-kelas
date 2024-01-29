@extends('layouts.main')
@section('content')
<div class="row">
   <div class="col-md-12">
      <div class="card py-4">
         <div class="row justify-content-evenly">
            <div class="col-sm-4">
               @if (!empty($student->photo))
                  <x-images.image-profile :photo="'storage/'.$student->photo"></x-images.image-profile>
               @else
                  <x-images.image-profile :photo="'images/user/default-user-2.png'"></x-images.image-profile>
               @endif
            </div>
            <div class="col-sm-7 m-4">
               <div class="row">
                  <div class="col-md-12">
                     <h3 class="mt-4">{{ $student->user->name }} <span class="h5">({{ $student->nim }})</span></h3>
                     <hr class="border-2" style="border: 1px solid rgb(108, 189, 243);">
                  </div>
               </div>
               <div class="row mt-4">
                  <div class="col-sm-6">
                     <div class="form-group mb-4">
                        <label class="floating-label" for="name"><i class="fas fa-user"></i> Username</label>
                        <input type="text" class="form-control bg-transparent" value="{{ $student->user->username }}" id="name" readonly>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group mb-4">
                        <label class="floating-label" for="name"><i class="fas fa-venus-mars"></i> Jenis Kelamin</label>
                        <input type="text" class="form-control bg-transparent" value="{{ ucfirst($student->gender) }}" id="name" readonly>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group mb-4">
                        <label class="floating-label" for="name"><i class="fas fa-envelope"></i> Email</label>
                        <input type="text" class="form-control bg-transparent" value="{{ $student->user->email }}" id="name" readonly>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group mb-4">
                        <label class="floating-label" for="name"><i class="fas fa-user"></i> Phone</label>
                        <input type="text" class="form-control bg-transparent" value="{{ $student->phone ?? 'Belum Diisi' }}" id="name" readonly>
                     </div>
                  </div>
               </div>
               <div class="row justify-content-around mt-4">
                  <a href="/student/{{ $student->id }}/edit" class="btn btn-primary text-white">
                     <i class="fas fa-cog mr-2"></i>Edit
                  </a>
                  <form action="/student/{{ $student->id }}" method="POST" id="delete-student">
                     @csrf
                     @method('DELETE')
                     <button type="button" onclick="showDeleteConfirmation('Ya, Hapus', 'Apakah Anda yakin ingin menghapus data ini?', 'delete-student')" class="btn btn-danger">
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
