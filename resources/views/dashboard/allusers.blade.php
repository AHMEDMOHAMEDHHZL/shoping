


@extends('dashboard.layouts.layout')

@section('content')
  <!-- Table Start -->
  <div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Color Table</h6>
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">status</th>
                            <th scope="col">created_at</th>
                        </tr>
                    </thead>
                    @foreach ($allusers as $item)
                    <tbody>
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->created_at }}<td>  
                        </tr>
                    </tbody>
                    @endforeach

                </table>
            </div>
            
        </div>
    </div>
</div>
<!-- Table End -->

@endsection
