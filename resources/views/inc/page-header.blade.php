<div class="page-header">
   <div class="page-block">
      <div class="row align-items-center">
         <div class="col-md-12">
            <div class="page-header-title">
               <h4 class="m-b-10 text-white"> 
                  @if(count(request()->segments()) > 1)
                     <a href="{{ url()->previous() }}" class="btn btn-icon text-light mb-1" style="width:25px; height:25px;">
                        <i class="fas fa-arrow-left" style="font-size: 14px;"></i>
                     </a>
                  @endif
                  Informatika Malam A
               </h4>   
            </div>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="/"><i class="feather icon-home"></i></a></li>
               <li class="breadcrumb-item">
                  <a href="/{{ Route::currentRouteName() }}">
                     {{ Str::ucfirst(Route::currentRouteName()) }}
                  </a>
               </li>
            </ul>
         </div>   
      </div>
   </div>
</div>