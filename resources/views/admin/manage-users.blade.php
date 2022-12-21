<x-admin-layout>
    <?php $number = 1 ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Manage Users</h1>
        <p class="mb-4">
          DataTables is a third party plugin that is used to generate the
          demo table below. For more information about DataTables, please
          visit the
        </p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">
              List of Registered Users
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
                    <th>User_Id</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Created</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $number++ }}</td>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                        <td>{{ $user->gender }}</td>
                        <td>{{ $user->dob }}</td>
                        <td>{{ $user->contact }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ date('M j, Y h:ia', strtotime($user->created_at)) }}</td>
                    </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="container">
            <div class="mt-3 p-3 pagination-md">
                {{ $users->links() }}
            </div>
        </div>

      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
</x-admin-layout>