@extends('layouts.master')

@section('header')
<div class="container-fluid">
    <div class="row">
        <div class="col-7">
        </div>
        <div class="col-4 text-right">
            <h1 class=" h4 d-none d-inline-block">
                Pre Ingreso
                <br>
                <small class="text-info">Selección de federación</small>
            </h1>
        </div>
        <div class="col-1 text-center">
            <div class="d-none d-inline-block">
                <i class="fas fa-id-card fa-3x"></i>
            </div>
        </div>
    </div>
</div>
@endsection

@section('menu')

@endsection

@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('federaciones')}}" method="POST">
                            @csrf
                            <legend>Ingrese su federación</legend>
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="federacion"></label>
                                    <select class="form-control  col-12" name="federacion" id="federacion">
                                        <option>Seleccionar</option>
                                        @foreach(Federaciones::getFederaciones() as  $fed)
                                            <option value="{{$fed->fedcod}}">{{$fed->feddes}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col text-right">
                                    <button type="submit" class="btn btn-success">Ingresar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
