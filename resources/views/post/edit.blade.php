@extends('layout')
@section('header', 'Update Post')

@section('content')
<form action="{{ route('post.proses-edit') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="oldid" id="oldid" value="{{ $data->id_post }}">
    <label>Title</label><br>
    <input name="title" class="form-control" type="text" value="{{ $data->title }}" required><br>
    <label>Picture</label><br>
    <input name="picture" class="form-control" type="file" accept=".png, .jpg, .jpeg"><br>
    <input type="hidden" name="pictureold" id="pictureold" value="{{ $data->picture }}">
    <img src="/posts/{{ $data->picture }}" alt="" style="width: 100px; height: auto;"><br>
    <label>User</label><br>
    <select name="user" id="user" class="form-control">
        @foreach ($dataUser as $nomor => $value)
        <option @if ($data->user->id_user == $value->id_user) selected @endif value="{{ $value->id_user }}">{{ $value->username }}</option>
        @endforeach
    </select>

    <br><br>
    <a class="btn btn-secondary" href="{{ route('post.index') }}">Back</a>
    <input class="btn btn-primary" type="submit" value="Save">
</form>
@endsection

@section('js-custom')
@endsection
