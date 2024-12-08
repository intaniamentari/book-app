@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 style="font-weight: bold; font-size: 20pt; margin-top: 5%; margin-bottom: 3%;">{{ isset($category) ? 'Edit Category' : 'Tambah Category' }}</h1>
        <form action="{{ isset($category) ? route('category.update', $category->id) : route('category.store') }}" method="POST">
            @csrf
            @if(isset($category))
                @method('PUT')
            @endif
            <div class="form-group" style="margin-bottom: 2%;">
                <label for="category">Category</label>
                <input type="text" name="category" class="form-control" value="{{ old('category', $category->category ?? '') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">{{ isset($category) ? 'Update' : 'Tambah' }}</button>
        </form>
    </div>
@endsection
