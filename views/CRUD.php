<?php
include 'conexion.php';
?>
<h1>CRUD DEMO</h1>

<!-- Sección de Usuarios -->
<h3>Usuarios:</h3>

<!-- Modal de edición de usuarios -->
<div id="editModalUser" style="display:none; position:fixed; left:0; top:0; right:0; bottom:0; background: rgba(0,0,0,0.5); align-items:center; justify-content:center;">
    <div style="background:#fff; padding:20px; width:360px; margin:auto; border-radius:6px;">
        <h3>Editar usuario</h3>
        <input type="hidden" id="edit-user-id">
        <div>
            <label>Nombre de usuario</label><br>
            <input id="edit-user-name" type="text" style="width:100%">
        </div>
        <div>
            <label>Contraseña (dejar vacío para no cambiar)</label><br>
            <input id="edit-user-password" type="password" style="width:100%">
        </div>
        <div>
            <label>Bio</label><br>
            <input id="edit-user-bio" type="text" style="width:100%">
        </div>
        <div>
            <label>Pity</label><br>
            <input id="edit-user-pity" type="text" style="width:100%">
        </div>
        <div style="margin-top:12px; text-align:right;">
            <button id="edit-user-cancel">Cancelar</button>
            <button id="edit-user-save">Guardar</button>
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
            . '<button class="edit-user-btn" data-id="' . $id . '" data-name="' . $name . '" '
            . 'data-password="' . $pass . '" data-bio="' . $bio . '" data-pity="' . $pity . '">Edit</button> '
            . '<a href="borrar.php?id=' . $id . '">Del</a>'
            . '</td>'
            . '</tr>';
    }
    ?>

<!-- Sección de Mensajes -->
<table border="1" id="messages-table">
    <tr>
        <th>ID</th>
        <th>Sender</th>
        <th>Receiver</th>
        <th>Mensaje</th>
        <th>Timestamp</th>
        <th>Acciones</th>
    </tr>
    <h3>Mensajes:</h3>

    <?php
    // Intentar detectar la tabla de mensajes disponible
    $msgTables = ['messages','mensajes','chat','messages_table'];
    $usedTable = null;
    $res = null;
    foreach ($msgTables as $t) {
        // validar nombre
        if (!preg_match('/^[a-zA-Z0-9_]+$/', $t)) continue;
        $q = @mysqli_query($conexion, "SELECT * FROM `$t` LIMIT 1000");
        if ($q !== false) {
            $usedTable = $t;
            $res = $q;
            break;
        }
    }

    if ($res) {
        while($row = $res->fetch_assoc()) {
            $id = htmlspecialchars($row['id'] ?? $row['Id'] ?? '', ENT_QUOTES);
            $sender = htmlspecialchars($row['sender_id'] ?? $row['sender'] ?? '', ENT_QUOTES);
            $receiver = htmlspecialchars($row['receiver_id'] ?? $row['receiver'] ?? '', ENT_QUOTES);
            $message = htmlspecialchars($row['message'] ?? $row['msg'] ?? '', ENT_QUOTES);
            $ts = htmlspecialchars($row['timestamp'] ?? $row['time'] ?? '', ENT_QUOTES);

            echo '<tr data-msg-id="' . $id . '" data-msg-table="' . $usedTable . '">'
                . '<td>' . $id . '</td>'
                . '<td>' . $sender . '</td>'
                . '<td>' . $receiver . '</td>'
                . '<td>' . $message . '</td>'
                . '<td>' . $ts . '</td>'
                . '<td><button class="delete-msg-btn" data-id="' . $id . '" data-table="' . $usedTable . '">Borrar</button></td>'
                . '</tr>';
        }
    } else {
        echo '<tr><td colspan="6">No se encontró una tabla de mensajes (buscadas: ' . implode(',', $msgTables) . ')</td></tr>';
    }
    ?>
</table>

<!-- Script para borrar mensajes sin recargar -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.delete-msg-btn').forEach(btn => {
        btn.addEventListener('click', async () => {
            if (!confirm('¿Confirmas eliminar este mensaje?')) return;
            const id = btn.dataset.id;
            const table = btn.dataset.table;
            try {
                const resp = await fetch('borrarMensaje.php?id=' + encodeURIComponent(id) + '&table=' + encodeURIComponent(table));
                const json = await resp.json();
                if (!json.error) {
                    const row = btn.closest('tr');
                    if (row) row.parentNode.removeChild(row);
                    alert('Mensaje eliminado');
                } else {
                    alert('Error: ' + json.mensaje);
                }
            } catch (err) {
                alert('Error al eliminar el mensaje');
            }
        });
    });
});
</script>
</table>

