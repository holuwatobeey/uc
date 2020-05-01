@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                        <form method="POST" action="{{ route('transfer') }}">
                                @csrf
                        <div class="container">
                        <div class="col-md-12 card">
                            <br/>
                                @if (Session::has('message'))
                                <div class="alert alert-info"><h4 class="text-center" style="font-family:tahoma;">{{ Session::get('message') }}</h4></div>
                                @endif
                                <br /><h2 class="text-center">Transfer Coins</h2>
                        <div class="row card-body">
                            <div class="col-md-6">
                                
                                    <div class="form-group ">
                                        <div class="col-md-12">
                                            <label for="" class="col-form-label text-md-right">{{ __('From') }}</label>
                                            <input id="" type="text" class="form-control" name="user_name" value={{ Auth::user()->name }}  disabled>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <div class="col-md-12">
                                        <label for="ben_number" class="col-form-label text-md-right">{{ __('Reference number of receiver') }}</label>
                                        <input id="ben_number" type="text" class="form-control" name="ref_number" value="" required autofocus>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        <div class="row card-body">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                            <div class="col-md-12">
                                                <label for="amount" class="col-form-label text-md-right">{{ __('Amount of coin(s)') }}</label>
                                                <input id="name" type="number" class="form-control" name="amount" value="" required >
                                            </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <div class="col-md-12">
                                            <label for="remarks" class="col-form-label text-md-right">{{ __('Memo') }}</label>
                                            <input id="name" type="text" class="form-control" name="memo" value="" >
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="row card-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Transfer') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                
                            </div>
                        </div>  
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
