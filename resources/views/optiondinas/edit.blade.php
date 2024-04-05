@extends('layouts.bootstrap')

@section('title')
Edit Dinas Terkait
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
            <a href="{{route('berkas.index')}}">Back</a>
            <h3>Edit Data {{$optiondinas->user->name}}</h3>
        </div>
        <hr>
        <div class="card-body">
            @include('alert.failed')
            <form method="POST" action="{{ route('optiondinas.update', [$optiondinas->id]) }}" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}

                <div class="form-group">
                    <label for="keterangan_dinas">Keterangan</label>
                    <input type="text" class="form-control {{$errors->first('keterangan_dinas') ? 'is-invalid' : ''}}" name="keterangan_dinas" id="keterangan_dinas" placeholder="Tambahkan Keterangan" value="{{ $optiondinas->keterangan_dinas }}">
                    <span class="error invalid-feedback">{{$errors->first('keterangan_dinas')}}</span>
                </div>

                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Update Data</button>
                </div>
              </form>
        </div>
      </div>
    </div>
  </div>
@endsection

