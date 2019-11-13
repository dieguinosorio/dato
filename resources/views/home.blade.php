@extends('layouts.app')
@section('title', 'Home')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
        </div>
    </div>
    @if(isset(Auth::user()->id) && Auth::user()->id > 0)
    <div class="card">
        <div class="card-header text-white bg-success"><strong>Aplications {{strtoupper(Auth::user()->name)}}</strong></div>
        <div class="card-body">
            <div class="alert alert-success"><a href="{{ action('HomeController@listaplications',Auth::user()->id) }}"><span><strong>Total Aplications : {{count($empresas->usuario)}}</strong></span></a></div>
            <div class="clearfix"></div>
        </div>
    </div><br>
    <div class="card">
        <div class="card-header text-white bg-primary"><strong>Information Plan</strong></div>
        <div class="card-body">

            @if($empresas->planesemp)
            <div class="alert alert-primary">
                <ul>
                    <li><strong>Active :</strong> {{$empresas->planesemp->Activo}}</li>
                    <li><strong>Fecha Activated :</strong>  {{$empresas->planesemp->FechaAdd}}</li>
                    <li><strong>Description : </strong>  {{$empresas->planesemp->plan->Descripcion}}</li>
                    <li><strong>Date Expired : </strong>  {{$empresas->planesemp->plan->ControlApp == 1?'Monthly cut':date("Y-m-d",strtotime($empresas->planesemp->FechaAdd."+".$empresas->planesemp->plan->CantMeses." month" ))}}</li>
                </ul>
            </div>
            @else
            <div class="alert alert-warning">
                <span>No active plan for your account {{strtoupper(Auth::user()->name)}}  was found, contact the system administrator</span>
            </div>
            @endif

        </div>
    </div>
    @else
    <div class="alert alert-info">
        <span>
            <li>Application Control.</li>
            <li>Required Formats Completed.</li>
            <li>Export data.</li>
            <li>Many more facilities that will allow you to have control of your applicants.</li>
        </span>
        <br>
        <a class="btn btn-success" href="{{ route('register') }}">{{ __('Register') }}</a>
        If you already have your account you just have to enter with your email and password by clicking here:
        <a class="btn btn-primary" href="{{ route('login') }}">{{ __('Login') }}</a>

    </div>

    <h2>Applications by Companies</h2>
    <hr>
    <h2>Filter Company</h2>
    <form method="GET" action="{{action("HomeController@index")}}">
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
                    </div>

                </div>

            </div>
            @endforeach
            <div class="clearfix"></div>
        @endif
    </div>
    @endif
</div>


@endsection
