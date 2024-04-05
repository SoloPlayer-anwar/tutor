@extends('layouts.bootstrap')

@section('title')
Create Izin
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-warning">
        <div class="card-header">
            <h3>Buat Izin Baru</h3>
        </div>
        <div class="card-body">
            <a href="{{route('izin.index')}}" class="btn btn-secondary btn-sm">Back</a>
            @include('alert.failed')
            <form method="post" action="{{route('izin.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label for="nama_ijin">Buat Nama</label>
                        <input type="text" class="form-control {{$errors->first('nama_ijin') ? 'is-invalid' : ''}}" name="nama_ijin" id="nama_ijin" placeholder="Buat Izin" value="{{ old('nama_ijin')}}">
                        <span class="error invalid-feedback">{{$errors->first('nama_ijin')}}</span>
                    </div>

                    <div class="form-group mb-4">
                        <label for="status_izin">Status</label>
                        <select class="form-control {{$errors->first('status_izin') ? 'is-invalid' : ''}}" name="status_izin" id="status_izin">
                            <option value="pajak" {{ old('status_izin') == 'pajak' ? 'selected' : '' }}>Pajak</option>
                            <option value="gratis" {{ old('status_izin') == 'gratis' ? 'selected' : '' }}>Gratis</option>
                        </select>
                        <span class="error invalid-feedback">{{$errors->first('status_izin')}}</span>
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
