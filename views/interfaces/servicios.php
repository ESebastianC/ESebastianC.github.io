<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registro de estudiantes Universidad Tecnica de Ambato</title>
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.10.19/themes/black/easyui.css">
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.10.19/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.10.19/themes/color.css">
    <script type="text/javascript" src="jquery-easyui-1.10.19/jquery.min.js"></script>
    <script type="text/javascript" src="jquery-easyui-1.10.19/jquery.easyui.min.js"></script>
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.10.19/themes/color.css">
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.10.19/demo/demo.css">
</head>
<body>
    <h2>Estudiantes UTA</h2>
    <table id="dg" title="Estudiantes" class="easyui-datagrid" style="width:700px;height:250px"
            url="models/acceder.php"
            toolbar="#toolbar" pagination="true"
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th field="estCedula" width="50">Cedula</th>
                <th field="estNombre" width="50">Nombre</th>
                <th field="estApellido" width="50">Apellido</th>
                <th field="estTelefono" width="50">Telefono</th>
                <th field="estDireccion" width="50">Direccion
            </tr>
        </thead>
    </table>
    <div id="toolbar">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Nuevo Estudiante</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Editar Estudiante</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Borrar Estudiante</a>
        <a href="reportes/reporte.php" class="easyui-linkbutton" iconCls="icon-ok" plain="true" target="_blank">Reporte</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" plain="true" onclick="reporte()" > Generar Reporte Especifico</a>
        <a href="reportes/reporteireport.php" class="easyui-linkbutton" iconCls="icon-ok" plain="true" target="_blank">Ireport</a>
    </div>
    
    <div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
    <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
        <h3>Registro Estudiante</h3>
        <div style="margin-bottom:10px">
            <input id="idcedula" name="cedula" class="easyui-textbox" required="true" label="Cedula:" style="width:100%" >
        </div>
        <div style="margin-bottom:10px">
            <input name="nombre" class="easyui-textbox" required="true" label="Nombre:" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="apellido" class="easyui-textbox" required="true" label="Apellido:" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="telefono" class="easyui-textbox" required="true" label="Telefono:" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="direccion" class="easyui-textbox" required="true" label="Direccion:" style="width:100%">
        </div>
        
    </form>
</div>
<div id="dlg-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Guardar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
</div>
<script type="text/javascript">
    var url;
    function newUser(){
        $('#dlg').dialog('open').dialog('center').dialog('setTitle','Nuevo Estudiante');
        $('#fm').form('clear');
        $('#idcedula').textbox('readonly', false);
        url = 'models/guardar.php';
    }
    function editUser(){
        var row = $('#dg').datagrid('getSelected');
        if (row){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','Edit User');
            
            var formData = {
                cedula: row.estCedula,
                nombre: row.estNombre,
                apellido: row.estApellido,
                direccion: row.estDireccion,
                telefono: row.estTelefono
            };
    
            $('#fm').form('load', formData);
            
            $('#idcedula').textbox('readonly', true);
    
            url = 'models/editar.php?cedula=' + row.estCedula;
        }
    }


function reporte() {
    var row = $('#dg').datagrid('getSelected'); 
    if (row) {
        
        var cedula = row.estCedula; 
        window.open('reportes/reporteParametro.php?cedula=' + cedula, '_blank');
    }
    
}

    function saveUser(){
        $('#fm').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(result){
                var result = eval('('+result+')');
                console.log(result);  
                if (result.errorMsg){
                    $.messager.show({
                        title: 'Error',
                        msg: result.errorMsg
                    });
                } else {
                    $('#dlg').dialog('close');        
                    $('#dg').datagrid('reload');    
                }
            }
        });
    }
    function destroyUser(){
        var row = $('#dg').datagrid('getSelected');
        if (row){
            $.messager.confirm('Confirm','Seguro que quieres borrar?',function(r){
                if (r){
                    $.post('models/borrar.php',{cedula:row.estCedula},function(result){
                        if (!result.success){
                            $('#dg').datagrid('reload');    // reload the user data
                        } else {
                            $.messager.show({    // show error message
                                    title: 'Error',
                                    msg: result.errorMsg
                                });
                            }
                        },'json');
                    }
                });
            }
        }
    </script>
</body>
</html>