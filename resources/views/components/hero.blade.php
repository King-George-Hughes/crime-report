
@props(['allCrimeTypes','location' , 'allEmergencyTypes'])
{{-- Report A Crime --}}
<div class="modal fade" id="reportCrime" tabindex="-1" aria-labelledby="reportCrimeTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h1 class="modal-title fs-5 text-uppercase" id="reportCrimeTitle">Report A Crime</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/crimes" method="POST" class="form">
                @csrf
                <article class="text-muted h4">NOTE:</article>
                <h5 class="text-danger">Contact Our Emergency Lines for a faster Response:</h5>
                <ul class="list-group">
                    <li class="list list-group-item d-inline-flex justify-content-between"><a class="text-decoration-none" href="#">122 / 191 / 18555</a><span class="float-right">Police</span></li>
                    <small class="text-muted mt-1">Others:</small>
                    <li class="list list-group-item d-inline-flex justify-content-between"><a class="text-decoration-none" href="#">122 / 192 / 193</a><span class="float-right">Fire / Ambulance</span></li>
                    <li class="list list-group-item d-inline-flex justify-content-between"><a class="text-decoration-none" href="#">122</a><span class="float-right">Coronavirus Hotline</span></li>
                </ul>
                <p class="text-muted mt-3">You are adviced to report emergencies that needs only the attension of the police such as "Robbery", "Sexual Harassment" or any related emergencies.</p>

                <label for="emergency" class="text-muted h4">Crime Type:</label>
                <select name="name" id="" class="form-control">
                    @foreach ($allCrimeTypes as $allCrimeType)
                        <option value="{{ $allCrimeType->name }}" class="text-capitalize">{{ $allCrimeType->name }}</option>
                    @endforeach
                    <option value="Other" class="text-capitalize">Other</option>
                </select>
                <label for="description" class="text-muted h4 mt-3">Description:</label>
                <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                {{--  --}}
                @if (auth()->user())
                    <input type="text" name="user_id" value="{{ auth()->user()->id }}" hidden>
                @endif

                @if($location)
                    <input type="text" name="ip" value="{{ $location->ip }}" hidden>
                    <input type="text" name="region" value="{{ $location->regionName }}" hidden>
                    <input type="text" class="Latitude" name="lat" value="" hidden>
                    <input type="text" class="Longitude" name="lng" value="" hidden>
                @endif
                {{--  --}}
            </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="submit" class="btn btn-warning">Report Crime</button>
        </div>
    </form>
      </div>
    </div>
  </div>

  {{-- Report An Emergency --}}
<div class="modal fade" id="exampleModalCenteredScrollable" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header bg-danger text-light">
          <h1 class="modal-title fs-5 text-uppercase" id="exampleModalCenteredScrollableTitle">Report An Emergency</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/emergency" method="POST" class="form">
                @csrf
                <article class="text-muted h4">NOTE:</article>
                <h5 class="text-danger">Contact Our Emergency Lines for a faster Response:</h5>
                <ul class="list-group">
                    <li class="list list-group-item d-inline-flex justify-content-between"><a class="text-decoration-none" href="#">122 / 191 / 18555</a><span class="float-right">Police</span></li>
                    <small class="text-muted mt-1">Others:</small>
                    <li class="list list-group-item d-inline-flex justify-content-between"><a class="text-decoration-none" href="#">122 / 192 / 193</a><span class="float-right">Fire / Ambulance</span></li>
                    <li class="list list-group-item d-inline-flex justify-content-between"><a class="text-decoration-none" href="#">122</a><span class="float-right">Coronavirus Hotline</span></li>
                </ul>
                <p class="text-muted mt-3">You are adviced to report emergencies that needs only the attension of the police such as "Traffic", "Accident" or any related emergencies.</p>

                <label for="emergency" class="text-muted h4">Emergency Type:</label>
                <select name="name" id="" class="form-control">
                    @foreach ($allEmergencyTypes as $allEmergencyType)
                        <option value="{{ $allEmergencyType->name }}" class="text-capitalize">{{ $allEmergencyType->name }}</option>
                    @endforeach
                    <option value="Other" class="text-capitalize">Other</option>
                </select>
                <label for="description" class="text-muted h4 mt-3">Description:</label>
                <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                 {{--  --}}
                 {{-- @if (auth()->user())
                    <input type="text" name="user_id" value="{{ auth()->user()->id }}">
                @endif --}}
                
                 @if($location)
                    <input type="text" name="ip" value="{{ $location->ip }}" hidden>
                    <input type="text" name="region" value="{{ $location->regionName }}" hidden>
                    <input type="text" class="Latitude" name="lat" value="" hidden>
                    <input type="text" class="Longitude" name="lng" value="" hidden>
                @endif
                {{--  --}}
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-md btn-danger">Report Emergency</button>
            </div>
        </div>
    </form>
    </div>
  </div>


  {{-- Main Div Container --}}
