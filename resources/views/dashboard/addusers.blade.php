@extends('dashboard.layouts.layout')

@section('content')
<form method="POST" action="/add-user" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">الاسم:</label>
        <input type="text" class="form-control" name="name" id="name" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">البريد الإلكتروني:</label>
        <input type="email" class="form-control" name="email" id="email" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">كلمة المرور:</label>
        <input type="password" class="form-control" name="password" id="password" required>
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">قم بإضافة صورة:</label>
        <input type="file" class="form-control" name="image" id="image" required>
    </div>

    <button type="submit" class="btn btn-primary">إضافة المستخدم</button>
</form>


@endsection
