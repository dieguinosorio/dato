@extends('layouts.app')
@section('title', 'pruebas')
@section('content')
<div class="container-fluid">
    @include('includes.mensaje')
    <div class="card">
        <div class="card-header">Enviar Mail</div>
        <div class="card-body">
            <form method="GET" action="{{action('HomeController@PruebaMail')}}">
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="titulo" /><br>
                    </div>
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Menssage') }}</label>
                    <div class="col-md-6">
                        <textarea class="form-control"  name="mensaje" ></textarea><br>
                    </div>
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                    <div class="col-md-6">
                        <input class="form-control" type="email" name="email" /><br>
                    </div>
                    <div class="col-md-6">
                        <input type="submit" class="btn btn-success" value='Enviar Mail'/>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection

