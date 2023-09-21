@extends('dashboard.layouts.layout')

@section('content')
    <div class="container">
        <h2>رسائل المستخدمين</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>البريد الإلكتروني</th>
                        <th>رقم الهاتف</th>
                        <th>الموضوع</th>
                        <th>الرسالة</th>
                        <th>تاريخ الإنشاء</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                        <tr class="clickable" data-toggle="collapse" data-target="#message-{{ $message->id }}">
                            <td>{{ $message->id }}</td>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->phone }}</td>
                            <td>{{ $message->subject }}</td>
                            <td>{{ $message->message }}</td>
                            <td>{{ $message->created_at }}</td>
                        </tr>
                        <tr id="message-{{ $message->id }}" class="collapse">
                            <td colspan="7">
                                <div>
                                    {{ $message->message }}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
