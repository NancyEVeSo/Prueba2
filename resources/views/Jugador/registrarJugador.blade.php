<form>
  {{ csrf_field() }}
  <div class="form-group">
    <label for="optionEquipo">Equipo</label>
    <select name="Equipo" id="optionEquipo" class="form-control">
        <option id="optionDetault">Seleccione Equipo</option>
        @foreach($Equipo as $item)
          <option id="EquipoJugador" value="{{ $item->id }}">{{ $item->descripcion }}</option>
        @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="NombreJugador">Nombre</label>
    <input type="text" class="form-control" id="NombreJugador" placeholder="Ingrese Nombre">
  </div>
  <div class="form-group">
    <label for="ApellidoJugador">Apellido</label>
    <input type="text" class="form-control" id="ApellidoJugador" placeholder="Ingrese Apellido">
  </div>
  <div class="form-group">
    <label for="EdadJugador">Edad</label>
    <input type="text" class="form-control" id="EdadJugador" placeholder="Ingrese Edad">
  </div>
  <div class="form-group">
    <label for="PaisJugador">Nacionalidad</label>
    <input type="text" class="form-control" id="PaisJugador" placeholder="Ingrese Nacionalidad">
</div>
  <button type="button" class="btn btn-primary btn-block" id="guardarJugador">Registrar</button>
</form>