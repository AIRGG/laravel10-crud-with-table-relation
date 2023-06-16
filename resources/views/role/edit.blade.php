@extends('layout')
@section('header', 'Update Role')

@section('content')
<form action="{{ route('role.proses-edit') }}" method="post">
    @csrf
    <input type="hidden" name="oldid" id="oldid" value="{{ $data->id_role }}">
    <label>Nama Role</label><br>
    <input name="nama_role" class="form-control" type="text" value="{{ $data->nama_role }}" required><br><br>
    <a class="btn btn-secondary" href="{{ route('role.index') }}">Back</a>
    <input class="btn btn-primary" type="submit" value="Save">
</form>
@endsection

@section('js-custom')
@endsection
