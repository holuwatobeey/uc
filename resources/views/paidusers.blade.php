@extends('layouts.app')
@section('content')

        <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <h4>Paid Users</h4>
                            <table class="table table-striped">
                                    <tr>
                                        <th>name</th>
                                        <th>email</th>
                                        <th>country</th>
                                        <th>city</th>
                                        <th>address</th>
                                        <th>coins</th>
                                        <th>action</th>

                                    </tr>
                                    @foreach ($paidusers as $users)
                                    <tr>
                                        <td>{{ $users->name}}</td>
                                        <td>{{$users->email}}</td>
                                        <td>{{$users->country}}</td>
                                        <td>{{$users->city}}</td>
                                        <td>{{$users->address}}</td>
                                        <td>{{$users->coins}}</td>
                                    <td><a href="/edit/{{$users->id}}" class="btn btn-primary">Update Coins</a></td>
                                        
                                    </tr>
                                    @endforeach
                                    </table>
                    </div>
                </div>
            </div>
@endsection