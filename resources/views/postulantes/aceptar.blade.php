@extends('templates.master')

@section('contenido-principal')
<div class="col d-flex justify-content-start align-items-center">
    <a href="{{ route('postulantes.index') }}"
        class="btn text-white btn-warning d-flex justify-content-center align-items-center">
        <i class="material-icons text-white mx-1" style="font-size: 1em">arrow_back</i>
        <strong>Volver</strong>
    </a>
</div>
<div class="container mt-4">
    <div class="col-10">

        @endsection