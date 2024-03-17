@extends('layouts.bootstrap')

@section('title')
Edit Data Pendaftar
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
            <a href="{{route('user.index')}}">Back</a>
            <h3>Edit Data Pendaftar{{$pendaftar->nama}}</h3>
        </div>
        <div class="card-body">
            @include('alert.failed')
            <form method="POST" action="{{ route('user.update', [$pendaftar->id]) }}" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}

                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control {{$errors->first('nama') ? 'is-invalid' : ''}}" name="nama" id="nama"  value="{{ $pendaftar->nama }}">
                    <span class="error invalid-feedback">{{$errors->first('nama')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control {{$errors->first('alamat') ? 'is-invalid' : ''}}" name="alamat" id="alamat" value="{{ $pendaftar->alamat }}">
                    <span class="error invalid-feedback">{{$errors->first('alamat')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="pendidikan">Pendidikan</label>
                    <input type="text" class="form-control {{$errors->first('pendidikan') ? 'is-invalid' : ''}}" name="pendidikan" id="pendidikan" value="{{ $pendaftar->pendidikan }}">
                    <span class="error invalid-feedback">{{$errors->first('pendidikan')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="umur">Umur</label>
                    <input type="text" class="form-control {{$errors->first('umur') ? 'is-invalid' : ''}}" name="umur" id="umur" value="{{ $pendaftar->umur }}">
                    <span class="error invalid-feedback">{{$errors->first('umur')}}</span>
                  </div>


                  <div class="form-group">
                    <label for="pekerjaan">Pekerjaan</label>
                    <input type="text" class="form-control {{$errors->first('pekerjaan') ? 'is-invalid' : ''}}" name="pekerjaan" id="pekerjaan" value="{{ $pendaftar->pekerjaan }}">
                    <span class="error invalid-feedback">{{$errors->first('pekerjaan')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="phone">No Handphone</label>
                    <input type="text" class="form-control {{$errors->first('phone') ? 'is-invalid' : ''}}" name="phone" id="phone" value="{{ $pendaftar->phone }}">
                    <span class="error invalid-feedback">{{$errors->first('phone')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="tanggal">Tanggal Pendaftar</label>
                    <input type="text" class="form-control {{$errors->first('tanggal') ? 'is-invalid' : ''}}" name="tanggal" id="tanggal" value="{{ $pendaftar->tanggal }}" readonly>
                    <span class="error invalid-feedback">{{$errors->first('tanggal')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="photo">Photo Baru</label>
                    <input type="file" class="form-control {{$errors->first('photo') ? 'is-invalid' : ''}}"
                    name="photo" id="photo">
                    <span class="error invalid-feedback">{{$errors->first('photo')}}</span>
                  </div>

                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Update Data Pendaftar</button>
                </div>
              </form>
        </div>
      </div>
    </div>
  </div>
@endsection
