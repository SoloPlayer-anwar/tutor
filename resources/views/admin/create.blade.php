@extends('layouts.bootstrap')

@section('title')
Create Admin
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-warning">
        <div class="card-header">
            <h3>Buat Admin Baru</h3>
        </div>
        <div class="card-body">
            <a href="{{route('admin.index')}}" class="btn btn-secondary btn-sm">Back</a>
            @include('alert.failed')
            <form method="post" action="{{route('admin.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label for="name">Buat Nama</label>
                        <input type="text" class="form-control {{$errors->first('name') ? 'is-invalid' : ''}}" name="name" id="name" placeholder="Buat name" value="{{ old('name')}}">
                        <span class="error invalid-feedback">{{$errors->first('name')}}</span>
                    </div>


                    <div class="form-group">
                        <label for="email">Buat Email</label>
                        <input type="email" class="form-control {{$errors->first('email') ? 'is-invalid' : ''}}" name="email" id="email" placeholder="Buat email" value="{{ old('email')}}">
                        <span class="error invalid-feedback">{{$errors->first('email')}}</span>
                    </div>


                    <div class="form-group">
                        <label for="password">Buat Password</label>
                        <input type="password" class="form-control {{$errors->first('password') ? 'is-invalid' : ''}}" name="password" id="password" placeholder="Buat password" value="{{ old('password')}}">
                        <span class="error invalid-feedback">{{$errors->first('password')}}</span>
                    </div>

                    <div class="form-group mb-4">
                        <label for="role">Role</label>
                        <select class="form-control {{$errors->first('role') ? 'is-invalid' : ''}}" name="role" id="role">
                            <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>user</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>admin</option>
                            <option value="master" {{ old('role') == 'master' ? 'selected' : '' }}>Master</option>
                        </select>
                        <span class="error invalid-feedback">{{$errors->first('role')}}</span>
                    </div>

                    <div class="form-group">
                        <label for="dinas_id">Dinas</label>
                        <select name="dinas_id" id="dinas_id" class="form-control">
                            <option value="">>-- Pilih Kategori --<</option>
                            @foreach ($dinas as $dinasty )
                            <option value="{{$dinasty->id}}">{{$dinasty->nama_dinas}}</option>
                            @endforeach
                        </select>
                      </div>

                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan Data Sekarang</button>
                </div>
              </form>
        </div>
      </div>
    </div>
  </div>
@endsection
