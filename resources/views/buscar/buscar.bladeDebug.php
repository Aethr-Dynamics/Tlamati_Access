@extends('layouts.admin')

@section('template_title')
    | Buscador
@endsection

@section('content')
<div class="content text-center" style="margin-left: 20px">
    <div class="text-center">
        <img src="{{asset('svg/undraw_mobile-search_macy.svg')}}" alt="Icon S.A.R." style="width: 10%; padding-bottom: 15px;">
    </div>

    <form id="formulario-id">
        <div class="row">
            <div class="col-md-12">
                <label for="identificador" class="form-label">Escanea o escribe ID</label>
            </div>
            <div class="col-md-12">
                <input type="text" name="identificador" id="identificador" autofocus autocomplete="off" placeholder="Esperando...">
            </div>
            <div class="col-md-12">
                <br>
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </div>
    </form>

    <div class="row container text-center" id="resultado"></div>
</div>

<!-- Agrega jQuery si no está en el layout -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
// Variable global para debugging
const debugMode = true;

function addDebugMessage(message, type = 'info') {
    if (!debugMode) return;
    
    const colors = {
        info: '#17a2b8',
        success: '#28a745',
        error: '#dc3545',
        warning: '#ffc107'
    };
    
    const debugDiv = $('#debug-console');
    const messageHtml = `
        <div style="padding: 5px; margin: 2px; border-left: 3px solid ${colors[type]}; background: #f8f9fa;">
            <small style="color: ${colors[type]}">[${new Date().toLocaleTimeString()}]</small>
            <span style="color: #333;">${message}</span>
        </div>
    `;
    
    if (debugDiv.length) {
        debugDiv.append(messageHtml);
        debugDiv.scrollTop(debugDiv[0].scrollHeight);
    } else {
        console.log(`[DEBUG] ${message}`);
    }
}

