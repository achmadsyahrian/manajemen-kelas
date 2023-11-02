<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
   <div class="m-header">
      <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
      <a href="/" class="b-brand">
         <img src="{{ asset("images/profile/logo-univ.png") }}" width="40px" alt="" class="logo mr-2">
         {{-- <h>IF MALAM A</h> --}}
      </a>
      <form id="logout-form" action="/sign-out" method="POST">
         @csrf
         <a href="{{ route('sign-out') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="mob-toggler"><i class="fa-solid fa-right-from-bracket text-white"></i></a>
      </form>
   </div>
   <div class="collapse navbar-collapse">
      <ul class="navbar-nav ml-auto">
         <li>
            <div class="dropdown drp-user">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="feather icon-user"></i>
               </a>
               <div class="dropdown-menu dropdown-menu-right profile-notification">
                  <div class="pro-head">
                     @if (Auth::user()->role == 'mahasiswa' && !empty(Auth::user()->student->photo))
                        <x-image-user-profile photo="storage/{{ Auth::user()->student->photo }}"></x-image-user-profile>
                     @elseif (Auth::user()->role == 'administrator')
                        <x-image-user-profile photo="images/user/administrator.jpg"></x-image-user-profile>
                     @else
                        <x-image-user-profile photo="images/user/default-user-2.png"></x-image-user-profile>
                     @endif
                     <span>{{ Str::limit(Auth::user()->name, 15, '...') }}</span>
                  </div>
                  <ul class="pro-body">
                     <li><a href="profile" class="dropdown-item"><i class="fa-solid fa-user"></i> Profile</a></li>
                     <form id="logout-form" action="/sign-out" method="POST">
                        @csrf
                        <li>
                           {{-- onclick="event.preventDefault(); document.getElementById('logout-form').submit();" --}}
                           {{-- Untuk menonaktifkan aksi default tag a agar menjadi submit button --}}
                           <a href="{{ route('sign-out') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item"><i class="fa-solid fa-right-from-bracket"></i> Log Out</a>
                        </li>
                     </form>
                  </ul>
               </div>
            </div>
         </li>
      </ul>
   </div>
</header>