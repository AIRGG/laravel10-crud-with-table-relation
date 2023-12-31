@extends('layout')
@section('header', 'Manage Posts')

@section('content')
@if (auth()->guard('userlogin')->user()->role->nama_role == 'admin')
<a class="btn btn-primary" href="{{ route('post.create') }}">Add</a><br><br>
@endif
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Title</th>
                <th>Picture</th>
                @if (auth()->guard('userlogin')->user()->role->nama_role == 'admin')
                <th>Action</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $nomor => $value)
            <tr>
                <td>{{ $nomor + 1 }}</td>
                <td>{{ $value->user->username }}</td>
                <td>{{ $value->title }}</td>
                <td>
                    <img src="/posts/{{ $value->picture }}" style="width: 100px; height: auto;">
                </td>
                @if (auth()->guard('userlogin')->user()->role->nama_role == 'admin')
                <td>
                    <a class="btn btn-warning btn-sm" href="{{ route('post.edit', ['oldid' => $value->id_post]) }}">Edit</a>
                    <a class="btn btn-danger btn-sm" href="{{ route('post.proses-delete', ['oldid' => $value->id_post]) }}" onclick="return confirm('Yakin?')">Hapus</a>
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
