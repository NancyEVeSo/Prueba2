@extends('adminlte::layouts.app')
@section('main-content')
<div class="container">
  <div class="row">
    <div class="col-md-5 ">
      @include('Equipo.registrarEquipo')
    </div>
    <div class="col-md-6 ">
     @include('Equipo.tablaEquipo')
      @include('Equipo.modificarEquipo')
    </div>
  </div>
</div>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/Equipo.js"></script>
@endsection

