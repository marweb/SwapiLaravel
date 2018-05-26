@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
                <div class="col-md-8 col-md-offset-2">
                        <a href="{{ url('/') }}" class="btn btn-primary pull-right" style="margin-bottom:20px;">Regresar</a>
                </div>
        </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Personajes - <strong>Especie: {{ $especie }}</strong></div>

                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center" width="35%">Nombre</th>
                                <th class="text-center" width="20%">Género</th>
                                <th class="text-center" width="15%">Color Cabello</th>
                                <th class="text-center" width="20%">Especie</th>
                                <th class="text-center" width="10%">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($peoples as $people)
                            <tr>
                                <td class="text-center">{{ $people['name'] }}</td>
                                <td class="text-center">
                                    @if ($people['gender'] == 'female')
                                    <i class="fa fa-female" aria-hidden="true"></i>
                                    @endif
                                    @if ($people['gender'] == 'male')
                                    <i class="fa fa-male" aria-hidden="true"></i>
                                    @endif
                                    @if ($people['gender']== 'hermaphrodite')
                                    <i class="fa fa-transgender" aria-hidden="true"></i>
                                    @endif
                                    @if ($people['gender'] == 'n/a')
                                    <i class="fa fa-genderless" aria-hidden="true"></i>
                                    @endif
                                    
                                    {{ $people['gender'] }}</td>
                                <td class="text-center">{{ $people['hair_color'] }}</td>
                                <td class="text-center">{{ $especie }}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-primary" data-url="{{ $people['url'] }}" data-toggle="modal" href='#modalDetailChar'>
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach  
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-md-8 col-md-offset-2">
                    <a href="{{ url('/') }}" class="btn btn-primary pull-right">Regresar</a>
            </div>
    </div>
</div>

<div class="modal fade" id="modalDetailChar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Detalles del Personaje</h4>
            </div>
            <div class="modal-body text-center">
                <div class="modal-body-content" style="display: none">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td class="td-modal-header">Nombre:</td>
                                <td class="td-modal-content td-modal-name"></td>
                            </tr>
                            <tr>
                                <td class="td-modal-header">Color de Cabello:</td>
                                <td class="td-modal-content td-modal-hair-color"></td>
                            </tr>
                            <tr>
                                <td class="td-modal-header">Color de Piel:</td>
                                <td class="td-modal-content td-modal-skin-color"></td>
                            </tr>
                            <tr>
                                <td class="td-modal-header">Color de Ojos:</td>
                                <td class="td-modal-content td-modal-eye-color"></td>
                            </tr>
                            <tr>
                                <td class="td-modal-header">Género:</td>
                                <td class="td-modal-content td-modal-gender"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <img src="{{ asset('assets/images/loading.gif') }}" class="img-loading" style="display: none">
            </div>
            <div class="modal-footer">
                 <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endsection
