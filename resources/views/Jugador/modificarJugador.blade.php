<div class="modal fade" id="modalModificarJugador" tabindex="-1" role="dialog" aria-labelledby="modalModificarJugador"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar Jugador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="modalEquipo">Equipo</label>
                <select name="Equipo" id="modalEquipo" class="form-control">
                    <option id="modalOptionDetault">Seleccione Equipo</option>
                    @foreach($Equipo as $item)
                    <option id="modalEquipoJugador" value="{{ $item->id }}">{{ $item->descripcion }}</option>
                    @endforeach
                </select>
                <label for="modalNombreJugador">Nombre</label>
                <input type="text" class="form-control" id="modalNombreJugador" placeholder="Ingrese Nombre">
                <label for="modalApellidoJugador">Apellido</label>
                <input type="text" class="form-control" id="modalApellidoJugador" placeholder="Ingrese Apellido">
                <label for="modalEdadJugador">Edad</label>
                <input type="text" class="form-control" id="modalEdadJugador" placeholder="Ingrese Edad">
                <label for="modalPaisJugador">Nacionalidad</label>
                <input type="text" class="form-control" id="modalPaisJugador" placeholder="Ingrese Nacionalidad">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="guardarCambios">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>