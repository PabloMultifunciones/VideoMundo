@extends('layouts.app')

@push('title')
    <title>{{$video->title}} - {{config ('app.name')}}</title>
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                        
                            <video src="{{$video->video}}" controls></video>
                            <div class="card-title mt-1 d-flex">
        
                                <h1 class="justify-content-start">{{$video->title}}</h1>
                            
                                <div class="ms-auto">
                                    <h5>{{$video->user()->get()->first()->username}}</h5>
                                    <h5>{{$video->created_at}}</h5>
                                </div>
                            
                            </div>
                            <hr>
                            <h4>{{$video->description}}</h4>
                           
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
