@extends('layouts.app')
@section('content')

        <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <h4>Users</h4>
                        <table class="table table-striped">
                                <tr>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>country</th>
                                    <th>city</th>
                                    <th>address</th>
                                    <th>coins</th>
                                </tr>
                                @foreach ($allusers as $users)
                                <tr>
                                    <td>{{ $users->name}}</td>
                                    <td>{{$users->email}}</td>
                                    <td>{{$users->country}}</td>
                                    <td>{{$users->city}}</td>
                                    <td>{{$users->address}}</td>
                                    <td>{{$users->coins}}</td>
                                </tr>
                                @endforeach
                                </table>
                    </div>
                </div>
            </div>
@endsection