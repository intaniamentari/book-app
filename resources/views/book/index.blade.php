@extends('layouts.app')

@section('content')
    <div class="container" style="padding-bottom: 10%">
        <h1 style="font-weight: bold; font-size: 20pt; margin-top: 5%; margin-bottom: 3%;">Daftar Buku</h1>
        <a href="{{ route('book.create') }}" class="btn btn-primary mb-3">Tambah Buku</a>
        <table id="book" class="table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Pengarang</th>
                    <th>Tahun</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->category->category }}</td>
                        <td>{{ $book->writer->name }}</td>
                        <td>{{ $book->year }}</td>
                        <td>
                            <a href="{{ route('book.edit', $book->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('book.destroy', $book->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- {{ $book->links() }} --}}
    </div>
@endsection

@section('script')
    <script>
        new DataTable('#book');
    </script>
@endsection
