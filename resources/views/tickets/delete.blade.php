<div class="modal fade" id="modal-delete-{{ $ticket->id }}" style="display: none;">
    <form action="{{ route('tickets.destroy', $ticket->id) }}" method="post">
        @csrf
        @method('DELETE')
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Eliminar a {{ $ticket->nombre }} con id: {{ $ticket->id }}</h4>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de que deseas eliminar a {{ $ticket->nombre }}?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-info">Eliminar</button>
                </div>
            </div>
        </div>
    </form>
</div>
