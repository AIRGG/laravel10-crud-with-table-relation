@extends('layout')
@section('header', 'Create Profile')

@section('content')
<form action="{{ route('profile.proses-add') }}" method="post">
    @csrf
    <input type="hidden" name="oldid" id="oldid" value="">
    <label>Nama</label><br>
    <input name="nama" class="form-control" type="text" required><br>
    <label>NoHp</label><br>
    <input name="nohp" class="form-control" type="text" required><br>
    <label>Alamat</label><br>
    <input name="alamat" class="form-control" type="text" required><br>
    <hr>
    <label>Username</label><br>
    <input name="username" class="form-control" type="text" required><br>
    <label>Password</label><br>
    <input name="password" class="form-control" type="password" required><br>
    <label>Role</label><br>
    <select name="role" id="role" class="form-control">
        @foreach ($dataRole as $nomor => $value)
        <option value="{{ $value->id_role }}">{{ $value->nama_role }}</option>
        @endforeach
    </select>

    <br><br>
    <a class="btn btn-secondary" href="{{ route('profile.index') }}">Back</a>
    <input class="btn btn-primary" type="submit" value="Save">
</form>
@endsection

@section('js-custom')
@endsection
