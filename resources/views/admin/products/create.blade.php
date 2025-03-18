@extends('layouts.admin')
@section('content')

<div class="container py-5 d-flex justify-content-center">
    <div class="col-md-6 bg-white p-4 rounded shadow">
        <h3 class="mb-4 text-center text-primary">إضافة منتج جديد</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.products.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label fw-bold">اسم المنتج</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="T-Shirt" value="{{ old('name') }}">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label fw-bold">الكمية</label>
                <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ old('quantity') }}">
                @error('quantity') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label fw-bold">السعر</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" step="0.01" value="{{ old('price') }}">
                @error('price') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label fw-bold">وصف المنتج</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                @error('description') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="category" class="form-label fw-bold">اختر الصنف</label>
                <select class="form-select @error('category') is-invalid @enderror" name="category_id" id="category">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
                </select>
                @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3 text-center">
                <input type="submit" value="حفظ المنتج" class="btn btn-primary px-4 py-2">
            </div>
        </form>
    </div>
</div>

@endsection
