@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header"><div class="encabezado-target">Register of Employed for (( {{$empresa->name}} ))</div></div>
            <div class="card-body">
                @include('includes.mensaje1')
                @include('includes.mensaje2')
                <form method="POST" action="{{action('EmpresasController@register',['Id'=>$empresa->name])}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('You are eligible to work legally in the United States') }}</label>

                        <div class="col-md-6">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input id="OpElgSi" type="radio" class="form-check-input{{ $errors->has('OpElgSi') ? ' is-invalid' : '' }}" name="OpElgSi" value="1">Yes
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input id="OpElgNo" type="radio" class="form-check-input{{ $errors->has('OpElgNo') ? ' is-invalid' : '' }}" name="OpElgSi" value="0">No
                                </label>
                            </div>
                            @if ($errors->has('OpElgSi'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('OpElgSi') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div id="pnlAcepted">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Selected Option') }}</label>

                            <div class="col-md-6">

                                <select class="form-control{{ $errors->has('opciud') ? ' is-invalid' : '' }}" id="opciud" name="opciud">
                                    <option>(sel)</option>
                                    <option value="A citizen of the United States" >A citizen of the United States/Un ciudadano de Estados Unidos</option>
                                    <option value="A noncitizen national of the United States">A noncitizen national of the United States/nacional no Ciudadano de estados unidos</option>
                                    <option value="A lawful permanent resident">A lawful permanent resident /Un residente permanente legal</option>
                                    <option value="An alien authorized to work">An alien authorized to work / Un extranjero autorizado a trabajar en estados unidos</option>
                                </select>

                                @if ($errors->has('opciud'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('opciud') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname">

                                @if ($errors->has('firstname'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('firstname') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Middle Name') }}</label>

                            <div class="col-md-6">
                                <input type="text" id="midname" class="form-control{{ $errors->has('midname') ? ' is-invalid' : '' }}" name="midname">

                                @if ($errors->has('midname'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('midname') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname">

                                @if ($errors->has('lastname'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('lastname') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="tel" type="tel" class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}" name="tel">

                                @if ($errors->has('tel'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tel') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <select class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" id="gender" name="gender" required>
                                    <option>(sel)</option>
                                    <option value="Male" >Male</option>
                                    <option value="Female">Female</option>    
                                </select>

                                @if ($errors->has('gender'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fhbirth" class="col-md-4 col-form-label text-md-right">{{ __('Fecha Birth') }}</label>

                            <div class="col-md-6">
                                <input id="fhbirth" type="date" class="form-control{{ $errors->has('fhbirth') ? ' is-invalid' : '' }}" name="fhbirth">

                                @if ($errors->has('fhbirth'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('fhbirth') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dir" class="col-md-4 col-form-label text-md-right">{{ __('Home Address') }}</label>

                            <div class="col-md-6">
                                <input id="dir" type="text" class="form-control{{ $errors->has('dir') ? ' is-invalid' : '' }}" name="dir" >

                                @if ($errors->has('dir'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('dir') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dir2" class="col-md-4 col-form-label text-md-right">{{ __('Home Address') }}</label>

                            <div class="col-md-6">
                                <input id="dir2" type="text" class="form-control{{ $errors->has('dir2') ? ' is-invalid' : '' }}" name="dir2" >

                                @if ($errors->has('dir2'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('dir2') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" >

                                @if ($errors->has('city'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

                            <div class="col-md-6">

                                <select class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" id="state" name="state">
                                    <option> (sel) </option>
                                    <option> AL Alabama </option>
                                    <option> AK Alaska </option>
                                    <option> AZ Arizona </option>
                                    <option> AR Arkansas </option>
                                    <option> CA California </option>
                                    <option> CO Colorado </option>
                                    <option> CT Connecticut </option>
                                    <option> DE Delaware </option>
                                    <option> DC District of Columbia </option>
                                    <option> FL Florida </option>
                                    <option> GA Georgia </option>
                                    <option> HI Hawaii </option>
                                    <option> ID Idaho </option>
                                    <option> IL Illinois </option>
                                    <option> IN Indiana </option>
                                    <option> IA Iowa </option>
                                    <option> KS Kansas </option>
                                    <option> KY Kentucky </option>
                                    <option> LA Louisiana </option>
                                    <option> ME Maine </option>
                                    <option> MD Maryland </option>
                                    <option> MA Massachusetts </option>
                                    <option> MI Michigan </option>
                                    <option> MN Minnesota </option>
                                    <option> MS Mississippi </option>
                                    <option> MO Misuri </option>
                                    <option> MT Montana </option>
                                    <option> NE Nebraska </option>
                                    <option> NV Nevada </option>
                                    <option> NH New Hampshire </option>
                                    <option> NJ New Jersey </option>
                                    <option> NM New Mexico </option>
                                    <option> NY New York </option>
                                    <option> NC North Carolina </option>
                                    <option> ND North Dakota </option>
                                    <option> OH Ohio </option>
                                    <option> OK Oklahoma </option>
                                    <option> OR Oregon </option>
                                    <option> PA Pennsylvania </option>
                                    <option> RI Rhode Island </option>
                                    <option> SC South Carolina </option>
                                    <option> SD South Dakota </option>
                                    <option> TN Tennessee </option>
                                    <option> TX Texas </option>
                                    <option> UT Utah </option>
                                    <option> VT Vermont </option>
                                    <option> VA Virginia </option>
                                    <option> WA Washington </option>
                                    <option> WV West Virginia </option>
                                    <option> WI Wisconsin </option>
                                    <option> WY Wyoming </option>
                                </select>

                                @if ($errors->has('state'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('state') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="zipcode" class="col-md-4 col-form-label text-md-right">{{ __('Zip Code') }}</label>

                            <div class="col-md-6">
                                <input id="zipcode" type="number" class="form-control{{ $errors->has('zipcode') ? ' is-invalid' : '' }}" name="zipcode">

                                @if ($errors->has('zipcode'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('zipcode') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="marital" class="col-md-4 col-form-label text-md-right">{{ __('Marital Status') }}</label>

                            <div class="col-md-6">

                                <select class="form-control{{ $errors->has('marital') ? ' is-invalid' : '' }}" id="marital" name="marital">
                                    <option>(sel)</option>
                                    <option>Married</option>
                                    <option>Single</option>
                                </select>

                                @if ($errors->has('marital'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('marital') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" >

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tpdoc" class="col-md-4 col-form-label text-md-right">{{ __('Document Type') }}</label>

                            <div class="col-md-6">

                                <select class="form-control{{ $errors->has('tpdoc') ? ' is-invalid' : '' }}" id="tpdoc" name="tpdoc">
                                    <option>(sel)</option>
                                    <option>Social Security Number</option>
                                    <option>IT Number</option>
                                </select>

                                @if ($errors->has('tpdoc'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tpdoc') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="socialnum" class="col-md-4 col-form-label text-md-right">{{ __('Your social security number *') }}</label>

                            <div class="col-md-6">
                                <input id="socialnum" type="number" class="form-control{{ $errors->has('socialnum') ? ' is-invalid' : '' }}" name="socialnum">

                                @if ($errors->has('socialnum'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('socialnum') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="numdep" class="col-md-4 col-form-label text-md-right">{{ __('Numbers of Dependents / Número de Dependientes *') }}</label>

                            <div class="col-md-6">
                                <input id="numdep" type="number" class="form-control{{ $errors->has('numdep') ? ' is-invalid' : '' }}" name="numdep">

                                @if ($errors->has('numdep'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('numdep') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="contactemer" class="col-md-4 col-form-label text-md-right">{{ __('Name Emergency Contact / Nombre Contácto de Emergencia *') }}</label>

                            <div class="col-md-6">
                                <input id="contactemer" type="text" class="form-control{{ $errors->has('contactemer') ? ' is-invalid' : '' }}" name="contactemer" >

                                @if ($errors->has('contactemer'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('contactemer') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surnamecon" class="col-md-4 col-form-label text-md-right">{{ __('SurName Emergency Contact / Apellidos Contácto de Emergencia *') }}</label>

                            <div class="col-md-6">
                                <input id="surnamecon" type="text" class="form-control{{ $errors->has('surnamecon') ? ' is-invalid' : '' }}" name="surnamecon" >

                                @if ($errors->has('surnamecon'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('surnamecon') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telcon" class="col-md-4 col-form-label text-md-right">{{ __('Phone Emergency Contact / Telefono Contácto de Emergencia *') }}</label>

                            <div class="col-md-6">
                                <input id="telcon" type="tel" class="form-control{{ $errors->has('telcon') ? ' is-invalid' : '' }}" name="telcon" >

                                @if ($errors->has('telcon'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('telcon') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="area" class="col-md-4 col-form-label text-md-right">{{ __('Select Your Area/ Seleccionar Area *') }}</label>

                            <div class="col-md-6">

                                <select class="form-control{{ $errors->has('area') ? ' is-invalid' : '' }}" id="area" name="area">
                                    <option>(sel)</option>
                                    <option>Alabama</option>
                                    <option>Central Florida</option>
                                    <option>Georgia</option>
                                    <option>Illinois (IL)</option>
                                    <option>Kentucky</option>
                                    <option>Louisiana</option>
                                    <option>Mississippi</option>
                                    <option>NC  North Carolina</option>
                                    <option>North Florida</option>
                                    <option>Oklahoma</option>
                                    <option>SC- South Carolina</option>
                                    <option>South Florida</option>
                                    <option>Tennessees</option>
                                    <option>Texas</option>
                                    <option>Virginia</option>
                                </select>

                                @if ($errors->has('area'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('area') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="namesur" class="col-md-4 col-form-label text-md-right">{{ __('Name of Supervisor / Nombre de tu Supervisor *') }}</label>

                            <div class="col-md-6">
                                <input id="namesur" type="text" class="form-control{{ $errors->has('namesur') ? ' is-invalid' : '' }}" name="namesur">

                                @if ($errors->has('namesur'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('namesur') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="namesur" class="col-md-4 col-form-label text-md-right">{{ __('Job Skills – I currently have experience in the following job skills*') }}</label>

                            <div class="col-md-6">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input id='job1' type="checkbox" class="form-check-input{{ $errors->has('jobs1') ? ' is-invalid' : '' }}"  name="jobs1" >Acoustical Ceiling Mechanic
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input id='job2'  type="checkbox" class="form-check-input{{ $errors->has('jobs1') ? ' is-invalid' : '' }}"  name="jobs1">Layout / Blueprints
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input id='job3'  type="checkbox" class="form-check-input{{ $errors->has('jobs1') ? ' is-invalid' : '' }}"  name="jobs1" >Drywall Metal Framing Mechanic
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input id='job4'  type="checkbox" class="form-check-input{{ $errors->has('jobs1') ? ' is-invalid' : '' }}" name="jobs1" >Drywall Hanger
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input id='job5'  type="checkbox" class="form-check-input{{ $errors->has('jobs1') ? ' is-invalid' : '' }}" name="jobs1" >Drywall Finisher
                                    </label>
                                </div>

                                @if ($errors->has('jobs1'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('jobs1') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="namesur" class="col-md-4 col-form-label text-md-right">{{ __('(Please check all those which apply)') }}</label>

                            <div class="col-md-6">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input id='job6' type="checkbox" class="form-check-input{{ $errors->has('jobs2') ? ' is-invalid' : '' }}" value="General Laborer" name="job2">General Laborer
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input id='job7' type="checkbox" class="form-check-input{{ $errors->has('jobs2') ? ' is-invalid' : '' }}" value="Plaster Tradesman" name="job2">Plaster Tradesman
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input id='job8' type="checkbox" class="form-check-input{{ $errors->has('jobs2') ? ' is-invalid' : '' }}" value="Concrete Forming" name="job2" >Concrete Forming
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input id='job9' type="checkbox" class="form-check-input{{ $errors->has('jobs2') ? ' is-invalid' : '' }}" value="Concrete Finisher" name="job2" >Concrete Finisher
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input id='job10' type="checkbox" class="form-check-input{{ $errors->has('jobs2') ? ' is-invalid' : '' }}" value="Safety Jobsite" name="job2" >Safety Jobsite
                                    </label>
                                </div>

                                @if ($errors->has('job2'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('job2') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Are you eligible to work on military bases in USA?/ Puedes trabajar en bases millitares en USA? *') }}</label>

                            <div class="col-md-6">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input{{ $errors->has('mil') ? ' is-invalid' : '' }}" value="1" name="mil">Yes
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input{{ $errors->has('mil') ? ' is-invalid' : '' }}" value="0" name="mil">No
                                    </label>
                                </div>
                                @if ($errors->has('mil'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('mil') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Have you ever been involved in a lawsuit with any previous employer?/ Alguna vez a estado involucrado en una demanda con cualquier empleador anterior? *') }}</label>

                            <div class="col-md-6">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input{{ $errors->has('dem') ? ' is-invalid' : '' }}" value="1" name="dem">Yes
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input{{ $errors->has('dem') ? ' is-invalid' : '' }}" value="0" name="dem">No
                                    </label>
                                </div>
                                @if ($errors->has('dem'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('dem') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Have you ever been involved in a Workers Compensation Claim?/ Alguna vez a estado involucrado en una Reclamación de Compensación de Trabajadores? *') }}</label>

                            <div class="col-md-6">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input{{ $errors->has('demc') ? ' is-invalid' : '' }}" value="1" name="demc">Yes
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input{{ $errors->has('demc') ? ' is-invalid' : '' }}" value="0" name="demc">No
                                    </label>
                                </div>
                                @if ($errors->has('demc'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('demc') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Are you willing to travel if there are qualified work positions in another city or state?/ Estás dispuesto a viajar si hay puestos de trabajo calificados en otra ciudad o estado? *') }}</label>

                            <div class="col-md-6">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input{{ $errors->has('dispmov') ? ' is-invalid' : '' }}" value="1" name="dispmov">Yes
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input{{ $errors->has('dispmov') ? ' is-invalid' : '' }}" value="0" name="dispmov">No
                                    </label>
                                </div>
                                @if ($errors->has('dispmov'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('dispmov') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="namesur" class="col-md-4 col-form-label text-md-right">{{ __('Clause / Clausula') }}</label>

                            <div class="col-md-6">
                                <textarea class="form-control" rows="5" disabled>I am physically able to perform the essential duties related to my work and I am able perform the essential functions of the job without reasonable accommodation. I am Considered medically suitable and physically stable for work. I have no current medical conditions, weather physical nor mental that will result in my inability to complete all assigned task. I understand that the job requirements include, but not limited to the following: Balancing: Maintaining body equilibrium to prevent falling when walking, standing, or crouching. Climbing: Ascending or descending ladders, scaffolding, ramps, poles, and other devises using feet and legs and/or hands and arms. Heavy Carrying: Items weighing 45 pounds and over. Kneeling: Bending legs at knees to come to rest on one or both knees. Reaching above shoulder: Extending hand(s) and arm(s) in any direction.  I state that I have no Pre-Existing physical Condition, illness or other medical condition that was treated, diagnosed, or that will impede my ability to complete my work without injury.</textarea>
                                <br>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input{{ $errors->has('clause') ? ' is-invalid' : '' }}" value="1" name="clause">Yes
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input{{ $errors->has('clause') ? ' is-invalid' : '' }}" value="0" name="clause">No
                                    </label>
                                </div>
                                @if ($errors->has('clause'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('clause') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="namesur" class="col-md-4 col-form-label text-md-right">{{ __('Terms and Conditions') }}</label>

                            <div class="col-md-6">
                                <textarea class="form-control" rows="5" disabled>1.	I certify that all of the statements made in this questionnaire are made in good faith and these statements are true and correct to the best of my knowledge. / Certifico que todas las declaraciones hechas en este cuestionario se hacen de buena fe y estas declaraciones son verdaderas y correctas al mejor de mi conocimiento  2.	I understand that this questionnaire does not assure me of employment. Additionally, this questionnaire in no way obligates to hire me. If I am employed, I acknowledge that my employment, as an employee or independent contractor, will be an employment at will and that no specified time of employment is promised or implied. The company and I may terminate the relationship at will, at any time, so long as there is no violation of applicable federal, state laws, or contract rules. I further understand that this application does not constitute an agreement or contract for employment. I understand that if hired I may be charged up to $2.25 per week for check delivery and administration. / Entiendo que mi cuestionario no me asegura empleo. Además, este cuestionario de ninguna manera obliga a la compania contratarme. Si soy empleado, reconozco que mi empleo, como empleado o contratista independiente, será un empleo a voluntad y que el tiempo especificado no se promete. La compañia puede terminar la relación, en cualquier momento, siempre y cuando no haya una violación de las reglas de las leyes federales, estatales , o de contratos aplicables. Además, entiendo que esta cuestionario no constituye un acuerdo o contrato de trabajo. Entiendo que si me contratan, me pueden cobrar hasta $ 2.25 por semana por entrega y administración de cheques.  3.	I understand that any misleading or incorrect statements or failure to complete any part of this questionnaire not prohibited by law may render this questionnaire void and would be a cause for immediate dismissal. / Entiendo que cualquier declaración engañosa o incorrecta usada para completar cualquier parte de esta cuestionario, que no esté prohibido por la ley pueden hacer que este vacía el cuestionario y sería un motivo de despido inmediato  4.	I understand that the information provided in the information in the questionnaire will be retained for a period of one year following the date of submission. Where necessary, the company may require additional information or complete a new questionnaire to remain in consideration of employment after that time. / Entiendo que la información proporcionada en esta cuestionario se mantendrá por un período de un año, siguientes a la fecha de presentación. Cuando sea necesario, la empresa puede requerir información adicional o un cuestionario nuevo de permanencia en razón de un empleo después de ese tiempo  5.	I provide permission to the company and all of the company’s agents and/or vendors the right to investigate all of the information provided as part of the questionnaire process, as well as, their requirements to secure additional information, if necessary. I further understand that this includes, but is not limited to, such activities as contacting my references or previous employers, employment screening, and conducting other employee background checking to verify my credential as a suitable independent contractor and/or employee for the company. I hereby release from all liability or responsibility all persons, companies, corporations, when furnishing such information. / Doy permiso a la compañia y todos los agentes de la empresa y/o proveedores el derecho de investigar toda la información proporcionada en el marco del proceso del cuestionario, así como, los requisitos para asegurar la información adicional, si es necesario. Además, entiendo que esto incluye, pero no está limitado a, actividades tales como ponerse en contacto con mis referencias o empleadores anteriores, la investigación del empleo, y la realización de otros antecedentes de los empleadores para verificar mi credencial como contratista independiente y/o empleado de la compañía. Yo libero de toda responsabilidad todas las personas, empresas, corporaciones, cuando SUMINISTREN dicha información  6.	I understand that as an employee or independent contractor, I must be capable of the following essential functions and that I am qualified and capable to perform the functions required. / Entiendo que como un empleado o contratista independiente, debo ser capaz de realizar las siguientes funciones esenciales y que estoy cualificado y capacitado para llevar a cabo las funciones necesarias. a.	I understand that as an employee or independent contractor, I must be capable of the following essential functions and that I am qualified and capable to perform the functions required. / Entiendo que como un empleado o contratista independiente, debo ser capaz de realizar las siguientes funciones esenciales y que estoy cualificado y capacitado para llevar a cabo las funciones necesarias.  b.	This may require bending, stretching, and physical use of muscles during walking, transportations, or general duties. / Esto puede requerir la flexión, estiramiento y uso físico de los músculos durante la marcha, los medios de transporte, o de funciones generales.
                                </textarea>
                                <br>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input{{ $errors->has('term') ? ' is-invalid' : '' }}" value="1" name="term">Yes
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input{{ $errors->has('term') ? ' is-invalid' : '' }}" value="0" name="term">No
                                    </label>
                                </div>
                                @if ($errors->has('term'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('term') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="signature" class="col-md-4 col-form-label text-md-right">{{ __('Your signature here : *') }}</label>

                            <div class="col-md-6">
                                <div id="signature-pad" class="signature-pad" style="height: 250px;">
                                    <div class="signature-pad--body">
                                        <canvas></canvas>
                                    </div>
                                    <div class="signature-pad--footer">
                                        <div class="description">Sign above</div>

                                        <div class="signature-pad--actions">
                                            <div>
                                                <button type="button" class="button clear" data-action="clear">Clear</button>
                                                <button type="button" class="button" data-action="change-color">Change color</button>
                                                <button type="button" class="button" data-action="undo">Undo</button>

                                            </div>
                                            <div style="display: none;">
                                                <button type="button" class="button save" data-action="save-png">Save as PNG</button>
                                                <button type="button" class="button save" data-action="save-jpg">Save as JPG</button>
                                                <button type="button" class="button save" data-action="save-svg">Save as SVG</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="namesur" class="col-md-4 col-form-label text-md-right">{{ __('This Agreement is signed Date/Este acuerdo es firmado en la fecha') }}</label>

                            <div class="col-md-6">
                                <input id="FechaFirm" type="date" class="form-control" value="{{date('Y-m-d')}}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="namesur" class="col-md-4 col-form-label text-md-right">{{ __('') }}</label>
                            <div class="col-md-6">
                                <label>Please Upload a copy of the following documents: Por favor subir una copia de los siguientes documentos</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image_path" class="col-md-4 col-form-label text-md-right">{{ __('Copy Of Document – Front of ID / Copia de Documento de Identificacion -Parte de Adelante: *') }}</label>

                            <div class="col-md-6">
                                <input id="image_path" type="file" class="form-control{{ $errors->has('image_path') ? ' is-invalid' : '' }}" name="image_path">

                                @if ($errors->has('image_path'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('image_path') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image_path2" class="col-md-4 col-form-label text-md-right">{{ __('Copy Of Social Security Card: *') }}</label>

                            <div class="col-md-6">
                                <input id="image_path2" type="file" class="form-control{{ $errors->has('image_path2') ? ' is-invalid' : '' }}" name="image_path2">

                                @if ($errors->has('image_path2'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('image_path2') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image_path2" class="col-md-4 col-form-label text-md-right">{{ __('Accept / Acepto') }}</label>

                            <div class="col-md-6">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" id= "acepted" class="form-check-input{{ $errors->has('acept') ? ' is-invalid' : '' }}" value="1" data-action="save1-png" name="acept">Yes
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input{{ $errors->has('acept') ? ' is-invalid' : '' }}" value="0" name="acept">No
                                    </label>
                                </div>

                                @if ($errors->has('acept'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('acept') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="btnGuardar1" class="btn btn-primary">
                                    Registrar Datos
                                </button>
                                <a id="Registrar" class="btn btn-success">Reg</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection