@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Edit listing <a href="/dashboard" class="pull-right btn btn-default btn-xs">Dashboard</a></div>

            <div class="panel-body">
                {!!Form::open(['action' => ['ListingsController@update', $listing->id], 'method' => 'POST'])!!}
                  {{Form::bsText('name', $listing->name, ['placeholder' => 'Company Name'])}}
                  {{Form::bsText('website', $listing->website, ['placeholder' => 'Company Website'])}}
                  {{Form::bsText('email', $listing->email, ['placeholder' => 'Company Email'])}}
                  {{Form::bsText('phone', $listing->phone, ['placeholder' => 'Contact Phone'])}}
                  {{Form::bsText('adress', $listing->adress, ['placeholder' => 'Business Adress'])}}
                  {{Form::bsTextArea('bio', $listing->bio, ['placeholder' => 'About'])}}
                    {{ Form::hidden('_method', 'PUT')}} {{-- hidden input with PUT becouse we are updating listing --}}
                  {{Form::bsSubmit('submit')}}
                {!!Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection