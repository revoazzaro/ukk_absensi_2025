@extends('layout.app')
@section('title', 'Profile')
@section('content')
<ul class="list-group col-10">
    <form action="{{ route('profile') }}" method="post" enctype="multipart/form-data">
        @csrf
        <li class="list-group-item">
            <label for="foto_profil" style="width: 15rem; height: 15rem;" class="mx-auto d-block">
                <img src="{{ asset('storage/' . auth()->user()->foto_profil) }}" width="100%" height="100%" alt="Profile Image" class="mx-auto d-block rounded-circle">
            </label>
        </li>
        <li class="list-group-item">
            <div class="row justify-space-between align-items-center">
                <label for="nama" class="col-12 col-lg-2">Nama:</label>
                <input type="text" id="nama" name="nama" class="form-control col-12 col-lg-10" value="{{ old('nama') ?? auth()->user()->nama }}">
            </div>
            @error('nama')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </li>
        <li class="list-group-item">
            <div class="row justify-space-between align-items-center">
                <label for="email" class="col-12 col-lg-2">Email:</label>
                <input type="email" id="email" name="email" class="form-control col-12 col-lg-10" value="{{ old('email') ?? auth()->user()->email }}">
            </div>
            @error('email')
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
            <button type="submit" class="btn btn-warning mx-auto d-block col-10 col-lg-8">EDIT</button>
        </li>
    </form>
</ul>
@endsection