@extends('layouts.master')

@section('header')
<div class="container-fluid">
    <div class="row">
        <div class="col-7">
        </div>
        <div class="col-4 text-right">
            <h1 class=" h4 d-none d-inline-block">
                Dashboard
                <br>
                <small class="text-info">Información general</small>
            </h1>
        </div>
        <div class="col-1 text-center">
            <div class="d-none d-inline-block">
                <i class="fas fa-info fa-3x"></i>
            </div>
        </div>
    </div>
</div>
@endsection

@section('menu')

@endsection
@section('content')
    @if(Auth::user()->rol == 1 || Auth::user()->rol == 2)
        @include('federacion.admin')
    @else
    @include('federacion.bombero')
    @endif
@endsection
