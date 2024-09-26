@extends('layout.app')
@section('title', 'Daftar Karyawan')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Karyawan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Daftar Karyawan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Foto Profile</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Foto Profile</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($karyawans as $karyawan)
                            <tr>
                                <td>{{ $karyawan->nama }}</td>
                                <td>{{ $karyawan->email }}</td>
                                <td>
                                    <img 
                                        src="{{ asset('storage/' . $karyawan->foto_profil ) }}" 
                                        alt="Foto profil" width="50px" height="50px" class="d-block rounded-circle"
                                    >
                                </td>
                                <td>{{ $karyawan->role }}</td>
                                <td class="d-flex justify-content-between">
                                    <a href="{{ route('karyawan_edit', $karyawan->id) }}" role="button" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('karyawan_delete', $karyawan->id) }}" role="button" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection