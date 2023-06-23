@extends('layout')
@section('header', 'Manage Profile')

@section('content')
@if (auth()->guard('userlogin')->user()->role->nama_role == 'admin')
<a class="btn btn-primary" href="{{ route('profile.create') }}">Add</a><br><br>
@endif
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>NoHP</th>
                <th>Username</th>
                <th>Password</th>
                <th>Role</th>
                @if (auth()->guard('userlogin')->user()->role->nama_role == 'admin')
                <th>Action</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $nomor => $value)
            <tr>
                <td>{{ $nomor + 1 }}</td>
                <td>{{ $value->nama }}</td>
                <td>{{ $value->alamat }}</td>
                <td>{{ $value->nohp }}</td>
                <td>{{ $value->user->username }}</td>
                <td>{{ $value->user->password }}</td>
                <td>{{ $value->user->role->nama_role }}</td>
                @if (auth()->guard('userlogin')->user()->role->nama_role == 'admin')
                <td>
                    <a class="btn btn-warning btn-sm" href="{{ route('profile.edit', ['oldid' => $value->id_profile]) }}">Edit</a>
                    <a class="btn btn-danger btn-sm" href="{{ route('profile.proses-delete', ['oldid' => $value->id_profile]) }}" onclick="return confirm('Yakin?')">Hapus</a>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('js-custom')
@endsection
