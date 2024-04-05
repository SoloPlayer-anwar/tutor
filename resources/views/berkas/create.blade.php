@extends('layouts.bootstrap')

@section('title')
Create Berkas
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-warning">
        <div class="card-header">
            <h3>Buat Berkas Baru</h3>
        </div>
        <div class="card-body">
            <a href="{{route('berkas.index')}}" class="btn btn-secondary btn-sm">Back</a>
            @include('alert.failed')
            <form method="post" action="{{route('berkas.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label for="nik_bm">NIK BM</label>
                        <input type="text" class="form-control {{$errors->first('nik_bm') ? 'is-invalid' : ''}}" name="nik_bm" id="nik_bm" placeholder="Buat Nik" value="{{ old('nik_bm')}}">
                        <span class="error invalid-feedback">{{$errors->first('nik_bm')}}</span>
                    </div>


                    <div class="form-group">
                        <label for="tgl_masuk">Tanggal Masuk Berkas</label>
                        <input type="date" class="form-control {{$errors->first('tgl_masuk') ? 'is-invalid' : ''}}" name="tgl_masuk" id="tgl_masuk" placeholder="Buat Tanggal Masuk" value="{{ old('tgl_masuk')}}">
                        <span class="error invalid-feedback">{{$errors->first('tgl_masuk')}}</span>
                    </div>

                    <div class="form-group">
                        <label for="tgl_akhir">Tanggal Terakhir Berkas</label>
                        <input type="date" class="form-control {{$errors->first('tgl_akhir') ? 'is-invalid' : ''}}" name="tgl_akhir" id="tgl_akhir" placeholder="Buat Tanggal Akhir" value="{{ old('tgl_akhir')}}">
                        <span class="error invalid-feedback">{{$errors->first('tgl_akhir')}}</span>
                    </div>


                    <div class="form-group">
                        <label for="nama_bm">Nama Pengaju Berkas</label>
                        <input type="text" class="form-control {{$errors->first('nama_bm') ? 'is-invalid' : ''}}" name="nama_bm" id="nama_bm" placeholder="Buat Nama Pengaju Berkas" value="{{ old('nama_bm')}}">
                        <span class="error invalid-feedback">{{$errors->first('nama_bm')}}</span>
                    </div>


                    <div class="form-group">
                        <label for="izin_id">Kategori Izin</label>
                        <select name="izin_id" id="izin_id" class="form-control">
                            <option value="">>-- Pilih Kategori Ijin --<</option>
                            @foreach ($izin as $izins )
                            <option value="{{$izins->id}}">{{$izins->nama_ijin}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nama_usaha">Nama Usaha</label>
                        <input type="text" class="form-control {{$errors->first('nama_usaha') ? 'is-invalid' : ''}}" name="nama_usaha" id="nama_usaha" placeholder="Buat Nama Usaha" value="{{ old('nama_usaha')}}">
                        <span class="error invalid-feedback">{{$errors->first('nama_usaha')}}</span>
                    </div>

                    <div class="form-group">
                        <label for="alamat_usaha">Alamat Usaha</label>
                        <input type="text" class="form-control {{$errors->first('alamat_usaha') ? 'is-invalid' : ''}}" name="alamat_usaha" id="alamat_usaha" placeholder="Buat Alamat Usaha" value="{{ old('alamat_usaha')}}">
                        <span class="error invalid-feedback">{{$errors->first('alamat_usaha')}}</span>
                    </div>

                    <div class="form-group">
                        <label for="telpon">Telpon Usaha</label>
                        <input type="text" class="form-control {{$errors->first('telpon') ? 'is-invalid' : ''}}" name="telpon" id="telpon" placeholder="Buat Telphone" value="{{ old('telpon')}}">
                        <span class="error invalid-feedback">{{$errors->first('telpon')}}</span>
                    </div>

                    <div class="form-group mb-4">
                        <label for="survey">Status Survey</label>
                        <select class="form-control {{$errors->first('survey') ? 'is-invalid' : ''}}" name="survey" id="survey">
                            <option value="tidak_survey" {{ old('survey') == 'tidak_survey' ? 'selected' : '' }}>Tidak Survey</option>
                            <option value="survey" {{ old('survey') == 'survey' ? 'selected' : '' }}>Survey</option>
                        </select>
                        <span class="error invalid-feedback">{{$errors->first('survey')}}</span>
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
