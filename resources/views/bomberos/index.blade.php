@extends('layouts.master')

@section('header')
<div class="container-fluid">
    <div class="row">
        <div class=" d-none d-sm-none d-md-block  col-1 text-center col-7">
        </div>
        <div class="col-sm-12 col-lg-4 text-right">
            <h1 class=" h4 d-none d-inline-block">
                Bomberos
                <br>
                <small class="text-info">Información general</small>
            </h1>
        </div>
        <div class=" d-none d-sm-none d-md-block  col-1 text-center">
            <div class="d-none d-inline-block">
                <i class="fas fa-users fa-3x"></i>
            </div>
        </div>
    </div>
</div>
@endsection

@section('lateral')
    @include('bomberos.menu')
@endsection

@section('content')
@include('layouts.notifications')
<div class="tab-content" id="v-pills-tabContent">
    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
        @if(Auth::user()->rol == 1 || Auth::user()->rol == 2)
            @include('bomberos.nuevo')
        @else
            @include('bomberos.usuario')
        @endif
    </div>
    @if(Auth::user()->rol == 1 || Auth::user()->rol == 2)
        @include('bomberos.listado')
    @endif
  </div>




@endsection