<section class="py-1 text-center container">
    <div class="row py-lg-5 d-flex align-items-start justify-content-center">
        <div class="col-lg-6 col-md-8 mx-auto">
            <div class="bd-example-snippet bd-code-snippet">
                <nav>
                    <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-report" type="button" role="tab" aria-controls="nav-report"
                            aria-selected="true">Roporting</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-crime" type="button" role="tab" aria-controls="nav-crime"
                            aria-selected="false">About Crime</button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-emergency" type="button" role="tab"
                            aria-controls="nav-emergency" aria-selected="false">About
                            Emergency</button>
                    </div>
                </nav>
                <div class="tab-content text-white mt-3" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-report" role="tabpanel"
                        aria-labelledby="nav-report-tab">
                        <h4 class="display-6 mt-2">Report Crime or Emergency</h4>
                        <p class="text-white">To report a crime without an account will be recorded as
                            a crime tip or a whisle blower to the police and to report a crime with a
                            registered account will br recorded and saved.
                        </p>
                        <div class="row mt-3">
                            <div class="col-md-12">
                            </div>
                            <div class="col-lg-6 mb-2">
                                <a href="#" class="btn btn-warning btn-block w-100" data-bs-toggle="modal" data-bs-target="#reportCrime">
                                    <i class="fas fa-book me-1"></i> Report A Crime
                                </a>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <a href="#" class="btn btn-danger btn-block w-100" data-bs-toggle="modal" data-bs-target="#exampleModalCenteredScrollable">
                                    <i class="fas fa-exclamation-triangle me-1"></i> Report An Emergency
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade text-white" id="nav-crime" role="tabpanel"
                        aria-labelledby="nav-crime-tab">
                        <p>This is some placeholder content the <strong>Profile tab's</strong> associated
                            content. Clicking
                            another tab will toggle the visibility of this one for the next. The tab
                            JavaScript swaps classes to
                            control the content visibility and styling. You can use it with tabs, pills, and
                            any other
                            <code>.nav</code>-powered navigation.
                        </p>
                    </div>
                    <div class="tab-pane fade text-white" id="nav-emergency" role="tabpanel"
                        aria-labelledby="nav-emergency-tab">
                        <p>This is some placeholder content the <strong>Contact tab's</strong> associated
                            content. Clicking
                            another tab will toggle the visibility of this one for the next. The tab
                            JavaScript swaps classes to
                            control the content visibility and styling. You can use it with tabs, pills, and
                            any other
                            <code>.nav</code>-powered navigation.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-8 mx-auto my-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h2 class="h5">
                            Police Station Near You
                        </h2>
                    </div>
                </div>
                <div class="card-body p-0">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31766.178378828357!2d-0.196665210940398!3d5.600620401107324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdf9afad44b8ae3%3A0x2db0fa1df2a3b2d1!2sAirport%20City%2C%20Accra!5e0!3m2!1sen!2sgh!4v1669046435810!5m2!1sen!2sgh"
                        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="card-footer">
                    <small class="small">Search By Current Location</small>
                </div>
            </div>
        </div>
    </div>
</section>