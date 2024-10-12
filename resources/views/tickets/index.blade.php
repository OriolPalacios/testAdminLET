@extends('adminlte::page')

@section('title', 'Tickets')

@section('content')
    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Relación de tickets</h3>
                <a href="{{route('tickets.create')}}" class="btn btn-success btn-lg m-1">
                    <span class="fa fa-plus"></span>Nuevo
                </a>
            </div>
            @include('partials.info')
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Operaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tickets as $ticket)
                            <tr>
                                <td>{{ $ticket->nombre }}</td>
                                <td>{{ $ticket->tipo_tramite }}</td>
                                <td>{{ $ticket->fecha }}</td>
                                <td>{{ $ticket->estado }}</td>
                                <td>
                                    <a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-normal" title="Ver">
                                        <button class="btn btn-info">
                                            <span class="fa fa-eye"></span>
                                        </button>
                                    </a>
                                    <a href="{{route('tickets.edit', $ticket->id)}}" class="btn btn-normal" title="Editar">
                                        <button class="btn btn-warning">
                                            <span class="fa fa-edit"></span>
                                        </button>
                                    </a>
                                    <a href="" class="btn btn-normal">
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{$ticket->id}}">
                                            <span class="fa fa-trash"></span>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @include('tickets.delete')
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Operaciones</th>
                        </tr>
                    </tfoot>
                </table>
                <div class="tickes-index-pagination-container">
                    <ul class="pagination">
                        {{ $tickets->links() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href={{ asset('css/app.css') }}>
@stop
