@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header"><div class="alert-success encabezado-target">Edit Aplication <strong>(( {{"ID:".$app->Id." - ".$app->firs_name}} ))</strong></div>
            </div>
            <div class="card-body">
                @include('includes.mensaje1')
                @include('includes.mensaje2')
                @include('includes.editregister')
            </div>
        </div>
    </div>
</div>
@endsection