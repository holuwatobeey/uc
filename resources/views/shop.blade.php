@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <h3>Welcome to the marketplace</h3>
                   
                    <a class="btn btn-primary" href="{{ route('buy') }}">Buy Coins</a>
                    @if($sales)
                    @else
                    <a class="btn btn-success" href="{{ route('sell') }}">Sell Coins</a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
