<?php
include 'conexion.php';
?>
<h1>CRUD DEMO</h1>
<h3>Usuarios:</h3>

<!-- Modal de edición -->
<div id="editModal" style="display:none; position:fixed; left:0; top:0; right:0; bottom:0; background: rgba(0,0,0,0.5); align-items:center; justify-content:center;">
    <div style="background:#fff; padding:20px; width:360px; margin:auto; border-radius:6px;">
        <h3>Editar usuario</h3>
        <input type="hidden" id="edit-id">
        <div>
            <label>Nombre de usuario</label><br>
            <input id="edit-name" type="text" style="width:100%">
        </div>
        <div>
            <label>Contraseña (dejar vacío para no cambiar)</label><br>
            <input id="edit-password" type="password" style="width:100%">
        </div>
        <div>
            <label>Bio</label><br>
            <input id="edit-bio" type="text" style="width:100%">
        </div>
        <div>
            <label>Pity</label><br>
            <input id="edit-pity" type="text" style="width:100%">
        </div>
        <div style="margin-top:12px; text-align:right;">
            <button id="edit-cancel">Cancelar</button>
            <button id="edit-save">Guardar</button>
        </div>
    </div>
</div>

<table border="1">
        <tr>
                <th>ID</th>
                <th>Nombre Usuario</th>
                <th>Contraseña</th>
                <th>Bio</th>
                <th>pity</th>
                <th>Acciones</th>
        </tr>

        <?php

        $sql = "SELECT * FROM users";
        $result = $conexion->query($sql);

        while($row = $result->fetch_assoc()) {
                // Uso de atributos data-* para que JS pueda rellenar el modal
                $id = htmlspecialchars($row['Id_User'], ENT_QUOTES);
                $name = htmlspecialchars($row['Name_User'], ENT_QUOTES);
                $pass = htmlspecialchars($row['User_Password'], ENT_QUOTES);
                $bio = htmlspecialchars($row['Bio'], ENT_QUOTES);
                $pity = htmlspecialchars($row['Pity'], ENT_QUOTES);

                echo '<tr data-row-id="' . $id . '">'
                        . '<td>' . $id . '</td>'
                        . '<td>' . $name . '</td>'
                        . '<td>' . $pass . '</td>'
                        . '<td>' . $bio . '</td>'
                        . '<td>' . $pity . '</td>'
                        . '<td>'
                        . '<button class="edit-btn" data-id="' . $id . '" data-name="' . $name . '" data-password="' . $pass . '" data-bio="' . $bio . '" data-pity="' . $pity . '">Edit</button> '
                        . '<a href="borrar.php?id=' . $id . '">Del</a>'
                        . '</td>'
                        . '</tr>';
        }

        

        ?>
</table>

<!-- Incluir JS que contiene la lógica del modal y la petición AJAX -->
<script src="edit.js"></script>
