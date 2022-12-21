<x-admin-layout>
   <div class="container">
     {{-- Other data for js --}}
     <input id="ID" type="text" value="{{ $crime->id }}" hidden>
     <input id="LAT" type="text" value="{{ $crime->lat }}" hidden>
     <input id="LNG" type="text" value="{{ $crime->lng }}" hidden>
     <input id="C-TYPE" type="text" value="{{ $crime->name }}" hidden>
     <input id="REGION" type="text" value="{{ $crime->region }}" hidden>
     {{-- Other data for js --}}
 
     {{-- View Maps --}}
     <h1 class="display-5 text-center mt-2">Location of Residence</h1>
     <div class="col-lg-12 mt-1">
            <!-- Collapsable Card Example -->
            <div class="card shadow mb-1">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header" data-toggle="collapse"
                    role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-warning">Location of Residence</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                    <div class="card-body">
                        <x-current-map />
                    </div>
                </div>
            </div>
     </div>

     {{-- View Crime --}}
     <h1 class="display-5 text-center mt-4">Crime Detail</h1>
     <div class="card mb-2 py-0 px-2 border-left-primary">
        <div class="card-body d-inline-flex align-items-center justify-content-between">
            <h5>Crime Id: <span class="text-warning">{{ $crime->id }}</span></h5>
            <h5>Status: 
                @if ($crime->status == 'pending')
                    <span class="text-danger text-capitalize">{{ $crime->status }}</span>
                    @else
                    <span class="text-success text-capitalize">{{ $crime->status }}</span>
                @endif
            </h5>
            <h5>Crime Type: <span class="text-warning">{{ $crime->name }}</span></h5>
        </div>
    </div>

     <div class="card mb-2 py-0 px-2 border-left-primary">
        <div class="card-body d-inline-flex align-items-center justify-content-between">
            <h5>IP Address: <span class="text-warning">{{ $crime->ip }}</span></h5>
            <h5><span class="text-secondary">{{ date('M j, Y h:ia', strtotime($crime->created_at)) }}</span></h5>
            <h5>Region: <span class="text-warning">{{ $crime->region }}</span></h5>
        </div>
    </div>

    <div class="card mb-2 py-3 border-bottom-primary">
        <div class="card-body">
            <h5 class="text-center"><span class="font-weight-bold">Description:</span> <br><br><span class="text-muted">{{ $crime->description }}</span></h5>
        </div>
    </div>

    {{-- Reproters Details --}}
    @foreach ($users as $user)
        @if ($user->id == $crime->user_id)
        <h1 class="display-5 text-center mt-4">Reporter's Details</h1>
        <div class="card mb-2 py-0 px-2 border-left-primary">
           <div class="card-body d-inline-flex align-items-center justify-content-between">
               <h5>User Id: <span class="text-warning">{{ $user->id }}</span></h5>
               <h5>Name: 
                   <span class="text-danger text-capitalize">{{ $user->first_name }} {{ $user->last_name }}</span>
                   <span class="text-success text-capitalize">{{ $user->status }}</span>
               </h5>
               <h5>Email: <span class="text-warning">{{ $user->email }}</span></h5>
           </div>
        </div>
   
        <div class="card mb-2 py-0 px-2 border-left-primary">
           <div class="card-body d-inline-flex align-items-center justify-content-between">
               <h5>Contact: <span class="text-warning">{{ $user->contact }}</span></h5>
               <h5>DOB: <span class="text-warning">{{ date('M j, Y', strtotime($user->dob)) }}</span></h5>
           </div>
       </div>
        @endif
    @endforeach

 
     <a class="btn btn-primary text-white d-inline-block mr-3 my-5" href="/admin/manage-crimes"> &lang;&lang; Back to Crimes</a>

     {{-- ANalysis --}}
     @if ($crime->status == 'active')
     <h1 class="display-5 text-center mt-4">Crime Analysis</h1>
     <form action="/analysis/store" method="POST" class="form">
        @csrf
        <div class="card mb-2 py-0 px-2 border-left-primary">
            <div class="card-body d-inline-flex align-items-center justify-content-between">
                <h5>Arrested: </span></h5>
                <div class="d-inline-flex align-items-center justify-content-between">
                    <div class="form-check mr-3">
                        <input class="form-check-input" type="radio" name="arrest" value="YES" id="YES-ARREST" value="option1">
                        <label class="form-check-label" for="YES-ARREST">
                            YES
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="arrest" value="NO" id="NO-ARREST" value="option1">
                        <label class="form-check-label" for="NO-ARREST">
                            NO
                        </label>
                    </div>
                    <input type="text" name="officer_in_charge" class="form-control ml-5" placeholder="Officer in charge">
                </div>
            </div>
            @error('arrest')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div> 
        <div class="card mb-2 py-0 px-2 border-left-primary">
            <div class="card-body d-inline-flex align-items-center justify-content-between">
                <h5>Court: </span></h5>
                <div class="d-inline-flex align-items-center justify-content-between">
                    <div class="form-check mr-3">
                        <input class="form-check-input" type="radio" name="court" value="YES" id="YES-COURT" value="option1">
                        <label class="form-check-label" for="YES-COURT">
                            YES
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="court" value="NO" id="NO-COURT" value="option1">
                        <label class="form-check-label" for="NO-COURT">
                            NO
                        </label>
                    </div>
                </div>
            </div>
            @error('court')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div> 
        <div class="card mb-2 py-0 px-2 border-left-primary">
            <div class="card-body d-inline-flex align-items-center justify-content-between">
                <h5>Remand: </span></h5>
                <div class="d-inline-flex align-items-center justify-content-between">
                    <div class="form-check mr-3">
                        <input class="form-check-input" type="radio" name="remand" value="YES" id="YES-REMAND" value="option1">
                        <label class="form-check-label" for="YES-REMAND">
                            YES
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="remand" value="NO" id="NO-REMAND" value="option1">
                        <label class="form-check-label" for="NO-REMAND">
                            NO
                        </label>
                    </div>
                </div>
            </div>
            @error('remand')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div> 
        <div class="card mb-2 py-0 px-2 border-left-primary">
            <div class="card-body d-inline-flex align-items-center justify-content-between">
                <h5>Jailed: </span></h5>
                <div class="d-inline-flex align-items-center justify-content-between">
                    <div class="form-check mr-3">
                        <input class="form-check-input" type="radio" name="jailed" value="YES" id="YES-JAILED" value="option1" >
                        <label class="form-check-label" for="YES-JAILED">
                            YES
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jailed" value="NO" id="NO-JAILED" value="option1" >
                        <label class="form-check-label" for="NO-JAILED">
                            NO
                        </label>
                    </div>
                </div>
            </div>
            @error('jailed')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div> 
        <div class="card mb-2 py-0 px-2 border-left-primary">
            <div class="card-body d-inline-flex align-items-center justify-content-between">
                <h5>Remarks: </span></h5>
                <div class="">
                    <div class="">
                        <textarea id="" name="remarks" cols="60" rows="10" class="form-control"></textarea>
                    </div>
                </div>
            </div>
        </div> 
        <input type="text" name="crime_id" value="{{ $crime->id }}" hidden>
        <button class="btn btn-primary" type="submit" name="submit">Submit Report</button>
     </form>

    <form action="/crimes/{{ $crime->id }}/close" method="POST" class="form ">
        @csrf
        @method('PUT')
        <input type="text" name="status" value="closed" hidden>
        <button class="btn btn-danger mr-1 mt-4" name="submit"><i class="fas fa-arrow-right"></i> Close Case</button>
    </form>
     @endif


     {{-- Closed --}}
   @if ($crime->status == 'closed')
   @foreach ($analysis as $analyze)
    @if ($analyze->crime_id == $crime->id)
    <h1 class="display-5 text-center mt-4">Crime Analysis Details</h1>
    <div class="card mb-2 py-0 px-2 border-left-primary">
        <div class="card-body d-inline-flex align-items-center justify-content-between">
            <h5>Arrested: </span></h5>
            <div class="d-inline-flex align-items-center justify-content-between">
                <div class="form-check mr-3">
                    <input class="form-check-input" type="radio" name="arrest" value="YES" id="YES-ARREST" value="option1" disabled checked>
                    <label class="form-check-label" for="YES-ARREST">
                        @if( $analyze->arrest == 'YES' )
                            YES
                        @else
                            NO
                        @endif
                    </label>
                </div>
                <input type="text" name="officer_in_charge" class="form-control ml-5" value="{{ $analyze->officer_in_charge }}" readonly>
            </div>
        </div>
    </div> 
    <div class="card mb-2 py-0 px-2 border-left-primary">
        <div class="card-body d-inline-flex align-items-center justify-content-between">
            <h5>Court: </span></h5>
            <div class="d-inline-flex align-items-center justify-content-between">
                <div class="form-check mr-3">
                    <input class="form-check-input" type="radio" name="court" value="YES" id="YES-COURT" value="option1" disabled checked>
                    <label class="form-check-label" for="YES-COURT">
                        @if( $analyze->court == 'YES' )
                            YES
                        @else
                            NO
                        @endif
                    </label>
                </div>
            </div>
        </div>
    </div> 
    <div class="card mb-2 py-0 px-2 border-left-primary">
        <div class="card-body d-inline-flex align-items-center justify-content-between">
            <h5>Remand: </span></h5>
            <div class="d-inline-flex align-items-center justify-content-between">
                <div class="form-check mr-3">
                    <input class="form-check-input" type="radio" name="remand" value="YES" id="YES-REMAND" value="option1" disabled checked>
                    <label class="form-check-label" for="YES-REMAND">
                        @if( $analyze->remand == 'YES' )
                            YES
                        @else
                            NO
                        @endif
                    </label>
                </div>
            </div>
        </div>
    </div> 
    <div class="card mb-2 py-0 px-2 border-left-primary">
        <div class="card-body d-inline-flex align-items-center justify-content-between">
            <h5>Jailed: </span></h5>
            <div class="d-inline-flex align-items-center justify-content-between">
                <div class="form-check mr-3">
                    <input class="form-check-input" type="radio" name="jailed" value="YES" id="YES-JAILED" value="option1"  disabled checked>
                    <label class="form-check-label" for="YES-JAILED">
                        @if( $analyze->jailed == 'YES' )
                            YES
                        @else
                            NO
                        @endif
                    </label>
                </div>
            </div>
        </div>
    </div> 
    <div class="card mb-2 py-0 px-2 border-left-primary">
        <div class="card-body d-inline-flex align-items-center justify-content-between">
            <h5>Remarks: </span></h5>
            <div class="">
                <div class="">
                    <textarea id="" name="remarks" cols="60" rows="10" class="form-control" readonly>{{ $analyze->remarks }}</textarea>
                </div>
            </div>
        </div>
    </div>
    @endif 
   @endforeach
   @endif

   </div>


   

</x-admin-layout>