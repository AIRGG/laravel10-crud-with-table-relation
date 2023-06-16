@extends('layout')
@section('header', 'Create Role')

@section('content')
<form action="{{ route('role.proses-add') }}" method="post">
    @csrf
    <input type="hidden" name="oldid" id="oldid" value="">
    <label>Nama Role</label><br>
    <input name="nama_role" class="form-control" type="text" required><br><br>
    <a class="btn btn-secondary" href="{{ route('role.index') }}">Back</a>
    <input class="btn btn-primary" type="submit" value="Save">
</form>
@endsection

@section('js-custom')
@endsection
