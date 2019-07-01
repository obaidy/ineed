@extends('layouts.app')

@section('content')
    
    <div>{{ $service->name }}</div>

    @foreach($providers as $provider)
        <div>{{ $provider->name}}</div>

    @endforeach


@endsection

