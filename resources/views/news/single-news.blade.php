<x-layout >

    <div class="container">
        <div class="album py-3 bg-light">
            <div class="row">
                <div class="col-lg-9">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <img src="{{ $new->image ? asset('storage/' . $new->image) : asset('assets/images/bg.jpg') }}" alt="" class="img img-fluid">
                        </div>
                
                        <div class="card-body">
                            <div class="card card-title">
                                <h2 class="h4 text-center">{{ $new->title }}</h2>
                            </div>
                            <p class="card-text">{{ $new->description }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                </div>
                                <small class="text-muted">{{ date('M d, Y', strtotime($new->created_at)) }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <img src="{{ $new->image ? asset('storage/' . $new->image) : asset('assets/images/bg.jpg') }}" alt="" class="img img-fluid">
                        </div>
                
                        <div class="card-body">
                            <div class="card card-title">
                                <h2 class="h4 text-center">{{ $new->title }}</h2>
                            </div>
                            <p class="card-text">{{ $new->description }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                </div>
                                <small class="text-muted">{{ date('M d, Y', strtotime($new->created_at)) }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <img src="{{ $new->image ? asset('storage/' . $new->image) : asset('assets/images/bg.jpg') }}" alt="" class="img img-fluid">
                        </div>
                
                        <div class="card-body">
                            <div class="card card-title">
                                <h2 class="h4 text-center">{{ $new->title }}</h2>
                            </div>
                            <p class="card-text">{{ $new->description }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                </div>
                                <small class="text-muted">{{ date('M d, Y', strtotime($new->created_at)) }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>