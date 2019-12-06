@extends('layouts.app')
@section('title', 'Administrator plans')
@section('content')
<div class="container">
    @include('includes.mensaje')
    <div id="accordion">
        <div class="card">
            <div class="card-header" id="headingOne" text-white bg-success>
                <h5 class="mb-0" text-white bg-success>
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        CREATE PLANT CUOTA MONTH
                    </button>
                </h5>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    <form method="GET" action="{{action('PlansController@CreatePlanMonth')}}" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="name"  required>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div id="pnlMont">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Cant Month</label>

                                <div class="col-md-6">
                                    <input type="number" id="cantmonth" class="form-control{{ $errors->has('cantmonth') ? ' is-invalid' : '' }}" name="cantmonth"  required>
                                    @if ($errors->has('cantmonth'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cantmonth') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fhbirth" class="col-md-4 col-form-label text-md-right">Date Start</label>

                                <div class="col-md-6">
                                    <input id="fhinicio" type="date" class="form-control{{ $errors->has('fhinicio') ? ' is-invalid' : '' }}" name="fhinicio" required>

                                    @if ($errors->has('fhinicio'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fhinicio') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fhbirth" class="col-md-4 col-form-label text-md-right">Date End</label>

                                <div class="col-md-6">
                                    <input id="fhfin" type="date" class="form-control{{ $errors->has('fhfin') ? ' is-invalid' : '' }}" name="fhfin" required>

                                    @if ($errors->has('fhinicio'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fhinicio') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="namesur" class="col-md-4 col-form-label text-md-right">Top</label>

                                <div class="col-md-6">
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input id='top' name="top" type="checkbox" >
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="namesur" class="col-md-4 col-form-label text-md-right">Description</label>

                                <div class="col-md-6">
                                    <textarea id='comentarios' name="comentarios" class="form-control" rows="5" ></textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" id="btnGuardar" class="btn btn-primary">
                                        Create
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        CREATE PLAN FOR APLICATIONS
                    </button>
                </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                     <form>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="name"  required>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div id="pnlMont">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Cant Month</label>

                                <div class="col-md-6">
                                    <input type="number" id="cantmonth" class="form-control{{ $errors->has('cantmonth') ? ' is-invalid' : '' }}" name="cantmonth"  required>
                                    @if ($errors->has('cantmonth'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cantmonth') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fhbirth" class="col-md-4 col-form-label text-md-right">Date Start</label>

                                <div class="col-md-6">
                                    <input id="fhinicio" type="date" class="form-control{{ $errors->has('fhinicio') ? ' is-invalid' : '' }}" name="fhinicio" required>

                                    @if ($errors->has('fhinicio'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fhinicio') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fhbirth" class="col-md-4 col-form-label text-md-right">Date End</label>

                                <div class="col-md-6">
                                    <input id="fhinicio" type="date" class="form-control{{ $errors->has('fhinicio') ? ' is-invalid' : '' }}" name="fhinicio" required>

                                    @if ($errors->has('fhinicio'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fhinicio') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="namesur" class="col-md-4 col-form-label text-md-right">Top</label>

                                <div class="col-md-6">
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input id='top' name="top" type="checkbox" >
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="namesur" class="col-md-4 col-form-label text-md-right">Description</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" rows="5" ></textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" id="btnGuardar" class="btn btn-primary">
                                        Create
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <HR>
    <div class="card">
        <div class="card-header text-white bg-primary">LIST PLANS</div>
             <table class="table table-hover table-fixed">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NAME</th>
                        <th scope="col">DESCRIPTION</th>
                        <th scope="col">DATE INITIAL</th>
                        <th scope="col">ACTIVE</th>
                        <th scope="col">CANT. APLICANTION</th>
                        <th scope="col">CANT MONTH</th>
                        <th scope="col">DESCRIPTION</th>
                        <th scope="col">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($planes as $plan)
                    <tr>
                        <td>{{$plan->id}}</td>
                        <td>{{$plan->Descripcion}}</td>
                        <td>{{$plan->FhInicio}}</td>
                        <td>{{$plan->FhFin}}</td>
                        <td>{{$plan->Activo}}</td>
                        <td>{{$plan->CantApp}}</td>
                        <td>{{$plan->CantMeses}}</td>
                        <td>{{$plan->Comentarios}}</td>
                        <td><a class="btn btn-sm btn-danger" >Delete</a><a class="btn btn-sm btn-success" >Activated</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        <div class="card-body">
             
        </div>
    </div>
</div>
@endsection

