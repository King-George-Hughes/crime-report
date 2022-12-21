<x-admin-layout>
    <p class="display-4">Create Crime Type</p>

    <div class="container">
        <div class="row">
            
            <div class="col-lg-6 mt-2">
                @foreach ($crimeTypes as $crimeType)
                    <!-- Collapsable Card Example -->
                    <div class="card shadow mb-4">
                        <!-- Card Header - Accordion -->
                        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                            role="button" aria-expanded="true" aria-controls="collapseCardExample">
                            <h6 class="m-0 font-weight-bold text-warning">{{ $crimeType->name }}</h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse show" id="collapseCardExample">
                            <div class="card-body">
                                {{ $crimeType->description }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-lg-6">
                <form action="/crimes/create" method="POST" class="form">
                    @csrf
                    <div class="form-group">
                        <label  for="crime-type">Crime Type</label>
                        <input type="text" name="name" class="form-control">

                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label  for="description">Description</label>
                        <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>

                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div><br>

                    <a class="btn btn-danger text-white d-inline-block mr-3" href="/admin/manage-crimes"> &lang;&lang; Back</a>
                    <button class="btn btn-primary" name="submit"><i class="fas fa-arrow-up"></i> Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>