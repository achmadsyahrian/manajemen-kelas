@extends('layouts.main')
@section('content')
<div class="row">
   <div class="col-lg-12 col-md-12">
      <!-- page statustic card start -->
      <div class="row">
         <div class="col-sm-12">
            <x-widget color="green">
               <x-slot name="data">237</x-slot>
               <x-slot name="title">Successful Transaction</x-slot>
               <x-slot name="icon">
                  <i class="feather icon-check-circle f-28 text-c-green"></i>
               </x-slot>
            </x-widget>
         </div>
         <div class="col-sm-6">
            <div class="card">
               <div class="card-body">
                  <div class="row align-items-center">
                        <div class="col-8">
                           <h4 class="text-c-yellow">Rp. 17.250.520,00</h4>
                           <h6 class="text-muted m-b-0">Income (Total)</h6>
                        </div>
                        <div class="col-4 text-right">
                           <i class="fa-solid fa-chart-pie f-28 text-c-yellow"></i>
                        </div>
                  </div>
               </div>
               <div class="card-footer bg-c-yellow">
                  <a href="transaction">
                     <div class="row align-items-center">
                           <div class="col-9">
                              <p class="text-white m-b-0">View More</p>
                           </div>
                           <div class="col-3 text-right">
                              <i class="feather icon-eye text-white f-16"></i>
                           </div>
                     </div>
                  </a>
               </div>
            </div>
         </div>
         <div class="col-sm-6">
            <div class="card">
               <div class="card-body">
                  <div class="row align-items-center">
                        <div class="col-8">
                           <h4 class="text-c-blue">Rp. 4.470.200,00</h4>
                           <h6 class="text-muted m-b-0">Income (Last Month)</h6>
                        </div>
                        <div class="col-4 text-right">
                           <i class="fa-solid fa-chart-area f-28 text-c-blue"></i>
                        </div>
                  </div>
               </div>
               <div class="card-footer bg-c-blue">
                  <a href="transaction">
                     <div class="row align-items-center">
                        <div class="col-9">
                           <p class="text-white m-b-0">View More</p>
                        </div>
                        <div class="col-3 text-right">
                           <i class="feather icon-eye text-white f-16"></i>
                        </div>
                     </div>
                  </a>
               </div>
            </div>
         </div>
      </div>
      <!-- page statustic card end -->
   </div>
</div>
@endsection