@extends('layouts.app')
@section('content')

        <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                            <form action="/search" method="POST" role="search">
                                {{ csrf_field() }}
                                <div class="input-group">
                                    <input type="number" class="form-control" name="q"
                                        placeholder="Search..."> <span class="input-group-btn">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-outline-secondary" type="button">Search</button>
                                        </div>
                                    </span>
                                </div>
                            </form><br/>
                            <table class="table table-striped">
                           
                            <tbody>
                                                
                                    @foreach($sales as $sales)
                                    <tr>
                                            <form action="{{ url('charge') }}" method="post">
                                                    {{ csrf_field() }}

                                        <td>{{$sales->seller}} wants to sell  {{$sales->amount}} coins
                                        <input type="hidden" value="{{$sales->amount}}" name="amount" />
                                        <input type="hidden" value="{{$sales->email}}" name="email_of_seller" />
                                            <input class="btn btn-info pull-right" type="submit" name="submit" value="Buy">

                                       
                                        </td>
                                    </form>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="container">
                                    {{-- <form action="{{ url('charge') }}" method="post">
                                            <input type="hidden" value="60" name="amount" />
                                            {{ csrf_field() }}
                                            <input type="submit" name="submit" value="Pay Now">
                                        </form> --}}
                                    @if(isset($details))
                                        <p> The Search results for your query <b> {{ $query }} </b> are :</p>
                                    <table class="table table-striped">
                                        {{-- <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead> --}}
                                        <tbody>
                                                
                                            @foreach($details as $result)
                                            <tr>
                                                    <form action="{{ url('charge') }}" method="post">
                                                            {{ csrf_field() }}

                                                <td>{{$result->seller}} wants to sell  {{$result->amount}} coins
                                                <input type="hidden" value="{{$result->amount}}" name="amount" />
                                                    <input class="btn btn-info pull-right" type="submit" name="submit" value="Buy">

                                               
                                                </td>
                                            </form>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                       
                                    </table>
                                    @endif
                                </div>
                    </div>
                </div>
            </div>
            
@endsection