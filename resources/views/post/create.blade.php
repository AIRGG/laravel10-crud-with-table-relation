@extends('layout')
@section('header', 'Create Post')

@section('content')
<form action="{{ route('post.proses-add') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="oldid" id="oldid" value="">
    <label>Title</label><br>
    <input name="title" class="form-control" type="text" required><br>
    <label>Picture</label><br>
    <input name="picture" class="form-control" type="file" accept=".png, .jpg, .jpeg" required><br>
    <label>User</label><br>
    <select name="user" id="user" class="form-control">
        @foreach ($dataUser as $nomor => $value)
        <option value="{{ $value->id_user }}">{{ $value->username }}</option>
        @endforeach
    </select>

    <br><br>
    <a class="btn btn-secondary" href="{{ route('post.index') }}">Back</a>
    <input class="btn btn-primary" type="submit" value="Save">
</form>
@endsection

@section('js-custom')
@endsection
