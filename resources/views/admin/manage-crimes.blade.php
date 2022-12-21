<x-admin-layout>
    <?php $number = 1 ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div
            class="d-sm-flex align-items-center justify-content-between mb-4"
            >
            <h1 class="h3 mb-0 text-gray-800">Manage Crimes</h1>
            <a
                href="/crimes/create"
                class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"
                ><i class="fas fa-clipboard-list text-white-50 mr-2"></i> Add Crime Type</a
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
            <h6 class="m-0 font-weight-bold text-warning">
              Pending Reported Crimes
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
                    <th>Crime ID</th>
                    <th>User_ID</th>
                    <th>Crime Type</th>
                    <th>Location</th>
                    <th>Address (IP)</th>
                    <th>Description</th>
                    <th>status</th>
                    <th>Created</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($crimes as $crime)
                    @if ($crime->status == 'pending')
                      <tr>
                        <td>{{ $number++ }}</td>
                        <td>{{ $crime->id }}</td>
                        <td>
                          @if ($crime->user_id == '')
                            N/A
                            @else
                            {{ $crime->user_id }}
                          @endif
                        </td>
                        <td>{{ $crime->name }}</td>
                        <td>{{ $crime->region }}</td>
                        <td>{{ $crime->ip }}</td>
                        <td>{{ $crime->description }}</td>
                        <td>{{ $crime->status }}</td>
                        <td>{{ date('M j, Y h:ia', strtotime($crime->created_at)) }}</td>
                        <td>
                          <div class="d-inline-flex">
                            <a class="btn btn-sm btn-outline-primary mr-1" href="/crimes/{{ $crime->id }}"><i class="fas fa-book"></i> Review</a>

                          <form action="/crimes/{{ $crime->id }}/update" method="POST" class="form">
                              @csrf
                              @method('PUT')
                              <input type="text" name="status" value="active" hidden>
                              <button class="btn btn-sm btn-outline-success mr-1" name="submit"><i class="fas fa-arrow-right"></i> Activate</button>
                          </form>

                          {{-- <form action="/crimes/{{ $crime->id }}" method="POST" class="form">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-sm btn-outline-danger ms-2"><i class="fas fa-trash"></i> Delete</button>
                          </form> --}}

                          </div>
                        </td>
                      </tr>

                      {{-- Other data for js --}}
                      <input id="ID" type="text" value="{{ $crime->id }}" hidden>
                      <input id="LAT" type="text" value="{{ $crime->lat }}" hidden>
                      <input id="LNG" type="text" value="{{ $crime->lng }}" hidden>
                      <input id="C-TYPE" type="text" value="{{ $crime->name }}" hidden>
                      <input id="REGION" type="text" value="{{ $crime->region }}" hidden>
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
            <h6 class="m-0 font-weight-bold text-warning">
              Investigating Crimes 
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
                    <th>Crime ID</th>
                    <th>User_ID</th>
                    <th>Crime Type</th>
                    <th>Location</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($crimes as $crime)
                    @if ($crime->status == 'active')
                      <tr>
                        <td>{{ $number++ }}</td>
                        <td>{{ $crime->id }}</td>
                        <td>
                          @if ($crime->user_id == '')
                            N/A
                            @else
                            {{ $crime->user_id }}
                          @endif
                        </td>
                        <td>{{ $crime->name }}</td>
                        <td>{{ $crime->region }}</td>
                        <td>{{ $crime->description }}</td>
                        <td>{{ $crime->status }}</td>
                        <td>{{ date('M j, Y h:ia', strtotime($crime->created_at)) }}</td>
                        <td>
                          <div class="d-inline-flex">
                            <a class="btn btn-sm btn-outline-primary mr-1" href="/crimes/{{ $crime->id }}"><i class="fas fa-book"></i> Review</a>

                            <form action="/crimes/{{ $crime->id }}/close" method="POST" class="form">
                              @csrf
                              @method('PUT')
                              <input type="text" name="status" value="closed" hidden>
                              <button class="btn btn-sm btn-outline-danger mr-1" name="submit"><i class="fas fa-arrow-right"></i> Close</button>
                          </form>

                          {{-- <form action="/crimes/{{ $crime->id }}" method="POST" class="form">
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
            <h6 class="m-0 font-weight-bold text-warning">
              Closed Crimes 
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
                    <th>Crime ID</th>
                    <th>User_ID</th>
                    <th>Crime Type</th>
                    <th>Location</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Closed By</th>
                    <th>Date Closed</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($crimes as $crime)
                    @if ($crime->status == 'closed')
                      <tr>
                        <td>{{ $number++ }}</td>
                        <td>{{ $crime->id }}</td>
                        <td>
                          @if ($crime->user_id == '')
                            N/A
                            @else
                            {{ $crime->user_id }}
                          @endif
                        </td>
                        <td>{{ $crime->name }}</td>
                        <td>{{ $crime->region }}</td>
                        <td>{{ $crime->description }}</td>
                        <td>{{ $crime->status }}</td>
                        <td>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</td>
                        <td>{{ date('M j, Y h:ia', strtotime($crime->updated_at)) }}</td>
                        <td>
                          <div class="d-inline-flex">
                            <a class="btn btn-sm btn-outline-primary mr-1" href="/crimes/{{ $crime->id }}"><i class="fas fa-book"></i> Review</a>

                          {{-- <form action="/crimes/{{ $crime->id }}" method="POST" class="form">
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

        <div class="container">
            <div class="mt-3 p-3 pagination-md">
                {{ $crimes->links() }}
            </div>
        </div>

      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
</x-admin-layout>