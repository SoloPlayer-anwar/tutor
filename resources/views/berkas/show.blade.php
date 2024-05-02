@extends('layouts.bootstrap')

@section('title')
Detail Berkas Pengajuan
@endsection

@section('content')
<div class="row ">
    <div class="col-12">
      <div class="card card-success">
        <div class="card-header">
            <h3>Detail Berkas dari {{$berkas->nama_bm}}</h3>
        </div>
        <div class="card-body table-responsive">
            @include('alert.success')
            <a href="{{route('berkas.index')}}" class="btn btn-secondary btn-sm mr-3">Back</a>
            {{-- <a href="{{route('pilih_gurus.create', ['suratguru_id' => $surat_id ,  'nama_acara' => $nama_acara, 'tanggal' => $tanggal, 'tempat_tugas' => $tempat_tugas])}}" class="btn btn-info btn-sm">Pilih Guru</a> --}}
            <hr/>

            <table class="table table-bordered">
                <tr>
                    <td>NIK BM</td>
                    <td>:</td>
                    <td>{{$berkas->nik_bm}}</td>
                </tr>


                <tr>
                    <td>Tanggal Masuk Berkas</td>
                    <td>:</td>
                    <td>{{$berkas->tgl_masuk}}</td>
                </tr>

                <tr>
                    <td>Tanggal Akhir Berkas</td>
                    <td>:</td>
                    <td>{{$berkas->tgl_akhir}}</td>
                </tr>

                <tr>
                    <td>Nama Pemilik Usaha</td>
                    <td>:</td>
                    <td>{{$berkas->nama_bm}}</td>
                </tr>

                <tr>
                    <td>Kategori Ijin</td>
                    <td>:</td>
                    <td>{{$berkas->izin->nama_ijin}}</td>
                </tr>

                <tr>
                    <td>Nama Usaha</td>
                    <td>:</td>
                    <td>{{$berkas->nama_usaha}}</td>
                </tr>

                <tr>
                    <td>Alamat Usaha</td>
                    <td>:</td>
                    <td>{{$berkas->alamat_usaha}}</td>
                </tr>

                <tr>
                    <td>Telphone</td>
                    <td>:</td>
                    <td>{{$berkas->telpon}}</td>
                </tr>

                <tr>
                    <td>Survey</td>
                    <td>:</td>
                    <td>{{$berkas->survey}}</td>
                </tr>

                <tr>
                    <td>Lampu</td>
                    <td>:</td>
                    <td>
                        @if ($berkas->tgl_masuk > $berkas->tgl_akhir)
                        <div style="width: 20px; height: 20px; background-color: red;"></div>
                        @else
                            <div style="width: 20px; height: 20px; background-color: green;"></div>
                        @endif
                    </td>
                </tr>

            </table>
            <br>
            <span class="badge badge-success" style="font-size: 15px">Dinas Yang Bersangkutan</span>
            <hr>
            <table class="table table-bordered">
                <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Dinas</th>
                            <th>Keterangan</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                </thead>

                <tbody>
                    @foreach ($berkas->optiondinas as $optionRow)
                    <tr>
                        <td>{{$optionRow->user->name}}</td>
                        <td>{{$optionRow->user->dinas->nama_dinas}}</td>
                        <td>{{$optionRow->keterangan_dinas}}</td>
                        <td>{{$optionRow->updated_at}}</td>
                        <td>
                            @if (Auth::user()->role == "master")
                            <a href="{{ route ('optiondinas.edit', [$optionRow->id])}}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('optiondinas.destroy', [$optionRow->id]) }}" class="d-inline" method="POST" onsubmit="return confirm('Apakah yakin delete ?')">
                                @csrf
                                {{method_field('DELETE')}}
                                <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                            </form>
                            @elseif (Auth::user()->dinas->nama_dinas == $optionRow->user->dinas->nama_dinas)
                            <a href="{{ route ('optiondinas.edit', [$optionRow->id])}}" class="btn btn-warning btn-sm">Edit Keterangan</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
            <hr>
            <br>
            @foreach ($berkas->optiondinas as $optiondinas)
            @if (Auth::user()->id == $optiondinas->user_id)
                <a href="{{route('optiondinas.create', ['berkas_id' => $berkas->id])}}" class="btn btn-primary btn-sm">Tambahkan Keterangan</a>
                @elseif (Auth::user()->role == "master")
                <a href="{{route('optiondinas.create', ['berkas_id' => $berkas->id])}}" class="btn btn-primary">Tambahkan Dinas Bersangkutan</a>
            @endif
            @break
        @endforeach
        </div>
        <div class="card-footer">
        </div>
      </div>
    </div>
  </div>



@endsection
