@extends('layouts.bootstrap')
@section('title')
Data Admin
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
            <h3>Data Admin</h3>
        </div>
        <div class="card-body table-responsive">
            @include('alert.success')
            <br>
            <form method="GET" action="{{route('admin.index')}}">
                <div class="row">
                    <div class="col-2">
                        <b>Search Role</b>
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
            @if (Auth::user()->role != 'admin')
            <a href="{{route('admin.create')}}" class="btn btn-success">+ Tambahkan Admin Baru</a>
            @endif
            <hr>
            <table class="table table-bordered">
		<thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
		</thead>
                <tbody>
                    @foreach ($admin as $row )
                    <tr>
                        <td>{{ $loop->iteration + ($admin->perPage() * ($admin->currentPage() - 1) ) }}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->role}}</td>
                        <td>
                            @if (Auth::user()->role != 'admin')
                            <a href="{{ route ('admin.edit', [$row->id])}}" class="btn btn-warning btn-sm" style="margin: 10px;">Edit</a>
                            <form action="{{ route('admin.destroy', [$row->id]) }}" class="d-inline" method="POST" onsubmit="return confirm('Apakah anda yakin Delete ?')">
                                @csrf
                                {{method_field('DELETE')}}
                                <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$admin->links()}}
        </div>
      </div>
    </div>
  </div>
@endsection
