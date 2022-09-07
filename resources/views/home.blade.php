@extends('layouts.main')

@section('container')
    <h1>Halo {{ auth()->user()->username ??  '' }} selamat datang di Library App. </h1>
@endsection