@extends('layouts.app')
@section('title', 'List Bussiness')
@section('content')
<div class="container">
    @include('includes.mensajeexito')
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
        </div>
    </div>
   
 
    
    <h2>Applications by Companies</h2>
    <hr>
    <h2>Filter Company</h2>
    <form method="GET" action="{{action("EmpresasController@BusquedaEmpresa")}}">
        <div class="form-group col-md-8">
            <input id="criteria" type="text" class="form-control" name="criteria" autofocus>
        </div>
        <div class="form-group col-md-1">
            <button type="submit" class="btn btn-primary">
                Filter
            </button>
        </div>
    </form>
    <div class="row">
        @if($empresas)
            @foreach($empresas as $empresa)
            <div class="col-lg-4 mb-4">
                <div class="card h-100 text-center">
                    <a href="{{route('company.index',$empresa->id)}}" >
                        <img class="card-img-top" src="{{action("HomeController@getImagePublic",['filename'=>$empresa->image])}}" alt="">
                        <div class="card-body">
                            <h4 class="card-title">{{$empresa->name}}</h4>
                            <h6 class="card-subtitle mb-2 text-muted"></h6>
                        </div>
                    </a>
                    <div class="card-footer">
                        <a href="#">{{$empresa->email}}</a>
                        <div class="link">
                            <input style="width: 100%;" class="form-control" id="link{{$empresa->id}}" type="text" value="{{'http://aplicant.dato.pro/dato/public/company/'.$empresa->id}}" disabled="false"/>
                            <input style="float: right;" type="button" class="btn btn-sm btn-primary" id="btn-copy-link" value ="Copy Link" onclick="CopyLink('{{$empresa->id}}')"/>
                        </div>
                    </div>

                </div>

            </div>
            @endforeach
            <div class="clearfix"></div>
        @endif
    </div>
</div>
@endsection
