@if(session()->has('message'))

<div x-data="{show: true}" x-init="setTimeout(()=>show = false, 3000)" x-show="show" class="alert alert-success a-message alert-dismissible fade show text-center" role="alert">
    {{ session('message') }}
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif


      