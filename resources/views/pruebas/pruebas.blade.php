@extends('layouts.app')
@section('title', 'pruebas')
@section('content')
<div class="container-fluid">
    @include('includes.mensaje')
    <div class="card">
        <div class="card-header">Enviar Mail</div>
        <div class="card-body">
            <form method="GET" action="{{action('HomeController@PruebaMail')}}">
                <input class="form-control" type="text" name="titulo" /><br>
                <input class="form-control" type="text" name="mensaje" />
                <input type="submit" class="btn btn-success" value='Enviar Mail'/>
            </form>
        </div>
    </div>
</div>
@endsection

