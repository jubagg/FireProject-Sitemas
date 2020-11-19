<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="text-right p-1">
                <div class="d-none d-inline-block">
                    <legend class="h2">Nuevo bombero  </legend>
                </div>
            </div>
            <hr>
            <h5 class="text-info mb-4"> Datos personales</h5>
            <form method="POST" action={{route('bomberos.save')}}>
                <input type="hidden" name="action" value="{{Auth::user()->rol == 1 ? 'bomberoadmin' : ''}}">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-lg-4">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text"
                            class="form-control {{$errors->has('nombre') ? 'is-invalid' : ''}}" name="nombre" id="nombre" aria-describedby="helpId" placeholder="" value="{{$errors->has('nombre') ? '' : old('nombre')}}">
                            @if($errors->has('nombre'))
                                <small class="form-text text-danger">{{$errors->first('nombre')}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text"
                            class="form-control {{$errors->has('apellido') ? 'is-invalid' : ''}}" name="apellido" id="apellido" aria-describedby="helpId" placeholder="" value="{{$errors->has('apellido') ? '' : old('apellido')}}">
                            @if($errors->has('apellido'))
                                <small class="form-text text-danger">{{$errors->first('apellido')}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <div class="form-group">
                        <label for="username">Nombre de usuario</label>
                        <input type="text"
                            class="form-control {{$errors->has('username') ? 'is-invalid' : ''}}" name="username" id="username" aria-describedby="helpId" placeholder="" value="{{$errors->has('username') ? '' : old('username')}}">
                            @if($errors->has('username'))
                                <small class="form-text text-danger">{{$errors->first('username')}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <div class="form-group">
                        <label for="mail">Correo electrónico</label>
                        <input type="text"
                            class="form-control {{$errors->has('mail') ? 'is-invalid' : ''}}" name="mail" id="mail" aria-describedby="helpId" placeholder="" value="{{$errors->has('mail') ? '' : old('mail')}}">
                            @if($errors->has('mail'))
                                <small class="form-text text-danger">{{$errors->first('mail')}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <div class="form-group">
                        <label for="dni">D.N.I.</label>
                        <input type="text"
                            class="form-control {{$errors->has('dni') ? 'is-invalid' : ''}}" name="dni" id="dni" aria-describedby="helpId" placeholder="" value="{{$errors->has('dni') ? '' : old('dni')}}">
                            @if($errors->has('dni'))
                                <small class="form-text text-danger">{{$errors->first('dni')}}</small>
                            @endif
                        </div>
                    </div>
                </div>
                <hr>
                <h5 class="text-info mb-4"> Datos bomberiles</h5>
                <div class="row">
                    <div class="col-sm-12 col-lg-3">
                        <div class="form-group">
                        <label for="cuartel">Cuartel</label>
                            <select class="form-control" name="cuartel" id="cuartel">
                                <option>Seleccionar</option>
                                @foreach(Cuarteles::getCuartelesFed(Auth::user()->federacion) as $cuartel)
                                    <option value="{{$cuartel->cuarid}}" {{ old('cuartel') == $cuartel->cuarid ? 'selected' : ''}} >{{$cuartel->cuardes}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-2">
                        <div class="form-group">
                        <label for="lp">LP</label>
                        <input type="text"
                            class="form-control" name="lp" id="lp" aria-describedby="helpId" placeholder="" value="{{$errors->has('lp') ? '' : old('lp')}}">
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-3">
                        <div class="form-group">
                        <label for="grado">Grado Jerarquico</label>
                        <select class="form-control" name="grado" id="grado" {{ Auth::user()->rol != 1 ? 'disabled' : ''}}>
                            <option>Seleccionar</option>
                            @foreach(Grados::getGrados() as $grados)
                                <option value="{{$grados->graid}}" {{ old('grado') ==$grados->graid ? 'selected' : ''}}>{{$grados->gradesc}}  </option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-3">
                        <div class="form-group">
                        <label for="federacion">Federación</label>
                        <select class="form-control" name="federacion" id="federacion" {{ Auth::user()->rol != 1 ? 'disabled' : ''}}>
                            <option>Seleccionar</option>
                            @foreach(Federaciones::getFederaciones() as $fed)
                                <option value="{{$fed->fedcod}}" {{ old('federacion') ==$fed->fedcod ? 'selected' : ''}} >{{$fed->feddes}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                </div>
                @if(Auth::user()->rol == 1)
                <hr>
                <h5 class="text-info mb-4"> Administración</h5>
                <div class="row">
                    <div class="col-sm-12 col-lg-3">
                        <div class="form-group">
                            <label for="rol">Rol</label>
                            <select class="form-control" name="rol" id="rol">
                                <option>Seleccionar</option>
                                @foreach(Roles::getRoles() as $rol)
                                    <option value="{{$rol->rolid}}" {{ old('rol') ==$rol->rolid? 'selected' : ''}}>{{$rol->roldes}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-lg-3">
                        <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="inactivar" id="inactivar" value="1" {{old('inactivar') != 0 ? 'checked' : ''}} >
                            Inactivo
                        </label>
                        </div>
                    </div>
                </div>
                @endif
                <div class="form-row">
                    <div class="col text-right">
                        <div class="col">
                            <button class="btn btn-secondary col-sm-12 col-lg-3 my-1" type="reset">
                                <i class="fas fa-undo fa-fw" aria-hidden="true"></i>
                                <span class="d-none d-inline-block">Deshacer</span>
                            </button>
                            <button class="btn btn-success col-sm-12 col-lg-3 my-1" type="submit">
                                <i class="fas fa-save fa-fw" aria-hidden="true"></i>
                                <span class="d-none d-inline-block">Guardar</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
