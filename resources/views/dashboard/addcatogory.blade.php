@extends('dashboard.layouts.layout')

@section('content')
<div class="container">
    <h2>إضافة قسم جديد</h2>
    <form action="/add-catogory" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">اسم القسم</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">الوصف</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">الصورة</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-primary">إضافة</button>
    </form>
</div>

@endsection
