<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div class="row">
        <img src="../public/img/header.png" alt="" class="card-img-top" />
</div>
<div class=" bg-secondary text-dark text-center">Tutorias</div>
<div class="row">
    <div class="col-6">Carrera:     {{$datosAlum[0]->desc_carrera}}</div>
</div>
<div class="row">
        <div class="col-6">
            Grupo: {{$datosAlum[0]->grupo}}
        </div>
    </div>
<div class="row">
    <div class="col-12">Asignatura:    Tutorias</div>
</div>
<div class="row">
        <div class="col-12">
            Tutor:   {{$datosTutor[0]->nombre}}
        </div>
    </div>
<table class="table table-bordered table-sm">
    <thead class="bg-secondary text-center">
        <tr>
            <th>NP</th>
            <th>No. Cuenta</th>
            <th>Nombre del Alumno</th>
        </tr>
    </thead>
    <tbody class="">
        {{$index=1}}
        @foreach ($datosAlum as $dato)
        @if ($dato->estado==1)
        <tr>
        @endif
        @if ($dato->estado==2)
        <tr class="bg-warning">
        @endif
        @if ($dato->estado==3)
        <tr class="bg-danger">
        @endif
            <td class="text-center">
                {{$index}}
            </td>
            <td class="text-center">
                    {{$dato->cuenta}}
            </td>
            <td>
                    {{$dato->nombre}}
            </td>
        </tr>
        {{$index++}}
        @endforeach
    </tbody>
</table>
