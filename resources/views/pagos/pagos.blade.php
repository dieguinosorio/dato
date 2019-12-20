@extends('layouts.app')
@section('title', 'Payments')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="alert-primary card-header"><strong>Payments</strong>
            </div>
            <div class="card-body">
                @include('includes.mensajeerror')
                @include('includes.mensajeexito')

                <form method="POST" action="{{route('pay')}}" id='paymentForm'>
                    @csrf
                    <div class="row">
                        <div class="col-auto">
                            <label> Total to pay </label>
                            <h1><label class="alert-danger">$ {{$plan->Price}} USD</label></h1>
                            <input type="hidden" min="5"  step="0.01" class="form-control" name="value" value="{{$plan->Price}}">
                            <small class="form-text text-muted">
                                Use values with up to two decimal positions.
                            </small>
                        </div>
                        <div class="col-auto">
                            <select class="custom-select" id="TpMoneda" name="moneda" style="display: none;">
                                @if(isset($monedas))
                                    @foreach($monedas as $tipo)
                                    <option value="{{$tipo->iso}}" 
                                        @if($tipo->iso == 'usd')
                                            selected ="true"
                                        @endif
                                    required >{{strtoupper($tipo->iso)}}</option>
                                    @endforeach
                                @endif
                            </select>
                            
                        </div>
                        
                    </div>
                    <div class="row mt-3">
                        
                        
                        <div class="col-md">
                            <label>Selected the desired payment platform:</label>
                            <div class="form-group" id='toggler'>
                                <div class="btn-group btn-group-toggle" data-toggle='buttons'>
                                    @foreach($payments as $PayForm)
                                    <label class="btn btn btn-outline-secondary rounded m-2 p-1"
                                       data-target="#{{$PayForm->name}}Collapse"
                                       data-toggle="collapse"    
                                    >
                                        <input type="radio" name="payment_platform" value="{{$PayForm->id}}" required>
                                        <img class="img-thumbnail" src="{{action("HomeController@getImagePublic",['filename'=>strtolower($PayForm->name).".jpg"])}}">
                                    </label>
                                    @endforeach
                                </div>
                                @foreach($payments as $PayForm)
                                <div id="{{$PayForm->name}}Collapse" class="collapse" data-parent="#toggler">
                                    @includeIf('includes.components.'.strtolower($PayForm->name).'-collapse')
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" id="payButton" class="btn btn-primary">
                            Pay
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection