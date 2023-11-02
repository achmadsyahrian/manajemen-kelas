@extends('layouts.main')
@section('content')

@if (session()->has('success'))
   <x-sweetalert type="success" head="Success!" body="{{ session('success') }}" ></x-sweetalert>
@endif

<div class="row">
   <div class="col-lg-12 col-md-12">
      <!-- page statustic card start -->
      <div class="row">
         <div class="col-sm-6">
            <x-widget color="green">
               <x-slot name="data">{{ $usersActive->count() }}</x-slot>
               <x-slot name="title">Active Users</x-slot>
               <x-slot name="icon">
                  <i class="fa-solid fa-users-rectangle f-28 text-c-green"></i>
               </x-slot>
            </x-widget>
         </div>
         <div class="col-sm-6">
            <x-widget color="yellow">
               <x-slot name="data">{{ $usersWaiting->count() }}</x-slot>
               <x-slot name="title">Waiting Verification</x-slot>
               <x-slot name="icon">
                  <i class="far fa-clock f-28 text-c-yellow"></i>
               </x-slot>
            </x-widget>
         </div>
      </div>
      <div class="row mt-3">
         <div class="col-xl-12 col-md-12">
            <div class="card table-card">
               <div class="card-header">
                  <h5>Users</h5>
                  <div class="card-header-right">
                     <div class="btn-group card-option">
                           <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="feather icon-more-horizontal"></i>
                           </button>
                           <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                              <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                              <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                              <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                           </ul>
                     </div>
                  </div>
               </div>
               <div class="card-body p-0">
                  <div class="table-responsive">
                     <table class="table table-hover mb-0">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Profile</th>
                              <th>Role</th>
                              <th>Created</th>
                              <th>Status</th>
                              <th class="text-right">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)    
                           <tr>
                              <td>{{ $loop->iteration + ($users->perPage() * ($users->currentPage() - 1)) }}</td>
                              <td>
                                 <div class="d-inline-block align-middle">
                                       @if ($user->role == 'mahasiswa' && !empty($user->student->photo)) 
                                          <x-image-round-profile photo="storage/{{ $user->student->photo }}"></x-image-round-profile>
                                       @else
                                          <x-image-round-profile photo="images/user/default-user-2.png"></x-image-round-profile>
                                       @endif
                                       <div class="d-inline-block">
                                          <h6>{{ $user->name }}</h6>
                                          @if ($user->role == "mahasiswa")
                                             <p class="text-muted m-b-0">{{ $user->student->nim }}</p>
                                          @else
                                             <p class="text-muted m-b-0">{{ $user->email }}</p>
                                          @endif
                                       </div>
                                 </div>
                              </td>
                              <td>{{ Str::ucfirst($user->role) }}</td>
                              <td>{{  $user->created_at->diffForHumans() }}</td>
                              <td>
                                 @if ($user->status == "active")
                                    <x-badge type="success">{{ Str::ucfirst($user->status) }}</x-badge>
                                 @elseif($user->status == "waiting")
                                    <x-badge type="warning">{{ Str::ucfirst($user->status) }}</x-badge>
                                 @else
                                    <x-badge type="danger">{{ Str::ucfirst($user->status) }}</x-badge>
                                 @endif
                              </td>
                              <td class="text-right">
                                 <x-button-edit-icon id="{{ $user->id }}"></x-button-edit-icon>
                              </td>
                           </tr>
                        @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-12">
            <nav aria-label="...">
               <ul class="pagination justify-content-center">
                   @if ($users->hasPages())
                       <li class="page-item">
                           <span class="page-link">{{ $users->links() }}</span>
                       </li>
                   @endif
               </ul>
           </nav>           
         </div>
      </div>
      <!-- page statustic card end -->
   </div>
</div>
@endsection