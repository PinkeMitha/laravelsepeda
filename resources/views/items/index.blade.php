@extends('layouts.app')

@section('title', 'Produk')

@section('content')
<a href="/items/create" class="card-link">Tambah Item</a>
<div class="container" >
    <div class="row justify-content-center">
@foreach ($items as $item)
<div class="col-md-4">
<div class="card" style="width: 18rem;">
  <img src="{{ url('foto') }}/{{ $item['gambar'] }}" class="card-img-top" alt="...">
  <div class="card-body">
 <h5><a href="/items/{{ $item['id']}}" class="card-title"><center>{{ $item['nama'] }}</h5></center></a>
    <table class="table">
    <tbody>
    <tr>
    <td><center>Rp. {{ $item['harga'] }}</center></td>
    </tr>
    <tr>
    <td>Stok</td>
    <td>:</td>
    <td>{{ $item['stok'] }}</td>
    </tr>
    
    </tbody>
    </table>
    <div class="row justify-content-center">
    <a href="/items/{{$item['id']}}/edit" class="btn btn-success">Edit</a>
    <form action="/items/{{ $item['id']}}" method="POST">
      @csrf
      @method('DELETE')
    <button class="btn btn-primary">Hapus</button>
    </form>
</div>
  </div>
</div>
</div>
@endforeach
<div>
    {{$items->links()}}
</div>
@endsection