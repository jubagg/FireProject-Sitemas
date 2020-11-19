<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="text-right p-1">
                <div class="d-none d-inline-block">
                    <legend class="h2">Modificar bombero  </legend>
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
                            class="form-control {{$errors->has('nombre') ? 'is-invalid' : ''}}" name="nombre" id="nombre" aria-describedby="helpId" placeholder="" value="{{$errors->has('nombre') ? '':Auth::user()->name }}">
                            @if($errors->has('nombre'))
                                <small class="form-text text-danger">{{$errors->first('nombre')}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text"
                            class="form-control {{$errors->has('apellido') ? 'is-invalid' : ''}}" name="apellido" id="apellido" aria-describedby="helpId" placeholder="" value="{{$errors->has('apellido') ? '': Auth::user()->surname }}">
                            @if($errors->has('apellido'))
                                <small class="form-text text-danger">{{$errors->first('apellido')}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <div class="form-group">
                        <label for="username">Nombre de usuario</label>
                        <input type="text"
                            class="form-control {{$errors->has('username') ? 'is-invalid' : ''}}" name="username" id="username" aria-describedby="helpId" placeholder="" value="{{$errors->has('username') ? '' : Auth::user()->nickname}}">
                            @if($errors->has('username'))
                                <small class="form-text text-danger">{{$errors->first('username')}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <div class="form-group">
                        <label for="mail">Correo electrónico</label>
                        <input type="text"
                            class="form-control {{$errors->has('mail') ? 'is-invalid' : ''}}" name="mail" id="mail" aria-describedby="helpId" placeholder="" value="{{$errors->has('mail') ? '' :  Auth::user()->email}}">
                            @if($errors->has('mail'))
                                <small class="form-text text-danger">{{$errors->first('mail')}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <div class="form-group">
                        <label for="dni">D.N.I.</label>
                        <input type="text"
                            class="form-control {{$errors->has('dni') ? 'is-invalid' : ''}}" name="dni" id="dni" aria-describedby="helpId" placeholder="" value="{{$errors->has('dni') ? '' : Auth::user()->dni }}">
                            @if($errors->has('dni'))
                                <small class="form-text text-danger">{{$errors->first('dni')}}</small>
                            @endif
                        </div>
                    </div>
                </div>
                <hr>

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
