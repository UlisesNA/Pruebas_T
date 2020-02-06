@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <div class="container card">
        <div class="form-group row">
            <div class="col-sm-1"></div>
            <div class="col-sm-9" align="center"><h5>Probabilidad de deserción de los tutorados</h5></div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">No.Cuenta</th>
                <th scope="col">Estudiante</th>
                <th scope="col">Deserción</th>
                <th scope="col">Handle</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>

            </tbody>
        </table>
    </div>
@endsection
<script src="{{asset('js/jquery.js')}}"></script>


