@extends('layouts.bootstrap')
@section('title')
Berkas
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
            <h3>Berkas</h3>
        </div>
        <div class="card-body table-responsive">
            @include('alert.popup')
            <br>

            <form method="GET" action="{{route('berkas.index')}}">
                <div class="row">
                    <div class="col-2">
                        <b>Search Nama Acara</b>
                    </div>
                    <div class="col-3 mb-3">
                        <input type="text" name="keyword" id="keyword" class="form-control" value="{{Request::get('keyword')}}">
                    </div>


                    <div class="col-3">
                        <select name="survey" id="survey" class="form-control">
                            <option value="survey" @if (Request::get('survey') == 'survey') selected @endif>Survey</option>
                            <option value="tidak_survey" @if (Request::get('survey') == 'tidak_survey') selected @endif>Tidak Survey</option>
                        </select>
                    </div>

                    <div class="col-4">
                        <button class="btn btn-default" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <a href="{{route('berkas.create')}}" class="btn btn-success">+ Buat Berkas</a>
            <hr>
            <table class="table table-bordered">
                    <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK BERKAS</th>
                                <th>Kategori Ijin</th>
                                <th>Nama Usaha</th>
                                <th>Nama Pemilik</th>
                                <th>Status</th>
                                <th>Lampu</th>
                                <th>Action</th>
                            </tr>
                    </thead>
                    <tbody>
                        @foreach ($berkas as $row )
                        <tr>
                            <td>{{ $loop->iteration + ($berkas->perPage() * ($berkas->currentPage() - 1) ) }}</td>
                            <td>{{$row->nik_bm}}</td>
                            <td>{{$row->izin->nama_ijin}}</td>
                            <td>{{$row->nama_usaha}}</td>
                            <td>{{$row->nama_bm}}</td>
                            <td>{{$row->survey}}</td>
                            <td>
                                @if ($row->tgl_masuk > $row->tgl_akhir)
                                <div style="width: 20px; height: 20px; background-color: red;"></div>
                                @else
                                    <div style="width: 20px; height: 20px; background-color: green;"></div>
                                @endif
                            </td>
                            <td>
                                @if (Auth::user()->role == "master")
                                <div class="btn-group" >

                                    <a href="{{ route('berkas.show', [$row->id]) }}" class="btn btn-info btn-sm mr-2">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    <a href="{{route('berkas.edit', [$row->id])}}" class="btn btn-warning btn-sm mr-2 d-inline">Edit</a>
                                    <form action="{{ route('berkas.destroy', [$row->id]) }}" method="POST" onsubmit="return confirm('Delete This Item?')">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                                @else
                                <a href="{{ route('berkas.show', [$row->id]) }}" class="btn btn-info btn-sm mr-2">
                                    <i class="fas fa-eye"></i> View
                                </a>
                                @endif

                            </td>


                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$berkas->links()}}
        </div>
      </div>
    </div>
  </div>
@endsection
