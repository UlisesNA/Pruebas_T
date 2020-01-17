@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="card offset-2 col-8" style="width: 18rem;">
            <div class="card-body">

                <form method="POST" action="Alumno">
                    @csrf
                    <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" aria-describedby="emailHelp" placeholder="Nombre de Usuario">

                    </div>
                    <div class="form-group">
                        <label for="contra">Password</label>
                        <input type="password" class="form-control" id="contra" name="contra" placeholder="Contraseña">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Aceptar</button>
                </form>
            </div>
        </div>
</div>
@endsection