$(document).ready(function () {
    addDebugMessage('✅ jQuery cargado correctamente', 'success');
    addDebugMessage('🚀 Inicializando buscador...', 'info');
    
    const $form = $('#formulario-id');
    const $input = $('input[name="identificador"]');
    const $resultado = $('#resultado');
    
    // Verificar elementos encontrados
    addDebugMessage(`📝 Formulario encontrado: ${$form.length ? '✅ Sí' : '❌ No'}`, $form.length ? 'success' : 'error');
    addDebugMessage(`📝 Input encontrado: ${$input.length ? '✅ Sí' : '❌ No'}`, $input.length ? 'success' : 'error');
    addDebugMessage(`📝 Resultado encontrado: ${$resultado.length ? '✅ Sí' : '❌ No'}`, $resultado.length ? 'success' : 'error');
    
    // Mostrar valor del input si existe en URL
    const urlParams = new URLSearchParams(window.location.search);
    const prefilledId = urlParams.get('identificador');
    if (prefilledId) {
        addDebugMessage(`🔍 ID precargado desde URL: ${prefilledId}`, 'warning');
        $input.val(prefilledId);
    }
    
    function limpiarResultado() {
        addDebugMessage('🧹 Limpiando resultado...', 'info');
        $resultado.fadeOut(3000, function () {
            $(this).html('').show();
            addDebugMessage('✨ Resultado limpiado', 'success');
        });
        $input.val('').focus();
    }
    
    $form.on('submit', function (e) {
        e.preventDefault();
        const id = $input.val().trim();
        
        addDebugMessage(`🔍 Buscando ID: "${id}"`, 'info');
        
        if (!id) {
            addDebugMessage('⚠️ ID vacío, cancelando búsqueda', 'warning');
            return;
        }
        
        $resultado.stop(true, true).show().html('<div class="alert alert-info">Buscando...</div>');
        addDebugMessage('📡 Enviando petición AJAX...', 'info');
        
        $.ajax({
            url: "{{ route('buscar.id') }}",
            method: "POST",
            data: {
                identificador: id,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                addDebugMessage(`✅ Petición exitosa. Tipo: ${data.tipo}`, 'success');
                addDebugMessage(`📦 Datos recibidos: ${JSON.stringify(data).substring(0, 200)}...`, 'info');
                
                let html = '';
                
                if (data.tipo === 'student') {
                    addDebugMessage('🎓 Mostrando datos de estudiante', 'success');
                    html = `
                        <div class="card mt-3">
                            <div class="card-header bg-success text-white">
                                <i class="bi bi-mortarboard-fill"></i> DATOS DEL ESTUDIANTE
                            </div>
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-md-3"><strong>Nombre completo:</strong></div>
                                    <div class="col-md-9">${data.nombre} ${data.apellido_paterno} ${data.apellido_materno}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3"><strong>Carrera:</strong></div>
                                    <div class="col-md-9">${data.id_offer || 'No asignada'}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3"><strong>Plantel:</strong></div>
                                    <div class="col-md-9">${data.school || 'No asignado'}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3"><strong>Rol:</strong></div>
                                    <div class="col-md-9">${data.rol || 'Sin rol'}</div>
                                </div>
                                ${data.fotografia ? `
                                <div class="row mb-2">
                                    <div class="col-md-3"><strong>Foto:</strong></div>
                                    <div class="col-md-9"><img src="/storage/${data.fotografia}" width="150" class="img-thumbnail"></div>
                                </div>` : ''}
                            </div>
                        </div>
                    `;
                } else if (data.tipo === 'worker') {
                    addDebugMessage('👔 Mostrando datos de trabajador', 'success');
                    html = `
                        <div class="card mt-3">
                            <div class="card-header bg-primary text-white">
                                <i class="bi bi-briefcase-fill"></i> DATOS DEL TRABAJADOR
                            </div>
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-md-3"><strong>Nombre completo:</strong></div>
                                    <div class="col-md-9">${data.nombre} ${data.apellido_paterno} ${data.apellido_materno}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3"><strong>Puesto:</strong></div>
                                    <div class="col-md-9">${data.id_offer || 'No asignado'}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3"><strong>Plantel:</strong></div>
                                    <div class="col-md-9">${data.school || 'No asignado'}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3"><strong>Rol:</strong></div>
                                    <div class="col-md-9">${data.rol || 'Sin rol'}</div>
                                </div>
                                ${data.fotografia ? `
                                <div class="row mb-2">
                                    <div class="col-md-3"><strong>Foto:</strong></div>
                                    <div class="col-md-9"><img src="/storage/${data.fotografia}" width="150" class="img-thumbnail"></div>
                                </div>` : ''}
                            </div>
                        </div>
                    `;
                } else if (data.tipo === 'visitor') {
                    addDebugMessage('👤 Mostrando datos de visitante', 'success');
                    html = `
                        <div class="card mt-3">
                            <div class="card-header bg-info text-white">
                                <i class="bi bi-person-badge-fill"></i> DATOS DEL VISITANTE
                            </div>
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-md-3"><strong>Nombre completo:</strong></div>
                                    <div class="col-md-9">${data.nombre} ${data.apellido_paterno || ''} ${data.apellido_materno || ''}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3"><strong>Motivo:</strong></div>
                                    <div class="col-md-9">${data.motivo || 'No especificado'}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3"><strong>¿Es menor?</strong></div>
                                    <div class="col-md-9">${data.es_menor ? 'Sí' : 'No'}</div>
                                </div>
                            </div>
                        </div>
                    `;
                }
                
                $resultado.html(html);
                addDebugMessage('✅ Datos mostrados correctamente', 'success');
                setTimeout(limpiarResultado, 10000); // 10 segundos para leer mejor
            },
            error: function (xhr, status, error) {
                addDebugMessage(`❌ Error en petición: ${status} - ${error}`, 'error');
                addDebugMessage(`📡 Respuesta del servidor: ${xhr.responseText}`, 'error');
                
                let errorMsg = 'Error desconocido';
                if (xhr.responseJSON && xhr.responseJSON.error) {
                    errorMsg = xhr.responseJSON.error;
                    addDebugMessage(`📝 Mensaje de error: ${errorMsg}`, 'error');
                }
                
                let html = `
                    <div class="card mt-3 border-danger">
                        <div class="card-header bg-danger text-white">
                            <i class="bi bi-exclamation-triangle-fill"></i> ERROR
                        </div>
                        <div class="card-body text-center">
                            <i class='bi bi-person-fill-slash' style="color:#e44f60; font-size:80px"></i>
                            <div class="mt-3">
                                <strong>${errorMsg}</strong>
                            </div>
                            <div class="mt-2 small text-muted">
                                Código: ${xhr.status} - ${status}
                            </div>
                        </div>
                    </div>
                `;
                
                $resultado.html(html);
                setTimeout(limpiarResultado, 5000);
            }
        });
    });
    
    // Auto-enviar si hay ID precargado
    if (prefilledId) {
        addDebugMessage('🔄 Enviando búsqueda automática...', 'info');
        setTimeout(() => {
            $form.submit();
        }, 500);
    }
    
    addDebugMessage('✅ Inicialización completada', 'success');
});
</script>

<!-- Consola de depuración visual -->
<div id="debug-console" style="position: fixed; bottom: 10px; right: 10px; width: 400px; max-height: 300px; overflow-y: auto; background: white; border: 2px solid #333; border-radius: 5px; padding: 10px; font-size: 12px; z-index: 9999; box-shadow: 0 0 10px rgba(0,0,0,0.5);">
    <div style="font-weight: bold; margin-bottom: 5px; border-bottom: 1px solid #ccc;">
        🔍 CONSOLA DE DEPURACIÓN
        <button onclick="$('#debug-console').hide()" style="float: right;">✖</button>
    </div>
    <div id="debug-messages"></div>
</div>
@endsection
