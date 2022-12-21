<x-admin-layout >
    <?php $number = 1 ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div
            class="d-sm-flex align-items-center justify-content-between mb-4"
            >
            <h1 class="h3 mb-0 text-gray-800">Manage Emergencies</h1>
            <a
                href="/emergency/create"
                class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"
                ><i class="fas fa-exclamation-triangle text-white-50 mr-2"></i> Add Emergency Type</a
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
            <h6 class="m-0 font-weight-bold text-danger">
              Pending Reported Emergencies
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
                    <th>Emergency Id</th>
                    <th>User_ID</th>
                    <th>Emergency Type</th>
                    <th>Location</th>
                    <th>Address (IP)</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($emergencies as $emergency)
                  @if ($emergency->status == 'pending')
                    <tr>
                        <td>{{ $number++ }}</td>
                        <td>{{ $emergency->id }}</td>
                        <td>user_id</td>
                        <td>{{ $emergency->name }}</td>
                        <td>{{ $emergency->region }}</td>
                        <td>{{ $emergency->ip }}</td>
                        <td>{{ $emergency->description }}</td>
                        <td>{{ $emergency->status }}</td>
                        <td>{{ date('M j, Y h:ia', strtotime($emergency->created_at)) }}</td>
                        <td>
                          <div class="d-inline-flex">
                            <a class="btn btn-sm btn-outline-primary mr-1" href="/emergency/{{ $emergency->id }}"><i class="fas fa-book"></i> Review</a>

                          <form action="/emergency/{{ $emergency->id }}/update" method="POST" class="form">
                              @csrf
                              @method('PUT')
                              <input type="text" name="status" value="active" hidden>
                              <button class="btn btn-sm btn-outline-success mr-1" name="submit"><i class="fas fa-arrow-right"></i> Activate</button>
                          </form>

                          {{-- <form action="/emergency/{{ $emergency->id }}" method="POST" class="form">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-sm btn-outline-danger ms-2"><i class="fas fa-trash"></i> Delete</button>
                          </form> --}}
                        </td>
                    </tr>

                    {{-- Other data for js --}}
                    <input id="ID" type="text" value="{{ $emergency->id }}" hidden>
                    <input id="LAT" type="text" value="{{ $emergency->lat }}" hidden>
                    <input id="LNG" type="text" value="{{ $emergency->lng }}" hidden>
                    <input id="C-TYPE" type="text" value="{{ $emergency->name }}" hidden>
                    <input id="REGION" type="text" value="{{ $emergency->region }}" hidden>
                    {{-- Other data for js --}}

                    @endif
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

         <!-- DataTales Example -->
         <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">
              Attending to Emergencies
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
                    <th>Emergency Id</th>
                    <th>User_ID</th>
                    <th>Emergency Type</th>
                    <th>Location</th>
                    <th>Address (IP)</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($emergencies as $emergency)
                  @if ($emergency->status == 'active')
                    <tr>
                        <td>{{ $number++ }}</td>
                        <td>{{ $emergency->id }}</td>
                        <td>user_id</td>
                        <td>{{ $emergency->name }}</td>
                        <td>{{ $emergency->region }}</td>
                        <td>{{ $emergency->ip }}</td>
                        <td>{{ $emergency->description }}</td>
                        <td>{{ $emergency->status }}</td>
                        <td>{{ date('M j, Y h:ia', strtotime($emergency->created_at)) }}</td>
                        <td>
                          <div class="d-inline-flex">
                            <a class="btn btn-sm btn-outline-primary mr-1" href="/emergency/{{ $emergency->id }}"><i class="fas fa-book"></i> Review</a>

                            <form action="/emergency/{{ $emergency->id }}/close" method="POST" class="form">
                              @csrf
                              @method('PUT')
                              <input type="text" name="status" value="closed" hidden>
                              <button class="btn btn-sm btn-outline-danger mr-1" name="submit"><i class="fas fa-arrow-right"></i> close</button>
                          </form>

                          {{-- <form action="/emergency/{{ $emergency->id }}" method="POST" class="form">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-sm btn-outline-danger ms-2"><i class="fas fa-trash"></i> Delete</button>
                          </form> --}}
                        </td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

         <!-- DataTales Example -->
         <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">
              Closed Emergencies
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
                    <th>Emergency Id</th>
                    <th>User_ID</th>
                    <th>Emergency Type</th>
                    <th>Location</th>
                    <th>Address (IP)</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Closed By</th>
                    <th>Created</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($emergencies as $emergency)
                  @if ($emergency->status == 'closed')
                    <tr>
                        <td>{{ $number++ }}</td>
                        <td>{{ $emergency->id }}</td>
                        <td>user_id</td>
                        <td>{{ $emergency->name }}</td>
                        <td>{{ $emergency->region }}</td>
                        <td>{{ $emergency->ip }}</td>
                        <td>{{ $emergency->description }}</td>
                        <td>{{ $emergency->status }}</td>
                        <td>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</td>
                        <td>{{ date('M j, Y h:ia', strtotime($emergency->created_at)) }}</td>
                        <td>
                          <div class="d-inline-flex">
                            <a class="btn btn-sm btn-outline-primary mr-1" href="/emergency/{{ $emergency->id }}"><i class="fas fa-book"></i> Review</a>

                          <form action="/emergency/{{ $emergency->id }}" method="POST" class="form">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-sm btn-outline-danger ms-2"><i class="fas fa-trash"></i> Delete</button>
                          </form>
                        </td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="container">
            <div class="mt-3 p-3 pagination-md">
                {{ $emergencies->links() }}
            </div>
        </div>

      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
</x-admin-layout>