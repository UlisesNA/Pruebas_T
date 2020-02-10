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
                <a class="btn btn-primary" data-toggle="modal" data-target="#info" style="background:#4a9aca;color: white">?</a>
            </div>
        </div>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">No.Cuenta</th>
                <th scope="col">Nombre</th>
                <th scope="col">
                    <i class="fas fa-search" aria-hidden="true"></i>
                    <input type="text" placeholder="Buscar Alumno" id="reporte" onkeyup="buscar()" style="border: hidden">
                </th>
                <th> <a class="btn btn-lg"  style="background:#bc0a44" href="{{route('reporte_pdf')}}" target="_blank"><i class="far fa-file-pdf" style="color:#ffffcc ;"></i></a></th>
            </tr>
            </thead>
            <tbody id="alums">
            @foreach($consulta as $c)
                <tr onmouseover="this.style.backgroundColor='#DBE7F3'" onmouseout="this.style.backgroundColor='white'">
                    <td>{{$c->cuenta}}</td>
                    <td>{{$c->alum}} {{$c->ap}} {{$c->am}}</td>
                    <td align="center">
                        <a class="btn btn-lg" data-toggle="modal" data-target="#myModal_{{$c->id}}_tar" style="background: #f0f0f0;">
                            <i class="far fa-address-card" style="color: black"></i>
                        </a>
                    </td>
                    <td></td>
                </tr>
            @endforeach
            </tbody>
        </table>
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
    <div class="modal fade bd-example-modal-lg" id="info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Estado</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($consulta as $d)
                            <tr>
                                <td>{{$d->alum}} {{$d->ap}} {{$d->am}}</td>
                                @if($d->ti!=NULL && $d->tg!=NULL && $d->beca!=NULL && $d->repe!=NULL && $d->espe!=NULL && $d->aca!=NULL && $d->med!=NULL && $d->ps!=NULL && $d->baja!=NULL)
                                    <td style="background:#5bc013">Datos completos</td>
                                @else
                                    <td>Datos incompletos</td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
    function buscar() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("reporte");
        filter = input.value.toUpperCase();
        table = document.getElementById("alums");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
