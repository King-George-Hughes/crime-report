<x-admin-layout>
    <style>
        .imgManage{
            max-height: 120px
        }
    </style>
    <?php $number = 1 ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div
            class="d-sm-flex align-items-center justify-content-between mb-4"
            >
            <h1 class="h3 mb-0 text-gray-800">Manage News</h1>
            <a
                href="/news/create"
                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                ><i class="fas fa-blog text-white-50 mr-2"></i> Add News</a
            >
        </div>
        <p class="mb-4">
            DataTables is a third party plugin that is used to generate the
            demo table below. For more information about DataTables, please
            visit the
        </p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
              List of Posted News
            </h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table
                class="table table-bordered"
                id="dataTable"
                width="100%"
                cellspacing="0"
              >
                <thead>
                  <tr>
                    <th>#</th>
                    <th>News_Id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Created</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($news as $new)
                    <tr>
                        <td>{{ $number++ }}</td>
                        <td>{{ $new->id }}</td>
                        <td>{{ $new->title }}</td>
                        <td>{{ $new->description }}</td>
                        <td><img 
                            class="img img-fluid imgManage" 
                            src="{{ asset('storage/'. $new->image) }}" 
                            alt="{{ $new->image }}">
                        </td>
                        <td>{{ date('M j, Y h:ia', strtotime($new->created_at)) }}</td>
                        <td>
                            <div class="d-inline-flex">
                              <a class="btn btn-sm btn-outline-warning mr-1" href="/news/{{ $new->id }}/edit"><i class="fas fa-edit"></i> Edit</a>

                            <form action="/news/{{ $new->id }}" method="POST" class="form">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger ms-2"><i class="fas fa-trash"></i> Delete</button>
                            </form>

                            <a class="btn btn-sm btn-outline-info ml-1" href="/{{ $new->id }}"><i class="fas fa-video"></i> Preview</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="container">
            <div class="mt-3 p-3 pagination-md">
                {{ $news->links() }}
            </div>
        </div>

      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->

</x-admin-layout>