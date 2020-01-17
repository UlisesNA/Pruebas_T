@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title" align="center">Asignar tutores</h5>
                        <form id="form_jefe">
                            {{ csrf_field() }}
                            <div class="form-row">
                                <div class="form-group col-md-7">
                                        <select id="id_personal" name="id_personal" class="form-control">
                                            <option selected>Docente</option>
                                            @foreach($consulta as $c)
                                            <option value="{{$c->id}}">{{$c->nom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                <div class="form-group col-md-5">
                                        <select id="id_semestre" name="id_semestre" class="form-control">
                                            <option selected>Semestre</option>
                                            @foreach($semestres as $s)
                                            <option value="{{$s->id}}">{{$s->sem}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <select id="id_carrera" name="id_carrera" class="form-control">
                                        <option selected>Carrera</option>
                                        @foreach($carreras as $ca)
                                            <option value="{{$ca->id}}">{{$ca->carr}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div align="center">
                                <a class="btn btn-primary" id="jefe_f"  style="color: white">Agregar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
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
                                <th scope="col">Nombre</th>
                                <th scope="col">Plan Institucional</th>
                                <th scope="col">Semestre</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($condicion as $da)
                            <tr onmouseover="this.style.backgroundColor='#DBE7F3'" onmouseout="this.style.backgroundColor='white'">
                                <td>{{$da->doc}}</td>
                                <td>{{$da->carr}}</td>
                                <td>{{$da->sem}}</td>
                                <td>
                                    <form action="{{ route('jefe.destroy', $da->id_asigna_tutor) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-lg" style="background:white"><i class="fas fa-times-circle"></i></button>
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
        $('#jefe_f').click(function(){
            var con= true;
            var datos = $('#form_jefe').serialize();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "jefe",
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
</script>



