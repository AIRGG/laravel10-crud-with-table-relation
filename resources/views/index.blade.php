@extends('layout')
@section('header', 'Halaman Index')

@section('content')
Welcome to Dashboard..!
<br>
Nama: <b>{{ auth()->guard('userlogin')->user()->profile->nama }}</b><br>
Role: <b>{{ auth()->guard('userlogin')->user()->role->nama_role }}</b><br>
@endsection

@section('js-custom')
@endsection
