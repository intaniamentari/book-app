@extends('layouts.app')

@section('content')
    <div class="container" style="padding-bottom: 10%">
        <h1 style="font-weight: bold; font-size: 20pt; margin-top: 5%; margin-bottom: 3%;">Daftar Writer</h1>
        <a href="{{ route('writer.create') }}" class="btn btn-primary mb-3">Tambah Writer</a>
        <table id="writer" class="table">
            <thead>
                <tr>
                    <th>penulis</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($writers as $writer)
                    <tr>
                        <td>{{ $writer->name }}</td>
                        <td>
                            <a href="{{ route('writer.edit', $writer->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('writer.destroy', $writer->id) }}" method="POST" style="display:inline;">
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
        new DataTable('#writer');
    </script>
@endsection
