@extends('layouts.app')
@section('content')
<div class="container card">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header" align="center">
                    <h5 align="center">Probabilidad de deserción</h5>
                </div>
            </div>
            <br>
            <table class="table">
                <thead class="thead" style="background: #f7f7f7">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Deserción</th>
                    <th scope="col">Trabaja</th>
                    <th scope="col">Estado Civil</th>
                    <th scope="col">Número de hijos</th>
                    <th scope="col">Le gusta la carrera</th>
                    <th scope="col">Materias en repetición</th>
                    <th scope="col">Materias en especial</th>
                    <th scope="col">Total de especiales</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cien_uno as $dato_c)
                    <tr onmouseover="this.style.backgroundColor='#DBE7F3'" onmouseout="this.style.backgroundColor='white'">
                        <td>{!! $dato_c->alum !!}</td>
                        @if($dato_c->tot >=0.0 && $dato_c->tot<=50.0)
                            <td style="color: #fff;background: #3bb143" align="center">{!! $dato_c->tot !!}%</td>
                        @elseif($dato_c->tot >=50.1 && $dato_c->tot<=70.0)
                            <td style="color: #fff;background: #ffb60f" align="center" >{!! $dato_c->tot !!}%</td>
                        @else
                            <td style="color: #fff;background: #bb0f0b" align="center" >{!! $dato_c->tot !!}%</td>
                        @endif
                        @if($dato_c->tra == 1)
                            <td>Si</td>
                        @else
                            <td>No</td>
                        @endif
                        @if($dato_c->civ == 1)
                            <td>Soltero</td>
                        @elseif($dato_c->civ == 2)
                            <td>Casado</td>
                        @elseif($dato_c->civ == 3)
                            <td>Unión libre</td>
                        @elseif($dato_c->civ == 4)
                            <td>Divorciado</td>
                        @else
                            <td>Viudo</td>
                        @endif
                        <td>{!! $dato_c->hijo !!}</td>
                        @if($dato_c->sat==1)
                            <td>Si</td>
                        @else
                            <td>No</td>
                        @endif
                        <td>{!! $dato_c->rep !!}</td>
                        <td>{!! $dato_c->espe !!}</td>
                        <td>{!! $dato_c->t_esp !!}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
