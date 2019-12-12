@extends('layouts.app')
@section('title', 'pruebas')
@section('content')
<div class="container">
    @include('includes.mensaje')
    <div class="card">
        <div class="card-header card-header bg-success text-white">Send Email</div>
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
                        <input type="submit" class="btn btn-success" value='Send Mail'/>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <br>
    <hr>
    <div class="card">
        <div class="card-header bg-primary text-white">Send Application Form</div>
        <div class="card-body">
            <form method="GET" action="{{action('HomeController@EnviarAplication')}}">
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="tituloAp" Value='Applicantion Form Company {{strtoupper($empresa->name)}}' required/><br>
                    </div>
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Menssage') }}</label>
                    <div class="col-md-6">
                        <textarea class="form-control"  name="mensajeAp">Hello, this message has been sent by the company {{strtoupper($empresa->name)}} so that you can manage it so you can manage your candidacy.<br>Form: http://aplicant.dato.pro/dato/public/company/{{$empresa->id}}<br><br><br>This message is sent automatically, please do not reply.</textarea><br>
                    </div>
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                    <div class="col-md-6">
                        <input class="form-control" type="email" name="emailAp" required placeholder="email@prueba.com" /><br>
                    </div>
                    <div class="col-md-6">
                        <input type="submit" class="btn btn-primary" value='Send Mail'/>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection

