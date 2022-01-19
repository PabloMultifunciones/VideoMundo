@extends('layouts.app')

@push('title')
    <title>Subir - {{config ('app.name')}}</title>
@endpush

@section('content')
    <main-upload-component></main-upload-component>
@endsection
