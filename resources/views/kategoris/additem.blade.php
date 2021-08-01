@extends('layouts.app')

@section('title', 'kategori')

@section('content')

<form action="/kategoris/additem/{{$kategori->id}}" method="POST">
@csrf
@method('PUT')
  <div class="form-group">
    <label for="exampleInputEmail1">Nama</label>
    <select class="form-select" aria-label="Default select example" name="item_id">
      <option selected>Pilih Item</option>
      @foreach ($item as $i)
      <option value="{{$i->id}}">{{$i->nama}}</option>
      @endforeach
    </select>
  </div>
  
  <button type="submit" class="btn btn-primary">tambah ke kategori</button>
</form>

@endsection