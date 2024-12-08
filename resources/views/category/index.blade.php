@extends('layouts.app')

@section('content')
    <div class="container" style="padding-bottom: 10%">
        <h1 style="font-weight: bold; font-size: 20pt; margin-top: 5%; margin-bottom: 3%;">Daftar Category</h1>
        <a href="{{ route('category.create') }}" class="btn btn-primary mb-3">Tambah Category</a>
        <table id="category" class="table">
            <thead>
                <tr>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->category }}</td>
                        <td>
                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script>
        new DataTable('#category');
    </script>
@endsection
