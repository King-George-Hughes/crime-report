<x-layout>
    <style>
        .imgManage{
            max-height: 80px
        }
    </style>
    <div class="container">
        <table class="table table-bordered my-5">
            @php
                $numberId = 1;
            @endphp
            <tr>
                <th>#</th>
                <th>Crime Type</th>
                <th>Location</th>
                <th>Description</th>
                <th>Status</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
            @unless ($crimes->isEmpty())
                @foreach ($crimes as $crime)
                    <tr>
                        <td>{{ $numberId++ }}</td>
                        <td>{{ $crime->name }}</td>
                        <td>{{ $crime->region }}</td>
                        <td>{{ $crime->description }}</td>
                        <td>{{ $crime->status }}</td>
                        <td>{{ date('M j, Y h:ia', strtotime($crime->created_at)) }}</td>
                        <td>
                          <form action="/crimes/{{ $crime->id }}" method="POST" class="form">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-sm btn-outline-danger ms-2"><i class="fas fa-trash"></i> Delete</button>
                          </form>
                        </td>
                      </tr>
                    </tr>
                @endforeach
                @else
                <tr><p>No News Posted</p></tr>
            @endunless

            {{-- @forelse ($news as $new)
                <tr>
                    <td>{{ $new->id }}</td>
                    <td>{{ $new->title }}</td>
                    <td>{{ $new->description }}</td>
                </tr>
            @empty
                <p>No News</p>
            @endforelse --}}
        </table>
    </div>
</x-layout>

