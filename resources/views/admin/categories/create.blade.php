@extends('layouts.admin')
@section('content')

<div class="container py-5 d-flex justify-content-center">
    <div class="col-md-6 bg-white p-4 rounded shadow">
        <h3 class="mb-4 text-center text-primary">إضافة تصنيف جديد</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label fw-bold">اسم التصنيف</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="ملابس، إلكترونيات..." value="{{ old('name') }}">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3 text-center">
                <input type="submit" value="حفظ التصنيف" class="btn btn-primary px-4 py-2">
            </div>
        </form>
    </div>
</div>

@endsection
