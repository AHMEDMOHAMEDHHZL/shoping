@extends('dashboard.layouts.layout')

@section('content')
<div class="container">
    <h2>عروض المنتجات</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">عنوان العرض</th>
                <th scope="col">وصف العرض</th>
                <!-- يمكنك إضافة المزيد من الأعمدة حسب احتياجاتك -->
            </tr>
        </thead>
        <tbody>
            @foreach ($offers as $offer)
                <tr>
                    <th scope="row">{{ $offer->id }}</th>
                    <td>{{ $offer->title }}</td>
                    <td>{{ $offer->description }}</td>
                    <!-- يمكنك إضافة المزيد من الأعمدة حسب احتياجاتك -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
