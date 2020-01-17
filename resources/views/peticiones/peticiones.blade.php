@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <div class="container card">
        <div class="row">
            <div class="col-md-12">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="primero-tab" data-toggle="tab" href="#primero" role="tab" aria-controls="nav-home" aria-selected="true">Primero</a>
                        <a class="nav-item nav-link" id="segundo-tab" data-toggle="tab" href="#segundo" role="tab" aria-controls="nav-profile" aria-selected="false">Segundo</a>
                        <a class="nav-item nav-link" id="tercero-tab" data-toggle="tab" href="#tercero" role="tab" aria-controls="nav-contact" aria-selected="false">Tercero</a>
                        <a class="nav-item nav-link" id="cuarto-tab" data-toggle="tab" href="#cuarto" role="tab" aria-controls="nav-profile" aria-selected="false">Cuarto</a>
                        <a class="nav-item nav-link" id="quinto-tab" data-toggle="tab" href="#quinto" role="tab" aria-controls="nav-contact" aria-selected="false">Quinto</a>
                        <a class="nav-item nav-link" id="sexto-tab" data-toggle="tab" href="#sexto" role="tab" aria-controls="nav-profile" aria-selected="false">Sexto</a>
                        <a class="nav-item nav-link" id="septimo-tab" data-toggle="tab" href="#septimo" role="tab" aria-controls="nav-contact" aria-selected="false">Septimo</a>
                        <a class="nav-item nav-link" id="octavo-tab" data-toggle="tab" href="#octavo" role="tab" aria-controls="nav-profile" aria-selected="false">Octavo</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="primero" role="tabpanel" aria-labelledby="primero-tab">
                        <table class="table" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Actividad</th>
                                <th>Semestre</th>
                                <th>Carrera</th>
                                <th>Petición</th>
                                <th colspan="2" align="center">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($s1 as $sem1)
                                    <tr onmouseover="this.style.backgroundColor='#DBE7F3'" onmouseout="this.style.backgroundColor='white'">
                                        <td>{{$sem1->desc_actividad}}</td>
                                        <td>{{$sem1->descripcion}}</td>
                                        <td>{{$sem1->nombre}}</td>
                                        <td>{{$sem1->sugerencia}}</td>
                                        <td>
                                            <form action="{{route('peticiones.update',$sem1->id_planeacion)}}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="number" class="form-control" name="id_sugerencia" value="2" hidden>
                                                <button type="submit" class="btn" style="background: #e0e0e0">Visto Bueno</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{route('peticiones.update',$sem1->id_planeacion)}}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="number" class="form-control" name="id_sugerencia" value="3" hidden>
                                                <button type="submit" class="btn" style="background: #e0e0e0">Rechazar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="segundo" role="tabpanel" aria-labelledby="segundo-tab">
                        <table class="table" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Actividad</th>
                                <th>Semestre</th>
                                <th>Carrera</th>
                                <th>Petición</th>
                                <th colspan="2" align="center">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($s2 as $sem1)
                                <tr onmouseover="this.style.backgroundColor='#DBE7F3'" onmouseout="this.style.backgroundColor='white'">
                                    <td>{{$sem1->desc_actividad}}</td>
                                    <td>{{$sem1->descripcion}}</td>
                                    <td>{{$sem1->nombre}}</td>
                                    <td>{{$sem1->sugerencia}}</td>
                                    <td>
                                        <form action="{{route('peticiones.update',$sem1->id_planeacion)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="number" class="form-control" name="id_sugerencia" value="2" hidden>
                                            <button type="submit" class="btn" style="background: #e0e0e0">Visto Bueno</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{route('peticiones.update',$sem1->id_planeacion)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="number" class="form-control" name="id_sugerencia" value="3" hidden>
                                            <button type="submit" class="btn" style="background: #e0e0e0">Rechazar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="tercero" role="tabpanel" aria-labelledby="tercero-tab">
                        <table class="table" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Actividad</th>
                                <th>Semestre</th>
                                <th>Carrera</th>
                                <th>Petición</th>
                                <th colspan="2" align="center">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($s3 as $sem1)
                                <tr onmouseover="this.style.backgroundColor='#DBE7F3'" onmouseout="this.style.backgroundColor='white'">
                                    <td>{{$sem1->desc_actividad}}</td>
                                    <td>{{$sem1->descripcion}}</td>
                                    <td>{{$sem1->nombre}}</td>
                                    <td>{{$sem1->sugerencia}}</td>
                                    <td>
                                        <form action="{{route('peticiones.update',$sem1->id_planeacion)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="number" class="form-control" name="id_sugerencia" value="2" hidden>
                                            <button type="submit" class="btn" style="background: #e0e0e0">Visto Bueno</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{route('peticiones.update',$sem1->id_planeacion)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="number" class="form-control" name="id_sugerencia" value="3" hidden>
                                            <button type="submit" class="btn" style="background: #e0e0e0">Rechazar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="cuarto" role="tabpanel" aria-labelledby="cuarto-tab">
                        <table class="table" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Actividad</th>
                                <th>Semestre</th>
                                <th>Carrera</th>
                                <th>Petición</th>
                                <th colspan="2" align="center">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($s4 as $sem1)
                                <tr onmouseover="this.style.backgroundColor='#DBE7F3'" onmouseout="this.style.backgroundColor='white'">
                                    <td>{{$sem1->desc_actividad}}</td>
                                    <td>{{$sem1->descripcion}}</td>
                                    <td>{{$sem1->nombre}}</td>
                                    <td>{{$sem1->sugerencia}}</td>
                                    <td>
                                        <form action="{{route('peticiones.update',$sem1->id_planeacion)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="number" class="form-control" name="id_sugerencia" value="2" hidden>
                                            <button type="submit" class="btn" style="background: #e0e0e0">Visto Bueno</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{route('peticiones.update',$sem1->id_planeacion)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="number" class="form-control" name="id_sugerencia" value="3" hidden>
                                            <button type="submit" class="btn" style="background: #e0e0e0">Rechazar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="quinto" role="tabpanel" aria-labelledby="quinto-tab">
                        <table class="table" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Actividad</th>
                                <th>Semestre</th>
                                <th>Carrera</th>
                                <th>Petición</th>
                                <th colspan="2" align="center">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($s5 as $sem1)
                                <tr onmouseover="this.style.backgroundColor='#DBE7F3'" onmouseout="this.style.backgroundColor='white'">
                                    <td>{{$sem1->desc_actividad}}</td>
                                    <td>{{$sem1->descripcion}}</td>
                                    <td>{{$sem1->nombre}}</td>
                                    <td>{{$sem1->sugerencia}}</td>
                                    <td>
                                        <form action="{{route('peticiones.update',$sem1->id_planeacion)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="number" class="form-control" name="id_sugerencia" value="2" hidden>
                                            <button type="submit" class="btn" style="background: #e0e0e0">Visto Bueno</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{route('peticiones.update',$sem1->id_planeacion)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="number" class="form-control" name="id_sugerencia" value="3" hidden>
                                            <button type="submit" class="btn" style="background: #e0e0e0">Rechazar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="sexto" role="tabpanel" aria-labelledby="sexto-tab">
                        <table class="table" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Actividad</th>
                                <th>Semestre</th>
                                <th>Carrera</th>
                                <th>Petición</th>
                                <th colspan="2" align="center">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($s6 as $sem1)
                                <tr onmouseover="this.style.backgroundColor='#DBE7F3'" onmouseout="this.style.backgroundColor='white'">
                                    <td>{{$sem1->desc_actividad}}</td>
                                    <td>{{$sem1->descripcion}}</td>
                                    <td>{{$sem1->nombre}}</td>
                                    <td>{{$sem1->sugerencia}}</td>
                                    <td>
                                        <form action="{{route('peticiones.update',$sem1->id_planeacion)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="number" class="form-control" name="id_sugerencia" value="2" hidden>
                                            <button type="submit" class="btn" style="background: #e0e0e0">Visto Bueno</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{route('peticiones.update',$sem1->id_planeacion)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="number" class="form-control" name="id_sugerencia" value="3" hidden>
                                            <button type="submit" class="btn" style="background: #e0e0e0">Rechazar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="septimo" role="tabpanel" aria-labelledby="septimo-tab">
                        <table class="table" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Actividad</th>
                                <th>Semestre</th>
                                <th>Carrera</th>
                                <th>Petición</th>
                                <th colspan="2" align="center">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($s7 as $sem1)
                                <tr onmouseover="this.style.backgroundColor='#DBE7F3'" onmouseout="this.style.backgroundColor='white'">
                                    <td>{{$sem1->desc_actividad}}</td>
                                    <td>{{$sem1->descripcion}}</td>
                                    <td>{{$sem1->nombre}}</td>
                                    <td>{{$sem1->sugerencia}}</td>
                                    <td>
                                        <form action="{{route('peticiones.update',$sem1->id_planeacion)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="number" class="form-control" name="id_sugerencia" value="2" hidden>
                                            <button type="submit" class="btn" style="background: #e0e0e0">Visto Bueno</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{route('peticiones.update',$sem1->id_planeacion)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="number" class="form-control" name="id_sugerencia" value="3" hidden>
                                            <button type="submit" class="btn" style="background: #e0e0e0">Rechazar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="octavo" role="tabpanel" aria-labelledby="octavo-tab">
                        <table class="table" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Actividad</th>
                                <th>Semestre</th>
                                <th>Carrera</th>
                                <th>Petición</th>
                                <th colspan="2" align="center">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($s8 as $sem1)
                                <tr onmouseover="this.style.backgroundColor='#DBE7F3'" onmouseout="this.style.backgroundColor='white'">
                                    <td>{{$sem1->desc_actividad}}</td>
                                    <td>{{$sem1->descripcion}}</td>
                                    <td>{{$sem1->nombre}}</td>
                                    <td>{{$sem1->sugerencia}}</td>
                                    <td>
                                        <form action="{{route('peticiones.update',$sem1->id_planeacion)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="number" class="form-control" name="id_sugerencia" value="2" hidden>
                                            <button type="submit" class="btn" style="background: #e0e0e0">Visto Bueno</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{route('peticiones.update',$sem1->id_planeacion)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="number" class="form-control" name="id_sugerencia" value="3" hidden>
                                            <button type="submit" class="btn" style="background: #e0e0e0">Rechazar</button>
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

