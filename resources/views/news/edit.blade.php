<x-admin-layout>
    {{-- <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" /> --}}

    <p class="display-4">Edit News</p>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <form action="/news/{{ $new->id }}" method="POST" enctype="multipart/form-data" class="form">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label  for="image">Upload New Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <span>Previous Image</span><br>
                    <img src="{{ $new->image ? asset('storage/' . $new->image) : asset('assets/images/bg.jpg') }}" alt="" class="img img-fluid" width="250px">

                    <div class="form-group">
                        <label  for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $new->title }}">

                        @error('title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label  for="title">Description</label>
                        <textarea name="description" class="form-control" id="" cols="30" rows="10">{{ $new->description }}</textarea>

                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div><br>

                    <a class="btn btn-danger text-white d-inline-block mr-3" href="/admin/manage-news"> &lang;&lang; Back</a>
                    <button class="btn btn-primary" name="submit"><i class="fas fa-arrow-up"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>