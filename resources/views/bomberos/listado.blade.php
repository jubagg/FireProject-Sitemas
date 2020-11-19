<input type="hidden" name="rutauser" id="rutauser" value="{{route('bomberos.bombero')}}">
    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
        <div class="table-responsive-sm">
            <table class="table table-hover  table-sm ">
                <thead>
                    <tr>
                        <th>D.N.I.</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>LP</th>
                        <th>Activo</th>
                        @if(Auth::user()->rol == 1)
                        <th>Cuartel</th>
                        <th>Federación</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $u)
                    <tr style="cursor: pointer;" onclick="getUser({{$u->dni}})">
                        <td scope="row">{{$u->dni}}</td>
                        <td>{{$u->name}}</td>
                        <td>{{$u->surname}}</td>
                        <td>{{$u->lp}}</td>
                        <td>{{$u->active == 1 ? 'No' : ' Si'}}</td>
                        @if(Auth::user()->rol == 1)
                        @foreach($u->cuarteles as $c)
                            <td>{{$c->cuardes}}</td>
                        @endforeach
                        @foreach($u->federaciones as $f)
                            <td>{{$f->feddes}}</td>
                        @endforeach
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
