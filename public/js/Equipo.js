var idEquipo;
$(document).ready(function () {
    cargarEquipo();
    $('#guardarEquipo').click(function(e){
        registrarEquipo();
    });
    $(document).on('click', '.modificar', function(){
        $('#modalModificarEquipo').modal('show');
        idEquipo = $(this).val();
        $.get('Equipo/'+idEquipo,function (item) { 
            $('#modalDescripcionEquipo').val(item.descripcion);
         });
    });
    $('#guardarCambios').click(function(e){
        modificarEquipo(idEquipo);        
    });
});

var c = 1;
function cargarEquipo(){
    $.get('Equipo', function(data){
        var fila;
        $.each(data, function(index, value){
            fila = '<tr id="Equipo'+value.id+'"><td>'+c+'</td><td>'+value.descripcion+'</td><td><button class="btn btn-success modificar" value="'+value.id+'">Modificar</button></td><td><button class="btn btn-danger" onclick="eliminarEquipo('+value.id+')">ELiminar</button></td></tr>';
            $('#tablaEquipo').append(fila);
            c++;
        })
    })
}

function registrarEquipo(){
    var formData = {
        descripcion: $('#descripcionEquipo').val()
    }
    var fila;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "POST",
        url: "Equipo",
        data: formData,
        dataType: 'json',
        success: function(value) {
            fila = '<tr id="Equipo'+value.id+'"><td>'+c+'</td><td>'+value.descripcion+'</td><td><button class="btn btn-success modificar" value="'+value.id+'">Modificar</button></td><td><button class="btn btn-danger" onclick="eliminarEquipo('+value.id+')">ELiminar</button></td></tr>';
            $('#tablaEquipo').append(fila);
            c++;
            $('#descripcionEquipo').val('');
        },
        error: function() {
            console.log("error");
        }
    });
}

function eliminarEquipo(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "DELETE",
        url: "Equipo/" + id,
        success: function(value) {
            console.log("done");
            $('#Equipo'+value.id).remove();
        },
        error: function() {
            console.log("error");
        }
    });
}

function modificarEquipo(id) {
    var formData = {
        descripcion: $('#modalDescripcionEquipo').val()
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "PUT",
        url: "Equipo/" + id,
        data: formData,
        dataType: "json",
        success: function(value) {
            console.log("done");
            fila = '<tr id="Equipo'+value.id+'"><td>'+c+'</td><td>'+value.descripcion+'</td><td><button class="btn btn-warning modificar" value="'+value.id+'">Modificar</button></td><td><button class="btn btn-danger" onclick="eliminarEquipo('+value.id+')">ELiminar</button></td></tr>';
            $('#Equipo'+value.id).replaceWith(fila);
            $('#modalModificarEquipo').modal('hide');        
            c++;
        },
        error: function () {
            console.log("error");
        }
    });
}

