@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">{{$listing->name}} <a href="/listings" class="pull-right btn btn-default btn-xs">Go Back</a></div>

            <div class="panel-body">
                <ul class="list-group">
                  <li class="list-group-item">Adress: {{$listing->adress}}</li>
                  <li class="list-group-item">Website: <a href="{{$listing->website}}" target="_blank">{{$listing->website}}</a></li>
                  <li class="list-group-item">Email: {{$listing->email}}</li>
                  <li class="list-group-item">Phone number: {{$listing->phone}}</li>
                </ul>
                <hr>
                  <div class="well">
                    {{$listing->bio}}
                  </div>
                </hr>
            </div>
        </div>
    </div>
</div>
@endsection