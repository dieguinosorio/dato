@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            
        </div>
        <div class="col-md-8">
            <div class="card-header"><div class="alert-success encabezado-target">Register of Employed for <strong>(( {{$empresa->name}} ))</strong></div>
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