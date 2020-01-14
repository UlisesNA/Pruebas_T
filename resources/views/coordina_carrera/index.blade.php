@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <div class="container card">
        <div class="row">
            <div class="col-md-12">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Asignar Planeación</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Ver Asignaciones</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="card">
                                    <div class="card-body">
                                        <form id="form-expe">
                                            {{ csrf_field() }}
                                            <div class="form-row">
                                                <div class="form-group col-md-8">
                                                    <select id="id_asigna_tutor" name="id_asigna_tutor" class="form-control">
                                                        <option selected disabled>Tutor</option>
                                                        @foreach($condicion as $con)
                                                            <option value="{{$con->id_asigna_tutor}}">{{$con->doc}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <select id="id_planeacion" name="id_planeacion" class="form-control">
                                                        <option selected disabled>Planeación</option>
                                                        <option value="1">Primero</option>
                                                        <option value="2">Segundo</option>
                                                        <option value="3">Tercero</option>
                                                        <option value="4">Cuarto</option>
                                                        <option value="5">Quinto</option>
                                                        <option value="6">Sexto</option>
                                                        <option value="7">Septimo</option>
                                                        <option value="8">Octavo</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div align="center"><a class="btn btn-primary" id="planea" style="color: white">Asignar</a></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="card">
                                    <div class="card-body">
                                        <form>
                                            <div class="row">
                                                <div class="col">
                                                    <h5 class="card-title" align="right">Tutores</h5>
                                                </div>
                                                <div class="col">
                                                    <div align="right">
                                                        <i class="fas fa-search" aria-hidden="true"></i>
                                                        <input type="text" placeholder="Buscar Tutor" id="docente" onkeyup="myFunction()" style="border: hidden">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <table class="table" id="Table">
                                            <thead>
                                            <tr>
                                                <th scope="col">Tutor</th>
                                                <th scope="col">Carrera</th>
                                                <th scope="col">Semestre</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($condicion as $c)
                                                    <tr>
                                                        <td>{{$c->doc}}</td>
                                                        <td>{{$c->carr}}</td>
                                                        <td>{{$c->sem}}</td>
                                                    </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <br>
                        <form>
                            <div class="row">
                                <div class="col">
                                    <div align="right">
                                        <i class="fas fa-search" aria-hidden="true"></i>
                                        <input type="text" placeholder="Buscar Tutor" id="verifica" onkeyup="verificar()" style="border: hidden">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <table class="table" id="tabla_v">
                            <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Carrera</th>
                                <th scope="col">Semestre</th>
                                <th scope="col">Planeación</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($tabla as $t)
                                    <tr onmouseover="this.style.backgroundColor='#DBE7F3'" onmouseout="this.style.backgroundColor='white'">
                                        <td>{{$t->doc}}</td>
                                        <td>{{$t->carr}}</td>
                                        <td>{{$t->sem}}</td>
                                        @if($t->plan == 1)
                                            <td>Primero</td>
                                            @elseif($t->plan == 2)
                                            <td>Segundo</td>
                                            @elseif($t->plan == 3)
                                                <td>Tercero</td>
                                            @elseif($t->plan == 4)
                                                <td>Cuarto</td>
                                            @elseif($t->plan == 5)
                                                <td>Quinto</td>
                                            @elseif($t->plan == 6)
                                                <td>Sexto</td>
                                            @elseif($t->plan == 7)
                                                <td>Septimo</td>
                                            @elseif($t->plan == 8)
                                                <td>Octavo</td>
                                        @endif
                                        <td>
                                            <form action="{{ route('coordina_carrera.destroy', $t->id_asigna_planeacion_actividad) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-lg"><i class="fas fa-times-circle"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="{{asset('js/jquery.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#planea').click(function(){
            var con= true;
            var datos = $('#form-expe').serialize();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "coordina_carrera",
                method: "POST",
                dataType: "json",
                data:datos,
                success:function (data) {
                    location.reload();
                },
                error:function(request,status,data)
                {
                    alert("Hubo un error al insertar el dato, intentelo de nuevo")
                    console.log(request)
                    console.log(status)
                    console.log(data)
                }
            });
        });
    });
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("docente");
        filter = input.value.toUpperCase();
        table = document.getElementById("Table");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
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
    function verificar() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("verifica");
        filter = input.value.toUpperCase();
        table = document.getElementById("tabla_v");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
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

