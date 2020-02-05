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
                <th> <a class="btn btn-lg"  style="background:#bc0a44"><i class="far fa-file-pdf" style="color:#ffffcc ;"></i></a></th>
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
                                            <label class="radio-inline"><input type="radio" name="tutoria_grupal" value="Si">Si</label>
                                            <label></label>
                                            <label class="radio-inline"><input type="radio" name="tutoria_grupal" value="No">No</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Individual</label>
                                        <div>
                                            <label class="radio-inline"><input type="radio" name="tutoria_individual" value="Si">Si</label>
                                            <label></label>
                                            <label class="radio-inline"><input type="radio" name="tutoria_individual" value="No">No</label>
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
                                            <label class="radio-inline"><input type="radio" name="beca" value="Si">Si</label>
                                            <label></label>
                                            <label class="radio-inline"><input type="radio" name="beca" value="No">No</label>
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
                                            <label class="radio-inline"><input type="radio" name="repeticion" value="Si">Si</label>
                                            <label></label>
                                            <label class="radio-inline"><input type="radio" name="repeticion" value="No">No</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Especial</label>
                                        <div>
                                            <label class="radio-inline"><input type="radio" name="especial" value="Si">Si</label>
                                            <label></label>
                                            <label class="radio-inline"><input type="radio" name="especial" value="No">No</label>
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
                                            <label class="radio-inline"><input type="radio" name="academico" value="Si">Si</label>
                                            <label></label>
                                            <label class="radio-inline"><input type="radio" name="academico" value="No">No</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Apoyo Médico</label>
                                        <div>
                                            <label class="radio-inline"><input type="radio" name="medico" value="Si">Si</label>
                                            <label></label>
                                            <label class="radio-inline"><input type="radio" name="medico" value="No">No</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Apoyo Psicológico</label>
                                        <div>
                                            <label class="radio-inline"><input type="radio" name="psicologico" value="Si">Si</label>
                                            <label></label>
                                            <label class="radio-inline"><input type="radio" name="psicologico" value="No">No</label>
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
                                            <label class="radio-inline"><input type="radio" name="baja" value="Si">Si</label>
                                            <label></label>
                                            <label class="radio-inline"><input type="radio" name="baja" value="No">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div align="center">
                                        <h5>Nivel de Inglés</h5>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <select class="mdb-select md-form" name="ingles">
                                        <option selected >-Seleccione</option>
                                        <option value="1">Nivel 1</option>
                                        <option value="2">Nivel 2</option>
                                        <option value="3">Nivel 3</option>
                                        <option value="4">Nivel 4</option>
                                        <option value="5">Nivel 5</option>
                                        <option value="6">Nivel 6</option>
                                        <option value="7">Nivel 7</option>
                                        <option value="8">Nivel 8</option>
                                        <option value="9">Finalizado</option>
                                    </select>
                                </div>
                            </div>
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div align="center">
                                        <h5>Creditos Complementarios</h5>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <select class="mdb-select md-form" name="complementarias">
                                        <option selected>-Seleccione</option>
                                        <option value="1">0</option>
                                        <option value="2">1</option>
                                        <option value="3">2</option>
                                        <option value="4">3</option>
                                        <option value="5">4</option>
                                        <option value="6">5</option>
                                    </select>
                                </div>
                            </div>
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div align="center">
                                        <h5>Servicio Social</h5>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <select class="mdb-select md-form" name="s_social">
                                        <option selected>-Seleccione</option>
                                        <option value="1">No</option>
                                        <option value="2">En curso</option>
                                        <option value="3">Finalizado</option>
                                    </select>
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
                                <div align="center"><button type="submit" class="btn" style="background: #e0e0e0">Actualizar</button></div>
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
                    <a class="btn btn-primary" id="final_rep" data-dismiss="modal" style="color: white">Aceptar</a>
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
                            @if($d->ti!=NULL && $d->tg!=NULL && $d->beca!=NULL && $d->repe!=NULL && $d->espe!=NULL && $d->aca!=NULL && $d->med!=NULL && $d->ps!=NULL && $d->baja!=NULL && $d->ing!=NULL && $d->comp!=NULL && $d->social!=NULL)
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
