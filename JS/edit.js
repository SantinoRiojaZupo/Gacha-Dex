// Helper to send edition payload to edit.php
async function enviarEdicion(payload) {
  // edit.php espera JSON en POST; ajusta si tu backend requiere PATCH u otro formato
  const res = await fetch('edit.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(payload)
  });
  const data = await res.json().catch(() => ({ error: 'Respuesta no JSON', ok: false }));
  return data;
}

// Mantener compatibilidad con la función previa
async function editarUsuario(id, nombre_usuario, contraseña, bio, pity) {
  return enviarEdicion({ Id_User: id, Name_User: nombre_usuario, User_Password: contraseña, Bio: bio, Pity: pity });
}

// Exportar la función al scope global para que crud.html pueda usarla
window.enviarEdicion = enviarEdicion;

// --- Modal handlers ---
document.addEventListener('DOMContentLoaded', () => {
  const modal = document.getElementById('editModal');
  const inputId = document.getElementById('edit-id');
  const inputName = document.getElementById('edit-name');
  const inputPassword = document.getElementById('edit-password');
  const inputBio = document.getElementById('edit-bio');
  const inputPity = document.getElementById('edit-pity');
  const btnCancel = document.getElementById('edit-cancel');
  const btnSave = document.getElementById('edit-save');

  // Abrir modal al hacer clic en cualquier botón .edit-btn
  document.querySelectorAll('.edit-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      const id = btn.dataset.id;
      inputId.value = id;
      inputName.value = btn.dataset.name || '';
      // No poner la contraseña real por seguridad; dejar vacío para no cambiar
      inputPassword.value = '';
      inputBio.value = btn.dataset.bio || '';
      inputPity.value = btn.dataset.pity || '';
      modal.style.display = 'flex';
    });
  });

  btnCancel.addEventListener('click', (e) => {
    e.preventDefault();
    modal.style.display = 'none';
  });

  btnSave.addEventListener('click', async (e) => {
    e.preventDefault();
    const payload = {
      Id_User: inputId.value,
      Name_User: inputName.value,
      // Si la contraseña está vacía, el backend no la cambiará
      User_Password: inputPassword.value,
      Bio: inputBio.value,
      Pity: inputPity.value
    };

    // Enviar y manejar respuesta
    btnSave.disabled = true;
    const res = await enviarEdicion(payload).catch(err => ({ error: true, mensaje: err.message }));
    btnSave.disabled = false;

    if (res && !res.error) {
      // Actualizar la fila en la tabla para reflejar cambios
      const row = document.querySelector(`tr[data-row-id="${inputId.value}"]`);
      if (row) {
        row.children[1].textContent = payload.Name_User;
        // Mostrar la contraseña tal cual viene (no recomendable en producción)
        row.children[2].textContent = payload.User_Password ? '********' : row.children[2].textContent;
        row.children[3].textContent = payload.Bio;
        row.children[4].textContent = payload.Pity;
      }
      modal.style.display = 'none';
      alert(res.mensaje || 'Usuario actualizado');
    } else {
      alert('Error: ' + (res.mensaje || 'No se pudo actualizar'));
    }
  });
});