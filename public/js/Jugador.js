var idJugador;
$(document).ready(function () {
    cargarJugador();
    $('#guardarJugador').click(function(e){
        registrarJugador();
    });
    $(document).on('click', '.modificar', function(){
        $('#modalModificarJugador').modal('show');
        idJugador = $(this).val();
        $.get('Jugadores/'+idJugador,function (item) { 
            $('#modalEquipo').val(item.idequipo);
            $('#modalNombreJugador').val(item.nombre);
            $('#modalApellidoJugador').val(item.apellido);
            $('#modalEdadJugador').val(item.edad);
            $('#modalPaisJugador').val(item.pais);
         });
    });
    $('#guardarCambios').click(function(e){
        modificarJugador(idJugador);        
    });
});

var c = 1;
function cargarJugador(){
    var fila;
    $.get('Jugador', function(data){
        $.each(data, function(index, value){    
            $.get('Equipo/'+value.idequipo, function(item){
                fila = '<tr id="Jugador'+value.id+'"><td>'+c+'</td><td>'+item.descripcion+'</td><td>'+value.nombre+'</td><td>'+value.apellido+'</td><td>'+value.edad+'</td><td>'+value.pais+'</td><td><button class="btn btn-success modificar" value="'+value.id+'">Modificar</button></td><td><button class="btn btn-danger" onclick="eliminarJugador('+value.id+')">Eliminar</button></td></tr>';
                $('#tablaJugador').append(fila);
                c++;
            });
        });
    });
}

function registrarJugador(){
    var formData = {
        idequipo: $('#optionEquipo').val(),
        nombre: $('#NombreJugador').val(),
        apellido: $('#ApellidoJugador').val(),
        edad: $('#EdadJugador').val(),
        pais: $('#PaisJugador').val()
    }
    console.log($('#optionEquipo').val());
    var fila;
    console.log(formData);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "POST",
        url: "Jugadores",
        data: formData,
        dataType: 'json',
        success: function(value) {
            console.log("done");
            $.get('Equipo/'+value.idequipo, function(item){
                fila = '<tr id="Jugador'+value.id+'"><td>'+c+'</td><td>'+item.descripcion+'</td><td>'+value.nombre+'</td><td>'+value.apellido+'</td><td>'+value.edad+'</td><td>'+value.pais+'</td><td><button class="btn btn-warning modificar" value="'+value.id+'">Modificar</button></td><td><button class="btn btn-danger" onclick="eliminarJugador('+value.id+')">Eliminar</button></td></tr>';
                $('#tablaJugador').append(fila);
                limpiarCampos();
                c++;
            })
        },
        error: function() {
            console.log("error");
        }
    });
}

function eliminarJugador(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "DELETE",
        url: "Jugadores/" + id,
        success: function(value) {
            console.log("done");
            $('#Jugador'+value.id).remove();
        },
        error: function() {
            console.log("error");
        }
    });
}

function modificarJugador(id) {
    var formData = {
        idequipo: $('#modalEquipo').val(),
        nombre: $('#modalNombreJugador').val(),
        apellido: $('#modalApellidoJugador').val(),
        edad: $('#modalEdadJugador').val(),
        pais: $('#modalPaisJugador').val()
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "PUT",
        url: "Jugadores/" + id,
        data: formData,
        dataType: "json",
        success: function(value) {
            console.log("done");
            $.get('Equipo/'+value.idequipo, function(item){
                fila = '<tr id="Jugador'+value.id+'"><td>'+c+'</td><td>'+item.descripcion+'</td><td>'+value.nombre+'</td><td>'+value.apellido+'</td><td>'+value.edad+'</td><td>'+value.pais+'</td><td><button class="btn btn-success modificar" value="'+value.id+'">Modificar</button></td><td><button class="btn btn-danger" onclick="eliminarJugador('+value.id+')">Eliminar</button></td></tr>';
                $('#Jugador'+value.id).replaceWith(fila);
                $('#modalModificarJugador').modal('hide');        
                c++;
            })
        },
        error: function () {
            console.log("error");
        }
    });
}

function limpiarCampos(){
    $('#NombreJugador').val('');
    $('#ApellidoJugador').val('');
    $('#EdadJugador').val('');
    $('#PaisJugador').val('');
    $('#Equipo').val($('#optionDetault').val());    
}