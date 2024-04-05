@extends('layouts.bootstrap')
@section('title')
Data Dinas
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
            <h3>Data Dinas</h3>
        </div>
        <div class="card-body table-responsive">
            @include('alert.success')
            <br>
            <form method="GET" action="{{route('dinas.index')}}">
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
            <a href="{{route('dinas.create')}}" class="btn btn-success">+ Tambahkan Dinas Baru</a>
            <hr>
            <table class="table table-bordered">
		<thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
		</thead>
                <tbody>
                    @foreach ($dinas as $row )
                    <tr>
                        <td>{{ $loop->iteration + ($dinas->perPage() * ($dinas->currentPage() - 1) ) }}</td>
                        <td>{{$row->nama_dinas}}</td>
                        <td>

                            <a href="{{ route ('dinas.edit', [$row->id])}}" class="btn btn-warning btn-sm" style="margin: 10px;">Edit</a>
                            <form action="{{ route('dinas.destroy', [$row->id]) }}" class="d-inline" method="POST" onsubmit="return confirm('Apakah anda yakin Delete ?')">
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
            {{$dinas->links()}}
        </div>
      </div>
    </div>
  </div>
@endsection
