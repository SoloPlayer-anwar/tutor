@extends('layouts.bootstrap')
@section('title')
Kategori Izin
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
            <h3>Data Kategori Izin</h3>
        </div>
        <div class="card-body table-responsive">
            @include('alert.success')
            <br>
            <form method="GET" action="{{route('izin.index')}}">
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
            <hr>
            <br>
            <a href="{{route('izin.create')}}" class="btn btn-success">+ Tambahkan Izin Baru</a>
            <hr>
            <table class="table table-bordered">
		<thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
		</thead>
                <tbody>
                    @foreach ($izin as $row )
                    <tr>
                        <td>{{ $loop->iteration + ($izin->perPage() * ($izin->currentPage() - 1) ) }}</td>
                        <td>{{$row->nama_ijin}}</td>
                        <td>{{$row->status_izin}}</td>
                        <td>

                            <a href="{{ route ('izin.edit', [$row->id])}}" class="btn btn-warning btn-sm" style="margin: 10px;">Edit</a>
                            <form action="{{ route('izin.destroy', [$row->id]) }}" class="d-inline" method="POST" onsubmit="return confirm('Apakah anda yakin Delete ?')">
                                @csrf
                                {{method_field('DELETE')}}
                                <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$izin->links()}}
        </div>
      </div>
    </div>
  </div>
@endsection
