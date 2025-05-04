@extends('mark::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('mark.name') !!}</p>
@endsection
