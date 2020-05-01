@extends('layouts.app')
@section('content')

        <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                            @if (Session::has('message'))
                            <div class="alert alert-info"><h4 class="text-center" style="font-family:tahoma;">{{ Session::get('message') }}</h4></div>
                            @endif
                    <form action = "/edit/{{$user->id}}" method = "post">
                        {{ csrf_field() }}

                    <input type = "hidden" value="{{$user->id}}" name = "edit_id">
                             
                               
                                         User Coins: <input class="form-control" type = 'text' name = 'coins' 
                                            value = '{{$user->coins}}'/><br/>
                                            <button class="btn btn-primary" type="submit">Update</button>
                                  
                             </form>
                    </div>
                </div>
            </div>
@endsection