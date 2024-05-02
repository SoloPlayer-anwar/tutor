@extends('layouts.bootstrap')

@section('title')
Dinas Bersangkutan
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
            <h3>Tambahkan Dinas Bersangkutan</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('optiondinas.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="form-group" hidden>
                        <label for="berkas_id"></label>
                        <input type="text" class="form-control"  hidden id="berkas_id" name="berkas_id" placeholder="Enter Surat Id" value="{{$berkas_id}}">
                    </div>

                   @if (Auth::user()->role == "master")
                   <div class="form-group">
                    <label for="user_id">Dinas</label>
                    <select name="user_id" id="user_id" class="form-control">
                        <option value="">>-- Pilih Dinas --<</option>
                        @foreach ($user as $users )
                        <option value="{{$users->id}}">{{$users->name}} - {{$users->dinas->nama_dinas}}</option>
                        @endforeach
                    </select>
                    </div>
                   @else
                   <div class="form-group">
                    <div class="form-group" hidden>
                        <label for="user_id"></label>
                        <input type="text" class="form-control"   id="user_id" name="user_id" placeholder="Enter Surat Id" value="{{Auth::user()->id}}">
                    </div>
                   @endif

                    <div class="form-group">
                        <label for="keterangan_dinas">Keterangan Dinas</label>
                        <input type="text" class="form-control {{$errors->first('keterangan_dinas') ? 'is-invalid' : ''}}" name="keterangan_dinas" id="keterangan_dinas" placeholder="Keterangan Dinas" value="{{ old('keterangan_dinas')}}">
                        <span class="error invalid-feedback">{{$errors->first('keterangan_dinas')}}</span>
                    </div>

                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
        </div>
      </div>
    </div>
  </div>
@endsection
