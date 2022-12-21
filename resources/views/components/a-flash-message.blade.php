@if(session()->has('message'))

<div x-data="{show: true}" x-init="setTimeout(()=>show = false, 3000)" x-show="show" class="alert alert-success alert-dismissible a-message">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{ session('message') }}
</div>

@endif