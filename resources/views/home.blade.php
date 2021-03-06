@extends('layouts.ineed')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(auth()->user()->role == 'user')
                    <h1>User</h1>
                    <?= $services ?>
                    @elseif(auth()->user()->role == 'provider')
                    <h1>Provider</h1>
                  
                    <a href="/provider">Dashboard</a>
                    <a href="{{ action('ProviderInfo@index') }}">Edit</a>
                        
                    @endif
                    <?= $services ?>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
