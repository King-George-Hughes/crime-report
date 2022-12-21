@props(['new'])

<div class="col">
    <div class="card shadow-sm">
        <div class="card-header">
            <img src="{{ $new->image ? asset('storage/' . $new->image) : asset('assets/images/bg.jpg') }}" alt="" class="img img-fluid">
        </div>

        <div class="card-body">
            <div class="card card-title">
                <h2 class="h4 text-center">
                    @php
                    if(strlen($new->title) > 50){
                        $PostTitle = substr($new->title, 0, 25) . " ...";
                        echo htmlentities($PostTitle); 
                    }else{
                    echo htmlentities($new->title);
                    }                                
                @endphp
                </h2>
            </div>
            <p class="card-text">
                @php
                    if(strlen($new->description) > 150){
                        $PostDescription = substr($new->description, 0, 150) . " .........";
                        echo htmlentities($PostDescription); 
                    }else{
                    echo htmlentities($new->description);
                    }                                
                @endphp
            </p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a class="btn btn-sm btn-outline-secondary text-decoration-none" href="/{{ $new->id }}">View  &rang;&rang;&rang;</a>
                </div>
                <small class="text-muted">{{ date('M d, Y', strtotime($new->created_at)) }}</small>
            </div>
        </div>
    </div>
</div>