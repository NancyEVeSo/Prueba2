@extends('adminlte::layouts.app')
@section('main-content')
<div class="container">
  <div class="row">
    <div class="col-md-5">
      @include('Jugador.registrarJugador')
    </div>
    <div class="col-md-6">
      @include('Jugador.tablaJugador')
      @include('Jugador.modificarJugador')
    </div>
  </div>
</div>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/Jugador.js"></script>
@endsection