@extends('layouts.app')

@section('title', 'kategori')

@section('content')
<a href="/kategoris/create" class="card-link">Tambah kategori</a>
@foreach ($kategoris as $kategori)

<div class="card" style="width: 18rem;">
  <div class="card-body">
 <a href="/kategoris/{{ $kategori['id']}}" class="card-title">{{ $kategori['nama'] }}</a>
 <p class="card-text">{{ $kategori['description']}}</p>

  <hr>
  <a href="/kategoris/additem/{{$kategori['id']}}" class="card-link btn-primary">Tambah items</a>
  <ul class="list-group">  
  @foreach ($kategori->items as $item)
        <li class="list-group-item d-flex justify-content-between align-items-center"> {{$item->nama}}
        <from action ="/kategoris/deleteadditem/{{ $item->id}}" method="POST">
            @csrf
          @method('PUT')
        <button type="submit" class="bedge card-link btn-danger">X</button>
        </form>
        </li>
    @endforeach
  </ul>
  <hr>

 <div class="row justify-content-center">
    <a href="/kategoris/{{$kategori['id']}}/edit" class="btn btn-success">Edit</a>
    <form action="/kategoris/{{ $kategori['id']}}" method="POST">
      @csrf
      @method('DELETE')
    <button class="btn btn-primary">Hapus</button>
    </form>
  </div>
</div>
</div>
@endforeach
<div>
    {{$kategoris->links()}}
</div>
@endsection