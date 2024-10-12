@extends('adminlte::page')

@section('title', 'Nuevo Ticket')
@section('content')
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Agregar un Ticket</h3>
            </div>
            @include('partials.error')
            <form role="form" action="{{route('tickets.store')}}" method="POST">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <div class="radio">
                            <label>
                                <input type="radio" name="tipo_tramite" value="PLATAFORMA" checked>
                                PLATAFORMA
                            </label>
                            <label>
                                <input type="radio" name="tipo_tramite" value="VENTANILLA" checked>
                                VENTANILLA
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="estado" value="1" disabled>
                                Atendido/No atendido
                            </label>
                        </div>
                    </div>
                </div>
                {{-- ./box-body --}}
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
        {{-- /.box --}}
    </div>
@stop