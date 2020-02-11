@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <div class="container card">
        <div class="form-group row">
            <div class="col-sm-1"></div>
            <div class="col-sm-9" align="center"><h5>Reporte Semestral del Tutor</h5></div>
            <div class="col-sm-1" align="right">
                <a class="btn btn-primary" data-toggle="modal" data-target="#info1" style="background: #067a39;color: white" id="insert">+</a>
            </div>
            <div class="col-sm-1" align="left">
                <div class="dropdown">
                    <a class="btn btn-lg dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"  style="background:#bc0a44"><i class="far fa-file-pdf" style="color:#ffffcc;"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @foreach($tabla as $x)
                            @if($x->generacion==2016)
                                <a class="dropdown-item" href="{{route('reporte_pdf')}}" target="_blank">Generación: 2016</a>
                            @elseif($x->generacion==2017)
                                <a class="dropdown-item" href="{{route('reporte_pdf2')}}" target="_blank">Generación: 2017</a>
                            @elseif($x->generacion==2018)
                                <a class="dropdown-item" href="{{route('reporte_pdf3')}}" target="_blank">Generación: 2018</a>
                            @elseif($x->generacion==2019)
                                <a class="dropdown-item" href="{{route('reporte_pdf4')}}" target="_blank">Generación: 2019</a>
                            @elseif($x->generacion==2020)
                                <a class="dropdown-item" href="{{route('reporte_pdf5')}}" target="_blank">Generación: 2020</a>
                            @elseif($x->generacion==2021)
                                <a class="dropdown-item" href="{{route('reporte_pdf6')}}" target="_blank">Generación: 2021</a>
                            @elseif($x->generacion==2022)
                                <a class="dropdown-item" href="{{route('reporte_pdf7')}}" target="_blank">Generación: 2022</a>
                            @elseif($x->generacion==2023)
                                <a class="dropdown-item" href="{{route('reporte_pdf8')}}" target="_blank">Generación: 2023</a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                @foreach($tabla as $dato)
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#target_{{$dato->id_generacion}}"
                       role="tab" aria-controls="target_{{$dato->id_generacion}}" aria-selected="false">
                        Generación {{$dato->generacion}}
                    </a>
                @endforeach
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            @foreach($tabla as $dato)
                <div class="tab-pane fade" id="target_{{$dato->id_generacion}}" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="container card">
                        <div class="row">
                            <div class="col-md-12">
                                <br>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="primero" role="tabpanel" aria-labelledby="primero-tab">
                                        <div class="form-group row">
                                            <div class="col-sm-11" align="center"><h5>Alumnos de la Generación {{$dato->generacion}}</h5></div>
                                        </div>
                                    </div>
                                    <table class="table">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">No.Cuenta</th>
                                            <th scope="col">Nombre</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody id="alums">
                                        @foreach($consulta as $c)
                                            @if($dato->generacion==$c->generacion)
                                            <tr onmouseover="this.style.backgroundColor='#DBE7F3'" onmouseout="this.style.backgroundColor='white'">
                                                <td>{{$c->cuenta}}</td>
                                                <td>{{$c->alum}} {{$c->ap}} {{$c->am}}</td>
                                                <td align="center">
                                                    <a class="btn btn-lg" data-toggle="modal" data-target="#myModal_{{$c->id}}_tar" style="background: #f0f0f0;">
                                                        <i class="far fa-address-card" style="color: black"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @foreach($consulta as $c)
        <div class="modal fade" id="myModal_{{$c->id}}_tar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{$c->alum}} {{$c->ap}} {{$c->am}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('reporte.update',$c->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div align="center">
                                        <h5>Tutoría</h5>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Grupal</label>
                                    <div>
                                        @if($c->tg==NULL)
                                            <label class="radio-inline"><input type="radio" name="tutoria_grupal" value="Si" required>Si</label>
                                            <label></label>
                                            <label class="radio-inline"><input type="radio" name="tutoria_grupal" value="No" required>No</label>
                                        @elseif($c->tg=='Si')
                                            <label class="radio-inline"><input type="radio" name="tutoria_grupal" value="Si" checked>Si</label>
                                            <label></label>
                                            <label class="radio-inline"><input type="radio" name="tutoria_grupal" value="No">No</label>
                                        @else
                                            <label class="radio-inline"><input type="radio" name="tutoria_grupal" value="Si">Si</label>
                                            <label></label>
                                            <label class="radio-inline"><input type="radio" name="tutoria_grupal" value="No" checked>No</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Individual</label>
                                    <div>
                                        @if($c->ti==NULL)
                                        <label class="radio-inline"><input type="radio" name="tutoria_individual" value="Si" required>Si</label>
                                        <label></label>
                                        <label class="radio-inline"><input type="radio" name="tutoria_individual" value="No" required>No</label>
                                        @elseif($c->ti=='Si')
                                            <label class="radio-inline"><input type="radio" name="tutoria_individual" value="Si" checked>Si</label>
                                            <label></label>
                                            <label class="radio-inline"><input type="radio" name="tutoria_individual" value="No">No</label>
                                        @else
                                            <label class="radio-inline"><input type="radio" name="tutoria_individual" value="Si">Si</label>
                                            <label></label>
                                            <label class="radio-inline"><input type="radio" name="tutoria_individual" value="No" checked>No</label>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div align="center">
                                        <h5>Con Beca</h5>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div>
                                        @if($c->beca==NULL)
                                        <label class="radio-inline"><input type="radio" name="beca" value="Si" required>Si</label>
                                        <label></label>
                                        <label class="radio-inline"><input type="radio" name="beca" value="No" required>No</label>
                                        @elseif($c->beca=='Si')
                                            <label class="radio-inline"><input type="radio" name="beca" value="Si" checked>Si</label>
                                            <label></label>
                                            <label class="radio-inline"><input type="radio" name="beca" value="No">No</label>
                                        @else
                                            <label class="radio-inline"><input type="radio" name="beca" value="Si">Si</label>
                                            <label></label>
                                            <label class="radio-inline"><input type="radio" name="beca" value="No" checked>No</label>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div align="center">
                                        <h5>En curso</h5>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Repetición</label>
                                    <div>
                                        @if($c->repe==NULL)
                                        <label class="radio-inline"><input type="radio" name="repeticion" value="Si" required>Si</label>
                                        <label></label>
                                        <label class="radio-inline"><input type="radio" name="repeticion" value="No" required>No</label>
                                        @elseif($c->repe=='Si')
                                            <label class="radio-inline"><input type="radio" name="repeticion" value="Si" checked>Si</label>
                                            <label></label>
                                            <label class="radio-inline"><input type="radio" name="repeticion" value="No">No</label>
                                        @else
                                            <label class="radio-inline"><input type="radio" name="repeticion" value="Si">Si</label>
                                            <label></label>
                                            <label class="radio-inline"><input type="radio" name="repeticion" value="No" checked>No</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Especial</label>
                                    <div>
                                        @if($c->espe==NULL)
                                        <label class="radio-inline"><input type="radio" name="especial" value="Si" required>Si</label>
                                        <label></label>
                                        <label class="radio-inline"><input type="radio" name="especial" value="No" required>No</label>
                                        @elseif($c->espe=='Si')
                                            <label class="radio-inline"><input type="radio" name="especial" value="Si" checked>Si</label>
                                            <label></label>
                                            <label class="radio-inline"><input type="radio" name="especial" value="No">No</label>
                                        @else
                                            <label class="radio-inline"><input type="radio" name="especial" value="Si">Si</label>
                                            <label></label>
                                            <label class="radio-inline"><input type="radio" name="especial" value="No" checked>No</label>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div align="center">
                                        <h5>Canalizados en el semestre</h5>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Asesoría Académica</label>
                                    <div>
                                        @if($c->aca==NULL)
                                        <label class="radio-inline"><input type="radio" name="academico" value="Si" required>Si</label>
                                        <label></label>
                                        <label class="radio-inline"><input type="radio" name="academico" value="No" required>No</label>
                                        @elseif($c->aca=='Si')
                                            <label class="radio-inline"><input type="radio" name="academico" value="Si" checked>Si</label>
                                            <label></label>
                                            <label class="radio-inline"><input type="radio" name="academico" value="No">No</label>
                                        @else
                                            <label class="radio-inline"><input type="radio" name="academico" value="Si">Si</label>
                                            <label></label>
                                            <label class="radio-inline"><input type="radio" name="academico" value="No" checked>No</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Apoyo Médico</label>
                                    <div>
                                        @if($c->med==NULL)
                                        <label class="radio-inline"><input type="radio" name="medico" value="Si" required>Si</label>
                                        <label></label>
                                        <label class="radio-inline"><input type="radio" name="medico" value="No" required>No</label>
                                         @elseif($c->med=='Si')
                                            <label class="radio-inline"><input type="radio" name="medico" value="Si" checked>Si</label>
                                            <label></label>
                                            <label class="radio-inline"><input type="radio" name="medico" value="No">No</label>
                                         @else
                                            <label class="radio-inline"><input type="radio" name="medico" value="Si">Si</label>
                                            <label></label>
                                            <label class="radio-inline"><input type="radio" name="medico" value="No" checked>No</label>
                                         @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Apoyo Psicológico</label>
                                    <div>
                                        @if($c->ps==NULL)
                                        <label class="radio-inline"><input type="radio" name="psicologico" value="Si" required>Si</label>
                                        <label></label>
                                        <label class="radio-inline"><input type="radio" name="psicologico" value="No" required>No</label>
                                        @elseif($c->ps=='Si')
                                            <label class="radio-inline"><input type="radio" name="psicologico" value="Si" checked>Si</label>
                                            <label></label>
                                            <label class="radio-inline"><input type="radio" name="psicologico" value="No">No</label>
                                        @else
                                            <label class="radio-inline"><input type="radio" name="psicologico" value="Si">Si</label>
                                            <label></label>
                                            <label class="radio-inline"><input type="radio" name="psicologico" value="No" checked>No</label>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div align="center">
                                        <h5>Baja</h5>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div>
                                        @if($c->baja==NULL)
                                        <label class="radio-inline"><input type="radio" name="baja" value="Si" required>Si</label>
                                        <label></label>
                                        <label class="radio-inline"><input type="radio" name="baja" value="No" required>No</label>
                                        @elseif($c->baja=='Si')
                                            <label class="radio-inline"><input type="radio" name="baja" value="Si" checked>Si</label>
                                            <label></label>
                                            <label class="radio-inline"><input type="radio" name="baja" value="No">No</label>
                                        @else
                                            <label class="radio-inline"><input type="radio" name="baja" value="Si">Si</label>
                                            <label></label>
                                            <label class="radio-inline"><input type="radio" name="baja" value="No" checked>No</label>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div align="center">
                                        <h5>Observaciones</h5>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <textarea rows="4" cols="23" name="observaciones"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div align="center"><button type="submit" class="btn" style="background: #e0e0e0">Enviar</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="modal fade" id="info1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="reporte-insert">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div align="center"><h4>¿Desea cargar la información de sus tutorados?</h4></div>
                            <input type="text" id="activador" name="activador" value="si" hidden>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary" id="final_rep" data-dismiss="modal" style="color: white" onclick="reload(2);">Aceptar</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="{{asset('js/jquery.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#final_rep').click(function(){
            var con= true;
            var datos = $('#reporte-insert').serialize();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "reporte",
                method: "POST",
                dataType: "json",
                data:datos,
            });
        });
    });
    function reload(segs) {
        setTimeout(function() {
            location.reload();
        }, parseInt(segs) * 1000);
    }
</script>

