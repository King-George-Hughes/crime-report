<x-admin-layout>
    <div class="container">
      {{-- Other data for js --}}
      <input id="ID" type="text" value="{{ $emergency->id }}" hidden>
      <input id="LAT" type="text" value="{{ $emergency->lat }}" hidden>
      <input id="LNG" type="text" value="{{ $emergency->lng }}" hidden>
      <input id="C-TYPE" type="text" value="{{ $emergency->name }}" hidden>
      <input id="REGION" type="text" value="{{ $emergency->region }}" hidden>
      {{-- Other data for js --}}
  
      <h1 class="display-5 text-center mt-2">Location of Residence</h1>
      <x-current-map />
 
      <h1 class="display-5 text-center mt-4">Emergency Detail</h1>
      <div class="card mb-2 py-0 px-2 border-left-primary">
         <div class="card-body d-inline-flex align-items-center justify-content-between">
             <h5>Emergency Id: <span class="text-warning">{{ $emergency->id }}</span></h5>
             <h5>Status: 
                 @if ($emergency->status == 'pending')
                     <span class="text-danger text-capitalize">{{ $emergency->status }}</span>
                     @else
                     <span class="text-success text-capitalize">{{ $emergency->status }}</span>
                 @endif
             </h5>
             <h5>Emergency Type: <span class="text-warning">{{ $emergency->name }}</span></h5>
         </div>
     </div>
 
      <div class="card mb-2 py-0 px-2 border-left-primary">
         <div class="card-body d-inline-flex align-items-center justify-content-between">
             <h5>IP Address: <span class="text-warning">{{ $emergency->ip }}</span></h5>
             <h5><span class="text-secondary">{{ date('M j, Y h:ia', strtotime($emergency->created_at)) }}</span></h5>
             <h5>Region: <span class="text-warning">{{ $emergency->region }}</span></h5>
         </div>
     </div>
 
     <div class="card mb-2 py-3 border-bottom-primary">
         <div class="card-body">
             <h5 class="text-center"><span class="font-weight-bold ">Description:</span> <br><br><span class="text-muted">{{ $emergency->description }}</span></h5>
         </div>
     </div>
  
      <a class="btn btn-primary text-white d-inline-block mr-3 my-5" href="/admin/manage-emergencies"> &lang;&lang; Back to Emergencies</a>
    </div>
 </x-admin-layout>