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
$(document).ready(function () {
    const $form = $('#formulario-id');
    const $input = $('input[name="identificador"]');
    const $resultado = $('#resultado');

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

        $resultado.stop(true, true).show().html('Buscando...');

        $.ajax({
            url: "{{ route('buscar.id') }}",
            method: "POST",
            data: {
                identificador: id,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                let html = '';

               // Dentro del success de AJAX
if (data.tipo === 'student' || data.tipo === 'worker') {
    html += `
        <div class="col-md-12" style="display: flex; justify-content: space-between; align-items: center; padding-bottom:15px;">
            <div class="col-md-3"><strong>Nombre:</strong></div>
            <div class="col-md-9">${data.nombre} ${data.apellido_paterno} ${data.apellido_materno}</div>
        </div>
        <div class="col-md-12" style="display: flex; justify-content: space-between; align-items: center; padding-bottom:15px;">
            <div class="col-md-3"><strong>${data.tipo === 'student' ? 'Carrera' : 'Puesto'}:</strong></div>
            <div class="col-md-9">${data.id_offer}</div>
        </div>
        <div class="col-md-12" style="display: flex; justify-content: space-between; align-items: center; padding-bottom:15px;">
            <div class="col-md-3"><strong>Plantel:</strong></div>
            <div class="col-md-9">${data.school}</div>
        </div>
        <div class="col-md-12" style="display: flex; justify-content: space-between; align-items: center; padding-bottom:15px;">
            <div class="col-md-3"><strong>Rol:</strong></div>
            <div class="col-md-9">${data.rol}</div>
        </div>
        <div class="col-md-12" style="display: flex; justify-content: space-between; align-items: center; padding-bottom:15px;">
            <div class="col-md-3"><strong>Foto:</strong></div>
            <div class="col-md-9"><img src="/storage/${data.fotografia}" width="150"></div>
        </div>
    `;
} else if (data.tipo === 'visitor') {
    html += `
        <div class="col-md-12"><i class='bi bi-person-check-fill' style="color:#33d497; font-size:80px"></i></div>
        <div class="col-md-12" style="display: flex; justify-content: space-between; align-items: center; padding-bottom:15px;">
            <div class="col-md-3"><strong>Nombre:</strong></div>
            <div class="col-md-9">${data.nombre} ${data.apellido_paterno} ${data.apellido_materno}</div>
        </div>
        <div class="col-md-12" style="display: flex; justify-content: space-between; align-items: center; padding-bottom:15px;">
            <div class="col-md-3"><strong>Motivo:</strong></div>
            <div class="col-md-9">${data.motivo}</div>
        </div>
        <div class="col-md-12" style="display: flex; justify-content: space-between; align-items: center; padding-bottom:15px;">
            <div class="col-md-3"><strong>¿Es menor?</strong></div>
            <div class="col-md-9">${data.es_menor ? 'Sí' : 'No'}</div>
        </div>
    `;
}

                $resultado.html(html);
                setTimeout(limpiarResultado, 2000);
            },
            error: function (xhr) {
                let html = `
                    <div class="col-md-12">
                        <i class='bi bi-person-fill-slash' style="color:#e44f60; font-size:80px"></i>
                    </div>
                    <div class="col-md-12">
                        ${xhr.responseJSON.error}
                    </div>
                `;
                $resultado.html(html);
                setTimeout(limpiarResultado, 2000);
            }
        });
    });
});
</script>
@endsection
