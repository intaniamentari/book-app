@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 style="font-weight: bold; font-size: 20pt; margin-top: 5%; margin-bottom: 3%;">{{ isset($book) ? 'Edit Buku' : 'Tambah Buku' }}</h1>
        <form action="{{ isset($book) ? route('book.update', $book->id) : route('book.store') }}" method="POST">
            @csrf
            @if(isset($book))
                @method('PUT')
            @endif
            <div class="form-group" style="margin-bottom: 2%;">
                <label for="title">Judul Buku</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $book->title ?? '') }}" required>
            </div>
            <div class="form-group" style="margin-bottom: 2%;">
                <label for="category_id">Kategori</label>
                <select name="category_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ (isset($book) && $book->category_id == $category->id) ? 'selected' : '' }}>
                            {{ $category->category }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" style="margin-bottom: 2%;">
                <label for="writer_id">Pengarang</label>
                <select name="writer_id" class="form-control" required>
                    @foreach ($writers as $writer)
                        <option value="{{ $writer->id }}" {{ (isset($book) && $book->writer_id == $writer->id) ? 'selected' : '' }}>
                            {{ $writer->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" style="margin-bottom: 3%;">
                <label for="year">Year</label>
                <input type="number" name="year" class="form-control" value="{{ old('year', $book->year ?? '') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">{{ isset($book) ? 'Update' : 'Tambah' }}</button>
        </form>
    </div>
@endsection
