@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <div class="container card">
        <div class="form-group row">
            <div class="col-sm-1"></div>
            <div class="col-sm-9" align="center"><h5>Probabilidad de deserción de los tutorados</h5></div>
        </div>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Estudiante</th>
                <th scope="col">No.hijos</th>
                <th scope="col">Trabaja</th>
                <th scope="col">Alcohol</th>
                <th scope="col">Mat.Repetición</th>
                <th scope="col">No.Repetición</th>
                <th scope="col">Mat.Especial</th>
                <th scope="col">Especiales Totales</th>
                <th scope="col">Probabilidad de deserción</th>
            </tr>
            </thead>
            <tbody>
            @foreach($consulta as $con)
            <tr onmouseover="this.style.backgroundColor='#DBE7F3'" onmouseout="this.style.backgroundColor='white'">
                <td>{{$con->nombre}}</td>
                <td align="center">{{$con->no_hijos}}</td>
                @if($con->trabaja==1)
                    <td align="center">Si</td>
                @else
                    <td align="center">No</td>
                @endif
                @if($con->id_escala==1)
                    <td align="center">Nunca</td>
                @elseif($con->id_escala==2)
                    <td align="center">Rara vez</td>
                @elseif($con->id_escala==3)
                    <td align="center">Aveces</td>
                @else
                    <td align="center">Frecuentemente</td>
                @endif
                @if($con->materias_repeticion==1)
                    <td align="center">Si</td>
                @else
                    <td align="center">No</td>
                @endif
                <td align="center">{{$con->tot_repe}}</td>
                @if($con->materias_especial==1)
                    <td align="center">Si</td>
                @else
                    <td align="center">No</td>
                @endif
                <td align="center">{{$con->tot_espe}}</td>
                @if($con->total>=60.0 && $con->total<=69.9)
                    <td style="background: #e9c423" align="center">{{$con->total}} %</td>
                @elseif($con->total>=70.0)
                    <td style="background: #e02224;color: black" align="center">{{$con->total}} %</td>
                @else
                    <td style="background: #5bc013" align="center">{{$con->total}} %</td>
                @endif
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
<script src="{{asset('js/jquery.js')}}"></script>


