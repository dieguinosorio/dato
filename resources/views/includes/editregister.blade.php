<form method="POST" action="{{action('EmpresasController@register',['Id'=>$empresa->id])}}" enctype="multipart/form-data">
    @csrf
    <div id="pnlAcepted">
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Selected Option') }}</label>

            <div class="col-md-6">

                <select class="form-control{{ $errors->has('opciud') ? ' is-invalid' : '' }}" id="opciud" name="opciud">
                    @foreach($OpResident as $resident)
                    <option value="{{$resident->Id}}"
                        @if($app->op_resident == $resident->Descripcion)
                           selected ="true"
                        @endif
                     >{{$resident->Descripcion}}</option>
                    @endforeach
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
                <input id="firstname" type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{isset($app) ? $app->firs_name: ''}}" required>

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
                <input type="text" id="midname" class="form-control{{ $errors->has('midname') ? ' is-invalid' : '' }}" name="midname" value="{{isset($app) ? $app->mid_name: ''}}"  required>

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
                <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{isset($app) ? $app->last_name: ''}}" required>

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
                <input id="tel" type="tel" class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}" name="tel" value="{{isset($app) ? $app->tel: ''}}"  required>

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
                <select class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" id="gender" name="gender" value="{{isset($app) ? $app->sex: ''}}" required>
                    <option>(sel)</option>
                    <option selected="true" value="Male" >Male</option>
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
                <input id="fhbirth" type="date" class="form-control{{ $errors->has('fhbirth') ? ' is-invalid' : '' }}" name="fhbirth" value="{{isset($app) ? $app->fh_birt: ''}}" required>

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
                <input id="dir" type="text" class="form-control{{ $errors->has('dir') ? ' is-invalid' : '' }}" name="dir" value="{{isset($app) ? $app->dir_home: ''}}" required>

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
                <input id="dir2" type="text" class="form-control{{ $errors->has('dir2') ? ' is-invalid' : '' }}" name="dir2" value="{{isset($app) ? $app->dir_home2: ''}}"  >

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
                <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{isset($app) ? $app->city: ''}}" required>

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
                <select class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" id="state" name="state" value="{{isset($app) ? $app->state: ''}}" required>
                    @foreach($states as $states)
                        <option value="{{$states->id}}"
                            @if($app->state == $states->id)
                                  selected ="true"
                            @endif
                        >{{$states->Descripcion}}</option>
                    @endforeach
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
                <input id="zipcode" type="number" class="form-control{{ $errors->has('zipcode') ? ' is-invalid' : '' }}" name="zipcode" value="{{isset($app) ? $app->zip_code: ''}}" required>

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

                <select class="form-control{{ $errors->has('marital') ? ' is-invalid' : '' }}" id="marital" name="marital" value="{{isset($app) ? $app->marital_status: ''}}" required>
                    <option>(sel)</option>
                    <option selected="true">Married</option>
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
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{isset($app) ? $app->email: ''}}"  required>

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

                <select class="form-control{{ $errors->has('tpdoc') ? ' is-invalid' : '' }}" id="tpdoc" name="tpdoc" value="{{isset($app) ? $app->opid: ''}}" required>
                    <option>(sel)</option>
                    <option selected="true">Social Security Number</option>
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
                <input id="socialnum" type="number" class="form-control{{ $errors->has('socialnum') ? ' is-invalid' : '' }}" name="socialnum" value="{{isset($app) ? $app->social_security: ''}}"  required>

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
                <input id="numdep" type="number" class="form-control{{ $errors->has('numdep') ? ' is-invalid' : '' }}" name="numdep" value="{{isset($app) ? $app->num_dep: ''}}"  required>

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
                <input id="contactemer" type="text" class="form-control{{ $errors->has('contactemer') ? ' is-invalid' : '' }}" name="contactemer" value="{{isset($app) ? $app->contact_emerg: ''}}"  required>

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
                <input id="surnamecon" type="text" class="form-control{{ $errors->has('surnamecon') ? ' is-invalid' : '' }}" name="surnamecon" value="{{isset($app) ? $app->contact_lastname: ''}}"  required>

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
                <input id="telcon" type="tel" class="form-control{{ $errors->has('telcon') ? ' is-invalid' : '' }}" name="telcon" value="{{isset($app) ? $app->phone_emerg: ''}}"  required>

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

                <select class="form-control{{ $errors->has('area') ? ' is-invalid' : '' }}" id="area" name="area" value="{{isset($app) ? $app->area: ''}}" required>
                    @foreach($areas as $area)
                        <option value="{{$area->id}}"
                                @if($app->area == $area->Descripcion)
                                   selected ="true"
                                @endif
                        >{{$area->Descripcion}}</option>
                    @endforeach
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
                <input id="namesur" type="text" class="form-control{{ $errors->has('namesur') ? ' is-invalid' : '' }}" name="namesur" value="{{isset($app) ? $app->name_superv: ''}}" required>

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
                        <input id='job1' type="checkbox" class="form-check-input{{ $errors->has('jobs1') ? ' is-invalid' : '' }}" value="{{isset($app) ? $app->acustical: '1'}}" name="jobs1" >Acoustical Ceiling Mechanic
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input id='job2'  type="checkbox" class="form-check-input{{ $errors->has('jobs1') ? ' is-invalid' : '' }}"  value="{{isset($app) ? $app->layout: '1'}}" name="jobs2">Layout / Blueprints
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input id='job3'  type="checkbox" class="form-check-input{{ $errors->has('jobs1') ? ' is-invalid' : '' }}"  value="{{isset($app) ? $app->drywall_metal: '1'}}" name="jobs3" >Drywall Metal Framing Mechanic
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input id='job4'  type="checkbox" class="form-check-input{{ $errors->has('jobs1') ? ' is-invalid' : '' }}" value="{{isset($app) ? $app->drywall_hanger: '1'}}" name="jobs4" >Drywall Hanger
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input id='job5'  type="checkbox" class="form-check-input{{ $errors->has('jobs1') ? ' is-invalid' : '' }}" value="{{isset($app) ? $app->drywall_finisher: '1'}}" name="jobs5" >Drywall Finisher
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
                        <input id='job6' type="checkbox" class="form-check-input{{ $errors->has('jobs6') ? ' is-invalid' : '' }}" value="{{isset($app) ? $app->general_lab: '1'}}"  name="job6">General Laborer
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input id='job7' type="checkbox" class="form-check-input{{ $errors->has('jobs2') ? ' is-invalid' : '' }}" value="{{isset($app) ? $app->plastert: '1'}}" name="job7">Plaster Tradesman
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input id='job8' type="checkbox" class="form-check-input{{ $errors->has('jobs2') ? ' is-invalid' : '' }}" value="{{isset($app) ? $app->concrete_form: '1'}}" name="job8" >Concrete Forming
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input id='job9' type="checkbox" class="form-check-input{{ $errors->has('jobs2') ? ' is-invalid' : '' }}" value="{{isset($app) ? $app->concrete_finish: '1'}}" name="job9" >Concrete Finisher
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input id='job10' type="checkbox" class="form-check-input{{ $errors->has('jobs2') ? ' is-invalid' : '' }}" value="{{isset($app) ? $app->safety_job: '1'}}" name="job10" >Safety Jobsite
                    </label>
                </div>

                @if ($errors->has('job10'))
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
                        <input type="radio" class="form-check-input{{ $errors->has('mil') ? ' is-invalid' : '' }}" value="{{isset($app) ? $app->work_in_militarbase: '0'}}" name="mil">Yes
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input{{ $errors->has('mil') ? ' is-invalid' : '' }}" value="{{isset($app) ? $app->work_in_militarbase: '0'}}" name="mil">No
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
                        <input type="radio" class="form-check-input{{ $errors->has('dem') ? ' is-invalid' : '' }}" value="{{isset($app) ? $app->involucred_demand: '0'}}" name="dem">Yes
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input{{ $errors->has('dem') ? ' is-invalid' : '' }}" value="{{isset($app) ? $app->involucred_demand: '0'}}" name="dem">No
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
                        <input type="radio" class="form-check-input{{ $errors->has('demc') ? ' is-invalid' : '' }}" value="{{isset($app) ? $app->workers_compensation: '0'}}" name="demc">Yes
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input{{ $errors->has('demc') ? ' is-invalid' : '' }}" value="{{isset($app) ? $app->workers_compensation: '0'}}" name="demc">No
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
                        <input type="radio" class="form-check-input{{ $errors->has('dispmov') ? ' is-invalid' : '' }}" value="{{isset($app) ? $app->qualified_work_positions: '0'}}" name="dispmov">Yes
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input{{ $errors->has('dispmov') ? ' is-invalid' : '' }}" value="{{isset($app) ? $app->qualified_work_positions: '0'}}" name="dispmov">No
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
            <label for="namesur" class="col-md-4 col-form-label text-md-right">{{ __('') }}</label>
            <div class="col-md-6">
                <label>Please Upload a copy of the following documents: Por favor subir una copia de los siguientes documentos</label>
            </div>
        </div>

        <div class="form-group row">

            <label for="image_path" class="col-md-4 col-form-label text-md-right">{{ __('Copy Of Document – Front of ID / Copia de Documento de Identificacion -Parte de Adelante: *') }}</label>

            <div class="col-md-6">
                <img src="{{action("HomeController@getImageSocial",$app->doc_id1)}}"/>
                <input id="image_path" type="file" class="form-control{{ $errors->has('image_path') ? ' is-invalid' : '' }}" name="image_path" required>

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
                <img src="{{action("HomeController@getImageSocial",$app->doc_id2)}}"/>
                <input id="image_path2" type="file" class="form-control{{ $errors->has('image_path2') ? ' is-invalid' : '' }}" name="image_path2" required>

                @if ($errors->has('image_path2'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('image_path2') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" id="btnGuardar1" class="btn btn-primary">
                    Update
                </button>
                <!--<a id="Registrar" class="btn btn-success">Reg</a>-->
            </div>
        </div>
    </div>
</form>