<nav class="pcoded-navbar menu-light ">
   <div class="navbar-wrapper  ">
      <div class="navbar-content scroll-div " >
         <div class="">
            <div class="main-menu-header">
               <x-images.image-user-profile photo="{{ $userProfilePhoto }}" width="60px" height="60px"></x-images.image-user-profile>
               <div class="user-details">
                  <div id="more-details"> 
                     @if (Auth::user()->role == "mahasiswa")
                        {{ Auth::user()->student->nim }} 
                     @else
                        {{ Auth::user()->name }} 
                     @endif
                     <i class="fa fa-caret-down"></i>
                  </div>
               </div>
            </div>
            <div class="collapse" id="nav-user-link">
               <ul class="list-unstyled">
                  <a href="/profile">
                     <li class="list-group-item"><i class="fa-solid fa-user m-r-5"></i> View Profile</li>
                  </a>
                  <a href="/profile/change-password">
                     <li class="list-group-item"><i class="fas fa-key m-r-5"></i> Change Password</li>
                  </a>
                  <form id="logout-form" action="/sign-out" method="POST">
                     @csrf
                     <a href="{{ route('sign-out') }}" onclick="event.preventDefault(); showDeleteConfirmation('Ya, Log Out', 'Apakah Anda yakin ingin logout?', 'logout-form');">
                        <li class="list-group-item"><i class="fa-solid fa-right-from-bracket m-r-5"></i> Log Out</li>
                     </a>
                  </form>
               </ul>
            </div>
         </div>
         <ul class="nav pcoded-inner-navbar ">
            <li class="nav-item pcoded-menu-caption">
                <label>Home</label>
            </li>
            <li class="nav-item">
                <a href="/" class="nav-link "><span class="pcoded-micon"><i class="fas fa-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
            </li>
            <li class="nav-item pcoded-menu-caption">
                <label>Data</label>
                @if (Auth::user()->role == "administrator")
                  <li class="nav-item {{ Request::is('user*') ? 'active' : '' }}">
                     <a href="/user" class="nav-link"><span class="pcoded-micon"><i class="fas fa-user-tie"></i></span><span class="pcoded-mtext">Users</span></a>
                  </li>
                @endif
                <li class="nav-item pcoded-hasmenu">
                    <a href="#" class="nav-link "><span class="pcoded-micon"><i class="fa-solid fa-school-flag"></i></span><span class="pcoded-mtext">Kelas</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="information">Tentang Kami</a></li>
                        <li><a href="teacher">Dosen</a></li>
                        @if (Auth::user()->role == "administrator")
                           <li><a href="student">Mahasiswa/i</a></li>
                        @endif
                    </ul>
                </li>
            </li>
            @if (Auth::user()->role == "administrator")
               <li class="nav-item pcoded-menu-caption">
                  <label>Transactions</label>
               </li>
               <li class="nav-item">
                  <a href="transaction" class="nav-link "><span class="pcoded-micon"><i class="fas fa-money-bill-wave"></i></span><span class="pcoded-mtext">Transaction</span></a>
               </li>
            @endif
            <li class="nav-item pcoded-menu-caption">
                <label>Report</label>
            </li>
            <li class="nav-item">
                <a href="report" class="nav-link "><span class="pcoded-micon"><i class="fa-solid fa-file-lines"></i></span><span class="pcoded-mtext">Report</span></a>
            </li>
         </ul>
         
         <div class="card text-center">
            <div class="card-block">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <img src="{{ asset("images/social-media/instagram.png") }}" width="50px" alt="" class="logo">
               <h6 class="mt-3">Follow Me</h6>
               <p>To get some information about me</p>
               <a href="https://instagram.com/_achrian" target="_blank" class="btn btn-primary btn-sm text-white m-0">My Instagram</a>
            </div>
         </div>
         
      </div>
   </div>
</nav>