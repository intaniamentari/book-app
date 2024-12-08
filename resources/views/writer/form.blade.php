@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 style="font-weight: bold; font-size: 20pt; margin-top: 5%; margin-bottom: 3%;">{{ isset($writer) ? 'Edit Penulis' : 'Tambah Penulis' }}</h1>
        <form action="{{ isset($writer) ? route('writer.update', $writer->id) : route('writer.store') }}" method="POST">
            @csrf
            @if(isset($writer))
                @method('PUT')
            @endif
            <div class="form-group" style="margin-bottom: 2%;">
                <label for="name">Penulis</label>
                <input type="text" name="name" class="form-control" value="{{ old('writer', $writer->name ?? '') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">{{ isset($writer) ? 'Update' : 'Tambah' }}</button>
        </form>
    </div>
@endsection
