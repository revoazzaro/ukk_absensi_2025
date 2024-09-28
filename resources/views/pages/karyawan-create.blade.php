@extends('layout.app')
@section('title', 'Tambah Karyawan')

@section('content')
<ul class="list-group col-10">
    <form action="{{ route('karyawan_create') }}" method="post" enctype="multipart/form-data">
        @csrf
        <li class="list-group-item">
            <div class="row justify-space-between align-items-center">
                <label for="nama" class="col-12 col-lg-2">Nama:</label>
                <input type="text" id="nama" name="nama" class="form-control col-12 col-lg-10" value="{{ old('nama') }}">
            </div>
            @error('nama')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </li>
        <li class="list-group-item">
            <div class="row justify-space-between align-items-center">
                <label for="email" class="col-12 col-lg-2">Email:</label>
                <input type="email" id="email" name="email" class="form-control col-12 col-lg-10" value="{{ old('email') }}">
            </div>
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </li>
        <li class="list-group-item">
            <div class="row justify-space-between align-items-center">
                <label for="password" class="col-12 col-lg-2">Password:</label>
                <input type="password" id="password" name="password" class="form-control col-12 col-lg-10" value="{{ old('password') }}">
            </div>
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </li>
        <li class="list-group-item">
            <div class="row justify-space-between align-items-center">
                <label for="role" class="col-12 col-lg-2">Role:</label>
                <select name="role" id="role" class="form-control col-12 col-lg-10">
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="karyawan" {{ old('role') == 'karyawan' ? 'selected' : '' }}>Karyawan</option>
                </select>
            </div>
            @error('role')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </li>
        <li class="list-group-item">
            <div class="row justify-space-between align-items-center">
                <label for="foto_profil" class="col-12 col-lg-2">Foto Profil:</label>
                <input type="file" id="foto_profil" name="foto_profil" class="form-control col-12 col-lg-10">
            </div>
            @error('foto_profil')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </li>
        <li class="list-group-item">
            <button type="submit" class="btn btn-primary mx-auto d-block col-10 col-lg-8">TAMBAH</button>
        </li>
    </form>
</ul>
@endsection