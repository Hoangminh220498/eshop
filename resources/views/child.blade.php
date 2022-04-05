@extends('layout')


@section('title', 'Page Child')

@section('sidebar');
@parent
This is layout child sidebar
@endsection

@section('conten')
    <h1>Content of child</h1>
@endsection    
