<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>S.G.B.</title>

       <!-- Required meta tags -->
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       {{-- bootstrap --}}
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
       <link rel="stylesheet" href="{{asset('css/custom.css')}}">
       {{-- Font awesome --}}
       <script src="https://kit.fontawesome.com/8a89905fec.js" crossorigin="anonymous"></script>
   </head>

   <body>
        <div class="container-fluid">
            <nav class="navbar navbar-expand  sticky-top  navbar-light bg-light row">
                @if(Auth::check())
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="nav navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('federaciones.dashboard',['federacion' => session(Funciones::getKey()) ]) }}">Menu principal</a>
                            </li>
                        </ul>
                    </div>
                @endif
                <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Ingreso') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registro') }}</a>
                        </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Cerrar sesión') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                </ul>
           </div>
            </nav>
            <div class="row py-2" style= >
                @section('header')
                @show
            </div>
            <div class="container-fluid">
                <div class="row ">
                    @if(!empty($menu))
                    <div class= "col-sm-12 col-lg-2 d-none d-inline-block">
                        @section('lateral')
                        @show
                    </div>
                    <div class="py-2 col-sm-12 col-lg-10" id="contenido">
                        @section('content')
                        @show
                    </div>
                    @else
                    <div class="py-2 col-12" id="contenido">
                        @section('content')
                        @show
                    </div>
                    @endif
                </div>
            </div>
        </div>

       <!-- Optional JavaScript -->
       <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="https://kit.fontawesome.com/3211b460a4.js" crossorigin="anonymous" async="async" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
{{--         <script src="https://code.jquery.com/jquery-1.12.4.js"></script> --}}
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



        <script>

        $token = { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') };
        $urluser = $('#rutauser').val();



        function recuperarNumeracion(id){
            $.ajax({
                method: "POST",
                url: $urluser + '/' + id,
                headers: $token,
                dataType: 'json',
                data: {
                    id: id,
                },
                success: function (response) {
                    pasarDatos(response);
                }
            });
        };

        function pasarDatos(datos){

            $('#v-pills-profile').removeClass('active show');
            $('#v-pills-profile-tab').removeClass('active');
            $('#v-pills-home').addClass('active show');
            $('#v-pills-home-tab').addClass('active');

            $('#nombre').val(datos.bombero.name);
            $('#apellido').val(datos.bombero.surname);
            $('#username').val(datos.bombero.username);
            $('#mail').val(datos.bombero.email);
            $('#dni').val(datos.bombero.dni);
            $('#cuartel').val(datos.bombero.cuartel);
            $('#lp').val(datos.bombero.lp);
            $('#grado').val(datos.bombero.grado);
            $('#federacion').val(datos.bombero.federacion);
            if({{Auth::user()->rol}} == 1){
                $('#rol').val(datos.bombero.rol);
                if(datos.bombero.inactive == 1){
                    $('#inactivar').prop('checked',true);
                }
            }
        }

        function getUser($id){
                $dni = $id;
                recuperarNumeracion($dni);
            }

        </script>
     </body>
   </html>
