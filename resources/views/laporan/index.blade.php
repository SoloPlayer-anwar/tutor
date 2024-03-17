@extends('layouts.bootstrap')

@section('title')
Laporan
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-warning">
        <div class="card-header">
            <h3>Buat Laporan Fakta Integritas</h3>
        </div>
        <div class="card-body">
            <a href="{{route('user.index')}}" class="btn btn-secondary btn-sm">Back</a>
            <br>
            <hr>
            <div class="form-group">
                <label for="tgl_awal">Tanggal Awal</label>
                <input type="date" class="form-control" name="tgl_awal" id="tgl_awal" placeholder="" value="{{old('tgl_awal')}}" >
                <span class="error invalid-feedback">{{$errors->first('tgl_awal')}}</span>
            </div>

            <div class="form-group">
                <label for="tgl_akhir">Tanggal Akhir</label>
                <input type="date" class="form-control" name="tgl_akhir" id="tgl_akhir" placeholder="" value="{{old('tgl_akhir')}}" >
                <span class="error invalid-feedback">{{$errors->first('tgl_akhir')}}</span>
            </div>
            <a href="" onclick="this.href='cetakPdf/'+document.getElementById('tgl_awal').value + '/' +document.getElementById('tgl_akhir').value" class="btn btn-success btn-sm" target="_blank">Cetak Pdf</a>
            <a href="" onclick="this.href='cetak_excel/'+document.getElementById('tgl_awal').value + '/' +document.getElementById('tgl_akhir').value" class="btn btn-primary btn-sm" target="_blank">Cetak Excel</a>
        </div>
      </div>
    </div>
  </div>
@endsection
