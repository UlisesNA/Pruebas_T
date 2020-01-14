@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header" align="center">
                    <h5 align="center">Probabilidad de deserción</h5>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body" align="center">
                            <h5 class="card-title">Primer Semestre</h5>
                            <a data-toggle="modal" data-target="#cien_uno" class="btn btn-primary" style="color: white">101</a>
                            <a data-toggle="modal" data-target="#cien_dos" class="btn btn-primary" style="color: white">102</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body" align="center">
                            <h5 class="card-title">Segundo Semestre</h5>
                            <a data-toggle="modal" data-target="#dos_uno" class="btn btn-primary" style="color: white">201</a>
                            <a data-toggle="modal" data-target="#dos_dos" class="btn btn-primary" style="color: white">202</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body" align="center">
                            <h5 class="card-title">Tercer Semestre</h5>
                            <a data-toggle="modal" data-target="#tres_uno" class="btn btn-primary" style="color: white">301</a>
                            <a data-toggle="modal" data-target="#tres_dos" class="btn btn-primary" style="color: white">302</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body" align="center">
                            <h5 class="card-title">Cuarto Semestre</h5>
                            <a data-toggle="modal" data-target="#cuat_uno" class="btn btn-primary" style="color: white">401</a>
                            <a data-toggle="modal" data-target="#cuat_dos" class="btn btn-primary" style="color: white">402</a>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body" align="center">
                            <h5 class="card-title">Quinto Semestre</h5>
                            <a data-toggle="modal" data-target="#qui_uno" class="btn btn-primary" style="color: white">501</a>
                            <a data-toggle="modal" data-target="#qui_dos" class="btn btn-primary" style="color: white">502</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body" align="center">
                            <h5 class="card-title">Sexto Semestre</h5>
                            <a data-toggle="modal" data-target="#sei_uno" class="btn btn-primary" style="color: white">601</a>
                            <a data-toggle="modal" data-target="#sei_dos" class="btn btn-primary" style="color: white">602</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body" align="center">
                            <h5 class="card-title">Septimo Semestre</h5>
                            <a data-toggle="modal" data-target="#sept_uno" class="btn btn-primary" style="color: white">701</a>
                            <a data-toggle="modal" data-target="#sept_dos" class="btn btn-primary" style="color: white">702</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body" align="center">
                            <h5 class="card-title">Octavo Semestre</h5>
                            <a data-toggle="modal" data-target="#oc_uno" class="btn btn-primary" style="color: white">801</a>
                            <a data-toggle="modal" data-target="#oc_dos" class="btn btn-primary" style="color: white">802</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="cien_uno" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" align="center">Grupo 101</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead class="thead" style="background: #f7f7f7">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Probabilidad de deserción</th>
                        <th scope="col">Razones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cien_uno as $dato_c)
                        <tr>
                            <td>{!! $dato_c->alum !!}</td>
                            @if($dato_c->tot >=0.0 && $dato_c->tot<=50.0)
                                <td style="color: #fff;background: #3bb143" align="center">{!! $dato_c->tot !!}</td>
                            @elseif($dato_c->tot >=50.1 && $dato_c->tot<=70.0)
                                <td style="color: #fff;background: #ffb60f" align="center" >{!! $dato_c->tot !!}</td>
                            @else
                                <td style="color: #fff;background: #bb0f0b" align="center" >{!! $dato_c->tot !!}</td>
                            @endif
                            <td align="center">
                                <div class="btn-group">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        @if($dato_c->tra == 1)
                                            <button class="dropdown-item">Trabaja: Si</button>
                                        @else
                                            <button class="dropdown-item">Trabaja: No</button>
                                        @endif
                                        @if($dato_c->civ == 1)
                                            <button class="dropdown-item">Estado Civil: Soltero</button>
                                        @elseif($dato_c->civ == 2)
                                            <button class="dropdown-item">Estado Civil: Casado</button>
                                        @elseif($dato_c->civ == 3)
                                            <button class="dropdown-item">Estado Civil: Unión libre</button>
                                        @elseif($dato_c->civ == 4)
                                            <button class="dropdown-item">Estado Civil: Divorciado</button>
                                        @else
                                            <button class="dropdown-item">Estado Civil: Viudo</button>
                                        @endif
                                        <button class="dropdown-item">Número de hijos: {!! $dato_c->hijo !!}</button>
                                        @if($dato_c->sat==1)
                                            <button class="dropdown-item">Le gusta la carrera: Si</button>
                                        @else
                                            <button class="dropdown-item">Le gusta la carrera: No</button>
                                        @endif
                                        <button class="dropdown-item">Materias en repetición: {!! $dato_c->rep !!}</button>
                                        <button class="dropdown-item">Materias en especial: {!! $dato_c->espe !!}</button>
                                        <button class="dropdown-item">Total de especiales: {!! $dato_c->t_esp !!}</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="cien_dos" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" align="center">Grupo 102</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead class="thead" style="background: #f7f7f7">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Probabilidad de deserción</th>
                        <th scope="col">Razones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cien_dos as $dato_cd)
                        <tr>
                            <td>{!! $dato_cd->alum !!}</td>
                            @if($dato_cd->tot >=0.0 && $dato_cd->tot<=50.0)
                                <td style="color: #fff;background: #3bb143" align="center">{!! $dato_cd->tot !!}</td>
                            @elseif($dato_cd->tot >=50.1 && $dato_cd->tot<=70.0)
                                <td style="color: #fff;background: #ffb60f" align="center" >{!! $dato_cd->tot !!}</td>
                            @else
                                <td style="color: #fff;background: #bb0f0b" align="center" >{!! $dato_cd->tot !!}</td>
                            @endif
                            <td align="center">
                                <div class="btn-group">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        @if($dato_cd->tra == 1)
                                            <button class="dropdown-item">Trabaja: Si</button>
                                        @else
                                            <button class="dropdown-item">Trabaja: No</button>
                                        @endif
                                        @if($dato_cd->civ == 1)
                                            <button class="dropdown-item">Estado Civil: Soltero</button>
                                        @elseif($dato_cd->civ == 2)
                                            <button class="dropdown-item">Estado Civil: Casado</button>
                                        @elseif($dato_cd->civ == 3)
                                            <button class="dropdown-item">Estado Civil: Unión libre</button>
                                        @elseif($dato_cd->civ == 4)
                                            <button class="dropdown-item">Estado Civil: Divorciado</button>
                                        @else
                                            <button class="dropdown-item">Estado Civil: Viudo</button>
                                        @endif
                                        <button class="dropdown-item">Número de hijos: {!! $dato_cd->hijo !!}</button>
                                        @if($dato_cd->sat==1)
                                            <button class="dropdown-item">Le gusta la carrera: Si</button>
                                        @else
                                            <button class="dropdown-item">Le gusta la carrera: No</button>
                                        @endif
                                        <button class="dropdown-item">Materias en repetición: {!! $dato_cd->rep !!}</button>
                                        <button class="dropdown-item">Materias en especial: {!! $dato_cd->espe !!}</button>
                                        <button class="dropdown-item">Total de especiales: {!! $dato_cd->t_esp !!}</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="dos_uno" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" align="center">Grupo 201</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead class="thead" style="background: #f7f7f7">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Probabilidad de deserción</th>
                        <th scope="col">Razones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($dosc_uno as $dato_du)
                        <tr>
                            <td>{!! $dato_du->alum !!}</td>
                            @if($dato_du->tot >=0.0 && $dato_du->tot<=50.0)
                                <td style="color: #fff;background: #3bb143" align="center">{!! $dato_du->tot !!}</td>
                            @elseif($dato_du->tot >=50.1 && $dato_du->tot<=70.0)
                                <td style="color: #fff;background: #ffb60f" align="center" >{!! $dato_du->tot !!}</td>
                            @else
                                <td style="color: #fff;background: #bb0f0b" align="center" >{!! $dato_du->tot !!}</td>
                            @endif
                            <td align="center">
                                <div class="btn-group">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        @if($dato_du->tra == 1)
                                            <button class="dropdown-item">Trabaja: Si</button>
                                        @else
                                            <button class="dropdown-item">Trabaja: No</button>
                                        @endif
                                        @if($dato_du->civ == 1)
                                            <button class="dropdown-item">Estado Civil: Soltero</button>
                                        @elseif($dato_du->civ == 2)
                                            <button class="dropdown-item">Estado Civil: Casado</button>
                                        @elseif($dato_du->civ == 3)
                                            <button class="dropdown-item">Estado Civil: Unión libre</button>
                                        @elseif($dato_du->civ == 4)
                                            <button class="dropdown-item">Estado Civil: Divorciado</button>
                                        @else
                                            <button class="dropdown-item">Estado Civil: Viudo</button>
                                        @endif
                                        <button class="dropdown-item">Número de hijos: {!! $dato_du->hijo !!}</button>
                                        @if($dato_du->sat==1)
                                            <button class="dropdown-item">Le gusta la carrera: Si</button>
                                        @else
                                            <button class="dropdown-item">Le gusta la carrera: No</button>
                                        @endif
                                        <button class="dropdown-item">Materias en repetición: {!! $dato_du->rep !!}</button>
                                        <button class="dropdown-item">Materias en especial: {!! $dato_du->espe !!}</button>
                                        <button class="dropdown-item">Total de especiales: {!! $dato_du->t_esp !!}</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="dos_dos" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" align="center">Grupo 202</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead class="thead" style="background: #f7f7f7">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Probabilidad de deserción</th>
                        <th scope="col">Razones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($dosc_dos as $dato_dd)
                        <tr>
                            <td>{!! $dato_dd->alum !!}</td>
                            @if($dato_dd->tot >=0.0 && $dato_dd->tot<=50.0)
                                <td style="color: #fff;background: #3bb143" align="center">{!! $dato_dd->tot !!}</td>
                            @elseif($dato_dd->tot >=50.1 && $dato_dd->tot<=70.0)
                                <td style="color: #fff;background: #ffb60f" align="center" >{!! $dato_dd->tot !!}</td>
                            @else
                                <td style="color: #fff;background: #bb0f0b" align="center" >{!! $dato_dd->tot !!}</td>
                            @endif
                            <td align="center">
                                <div class="btn-group">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        @if($dato_dd->tra == 1)
                                            <button class="dropdown-item">Trabaja: Si</button>
                                        @else
                                            <button class="dropdown-item">Trabaja: No</button>
                                        @endif
                                        @if($dato_dd->civ == 1)
                                            <button class="dropdown-item">Estado Civil: Soltero</button>
                                        @elseif($dato_dd->civ == 2)
                                            <button class="dropdown-item">Estado Civil: Casado</button>
                                        @elseif($dato_dd->civ == 3)
                                            <button class="dropdown-item">Estado Civil: Unión libre</button>
                                        @elseif($dato_dd->civ == 4)
                                            <button class="dropdown-item">Estado Civil: Divorciado</button>
                                        @else
                                            <button class="dropdown-item">Estado Civil: Viudo</button>
                                        @endif
                                        <button class="dropdown-item">Número de hijos: {!! $dato_dd->hijo !!}</button>
                                        @if($dato_dd->sat==1)
                                            <button class="dropdown-item">Le gusta la carrera: Si</button>
                                        @else
                                            <button class="dropdown-item">Le gusta la carrera: No</button>
                                        @endif
                                        <button class="dropdown-item">Materias en repetición: {!! $dato_dd->rep !!}</button>
                                        <button class="dropdown-item">Materias en especial: {!! $dato_dd->espe !!}</button>
                                        <button class="dropdown-item">Total de especiales: {!! $dato_dd->t_esp !!}</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="tres_uno" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" align="center">Grupo 301</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead class="thead" style="background: #f7f7f7">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Probabilidad de deserción</th>
                        <th scope="col">Razones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tresc_uno as $dato_tu)
                        <tr>
                            <td>{!! $dato_tu->alum !!}</td>
                            @if($dato_tu->tot >=0.0 && $dato_tu->tot<=50.0)
                                <td style="color: #fff;background: #3bb143" align="center">{!! $dato_tu->tot !!}</td>
                            @elseif($dato_tu->tot >=50.1 && $dato_tu->tot<=70.0)
                                <td style="color: #fff;background: #ffb60f" align="center" >{!! $dato_tu->tot !!}</td>
                            @else
                                <td style="color: #fff;background: #bb0f0b" align="center" >{!! $dato_tu->tot !!}</td>
                            @endif
                            <td align="center">
                                <div class="btn-group">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        @if($dato_tu->tra == 1)
                                            <button class="dropdown-item">Trabaja: Si</button>
                                        @else
                                            <button class="dropdown-item">Trabaja: No</button>
                                        @endif
                                        @if($dato_tu->civ == 1)
                                            <button class="dropdown-item">Estado Civil: Soltero</button>
                                        @elseif($dato_tu->civ == 2)
                                            <button class="dropdown-item">Estado Civil: Casado</button>
                                        @elseif($dato_tu->civ == 3)
                                            <button class="dropdown-item">Estado Civil: Unión libre</button>
                                        @elseif($dato_tu->civ == 4)
                                            <button class="dropdown-item">Estado Civil: Divorciado</button>
                                        @else
                                            <button class="dropdown-item">Estado Civil: Viudo</button>
                                        @endif
                                        <button class="dropdown-item">Número de hijos: {!! $dato_tu->hijo !!}</button>
                                        @if($dato_tu->sat==1)
                                            <button class="dropdown-item">Le gusta la carrera: Si</button>
                                        @else
                                            <button class="dropdown-item">Le gusta la carrera: No</button>
                                        @endif
                                        <button class="dropdown-item">Materias en repetición: {!! $dato_tu->rep !!}</button>
                                        <button class="dropdown-item">Materias en especial: {!! $dato_tu->espe !!}</button>
                                        <button class="dropdown-item">Total de especiales: {!! $dato_tu->t_esp !!}</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="tres_dos" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" align="center">Grupo 302</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead class="thead" style="background: #f7f7f7">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Probabilidad de deserción</th>
                        <th scope="col">Razones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tresc_dos as $dato_td)
                        <tr>
                            <td>{!! $dato_td->alum !!}</td>
                            @if($dato_td->tot >=0.0 && $dato_td->tot<=50.0)
                                <td style="color: #fff;background: #3bb143" align="center">{!! $dato_td->tot !!}</td>
                            @elseif($dato_td->tot >=50.1 && $dato_td->tot<=70.0)
                                <td style="color: #fff;background: #ffb60f" align="center" >{!! $dato_td->tot !!}</td>
                            @else
                                <td style="color: #fff;background: #bb0f0b" align="center" >{!! $dato_td->tot !!}</td>
                            @endif
                            <td align="center">
                                <div class="btn-group">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        @if($dato_td->tra == 1)
                                            <button class="dropdown-item">Trabaja: Si</button>
                                        @else
                                            <button class="dropdown-item">Trabaja: No</button>
                                        @endif
                                        @if($dato_td->civ == 1)
                                            <button class="dropdown-item">Estado Civil: Soltero</button>
                                        @elseif($dato_td->civ == 2)
                                            <button class="dropdown-item">Estado Civil: Casado</button>
                                        @elseif($dato_td->civ == 3)
                                            <button class="dropdown-item">Estado Civil: Unión libre</button>
                                        @elseif($dato_td->civ == 4)
                                            <button class="dropdown-item">Estado Civil: Divorciado</button>
                                        @else
                                            <button class="dropdown-item">Estado Civil: Viudo</button>
                                        @endif
                                        <button class="dropdown-item">Número de hijos: {!! $dato_td->hijo !!}</button>
                                        @if($dato_td->sat==1)
                                            <button class="dropdown-item">Le gusta la carrera: Si</button>
                                        @else
                                            <button class="dropdown-item">Le gusta la carrera: No</button>
                                        @endif
                                        <button class="dropdown-item">Materias en repetición: {!! $dato_td->rep !!}</button>
                                        <button class="dropdown-item">Materias en especial: {!! $dato_td->espe !!}</button>
                                        <button class="dropdown-item">Total de especiales: {!! $dato_td->t_esp !!}</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="cuat_uno" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" align="center">Grupo 401</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead class="thead" style="background: #f7f7f7">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Probabilidad de deserción</th>
                        <th scope="col">Razones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cuats_uno as $dato_cuu)
                        <tr>
                            <td>{!! $dato_cuu->alum !!}</td>
                            @if($dato_cuu->tot >=0.0 && $dato_cuu->tot<=50.0)
                                <td style="color: #fff;background: #3bb143" align="center">{!! $dato_cuu->tot !!}</td>
                            @elseif($dato_cuu->tot >=50.1 && $dato_cuu->tot<=70.0)
                                <td style="color: #fff;background: #ffb60f" align="center" >{!! $dato_cuu->tot !!}</td>
                            @else
                                <td style="color: #fff;background: #bb0f0b" align="center" >{!! $dato_cuu->tot !!}</td>
                            @endif
                            <td align="center">
                                <div class="btn-group">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        @if($dato_cuu->tra == 1)
                                            <button class="dropdown-item">Trabaja: Si</button>
                                        @else
                                            <button class="dropdown-item">Trabaja: No</button>
                                        @endif
                                        @if($dato_cuu->civ == 1)
                                            <button class="dropdown-item">Estado Civil: Soltero</button>
                                        @elseif($dato_cuu->civ == 2)
                                            <button class="dropdown-item">Estado Civil: Casado</button>
                                        @elseif($dato_cuu->civ == 3)
                                            <button class="dropdown-item">Estado Civil: Unión libre</button>
                                        @elseif($dato_cuu->civ == 4)
                                            <button class="dropdown-item">Estado Civil: Divorciado</button>
                                        @else
                                            <button class="dropdown-item">Estado Civil: Viudo</button>
                                        @endif
                                        <button class="dropdown-item">Número de hijos: {!! $dato_cuu->hijo !!}</button>
                                        @if($dato_cuu->sat==1)
                                            <button class="dropdown-item">Le gusta la carrera: Si</button>
                                        @else
                                            <button class="dropdown-item">Le gusta la carrera: No</button>
                                        @endif
                                        <button class="dropdown-item">Materias en repetición: {!! $dato_cuu->rep !!}</button>
                                        <button class="dropdown-item">Materias en especial: {!! $dato_cuu->espe !!}</button>
                                        <button class="dropdown-item">Total de especiales: {!! $dato_cuu->t_esp !!}</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="cuat_dos" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" align="center">Grupo 402</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead class="thead" style="background: #f7f7f7">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Probabilidad de deserción</th>
                        <th scope="col">Razones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cuats_dos as $dato_cd)
                        <tr>
                            <td>{!! $dato_cd->alum !!}</td>
                            @if($dato_cd->tot >=0.0 && $dato_cd->tot<=50.0)
                                <td style="color: #fff;background: #3bb143" align="center">{!! $dato_cd->tot !!}</td>
                            @elseif($dato_cd->tot >=50.1 && $dato_cd->tot<=70.0)
                                <td style="color: #fff;background: #ffb60f" align="center" >{!! $dato_cd->tot !!}</td>
                            @else
                                <td style="color: #fff;background: #bb0f0b" align="center" >{!! $dato_cd->tot !!}</td>
                            @endif
                            <td align="center">
                                <div class="btn-group">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        @if($dato_cd->tra == 1)
                                            <button class="dropdown-item">Trabaja: Si</button>
                                        @else
                                            <button class="dropdown-item">Trabaja: No</button>
                                        @endif
                                        @if($dato_cd->civ == 1)
                                            <button class="dropdown-item">Estado Civil: Soltero</button>
                                        @elseif($dato_cd->civ == 2)
                                            <button class="dropdown-item">Estado Civil: Casado</button>
                                        @elseif($dato_cd->civ == 3)
                                            <button class="dropdown-item">Estado Civil: Unión libre</button>
                                        @elseif($dato_cd->civ == 4)
                                            <button class="dropdown-item">Estado Civil: Divorciado</button>
                                        @else
                                            <button class="dropdown-item">Estado Civil: Viudo</button>
                                        @endif
                                        <button class="dropdown-item">Número de hijos: {!! $dato_cd->hijo !!}</button>
                                        @if($dato_cd->sat==1)
                                            <button class="dropdown-item">Le gusta la carrera: Si</button>
                                        @else
                                            <button class="dropdown-item">Le gusta la carrera: No</button>
                                        @endif
                                        <button class="dropdown-item">Materias en repetición: {!! $dato_cd->rep !!}</button>
                                        <button class="dropdown-item">Materias en especial: {!! $dato_cd->espe !!}</button>
                                        <button class="dropdown-item">Total de especiales: {!! $dato_cd->t_esp !!}</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="qui_uno" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" align="center">Grupo 501</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead class="thead" style="background: #f7f7f7">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Probabilidad de deserción</th>
                        <th scope="col">Razones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($quin_uno as $dato_qu)
                        <tr>
                            <td>{!! $dato_qu->alum !!}</td>
                            @if($dato_qu->tot >=0.0 && $dato_qu->tot<=50.0)
                                <td style="color: #fff;background: #3bb143" align="center">{!! $dato_qu->tot !!}</td>
                            @elseif($dato_qu->tot >=50.1 && $dato_qu->tot<=70.0)
                                <td style="color: #fff;background: #ffb60f" align="center" >{!! $dato_qu->tot !!}</td>
                            @else
                                <td style="color: #fff;background: #bb0f0b" align="center" >{!! $dato_qu->tot !!}</td>
                            @endif
                            <td align="center">
                                <div class="btn-group">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        @if($dato_qu->tra == 1)
                                            <button class="dropdown-item">Trabaja: Si</button>
                                        @else
                                            <button class="dropdown-item">Trabaja: No</button>
                                        @endif
                                        @if($dato_qu->civ == 1)
                                            <button class="dropdown-item">Estado Civil: Soltero</button>
                                        @elseif($dato_qu->civ == 2)
                                            <button class="dropdown-item">Estado Civil: Casado</button>
                                        @elseif($dato_qu->civ == 3)
                                            <button class="dropdown-item">Estado Civil: Unión libre</button>
                                        @elseif($dato_qu->civ == 4)
                                            <button class="dropdown-item">Estado Civil: Divorciado</button>
                                        @else
                                            <button class="dropdown-item">Estado Civil: Viudo</button>
                                        @endif
                                        <button class="dropdown-item">Número de hijos: {!! $dato_qu->hijo !!}</button>
                                        @if($dato_qu->sat==1)
                                            <button class="dropdown-item">Le gusta la carrera: Si</button>
                                        @else
                                            <button class="dropdown-item">Le gusta la carrera: No</button>
                                        @endif
                                        <button class="dropdown-item">Materias en repetición: {!! $dato_qu->rep !!}</button>
                                        <button class="dropdown-item">Materias en especial: {!! $dato_qu->espe !!}</button>
                                        <button class="dropdown-item">Total de especiales: {!! $dato_qu->t_esp !!}</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="qui_dos" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" align="center">Grupo 502</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead class="thead" style="background: #f7f7f7">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Probabilidad de deserción</th>
                        <th scope="col">Razones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($quin_dos as $dato_qd)
                        <tr>
                            <td>{!! $dato_qd->alum !!}</td>
                            @if($dato_qd->tot >=0.0 && $dato_qd->tot<=50.0)
                                <td style="color: #fff;background: #3bb143" align="center">{!! $dato_qd->tot !!}</td>
                            @elseif($dato_qd->tot >=50.1 && $dato_qd->tot<=70.0)
                                <td style="color: #fff;background: #ffb60f" align="center" >{!! $dato_qd->tot !!}</td>
                            @else
                                <td style="color: #fff;background: #bb0f0b" align="center" >{!! $dato_qd->tot !!}</td>
                            @endif
                            <td align="center">
                                <div class="btn-group">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        @if($dato_qd->tra == 1)
                                            <button class="dropdown-item">Trabaja: Si</button>
                                        @else
                                            <button class="dropdown-item">Trabaja: No</button>
                                        @endif
                                        @if($dato_qd->civ == 1)
                                            <button class="dropdown-item">Estado Civil: Soltero</button>
                                        @elseif($dato_qd->civ == 2)
                                            <button class="dropdown-item">Estado Civil: Casado</button>
                                        @elseif($dato_qd->civ == 3)
                                            <button class="dropdown-item">Estado Civil: Unión libre</button>
                                        @elseif($dato_qd->civ == 4)
                                            <button class="dropdown-item">Estado Civil: Divorciado</button>
                                        @else
                                            <button class="dropdown-item">Estado Civil: Viudo</button>
                                        @endif
                                        <button class="dropdown-item">Número de hijos: {!! $dato_qd->hijo !!}</button>
                                        @if($dato_qd->sat==1)
                                            <button class="dropdown-item">Le gusta la carrera: Si</button>
                                        @else
                                            <button class="dropdown-item">Le gusta la carrera: No</button>
                                        @endif
                                        <button class="dropdown-item">Materias en repetición: {!! $dato_qd->rep !!}</button>
                                        <button class="dropdown-item">Materias en especial: {!! $dato_qd->espe !!}</button>
                                        <button class="dropdown-item">Total de especiales: {!! $dato_qd->t_esp !!}</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="sei_uno" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" align="center">Grupo 601</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead class="thead" style="background: #f7f7f7">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Probabilidad de deserción</th>
                        <th scope="col">Razones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ses_uno as $dato_su)
                        <tr>
                            <td>{!! $dato_su->alum !!}</td>
                            @if($dato_su->tot >=0.0 && $dato_su->tot<=50.0)
                                <td style="color: #fff;background: #3bb143" align="center">{!! $dato_su->tot !!}</td>
                            @elseif($dato_su->tot >=50.1 && $dato_su->tot<=70.0)
                                <td style="color: #fff;background: #ffb60f" align="center" >{!! $dato_su->tot !!}</td>
                            @else
                                <td style="color: #fff;background: #bb0f0b" align="center" >{!! $dato_su->tot !!}</td>
                            @endif
                            <td align="center">
                                <div class="btn-group">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        @if($dato_su->tra == 1)
                                            <button class="dropdown-item">Trabaja: Si</button>
                                        @else
                                            <button class="dropdown-item">Trabaja: No</button>
                                        @endif
                                        @if($dato_su->civ == 1)
                                            <button class="dropdown-item">Estado Civil: Soltero</button>
                                        @elseif($dato_su->civ == 2)
                                            <button class="dropdown-item">Estado Civil: Casado</button>
                                        @elseif($dato_su->civ == 3)
                                            <button class="dropdown-item">Estado Civil: Unión libre</button>
                                        @elseif($dato_su->civ == 4)
                                            <button class="dropdown-item">Estado Civil: Divorciado</button>
                                        @else
                                            <button class="dropdown-item">Estado Civil: Viudo</button>
                                        @endif
                                        <button class="dropdown-item">Número de hijos: {!! $dato_su->hijo !!}</button>
                                        @if($dato_su->sat==1)
                                            <button class="dropdown-item">Le gusta la carrera: Si</button>
                                        @else
                                            <button class="dropdown-item">Le gusta la carrera: No</button>
                                        @endif
                                        <button class="dropdown-item">Materias en repetición: {!! $dato_su->rep !!}</button>
                                        <button class="dropdown-item">Materias en especial: {!! $dato_su->espe !!}</button>
                                        <button class="dropdown-item">Total de especiales: {!! $dato_su->t_esp !!}</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="sei_dos" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" align="center">Grupo 602</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead class="thead" style="background: #f7f7f7">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Probabilidad de deserción</th>
                        <th scope="col">Razones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ses_dos as $dato_sed)
                        <tr>
                            <td>{!! $dato_sed->alum !!}</td>
                            @if($dato_sed->tot >=0.0 && $dato_sed->tot<=50.0)
                                <td style="color: #fff;background: #3bb143" align="center">{!! $dato_sed->tot !!}</td>
                            @elseif($dato_sed->tot >=50.1 && $dato_sed->tot<=70.0)
                                <td style="color: #fff;background: #ffb60f" align="center" >{!! $dato_sed->tot !!}</td>
                            @else
                                <td style="color: #fff;background: #bb0f0b" align="center" >{!! $dato_sed->tot !!}</td>
                            @endif
                            <td align="center">
                                <div class="btn-group">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        @if($dato_sed->tra == 1)
                                            <button class="dropdown-item">Trabaja: Si</button>
                                        @else
                                            <button class="dropdown-item">Trabaja: No</button>
                                        @endif
                                        @if($dato_sed->civ == 1)
                                            <button class="dropdown-item">Estado Civil: Soltero</button>
                                        @elseif($dato_sed->civ == 2)
                                            <button class="dropdown-item">Estado Civil: Casado</button>
                                        @elseif($dato_sed->civ == 3)
                                            <button class="dropdown-item">Estado Civil: Unión libre</button>
                                        @elseif($dato_sed->civ == 4)
                                            <button class="dropdown-item">Estado Civil: Divorciado</button>
                                        @else
                                            <button class="dropdown-item">Estado Civil: Viudo</button>
                                        @endif
                                        <button class="dropdown-item">Número de hijos: {!! $dato_sed->hijo !!}</button>
                                        @if($dato_sed->sat==1)
                                            <button class="dropdown-item">Le gusta la carrera: Si</button>
                                        @else
                                            <button class="dropdown-item">Le gusta la carrera: No</button>
                                        @endif
                                        <button class="dropdown-item">Materias en repetición: {!! $dato_sed->rep !!}</button>
                                        <button class="dropdown-item">Materias en especial: {!! $dato_sed->espe !!}</button>
                                        <button class="dropdown-item">Total de especiales: {!! $dato_sed->t_esp !!}</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="sept_uno" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" align="center">Grupo 701</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead class="thead" style="background: #f7f7f7">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Probabilidad de deserción</th>
                        <th scope="col">Razones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sep_uno as $dato_sepu)
                        <tr>
                            <td>{!! $dato_sepu->alum !!}</td>
                            @if($dato_sepu->tot >=0.0 && $dato_sepu->tot<=50.0)
                                <td style="color: #fff;background: #3bb143" align="center">{!! $dato_sepu->tot !!}</td>
                            @elseif($dato_sepu->tot >=50.1 && $dato_sepu->tot<=70.0)
                                <td style="color: #fff;background: #ffb60f" align="center" >{!! $dato_sepu->tot !!}</td>
                            @else
                                <td style="color: #fff;background: #bb0f0b" align="center" >{!! $dato_sepu->tot !!}</td>
                            @endif
                            <td align="center">
                                <div class="btn-group">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        @if($dato_sepu->tra == 1)
                                            <button class="dropdown-item">Trabaja: Si</button>
                                        @else
                                            <button class="dropdown-item">Trabaja: No</button>
                                        @endif
                                        @if($dato_sepu->civ == 1)
                                            <button class="dropdown-item">Estado Civil: Soltero</button>
                                        @elseif($dato_sepu->civ == 2)
                                            <button class="dropdown-item">Estado Civil: Casado</button>
                                        @elseif($dato_sepu->civ == 3)
                                            <button class="dropdown-item">Estado Civil: Unión libre</button>
                                        @elseif($dato_sepu->civ == 4)
                                            <button class="dropdown-item">Estado Civil: Divorciado</button>
                                        @else
                                            <button class="dropdown-item">Estado Civil: Viudo</button>
                                        @endif
                                        <button class="dropdown-item">Número de hijos: {!! $dato_sepu->hijo !!}</button>
                                        @if($dato_sepu->sat==1)
                                            <button class="dropdown-item">Le gusta la carrera: Si</button>
                                        @else
                                            <button class="dropdown-item">Le gusta la carrera: No</button>
                                        @endif
                                        <button class="dropdown-item">Materias en repetición: {!! $dato_sepu->rep !!}</button>
                                        <button class="dropdown-item">Materias en especial: {!! $dato_sepu->espe !!}</button>
                                        <button class="dropdown-item">Total de especiales: {!! $dato_sepu->t_esp !!}</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="sept_dos" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" align="center">Grupo 702</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead class="thead" style="background: #f7f7f7">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Probabilidad de deserción</th>
                        <th scope="col">Razones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sep_dos as $dato_sepd)
                        <tr>
                            <td>{!! $dato_sepd->alum !!}</td>
                            @if($dato_sepd->tot >=0.0 && $dato_sepd->tot<=50.0)
                                <td style="color: #fff;background: #3bb143" align="center">{!! $dato_sepd->tot !!}</td>
                            @elseif($dato_sepd->tot >=50.1 && $dato_sepd->tot<=70.0)
                                <td style="color: #fff;background: #ffb60f" align="center" >{!! $dato_sepd->tot !!}</td>
                            @else
                                <td style="color: #fff;background: #bb0f0b" align="center" >{!! $dato_sepd->tot !!}</td>
                            @endif
                            <td align="center">
                                <div class="btn-group">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        @if($dato_sepd->tra == 1)
                                            <button class="dropdown-item">Trabaja: Si</button>
                                        @else
                                            <button class="dropdown-item">Trabaja: No</button>
                                        @endif
                                        @if($dato_sepd->civ == 1)
                                            <button class="dropdown-item">Estado Civil: Soltero</button>
                                        @elseif($dato_sepd->civ == 2)
                                            <button class="dropdown-item">Estado Civil: Casado</button>
                                        @elseif($dato_sepd->civ == 3)
                                            <button class="dropdown-item">Estado Civil: Unión libre</button>
                                        @elseif($dato_sepd->civ == 4)
                                            <button class="dropdown-item">Estado Civil: Divorciado</button>
                                        @else
                                            <button class="dropdown-item">Estado Civil: Viudo</button>
                                        @endif
                                        <button class="dropdown-item">Número de hijos: {!! $dato_sepd->hijo !!}</button>
                                        @if($dato_sepd->sat==1)
                                            <button class="dropdown-item">Le gusta la carrera: Si</button>
                                        @else
                                            <button class="dropdown-item">Le gusta la carrera: No</button>
                                        @endif
                                        <button class="dropdown-item">Materias en repetición: {!! $dato_sepd->rep !!}</button>
                                        <button class="dropdown-item">Materias en especial: {!! $dato_sepd->espe !!}</button>
                                        <button class="dropdown-item">Total de especiales: {!! $dato_sepd->t_esp !!}</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="oc_uno" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" align="center">Grupo 801</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead class="thead" style="background: #f7f7f7">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Probabilidad de deserción</th>
                        <th scope="col">Razones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($oct_uno as $dato_ou)
                        <tr>
                            <td>{!! $dato_ou->alum !!}</td>
                            @if($dato_ou->tot >=0.0 && $dato_ou->tot<=50.0)
                                <td style="color: #fff;background: #3bb143" align="center">{!! $dato_ou->tot !!}</td>
                            @elseif($dato_ou->tot >=50.1 && $dato_ou->tot<=70.0)
                                <td style="color: #fff;background: #ffb60f" align="center" >{!! $dato_ou->tot !!}</td>
                            @else
                                <td style="color: #fff;background: #bb0f0b" align="center" >{!! $dato_ou->tot !!}</td>
                            @endif
                            <td align="center">
                                <div class="btn-group">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        @if($dato_ou->tra == 1)
                                            <button class="dropdown-item">Trabaja: Si</button>
                                        @else
                                            <button class="dropdown-item">Trabaja: No</button>
                                        @endif
                                        @if($dato_ou->civ == 1)
                                            <button class="dropdown-item">Estado Civil: Soltero</button>
                                        @elseif($dato_ou->civ == 2)
                                            <button class="dropdown-item">Estado Civil: Casado</button>
                                        @elseif($dato_ou->civ == 3)
                                            <button class="dropdown-item">Estado Civil: Unión libre</button>
                                        @elseif($dato_ou->civ == 4)
                                            <button class="dropdown-item">Estado Civil: Divorciado</button>
                                        @else
                                            <button class="dropdown-item">Estado Civil: Viudo</button>
                                        @endif
                                        <button class="dropdown-item">Número de hijos: {!! $dato_ou->hijo !!}</button>
                                        @if($dato_ou->sat==1)
                                            <button class="dropdown-item">Le gusta la carrera: Si</button>
                                        @else
                                            <button class="dropdown-item">Le gusta la carrera: No</button>
                                        @endif
                                        <button class="dropdown-item">Materias en repetición: {!! $dato_ou->rep !!}</button>
                                        <button class="dropdown-item">Materias en especial: {!! $dato_ou->espe !!}</button>
                                        <button class="dropdown-item">Total de especiales: {!! $dato_ou->t_esp !!}</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="oc_dos" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" align="center">Grupo 802</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead class="thead" style="background: #f7f7f7">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Probabilidad de deserción</th>
                        <th scope="col">Razones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($oct_dos as $dato_od)
                        <tr>
                            <td>{!! $dato_od->alum !!}</td>
                            @if($dato_od->tot >=0.0 && $dato_od->tot<=50.0)
                                <td style="color: #fff;background: #3bb143" align="center">{!! $dato_od->tot !!}</td>
                            @elseif($dato_od->tot >=50.1 && $dato_od->tot<=70.0)
                                <td style="color: #fff;background: #ffb60f" align="center" >{!! $dato_od->tot !!}</td>
                            @else
                                <td style="color: #fff;background: #bb0f0b" align="center" >{!! $dato_od->tot !!}</td>
                            @endif
                            <td align="center">
                                <div class="btn-group">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        @if($dato_od->tra == 1)
                                            <button class="dropdown-item">Trabaja: Si</button>
                                        @else
                                            <button class="dropdown-item">Trabaja: No</button>
                                        @endif
                                        @if($dato_od->civ == 1)
                                            <button class="dropdown-item">Estado Civil: Soltero</button>
                                        @elseif($dato_od->civ == 2)
                                            <button class="dropdown-item">Estado Civil: Casado</button>
                                        @elseif($dato_od->civ == 3)
                                            <button class="dropdown-item">Estado Civil: Unión libre</button>
                                        @elseif($dato_od->civ == 4)
                                            <button class="dropdown-item">Estado Civil: Divorciado</button>
                                        @else
                                            <button class="dropdown-item">Estado Civil: Viudo</button>
                                        @endif
                                        <button class="dropdown-item">Número de hijos: {!! $dato_od->hijo !!}</button>
                                        @if($dato_od->sat==1)
                                            <button class="dropdown-item">Le gusta la carrera: Si</button>
                                        @else
                                            <button class="dropdown-item">Le gusta la carrera: No</button>
                                        @endif
                                        <button class="dropdown-item">Materias en repetición: {!! $dato_od->rep !!}</button>
                                        <button class="dropdown-item">Materias en especial: {!! $dato_od->espe !!}</button>
                                        <button class="dropdown-item">Total de especiales: {!! $dato_od->t_esp !!}</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