<script src="edit.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Modal de usuarios
    const modalUser = document.getElementById('editModalUser');
    const btnUserCancel = document.getElementById('edit-user-cancel');
    const btnUserSave = document.getElementById('edit-user-save');

    document.querySelectorAll('.edit-user-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.getElementById('edit-user-id').value = btn.dataset.id;
            document.getElementById('edit-user-name').value = btn.dataset.name;
            document.getElementById('edit-user-password').value = '';
            document.getElementById('edit-user-bio').value = btn.dataset.bio;
            document.getElementById('edit-user-pity').value = btn.dataset.pity;
            modalUser.style.display = 'flex';
        });
    });

    btnUserCancel.addEventListener('click', () => modalUser.style.display = 'none');

    btnUserSave.addEventListener('click', async () => {
        const data = {
            Id_User: document.getElementById('edit-user-id').value,
            Name_User: document.getElementById('edit-user-name').value,
            User_Password: document.getElementById('edit-user-password').value,
            Bio: document.getElementById('edit-user-bio').value,
            Pity: document.getElementById('edit-user-pity').value
        };

        try {
            const response = await fetch('edit.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data)
            });
            const result = await response.json();
            
            if (!result.error) {
                // Actualizar la fila
                const row = document.querySelector(`tr[data-row-id="${data.Id_User}"]`);
                if (row) {
                    const cells = row.getElementsByTagName('td');
                    cells[1].textContent = data.Name_User;
                    cells[3].textContent = data.Bio;
                    cells[4].textContent = data.Pity;
                }
                modalUser.style.display = 'none';
                alert('Usuario actualizado correctamente');
            } else {
                alert('Error: ' + result.mensaje);
            }
        } catch (error) {
            alert('Error al actualizar el usuario');
        }
    });

    // Modal de Pokemon
    const modalPokemon = document.getElementById('editModalPokemon');
    const btnPokemonCancel = document.getElementById('edit-pokemon-cancel');
    const btnPokemonSave = document.getElementById('edit-pokemon-save');

    document.querySelectorAll('.edit-pokemon-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.getElementById('edit-pokemon-id').value = btn.dataset.id;
            document.getElementById('edit-pokemon-name').value = btn.dataset.name;
            document.getElementById('edit-pokemon-type').value = btn.dataset.type;
            document.getElementById('edit-pokemon-second-type').value = btn.dataset.secondType;
            document.getElementById('edit-pokemon-weaknesses').value = btn.dataset.weaknesses;
            document.getElementById('edit-pokemon-description').value = btn.dataset.description;
            document.getElementById('edit-pokemon-abilities').value = btn.dataset.abilities;
            document.getElementById('edit-pokemon-second-abilities').value = btn.dataset.secondAbilities;
            document.getElementById('edit-pokemon-abilities-hidden').value = btn.dataset.abilitiesHidden;
            document.getElementById('edit-pokemon-gender').value = btn.dataset.gender;
            modalPokemon.style.display = 'flex';
        });
    });

    btnPokemonCancel.addEventListener('click', () => modalPokemon.style.display = 'none');

    btnPokemonSave.addEventListener('click', async () => {
        const data = {
            Id_Pokedex: document.getElementById('edit-pokemon-id').value,
            PokemonName: document.getElementById('edit-pokemon-name').value,
            Type: document.getElementById('edit-pokemon-type').value,
            Second_Type: document.getElementById('edit-pokemon-second-type').value,
            Weaknesses: document.getElementById('edit-pokemon-weaknesses').value,
            Description: document.getElementById('edit-pokemon-description').value,
            Abilities: document.getElementById('edit-pokemon-abilities').value,
            Second_Abilities: document.getElementById('edit-pokemon-second-abilities').value,
            Abilities_Hidden: document.getElementById('edit-pokemon-abilities-hidden').value,
            Gender: document.getElementById('edit-pokemon-gender').value
        };

        try {
            const response = await fetch('editPokemonData.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data)
            });
            const result = await response.json();
            
            if (!result.error) {
                // Actualizar la fila
                const row = document.querySelector(`tr[data-row-id="${data.Id_Pokedex}"]`);
                if (row) {
                    const cells = row.getElementsByTagName('td');
                    cells[1].textContent = data.PokemonName;
                    cells[2].textContent = data.Type;
                    cells[3].textContent = data.Second_Type;
                    cells[4].textContent = data.Weaknesses;
                    cells[5].textContent = data.Description;
                    cells[6].textContent = data.Abilities;
                    cells[7].textContent = data.Second_Abilities;
                    cells[8].textContent = data.Abilities_Hidden;
                    cells[9].textContent = data.Gender;
                }
                modalPokemon.style.display = 'none';
                alert('Pokemon actualizado correctamente');
            } else {
                alert('Error: ' + result.mensaje);
            }
        } catch (error) {
            alert('Error al actualizar el Pokemon');
        }
    });
});</script><!-- Sección de Pokemon -->
<h3>Pokemon:</h3>

