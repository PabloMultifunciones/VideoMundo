@extends('layouts.app')

@push('title')
    <title>{{config ('app.name')}}</title>
@endpush

@section('content')
<search-component></search-component>
@endsection
