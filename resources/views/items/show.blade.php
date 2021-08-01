@extends('layouts.app')

@section('title', 'sepatu')

@section('content')
<div class ="card">
    <div class ="card-body">
        <h3>nama  : {{$item['nama'] }}</h3>
        <h3>gambar : {{$item['gambar'] }}</h3>
        <h3>harga  : {{$item['harga']}}</h3>
        <h3>stok  : {{$item['stok']}}</h3>
    </div>
</div>
@endsection