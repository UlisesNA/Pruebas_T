@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Alumnos</div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">General</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Generacion</a>
                                </li>
                            </ul>
                              <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="list-group">
                                        <table class="table">
                                            <thead>
                                            <th>Cuenta</th>
                                            <th>Nombre</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($alumnosAll as $alum)
                                                    <tr>
                                                        <td>{{$alum->cuenta}}</td>
                                                        <td> {{$alum->nombre}} {{$alum->apaterno}} {{$alum->amaterno}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade pt-4" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    @foreach ($generaciones as $gen)
                                        <li class="nav-item">
                                            <a class="nav-link btn-generacion" data-id="{{$gen->id_generacion}}"  id="pills-{{$gen->generacion}}-tab" data-toggle="pill" href="#pills-{{$gen->id_generacion}}" role="tab" aria-controls="pills-{{$gen->generacion}}" aria-selected="true">
                                                {{$gen->generacion}}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content gene" id="pills-tabContent">
                                        @foreach ($generaciones as $gen)
                                            <div class="tab-pane fade" id="pills-{{$gen->id_generacion}}" role="tabpanel" aria-labelledby="pills-{{$gen->generacion}}-tab">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            @foreach($gen->getGrupo as $gru)
                                                                <div class="col-2"><button id="bot{{$gru->id_asigna_generacion}}" data-id="{{$gru->id_asigna_generacion}}" class="grupo btn btn-outline-primary">Grupo {{$gru->grupo}}</button></div>
                                                            @endforeach


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="row pt-4" id="respuesta">

                                        </div>
                                    </div>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$(document).ready(function(){

    $('.grupo').on('click',function() {
        var id4 = $(this).data("id");

       var cod="";

        $.ajax({
             url : '/list',
            data : { dato : id4 },
            type : 'GET',
            dataType : 'json',
            success : function(json) {

                 //console.log(json.length);
                if(json.length==0)
                {
                    cod+='<div class="col-12 card h5 font-weight-bold text-center"><p class="pt-3">Ningún alumno asignado en la generacion</p></div>';
                }
                else {
                    cod+='<table class="table"><thead><th>Cuenta</th><th>Nombre</th></thead><tbody>';
                    for (var a=0; a<json.length;a++)
                    {
                        cod+='<tr><td>'+json[a].cuenta+'</td><td>'+json[a].nombre+' '+json[a].apaterno+' '+json[a].amaterno+'</td>';
                    }
                    cod+='</tbody></table>';
                }

                $('#respuesta').html(cod);
            },
            error: function (data) {
                console.error('Error:', data);
            }
        });
        //idP= $(this).data("id");
    });

    $(".btn-generacion").click(function(){
       // alert('dasd');
        $('#respuesta').html("");

    });

});
</script>
