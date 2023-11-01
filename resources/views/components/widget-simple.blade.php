<div class="card">
    <div class="card-body">
       <div class="row align-items-center">
          <div class="col-8">
             <h6 class="text-muted m-b-0">Status : <span class="text-c-{{ $color }}">{{ Str::ucfirst($status) }}</span></h6>
          </div>
          <div class="col-4 text-right">
          {{ $icon }}
          </div>
       </div>
    </div>
 </div>