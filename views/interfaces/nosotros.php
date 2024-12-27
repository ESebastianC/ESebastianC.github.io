<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Estudiantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Registro de Estudiantes</h2>

    <form id="formularioEstudiante">
        <div class="mb-3">
            <label for="cedula" class="form-label">Cédula</label>
            <input type="text" class="form-control form-control-sm" id="cedula" name="cedula" required>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control form-control-sm" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control form-control-sm" id="apellido" name="apellido" required>
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control form-control-sm" id="telefono" name="telefono" required>
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control form-control-sm" id="direccion" name="direccion" required>
        </div>
        <input type="hidden" id="accion" name="accion" value="editar">
        <button type="submit" class="btn btn-primary">Guardar Estudiante</button>
        <button type="button" class="btn btn-primary" id="guardarEdicion">Guardar Edición</button>
    </form>

    <div id="tablaEstudiantes" class="mt-5"></div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
     
        function cargarTablaEstudiantes() {
            $.ajax({
                url: 'models/acceder.php',
                type: 'GET',
                dataType: 'json',
                success: function(response){
                    if(response !== "No hay estudiantes"){
                        var table = '<table class="table table-dark"><thead><tr><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Teléfono</th><th>Dirección</th><th>Curso</th><th>Acciones</th></tr></thead><tbody>';
                        $.each(response, function(i, item) {
                            table += '<tr>';
                            table += '<td>' + item.estCedula + '</td>';
                            table += '<td>' + item.estNombre + '</td>';
                            table += '<td>' + item.estApellido + '</td>';
                            table += '<td>' + item.estTelefono + '</td>';
                            table += '<td>' + item.estDireccion + '</td>';
                            table += '<td>' + item.Nombre + '</td>';
                            table += '<td><button class="btn btn-danger btn-sm" onclick="eliminarEstudiante(\'' + item.estCedula + '\')">Eliminar</button> <button class="btn btn-warning btn-sm" onclick="editarEstudiante(\'' + item.estCedula + '\', \'' + item.estNombre + '\', \'' + item.estApellido + '\', \'' + item.estTelefono + '\', \'' + item.estDireccion + '\', \'' + item.curId + '\')">Editar</button></td>';
                            table += '</tr>';
                        });
                        table += '</tbody></table>';
                        $('#tablaEstudiantes').html(table);
                    } else {
                        $('#tablaEstudiantes').html('<p>No hay estudiantes</p>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        cargarTablaEstudiantes();

        $('#formularioEstudiante').submit(function(event){
            event.preventDefault(); 
            var formData = $(this).serialize(); 
            $.ajax({
                url: 'models/guardar.php',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response){
                    cargarTablaEstudiantes();
                    $('#formularioEstudiante').trigger("reset");
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        $('#guardarEdicion').click(function(event){
            event.preventDefault(); 
            var formData = $('#formularioEstudiante').serialize(); 
            $.ajax({
                url: 'models/editar.php',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response){
                    cargarTablaEstudiantes();
                    $('#formularioEstudiante').trigger("reset");
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });

    function eliminarEstudiante(cedula) {
        $.ajax({
            url: 'models/borrar.php',
            type: 'POST',
            data: {cedula: cedula},
            dataType: 'json',
            success: function(response){
                alert(response); 
                cargarTablaEstudiantes();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    function editarEstudiante(cedula, nombre, apellido, telefono, direccion, curId) {
        $('#cedula').val(cedula);
        $('#nombre').val(nombre);
        $('#apellido').val(apellido);
        $('#telefono').val(telefono);
        $('#direccion').val(direccion);
        $('#curId').val(curId);
        $('#accion').val('editar');
    }
</script>

</body>
</html>


