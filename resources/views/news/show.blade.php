<x-admin-layout>
    <p class="display-4">Create News</p>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <form action="/news" method="POST" enctype="multipart/form-data" class="form">
                    @csrf
                    <div class="form-group">
                        <label  for="image">Image</label>
                        <input type="file" name="image" class="form-control">

                        @error('image')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label  for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}">

                        @error('title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label  for="title">Description</label>
                        <textarea name="description" class="form-control" id="" cols="30" rows="10">{{ old('description') }}</textarea>

                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div><br>

                    <a class="btn btn-danger text-white d-inline-block mr-3" href="/admin/manage-news"> &lang;&lang; Back</a>
                    <button class="btn btn-primary" name="submit"><i class="fas fa-arrow-up"></i> Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>