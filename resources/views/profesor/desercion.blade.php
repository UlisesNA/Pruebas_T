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
                <td align="center">{{$con->no_hijos-1}}</td>
                @if($con->trabaja==1)
                    <td align="center">Si</td>
                @else
                    <td align="center">No</td>
                @endif
                @if($con->id_expbebidas==1)
                    <td align="center">Nunca</td>
                @elseif($con->id_expbebidas==2)
                    <td align="center">Rara vez</td>
                @elseif($con->id_expbebidas==3)
                    <td align="center">Aveces</td>
                @else
                    <td align="center">Frecuentemente</td>
                @endif
                @if($con->materias_repeticion==1)
                    <td align="center">Si</td>
                @else
                    <td align="center">No</td>
                @endif
                @if($con->tot_repe==NULL)
                    <td align="center">0</td>
                @else
                    <td align="center">{{$con->tot_repe}}</td>
                @endif
                @if($con->materias_especial==1)
                    <td align="center">Si</td>
                @else
                    <td align="center">No</td>
                @endif
                <td align="center">{{$con->tot_espe}}</td>
                @if($con->id_carrera_v+$con->sexo_v+$con->id_estado_civil_v+$con->no_hijos_v+$con->no_hermanos_v+$con->enfermedad_cronica_v
                +$con->trabaja_v+$con->practica_deporte_v+$con->actividades_culturales_v+$con->etnia_indigena_v+$con->lugar_nacimientos_v
                +$con->nivel_economico_v+$con->sostiene_economia_hogar_v+$con->tegusta_carrera_elegida_v+$con->beca_v
                +$con->estado_v+$con->id_expbebidas_v+$con->poblacion_v+$con->ant_inst_v+$con->satisfaccion_c_v+
                $con->materias_repeticion_v+$con->tot_repe_v+$con->materias_especial_v+$con->tot_espe_v+$con->gen_espe_v>=70.0)
                    <td style="background: #e02224;color: black" align="center">{{$con->id_carrera_v+$con->sexo_v+$con->id_estado_civil_v+$con->no_hijos_v+$con->no_hermanos_v+$con->enfermedad_cronica_v
                        +$con->trabaja_v+$con->practica_deporte_v+$con->actividades_culturales_v+$con->etnia_indigena_v+$con->lugar_nacimientos_v
                        +$con->nivel_economico_v+$con->sostiene_economia_hogar_v+$con->tegusta_carrera_elegida_v+$con->beca_v
                        +$con->estado_v+$con->id_expbebidas_v+$con->poblacion_v+$con->ant_inst_v+$con->satisfaccion_c_v+
                        $con->materias_repeticion_v+$con->tot_repe_v+$con->materias_especial_v+$con->tot_espe_v+$con->gen_espe_v}} %</td>
                @elseif($con->id_carrera_v+$con->sexo_v+$con->id_estado_civil_v+$con->no_hijos_v+$con->no_hermanos_v+$con->enfermedad_cronica_v
                        +$con->trabaja_v+$con->practica_deporte_v+$con->actividades_culturales_v+$con->etnia_indigena_v+$con->lugar_nacimientos_v
                        +$con->nivel_economico_v+$con->sostiene_economia_hogar_v+$con->tegusta_carrera_elegida_v+$con->beca_v
                        +$con->estado_v+$con->id_expbebidas_v+$con->poblacion_v+$con->ant_inst_v+$con->satisfaccion_c_v+
                        $con->materias_repeticion_v+$con->tot_repe_v+$con->materias_especial_v+$con->tot_espe_v+$con->gen_espe_v>=60.0)
                    <td style="background: #e9c423" align="center">{{$con->id_carrera_v+$con->sexo_v+$con->id_estado_civil_v+$con->no_hijos_v+$con->no_hermanos_v+$con->enfermedad_cronica_v
                        +$con->trabaja_v+$con->practica_deporte_v+$con->actividades_culturales_v+$con->etnia_indigena_v+$con->lugar_nacimientos_v
                        +$con->nivel_economico_v+$con->sostiene_economia_hogar_v+$con->tegusta_carrera_elegida_v+$con->beca_v
                        +$con->estado_v+$con->id_expbebidas_v+$con->poblacion_v+$con->ant_inst_v+$con->satisfaccion_c_v+
                        $con->materias_repeticion_v+$con->tot_repe_v+$con->materias_especial_v+$con->tot_espe_v+$con->gen_espe_v}} %</td>
                @else
                    <td style="background: #5bc013" align="center">{{$con->id_carrera_v+$con->sexo_v+$con->id_estado_civil_v+$con->no_hijos_v+$con->no_hermanos_v+$con->enfermedad_cronica_v
                        +$con->trabaja_v+$con->practica_deporte_v+$con->actividades_culturales_v+$con->etnia_indigena_v+$con->lugar_nacimientos_v
                        +$con->nivel_economico_v+$con->sostiene_economia_hogar_v+$con->tegusta_carrera_elegida_v+$con->beca_v
                        +$con->estado_v+$con->id_expbebidas_v+$con->poblacion_v+$con->ant_inst_v+$con->satisfaccion_c_v+
                        $con->materias_repeticion_v+$con->tot_repe_v+$con->materias_especial_v+$con->tot_espe_v+$con->gen_espe_v}} %</td>
                @endif
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
<script src="{{asset('js/jquery.js')}}"></script>


