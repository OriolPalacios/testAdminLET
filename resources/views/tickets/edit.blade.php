@extends("adminlte::page")

@section('title', 'Editar Tickets')

@section('content')
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Editar un Ticket</h3>
            </div>
            @include('partials.error')
            <form action="{{route('tickets.update', $ticket->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="text" class="form-control" value="{{$ticket->id}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" value="{{$ticket->nombre}}" name="nombre">
                    </div>
                    <div class="form-group">
                        <div class="radio">
                            <label for="">
                                <input type="radio" name="tipo_tramite" value="PLATAFORMA" {{$ticket->tipo_tramite == 'PLATAFORMA' ? 'checked' : ''}}>PLATAFORMA
                            </label> 
                            <label for="">
                                <input type="radio" name="tipo_tramite" value="VENTANILLA" {{$ticket->tipo_tramite == 'VENTANILLA' ? 'checked' : ''}}>VENTANILLA
                            </label> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <input type="text" class="form-control" value="{{$ticket->fecha}}" name="fecha" disabled>
                    </div>
                    <div class="checkbox">
                        <label for="estado">
                            <input value="{{$ticket->estado}}" type="checkbox" id="formState" {{$ticket->estado==1 ? 'checked' : ''}} name="estado" onclick="toggleValue()"> Atendido
                        </label>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function toggleValue() {
            var checkbox = document.getElementById('formState');
            checkbox.value = checkbox.value == 1 ? 0 : 1;
            console.log(checkbox.value);
        }
    </script>
@stop