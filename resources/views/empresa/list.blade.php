@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">List Aplications</div>

        <div class="card-body">
            @if(session('status'))
            <div class="alert alert-success">{{session('status')}}</div>
            @endif
            <table class="table">
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
                    </tr>
                </thead>
                <tbody>
                    @foreach($aplicaciones as $user)
                    <tr>
                        <td>{{$user->Id}}</td>
                        <td>{{$user->social_security}}</td>
                        <td>{{$user->firs_name}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->tel}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->dir}}</td>
                        <td>{{$user->city}}</td>
                        <td>{{$user->zip_code}}</td>
                        <td>{{$user->fh_register}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
