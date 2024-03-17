@extends('layouts.bootstrap')

@section('title')
Detail Pendaftaran
@endsection

@section('content')
<div class="row ">
    <div class="col-12">
      <div class="card card-success">
        <div class="card-header">
            <h3>Detail Nama Pendaftar {{$pendaftar->nama}}</h3>
        </div>
        <div class="card-body table-responsive">
            <a href="{{route('user.index')}}" class="btn btn-secondary btn-sm">Back</a>
            <hr/>
            <table class="table table-bordered">
                <tr>
                    <td width="30%">Nama</td>
                    <td>:</td>
                    <td width="70%">{{$pendaftar->nama}}</td>
                </tr>

                <tr>
                    <td>Tanggal dibuat</td>
                    <td>:</td>
                    <td><span class="badge badge-primary" style="font-size: 18px">{{$pendaftar->tanggal}}</span></td>
                </tr>

                <tr>
                    <td>Pendidikan</td>
                    <td>:</td>
                    <td>{{$pendaftar->pendidikan}}</td>
                </tr>

                <tr>
                    <td>Umur</td>
                    <td>:</td>
                    <td>{{$pendaftar->umur}}</td>
                </tr>

                <tr>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td>{{$pendaftar->pekerjaan}}</td>
                </tr>

                <tr>
                    <td>Phone</td>
                    <td>:</td>
                    <td>{{$pendaftar->phone}}</td>
                </tr>

                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{$pendaftar->alamat}}</td>
                </tr>

                <tr>
                    <td>Photo</td>
                    <td>:</td>
                    <td><img src="{{$pendaftar->photo}}" alt="photo" width="50px" style="border-radius: 6px;"></td>
                </tr>

            </table>
        </div>
        <div class="card-footer">
            {{-- <a href="{{route('penelitian_mahasiswas.cetak', [$penelitian_mahasiswas->id])}}" target="_blank" class="btn btn-success">Cetak sekarang Surat Penelitian</a> --}}
        </div>
      </div>
    </div>
  </div>
@endsection
