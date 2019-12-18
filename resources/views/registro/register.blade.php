@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert-primary card-header">Register Aplication For <strong>{{strtoupper($empresa->name)}}</strong>
                <div class="profile-avatar">
                    <img src="{{action("HomeController@getImageCompany",$empresa->image)}}"/>
                </div>
            </div>
            <div class="card-body">
                @include('includes.mensaje1')
                @include('includes.mensaje2')
            </div>
        </div>
    </div>
</div>
@endsection