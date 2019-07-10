@extends('layouts.app')

@section('content')
<div>{{ $provider->name }}</div>
<div>{{ $provider->category_id }}</div>
<div>{{ $provider->description }}</div>
@endsection
