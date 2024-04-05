@extends('layouts.bootstrap')

@section('title')
Create Dinas
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-warning">
        <div class="card-header">
            <h3>Buat Dinas Baru</h3>
        </div>
        <div class="card-body">
            <a href="{{route('dinas.index')}}" class="btn btn-secondary btn-sm">Back</a>
            @include('alert.failed')
            <form method="post" action="{{route('dinas.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label for="nama_dinas">Buat Nama</label>
                        <input type="text" class="form-control {{$errors->first('nama_dinas') ? 'is-invalid' : ''}}" name="nama_dinas" id="nama_dinas" placeholder="Buat Dinas" value="{{ old('nama_dinas')}}">
                        <span class="error invalid-feedback">{{$errors->first('nama_dinas')}}</span>
                    </div>


                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan Data Dinas</button>
                </div>
              </form>
        </div>
      </div>
    </div>
  </div>
@endsection
