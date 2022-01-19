@extends('layouts.app')

@push('title')
    <title>{{config ('app.name')}}</title>
@endpush

@section('content')
    <videos-component></videos-component>
@endsection
