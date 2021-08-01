@extends('layouts.app')

@section('title', 'kategori')

@section('content')
<div class ="card">
    <div class ="card-body">
        <h3>nama  : {{$kategori['nama'] }}</h3>
        <h3>description : {{$kategori['description'] }}</h3>
        
    </div>
</div>
@endsection