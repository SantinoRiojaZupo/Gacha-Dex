

let musica;

// Map de pistas según el select en footer.php (valores -> nombres de archivo en /sonidos)
const TRACKS = {
    "0": null, // Default -> decidimos por página
    "1": '1-35. Vermilion City.mp3',
    "2": '1-15. Pewter City.mp3',
    "3": '1-40 Slateport City.mp3',
    "4": '1-21. Pokémon Center.mp3',
    "5": 'La Chona - Los Tucanes de Tijuana - Letra . la chona letra.mp3'
};

function buildAudioFromTrackId(id) {
    const name = TRACKS[id];
    if (!name) return null;
    const path = encodeURI('../sonidos/' + name);
    const a = new Audio(path);
    a.loop = true;
    return a;
}

function getDefaultTrackIdForPage() {
    // Prioridad:
    // 1) body[data-default-music]
    // 2) heurística por pathname/search
    const body = document.body;
    if (body && body.dataset && body.dataset.defaultMusic) {
        return body.dataset.defaultMusic;
    }

    const loc = window.location.pathname + window.location.search;
    // Reglas simples por substring (asumimos nombres de archivo comunes)
    if (loc.includes('inventario.php')) return '4'; // Pokémon Center
    if (loc.includes('usuarioMain.php') || loc.includes('usuarioMain')) return '3'; // Slateport
    if (loc.includes('pokedex.php')) return '1'; // Vermilion
    if (loc.includes('rolls.php')) return '0';
    // fallback
    return '1';
}

// Guardar currentTime y pista antes de navegar
window.addEventListener('beforeunload', () => {
    if (musica) {
        const trackId = localStorage.getItem('musicaSeleccion') || getDefaultTrackIdForPage();
        localStorage.setItem('musicaTrackIdActual', trackId);
        localStorage.setItem('musicaCurrentTime', musica.currentTime.toString());
    }
});

window.addEventListener('load', () => {
    // Selección guardada por usuario (tiene prioridad sobre el default)
    const guardada = localStorage.getItem('musicaSeleccion');
    let trackId = guardada !== null ? guardada : getDefaultTrackIdForPage();

    // Si trackId apunta a 0 -> usar fallback: primera pista válida
    if (trackId === '0') {
        // si existe una pista guardada en volumen/mute la respetamos pero escogemos un track por defecto
        trackId = getDefaultTrackIdForPage() || '1';
    }

    // Construir audio
    musica = buildAudioFromTrackId(trackId) || buildAudioFromTrackId('1');
    musica.volume = 0.5;

    // Restaurar estado mute y volumen
    const mutadoGuardado = localStorage.getItem('mutado') === 'true';
    musica.muted = mutadoGuardado;

    const volumenGuardado = localStorage.getItem('volumenMusica');
    if (volumenGuardado !== null) {
        musica.volume = parseFloat(volumenGuardado);
    }

    // Si la pista es la misma que antes, restaurar currentTime
    const trackIdAnterior = localStorage.getItem('musicaTrackIdActual');
    const currentTimeSaved = localStorage.getItem('musicaCurrentTime');
    if (trackIdAnterior === trackId && currentTimeSaved !== null) {
        musica.currentTime = parseFloat(currentTimeSaved);
    }
    else {
        musica.currentTime = 0;
    }

    musica.play().catch(() => {});

    // Elementos del footer
    const btn = document.getElementById('toggleMusic');
    const slider = document.getElementById('musicVolume');
    const select = document.getElementById('musicaSelect');

    if (btn) btn.textContent = musica.muted ? '🔇' : '🔊';
    if (slider) slider.value = musica.volume;
    if (select) {
        // asegurar que el select refleje la selección (guardada o default)
        select.value = guardada !== null ? guardada : (trackId || '0');
    }

    // Eventos
    if (btn) {
        btn.addEventListener('click', () => {
            musica.muted = !musica.muted;
            localStorage.setItem('mutado', musica.muted);
            btn.textContent = musica.muted ? '🔇' : '🔊';
        });
    }

    if (slider) {
        slider.addEventListener('input', () => {
            musica.volume = slider.value;
            localStorage.setItem('volumenMusica', slider.value);
        });
    }

    if (select) {
        select.addEventListener('change', () => {
            const newId = select.value;
            // guardar elección (si es 0 se interpreta como "usar default de página")
            localStorage.setItem('musicaSeleccion', newId);

            // reemplazar audio actual si corresponde
            const newAudio = buildAudioFromTrackId(newId) || buildAudioFromTrackId(getDefaultTrackIdForPage()) || buildAudioFromTrackId('1');
            if (!newAudio) return;
            // mantener estado previos
            newAudio.muted = musica.muted;
            newAudio.volume = musica.volume;
            // pausar viejo y usar nuevo
            try { musica.pause(); } catch (e) {}
            musica = newAudio;
            musica.play().catch(() => {});
        });
    }
});
