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
        <div class="card-header">Aplications</div>
        <div class="card-body">
            <div class="alert alert-success"><a href="{{ action('HomeController@listaplications',Auth::user()->id) }}"><span><strong>Total Aplications : {{count($empresas->usuario)}}</strong></span></a></div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">Information Plan</div>
        <div class="card-body">
            <div class="alert alert-success"><a href="{{ action('HomeController@listaplications',Auth::user()->id) }}"><span><strong>Total Aplications : {{count($empresas->usuario)}}</strong></span></a></div>
        </div>
    </div>
    @else
    <h2>Business</h2>
    <div class="row">
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
    </div>
    @endif
</div>
@endsection
