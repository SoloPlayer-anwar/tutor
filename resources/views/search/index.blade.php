@extends('layouts.userview')
@section('title')
Data Berkas
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card bg-light">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-1">
                            <a href="{{ route('/') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                        <div class="col-11">
                            <h1 class="text-center bg-primary text-white p-3 rounded">HISTORY BERKAS</h1>
                        </div>
                    </div>
                    <form method="GET" action="{{ route('search.index') }}">
                        <div class="row mt-3">
                            <div class="col-md-3">
                                <input type="text" name="keyword" id="keyword" class="form-control" value="{{ Request::get('keyword') }}" placeholder="Cari berdasarkan nik yang terdaftar">
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search"></i> Cari
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <table class="table table-bordered">
                    @foreach ($search as $berkas )

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
                    @endforeach


                </table>

                <span class="badge badge-success" style="font-size: 15px">Dinas Yang Bersangkutan</span>
                <hr>
                <table class="table table-bordered">
                    <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Dinas</th>
                                <th>Keterangan</th>
                                <th>Date</th>
                            </tr>
                    </thead>

                    <tbody>
                        @foreach ($search as $berkas)
                        @foreach ($berkas->optiondinas as $optionRow)
                        <tr>
                            <td>{{$optionRow->user->name}}</td>
                            <td>{{$optionRow->user->dinas->nama_dinas}}</td>
                            <td>{{$optionRow->keterangan_dinas}}</td>
                            <td>{{$optionRow->updated_at}}</td>
                        </tr>
                        @endforeach

                        @endforeach
                    </tbody>

                </table>

                <div class="card-footer">
                    {{$search->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
