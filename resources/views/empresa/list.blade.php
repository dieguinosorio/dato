@extends('layouts.app')
@section('title', 'List Aplications')
@section('content')
<div class="container-fluid">
    <h2>Filter Aplicant</h2>
        <form method="GET" action="{{action("HomeController@listaplications",['Id'=>'14'])}}">
            <div class="form-group col-md-8">
                <input id="criteria" type="text" class="form-control" name="criteria" autofocus>
            </div>
            <div class="form-group col-md-1">
                <button type="submit" class="btn btn-primary">
                    Filter
                </button>
            </div>
        </form>
    <div class="card">
        <div class="card-header">List Aplications</div>
        <div class="card-body">
            @if(session('status'))
            <div class="alert alert-success">{{session('status')}}</div>
            @endif
            <table class="table table-hover table-fixed">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">SOCIAL</th>
                        <th scope="col">FIRST NAME</th>
                        <th scope="col">LAST NAME</th>
                        <th scope="col">PHONE NUMBER</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">ADDRESS</th>
                        <th scope="col">CITY</th>
                        <th scope="col">ZIP CODE</th>
                        <th scope="col">DATE REGISTER</th>
                        <th scope="col">EDIT</th>
                        <th scope="col">SIGNATURE</th>
                        <th scope="col">COPY OF DOCUMENT</th>
                        <th scope="col">COPY OF S.S CARD</th>
                        <th scope="col">W4</th>
                        <th scope="col">REG. FORM</th>
                        <th scope="col">FORM W9</th>
                        <th scope="col">FORM I9</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($aplicaciones)>0)
                        @foreach($aplicaciones as $user)
                        @if($user->firma !='')
                            <tr>
                                <td>{{$user->Id}}</td>
                                <td>{{$user->social_security}}</td>
                                <td>{{$user->firs_name}}</td>
                                <td>{{$user->last_name}}</td>
                                <td>{{$user->tel}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->dir_home}}</td>
                                <td>{{$user->city}}</td>
                                <td>{{$user->zip_code}}</td>
                                <td>{{$user->fh_register}}</td>
                                <td><a class="btn btn-sm btn-info" href="{{action("AplicationController@loadAplication",$user->Id)}}">Load</a></td>
                                <td><a class="img-signature" href="#"><img src='{{action("HomeController@getImage",$user->firma)}}'></a></td>
                                <td><a class="img-signature" href="#"><img src='{{action("HomeController@getImageSocial",$user->doc_id1)}}'></td>
                                <td><a class="img-signature" href="#"><img src='{{action("HomeController@getImageSocial",$user->doc_id2)}}'></td>
                                <td><a class="btn btn-sm btn-success" href="{{action("ImprimirDocumentos@generalW4",$user->Id)}}">W4</a></td>
                                <td><a class="btn btn-sm btn-success" href="{{action("ImprimirFormularioReg@formRegister",$user->Id)}}">REG. FORM</a></td>
                                <td><a class="btn btn-sm btn-success" href="{{action("ImprimirFormatow9@general",$user->Id)}}">W9</a></td>
                                <td><a class="btn btn-sm btn-success" href="{{action("ImprimirFormatoi9@general",$user->Id)}}">I9</a></td>
                                <td><a class="btn btn-sm btn-danger" href="{{action("EmpresasController@DeleteApp",$user->Id)}}">DELETE</a></td>
                            </tr>
                            @endif
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