<!-- Modal de edición de Pokemon -->
<div id="editModalPokemon" style="display:none; position:fixed; left:0; top:0; right:0; bottom:0; background: rgba(0,0,0,0.5); align-items:center; justify-content:center;">
    <div style="background:#fff; padding:20px; width:360px; margin:auto; border-radius:6px;">
        <h3>Editar Pokemon</h3>
        <input type="hidden" id="edit-pokemon-id">
        <div>
            <label>Nombre Pokemon</label><br>
            <input id="edit-pokemon-name" type="text" style="width:100%">
        </div>
        <div>
            <label>Tipo</label><br>
            <input id="edit-pokemon-type" type="text" style="width:100%">
        </div>
        <div>
            <label>Segundo tipo</label><br>
            <input id="edit-pokemon-second-type" type="text" style="width:100%">
        </div>
        <div>
            <label>Debilidades</label><br>
            <input id="edit-pokemon-weaknesses" type="text" style="width:100%">
        </div>
        <div>
            <label>Descripción</label><br>
            <input id="edit-pokemon-description" type="text" style="width:100%">
        </div>
        <div>
            <label>Habilidad</label><br>
            <input id="edit-pokemon-abilities" type="text" style="width:100%">
        </div>
        <div>
            <label>Habilidad Secundaria</label><br>
            <input id="edit-pokemon-second-abilities" type="text" style="width:100%">
        </div>
        <div>
            <label>Habilidad Oculta</label><br>
            <input id="edit-pokemon-abilities-hidden" type="text" style="width:100%">
        </div>
        <div>
            <label>Género</label><br>
            <input id="edit-pokemon-gender" type="text" style="width:100%">
        </div>
        <div style="margin-top:12px; text-align:right;">
            <button id="edit-pokemon-cancel">Cancelar</button>
            <button id="edit-pokemon-save">Guardar</button>
        </div>
    </div>
</div>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre Pokemon</th>
        <th>Tipo</th>
        <th>Segundo Tipo</th>
        <th>Debilidades</th>
        <th>Descripción</th>
        <th>Habilidad</th>
        <th>Habilidad Secundaria</th>
        <th>Habilidad Oculta</th>
        <th>Género</th>
        <th>Acciones</th>
    </tr>

    <?php
    $sql = "SELECT * FROM datapokemonall";
    $result = $conexion->query($sql);

    while($row = $result->fetch_assoc()) {
        $id = htmlspecialchars($row['Id_Pokedex'], ENT_QUOTES);
        $name = htmlspecialchars($row['PokemonName'], ENT_QUOTES);
        $type = htmlspecialchars($row['Type'], ENT_QUOTES);
        $second_type = htmlspecialchars($row['Second_Type'], ENT_QUOTES);
        $weaknesses = htmlspecialchars($row['Weaknesses'], ENT_QUOTES);
        $description = htmlspecialchars($row['Description'], ENT_QUOTES);
        $abilities = htmlspecialchars($row['Abilities'], ENT_QUOTES);
        $second_abilities = htmlspecialchars($row['Second_Abilities'], ENT_QUOTES);
        $abilities_hidden = htmlspecialchars($row['Abilities_Hidden'], ENT_QUOTES);
        $gender = htmlspecialchars($row['Gender'], ENT_QUOTES);

        echo '<tr data-row-id="' . $id . '">'
            . '<td>' . $id . '</td>'
            . '<td>' . $name . '</td>'
            . '<td>' . $type . '</td>'
            . '<td>' . $second_type . '</td>'
            . '<td>' . $weaknesses . '</td>'
            . '<td>' . $description . '</td>'
            . '<td>' . $abilities . '</td>'
            . '<td>' . $second_abilities . '</td>'
            . '<td>' . $abilities_hidden . '</td>'
            . '<td>' . $gender . '</td>'
            . '<td>'
            . '<button class="edit-pokemon-btn" data-id="' . $id . '" data-name="' . $name . '" '
            . 'data-type="' . $type . '" data-second-type="' . $second_type . '" '
            . 'data-weaknesses="' . $weaknesses . '" data-description="' . $description . '" '
            . 'data-abilities="' . $abilities . '" data-second-abilities="' . $second_abilities . '" '
            . 'data-abilities-hidden="' . $abilities_hidden . '" data-gender="' . $gender . '">Edit</button> '
            . '</td>'
            . '</tr>';
    }
    ?>
