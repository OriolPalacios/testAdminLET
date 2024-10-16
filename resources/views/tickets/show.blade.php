@extends('adminlte::page')

@section('title', 'Ver Tickets')

@section('content')
    {{-- generarl form elements --}}
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Información de un Ticket</h3>
        </div>
    </div>
    <form action="" role="form">
        <div class="box-body">
            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" class="form-control" id="id" name="id" value="{{ $ticket->id }}" readonly>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $ticket->nombre }}"
                    readonly>
            </div>
            <div class="form-group">
                <div class="radio">
                    <label for="">
                        <input type="radio" {{ $ticket->tipo_tramite == 'PLATAFORMA' ? 'checked' : '' }} disabled>
                        PLATAFORMA
                    </label>
                    <label for="">
                        <input type="radio" {{ $ticket->tipo_tramite == 'VENTANILLA' ? 'checked' : '' }} disabled>
                        VENTANILLA
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="nombre">Fecha</label>
                <input type="text" class="form-control" value="{{$ticket->fecha}}" disabled>
            </div>
            <div class="checkbox">
                <label for="">
                    <input type="checkbox" {{ $ticket->estado == 1 ? 'checked' : '' }} disabled>Atetendido
                </label>
            </div>
    </form>
@stop
