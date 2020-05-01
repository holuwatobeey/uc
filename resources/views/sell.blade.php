@extends('layouts.app')
@section('content')

        <div class="container">
                <div class="col-md-8 offset-md-3 justify-content-center">
                            @if (Session::has('message'))
                                <div class="alert alert-info"><h4 class="text-center" style="font-family:tahoma;">{{ Session::get('message') }}</h4></div>
                            @endif
                            <form method="POST" action="{{ route('sell') }}">
                                @csrf
                                <div class="form-group row">
                                  <div class="col-sm-10">
                                    <input type="number" name="amount" class="form-control" placeholder="How many coins do you want to sell?">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" placeholder="Paypal Email Address">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <div class="col-sm-10">
                                    <button type="submit" class="btn btn-success">Post Offer</button>
                                  </div>
                                </div>
                            </form>
                </div>
            </div>
@endsection