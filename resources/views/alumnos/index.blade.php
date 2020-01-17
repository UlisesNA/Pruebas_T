@extends('layouts.app')
@section('content')
@if (Session::has('cuenta'))
    <br>
    <br>
    <br>
<div class="container">
    <div class="row">
        <div class="card offset-2 col-8">
            <div class="card-header">
                {{Session::get('alumno')}}
                <h6>{{Session::get('nombre')}}</h6>
                @if ($datos)
                    <a href="{{route('pdf_all')}}" target="_blank" class="btn btn-danger text-white float-right"> <i class="fas fa-file-pdf"></i></a>
                @endif
            </div>
            <div class="card-body">
                <div class="text-center">
                    @if ($datos)
                    <a href="Alum" class="btn btn-success"> <h1><i class="fas fa-folder"></i></h1> Editar Expediente</a>
                    @else
                    <a href="Alum" class="btn btn-primary"> <h1><i class="fas fa-folder"></i></h1> Llenar Expediente</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
    <br>
    <br>
    <br>
@else
    Pagina No disponible
@endif
@endsection
