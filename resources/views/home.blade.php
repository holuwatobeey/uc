@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">My Dashboard</li>
                </ol>
                @if(Auth::user()->role == 0)
                <!-- Icon Cards-->
                <div class="row">
                    <div class="col-xl-6 col-sm-6 mb-6">
                    <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                        <div class="card-body-icon">
                            {{-- <i class="fas fa-coins"></i> --}}
                        </div>
                        <div class="mr-5">@php echo Auth::user()->coins @endphp Universal coins available!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left"></span>
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                        </a>
                    </div>
                    </div>
                    <div class="col-xl-6 col-sm-6 mb-6">
                    <div class="card text-white bg-warning o-hidden h-100">
                        <div class="card-body">
                        <div class="card-body-icon">
                            {{-- <i class="fa fa-fw fa-list"></i> --}}
                        </div>
                        <div class="mr-5">Transaction History!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#transaction_history">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                        </a>
                    </div>
                    </div><br/>
                    </div>
                    <br/>
                    @if(Auth::user()->paid == 0)
                    <form action="{{ url('charge') }}" method="post">
                        <input type="hidden" value="60" name="amount" />
                        {{ csrf_field() }}
                        <input type="submit" name="submit" value="Pay Now">
                    </form>
                    @endif
                    @if(Auth::user()->paid == 1)
                    <br/>
                    <p>You are now a verified member of universal coins, You will get an amount of coins per day.</p>
                    <a class="btn btn-primary" href="{{ route('shop') }}">Buy / Sell Coins</a>
                    <a class="btn btn-success" href="{{ route('transfer') }}">Transfer Coins</a>
                    &nbsp;&nbsp;
                    @endif
                    <br/><br/>
                    <div>
                            <br/>
                            @if ($transfer->isEmpty())
                            <h4 style="text-align:center;">You do not have  any transfer transaction.</h4>
                            @else
                            <h4 style="text-align:center;">Your transfer transaction(s).</h4>

                                <table class="table table-striped">
                                <tr>
                                    <th>Amount</th>
                                    <th>Reference number of receiver</th>
                                </tr>
                                @foreach ($transfer as $transfer)
                                <tr>
                                    <td>{{ $transfer->amount}}</td>
                                    <td>{{$transfer->ref_number}}</td>
                                </tr>
                                @endforeach
                                </table>
                            @endif
                            @if ($sell->isEmpty())
                            <h4 style="text-align:center;">You do not have any selling transaction.</h4>
                            @else
                            <h4 style="text-align:center;">Your selling transaction(s).</h4>

                                <table class="table table-striped">
                                <tr>
                                    <th>Amount</th>
                                    <th>buyer</th>
                                </tr>
                                @foreach ($sell as $sell)
                                <tr>
                                    <td>{{ $sell->amount}}</td>
                                    <td>{{$sell->buyer}}</td>
                                </tr>
                                @endforeach
                                </table>
                            @endif
                    </div>
                </div>
            </div>
            @else 
            <div class="row">
                    <div class="col-xl-6 col-sm-6 mb-6">
                            <div class="card text-white bg-primary o-hidden h-100">
                                <div class="card-body">
                                <div class="card-body-icon">
                                    {{-- <i class="fas fa-coins"></i> --}}
                                </div>
                                <div class="mr-5">All Users</div>
                                </div>
                    <a class="card-footer text-white clearfix small z-1" href="{{ route('allusers') }}">
                                <span class="float-left">View Details</span>
                                <span class="float-right">
                                    <i class="fa fa-angle-right"></i>
                                </span>
                                </a>
                            </div>
                            </div>
                            <div class="col-xl-6 col-sm-6 mb-6">
                            <div class="card text-white bg-warning o-hidden h-100">
                                <div class="card-body">
                                <div class="card-body-icon">
                                    {{-- <i class="fa fa-fw fa-list"></i> --}}
                                </div>
                                <div class="mr-5">Paid Users</div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1" href="{{ route('paidusers') }}">
                                <span class="float-left">View Details</span>
                                <span class="float-right">
                                    <i class="fa fa-angle-right"></i>
                                </span>
                                </a>
                            </div>
                            </div>
                            <div style="margin-top:2%;" class="col-xl-6 col-sm-6 mb-6">
                                    <div class="card text-white bg-success o-hidden h-100">
                                        <div class="card-body">
                                        <div class="card-body-icon">
                                            {{-- <i class="fa fa-fw fa-list"></i> --}}
                                        </div>
                                        <div class="mr-5">Buying transactions</div>
                                        </div>
                                        <a class="card-footer text-white clearfix small z-1" href="{{ route('transactions') }}">
                                        <span class="float-left">View Details</span>
                                        <span class="float-right">
                                            <i class="fa fa-angle-right"></i>
                                        </span>
                                        </a>
                                    </div>
                                    </div>
                            <br/>
                            </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
