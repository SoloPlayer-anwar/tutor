@extends('layouts.bootstrap')

@section('title')
Edit Data Admin
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
            <a href="{{route('admin.index')}}">Back</a>
            <h3>Edit Data Admin {{$admin->name}}</h3>
        </div>
        <hr>
        <div class="card-body">
            @include('alert.failed')
            <form method="POST" action="{{ route('admin.update', [$admin->id]) }}" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}

                  <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control {{$errors->first('name') ? 'is-invalid' : ''}}" name="name" id="name" placeholder="Enter Nama" value="{{ $admin->name }}">
                    <span class="error invalid-feedback">{{$errors->first('name')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control {{$errors->first('email') ? 'is-invalid' : ''}}" name="email" id="email" placeholder="Enter Email" value="{{ $admin->email }}">
                    <span class="error invalid-feedback">{{$errors->first('email')}}</span>
                  </div>


                  <div class="form-group">
                    <label for="password">Password Lama</label>
                    <input type="password" class="form-control" disabled id="password" placeholder="Enter password" value="{{ $admin->password }}">
                  </div>


                  <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter new password">
                  </div>

                  <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-control {{$errors->first('role') ?  'is-invalid' : ''}}">
                        <option value="user" @if ($admin->role == 'user') selected @endif>user</option>
                        <option value="admin" @if ($admin->role == 'admin') selected @endif>admin</option>
                    </select>
                    <span class="error invalid-feedback">{{$errors->first('role')}}</span>
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
