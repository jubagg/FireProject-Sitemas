
@extends('errors::minimal')
@extends('layouts.master')
@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))
