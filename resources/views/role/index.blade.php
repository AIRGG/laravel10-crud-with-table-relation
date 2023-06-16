@extends('layout')
@section('header', 'Manage Role')

@section('content')
<a class="btn btn-primary" href="{{ route('role.create') }}">Add</a><br><br>
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $nomor => $value)
            <tr>
                <td>{{ $nomor + 1 }}</td>
                <td>{{ $value->nama_role }}</td>
                <td>
                    <a class="btn btn-warning btn-sm" href="{{ route('role.edit', ['oldid' => $value->id_role]) }}">Edit</a>
                    <a class="btn btn-danger btn-sm" href="{{ route('role.proses-delete', ['oldid' => $value->id_role]) }}" onclick="return confirm('Yakin?')">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('js-custom')
@endsection
