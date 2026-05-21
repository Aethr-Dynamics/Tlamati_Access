@extends('layouts.admin')

@section('template_title')
    | Buscador
@endsection

@section('content')
<div class="content text-center" style="margin-left: 20px">
    <!-- <div class="text-center">
        <img src="{{asset('svg/undraw_mobile-search_macy.svg')}}" alt="Icon S.A.R." style="width: 10%; padding-bottom: 15px;">
    </div> -->

    <!-- <div class="container text-center">
        Muestra la información escaneada del código QR
        <div class="col-12 themed-grid-col" style="background: red;">
            .col-lg-4
        </div>
        Formulario de lectura
        <div class="row mb-3 text-center"> 
            <div class="col-6 themed-grid-col" style="background: blue;">.col-6</div> 
            <div class="col-6 themed-grid-col" style="background: #F5F527;">.col-6</div> 
        </div>         
    </div> -->

    <div class="container text-center">
        <!-- Muestra la información escaneada del código QR -->
        <div class="col-12 themed-grid-col text-center" style="height: 450px; width: auto;" >
            <div class="row container text-center" id="resultado"></div>
        </div>

        <!-- Formulario de lectura -->
        <div class="row mb-3 text-center"> 
<form id="formulario-id">
    <div class="contenedor-input">

        <div class="buscador-box">
            <input 
                type="text"
                name="identificador"
                id="identificador"
                autofocus
                autocomplete="off"
                placeholder="Esperando..."
                class="input-buscador"
            >

            <button type="submit" class="btn-buscar">
                Buscar
            </button>
        </div>

    </div>





</form>           
        </div>         
    </div>
    
    <!-- <form id="formulario-id">
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
    </form> -->

    <!-- <div class="row container text-center" id="resultado"></div> -->
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    const $form = $('#formulario-id');
    const $input = $('input[name="identificador"]');
    const $resultado = $('#resultado');
    
    // Auto-enviar al presionar Enter
    $input.on('keypress', function(e) {
        if (e.which === 13) {
            e.preventDefault();
            $form.submit();
        }
    });

    // Auto-cargar ID desde URL si existe
    const urlParams = new URLSearchParams(window.location.search);
    const prefilledId = urlParams.get('identificador');
    if (prefilledId) {
        $input.val(prefilledId);
    }
    
    function limpiarResultado() {
        $resultado.fadeOut(3000, function () {
            $(this).html('').show();
        });
        $input.val('').focus();
    }
    
    $form.on('submit', function (e) {
        e.preventDefault();
        const id = $input.val().trim();
        
        if (!id) return;
        
        $resultado.stop(true, true).show().html('<div class="alert alert-info">Buscando...</div>');
        
        $.ajax({
            url: "{{ route('buscar.id') }}",
            method: "POST",
            data: {
                identificador: id,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                let html = '';
                
                if (data.tipo === 'student') {
                    html = `
                        <div class="card mt-3">
                            <div class="card-header bg-success text-white">
                                <i class="bi bi-mortarboard-fill"></i> DATOS DEL ESTUDIANTE
                            </div>
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-md-3"><strong>Nombre completo:</strong></div>
                                    <div class="col-md-9">${escapeHtml(data.nombre)} ${escapeHtml(data.apellido_paterno)} ${escapeHtml(data.apellido_materno)}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3"><strong>Carrera:</strong></div>
                                    <div class="col-md-9">${escapeHtml(data.id_offer || 'No asignada')}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3"><strong>Plantel:</strong></div>
                                    <div class="col-md-9">${escapeHtml(data.school || 'No asignado')}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3"><strong>Rol:</strong></div>
                                    <div class="col-md-9">${escapeHtml(data.rol || 'Sin rol')}</div>
                                </div>
                                ${data.fotografia ? `
                                <div class="row mb-2">
                                    <div class="col-md-3"><strong>Foto:</strong></div>
                                    <div class="col-md-9"><img src="/storage/${escapeHtml(data.fotografia)}" width="150" class="img-thumbnail" alt="Foto del estudiante"></div>
                                </div>` : ''}
                            </div>
                        </div>
                    `;
                } else if (data.tipo === 'worker') {
                    html = `
                        <div class="card mt-3">
                            <div class="card-header bg-primary text-white">
                                <i class="bi bi-briefcase-fill"></i> DATOS DEL TRABAJADOR
                            </div>
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-md-3"><strong>Nombre completo:</strong></div>
                                    <div class="col-md-9">${escapeHtml(data.nombre)} ${escapeHtml(data.apellido_paterno)} ${escapeHtml(data.apellido_materno)}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3"><strong>Puesto:</strong></div>
                                    <div class="col-md-9">${escapeHtml(data.id_offer || 'No asignado')}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3"><strong>Plantel:</strong></div>
                                    <div class="col-md-9">${escapeHtml(data.school || 'No asignado')}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3"><strong>Rol:</strong></div>
                                    <div class="col-md-9">${escapeHtml(data.rol || 'Sin rol')}</div>
                                </div>
                                ${data.fotografia ? `
                                <div class="row mb-2">
                                    <div class="col-md-3"><strong>Foto:</strong></div>
                                    <div class="col-md-9"><img src="/storage/${escapeHtml(data.fotografia)}" width="150" class="img-thumbnail" alt="Foto del trabajador"></div>
                                </div>` : ''}
                            </div>
                        </div>
                    `;
                } else if (data.tipo === 'visitor') {
                    html = `
                        <div class="card mt-3">
                            <div class="card-header bg-info text-white">
                                <i class="bi bi-person-badge-fill"></i> DATOS DEL VISITANTE
                            </div>
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-md-3"><strong>Nombre completo:</strong></div>
                                    <div class="col-md-9">${escapeHtml(data.nombre)} ${escapeHtml(data.apellido_paterno || '')} ${escapeHtml(data.apellido_materno || '')}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3"><strong>Motivo:</strong></div>
                                    <div class="col-md-9">${escapeHtml(data.motivo || 'No especificado')}</div>
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
                setTimeout(limpiarResultado, 10000);
            },
            error: function (xhr) {
                let errorMsg = 'Error al buscar el ID';
                if (xhr.responseJSON && xhr.responseJSON.error) {
                    errorMsg = xhr.responseJSON.error;
                }
                
                let html = `
                    <div class="card mt-3 border-danger">
                        <div class="card-header bg-danger text-white">
                            <i class="bi bi-exclamation-triangle-fill"></i> ERROR
                        </div>
                        <div class="card-body text-center">
                            <i class='bi bi-person-fill-slash' style="color:#e44f60; font-size:80px"></i>
                            <div class="mt-3">
                                <strong>${escapeHtml(errorMsg)}</strong>
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
        setTimeout(() => {
            $form.submit();
        }, 500);
    }
    
    // Función para prevenir XSS
    function escapeHtml(str) {
        if (!str) return '';
        return str
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#39;');
    }
});
</script>
@endsection