@extends('layouts.admin')
@section('content')

<div class="container py-5">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h4>قائمة المنتجات</h4>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover table-striped text-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">اسم المنتج</th>
                        <th scope="col">الصنف</th>
                        <th scope="col">السعر</th>
                        <th scope="col">الكمية</th>
                        <th scope="col">تم الاضافة بوسطة</th>
                        <th scope="col" colspan="2">الإجراءات</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{ $product->id }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->user->name ?? 'unknown' }}</td>
                        <td>
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-edit"></i> تعديل
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('admin.products.delete', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد؟')">
                                    <i class="fas fa-trash-alt"></i> حذف
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('admin.products.create') }}" class="btn btn-success mt-3">
                <i class="fas fa-plus"></i> إضافة منتج جديد
            </a>
        </div>
    </div>
</div>

@endsection
