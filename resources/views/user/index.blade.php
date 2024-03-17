@extends('layouts.bootstrap')
@section('title')
Data Pendaftar
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
            <h3>Data Pendaftar</h3>
        </div>
        <div class="card-body table-responsive">
            @include('alert.success')
            <br>
            <form method="GET" action="{{route('user.index')}}">
                <div class="row">
                    <div class="col-2">
                        <b>Search Nama</b>
                    </div>

                    <div class="col-3">
                        <input type="text" name="keyword" id="keyword" class="form-control" value="{{Request::get('keyword')}}">
                    </div>

                    <div class="col-4">
                        <button class="btn btn-default" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <br>
            <a href="{{route('btnLaporan')}}" class="btn btn-success btn-sm">
                <i class="fas fa-print"></i> Buat Laporan
            </a>
            <hr>
            <table class="table table-bordered">
		<thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Tanggal</th>
                    <th>Umur</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
		</thead>
                <tbody>
                    @foreach ($user as $row )
                    <tr>
                        <td>{{ $loop->iteration + ($user->perPage() * ($user->currentPage() - 1) ) }}</td>
                        <td>{{$row->nama}}</td>
                        <td>{{$row->tanggal}}</td>
                        <td>{{$row->umur}}</td>
                        <td><img src="{{$row->photo}}" alt="photo" width="50px" class="img-rounded"></td>
                        <td>
                            @if (Auth::user()->role == 'master')
                            <a href="{{ route ('user.edit', [$row->id])}}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{route('user.show', [$row->id])}}" class="btn btn-info btn-sm" style="margin: 10px;">Detail</a>
                            <form action="{{ route('user.destroy', [$row->id]) }}" class="d-inline" method="POST" onsubmit="return confirm('Apakah yakin delete ?')">
                                @csrf
                                {{method_field('DELETE')}}
                                <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                            </form>
                            @else
                                <a href="{{route('user.show', [$row->id])}}" class="btn btn-info btn-sm" style="margin: 10px;">Detail</a>
                            @endif

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$user->links()}}
        </div>
      </div>
    </div>
  </div>
@endsection
