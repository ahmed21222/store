@extends('layouts.admin')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<div class="py-5">
    <!-- عرض الرسالة إذا كانت موجودة -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">إضافة صنف جديد</a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">اسم الصنف</th>
                    <th scope="col">تم الاضافة بوسطة</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->user->name ?? 'unknown' }}</td>
                    <td class="text-center">
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-info btn-sm mx-1">
                            <i class="fas fa-edit"></i> تعديل
                        </a>

                        <form action="{{ route('admin.categories.delete', $category->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من حذف هذا الصنف؟')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm mx-1">
                                <i class="fas fa-trash-alt"></i> حذف
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
