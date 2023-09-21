@extends('dashboard.layouts.layout')

@section('content')
  <!-- Table Start -->
  <div class="container-fluid pt-4 px-4">
    <div class="row g-4">
      <div class="col-sm-12 col-xl-6">
        <div class="bg-secondary rounded h-100 p-4">
          <h6 class="mb-4">Product Table</h6>
          <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">حدث</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($allproduct as $product)
                  <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>${{ $product->price }}</td>
                    <td><img src="{{ asset($product->imagepath) }}" alt="{{ $product->name }}" width="100"></td>
                    <td>
                      <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">حذف</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- Table End -->
@endsection
