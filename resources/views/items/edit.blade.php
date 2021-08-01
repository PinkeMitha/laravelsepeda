@extends('layouts.app')

@section('title', 'items')

@section('content')

  <form action="/items/{{ $item['id'] }}" method="POST">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="exampleInputEmail1">Nama</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nama" aria-describedby="emailHelp" value="{{ old('nama') ? old('nama') : $item['nama'] }}">
    @error('nama')
    <div class="alert alert-danger">{{$message}}</div>
  @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Gambar</label>
    <input type="text" class="form-control" name="gambar" id="exampleInputPassword1" value="{{ old('gambar') ? old('gambar') : $item['gambar'] }}">
    @error('gambar')
    <div class="alert alert-danger">{{$message}}</div>
  @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">harga</label>
    <input type="text" class="form-control" name="harga" id="exampleInputPassword1" value="{{ old('harga') ? old('harga') : $item['harga'] }}">
    @error('harga')
    <div class="alert alert-danger">{{$message}}</div>
  @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">stok</label>
    <input type="text" class="form-control" name="stok" id="exampleInputPassword1" value="{{ old('stok') ? old('stok') : $item['stok'] }}">
    @error('stok')
    <div class="alert alert-danger">{{$message}}</div>
  @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection