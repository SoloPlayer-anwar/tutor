@extends('layouts.bootstrap')

@section('title')
Home
@endsection


@section('content')
@inject('user', 'App\Models\User' )
<div class="row">
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><b>Data Admin</b></h5>
          <p class="card-text"></p>
          <a href="#" class="btn btn-success"><p>Lihat Sekarang<span class="badge badge-primary ml-1">{{$user->count()}}</span></p></a>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
  </div>
@endsection
