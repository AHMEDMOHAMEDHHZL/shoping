@extends('dashboard.layouts.layout')

@section('content')
<div class="container">
    <h2>عرض الأقسام</h2>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>الوصف</th>
                <th>الصورة</th>
            </tr>
        </thead>
        <tbody>
            @foreach($allcategorie as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <img src="{{ $category->imagepath }}" alt="{{ $category->name }}" style="max-width: 100px;">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
