<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
   <div class="m-header">
      <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
      <a href="/" class="b-brand">
         <img src="images/profile/logo-univ.png" width="40px" alt="" class="logo mr-2">
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
                     <img src="images/user/administrator.jpg" class="img-radius" alt="User-Profile-Image">
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