function gestionarErrores(input, errores) {
    let noEnviarFormulario = false;
    input = $(input);
    if (typeof errores !== typeof undefined) {
        input.removeClass("is-invalid");
        input.addClass("is-invalid");
        input.nextAll(".invalid-feedback").remove();
        for (let error of errores) {
            input.after(`<div class="invalid-feedback">
                <strong> ${error} </strong>
            </div>`);
        }
        noEnviarFormulario = true;
    } else {
        input.removeClass("is-invalid");
        input.addClass("is-valid");
        input.nextAll(".invalid-feedback").remove();
    }
    return noEnviarFormulario;
}

function validateTarget(target) {
    let formData = new FormData();
    formData.append(target.id, target.value);
    $(target).parent().next(".spinner").addClass("loader");
    axios.post('/createMaquina/validate',
        formData
    ).then(function (response) {
        $(target).parent().next(".spinner").removeClass("loader");
        switch (target.id) {
            case "nombre":
                gestionarErrores(target, response.data.nombre);
                break;
            case "zona_trabajada":
                gestionarErrores(target, response.data.zona_trabajada);
                break;
            case "unidades":
                gestionarErrores(target, response.data.unidades);
                break;
            case "descripcion":
                gestionarErrores(target, response.data.descripcion);
                break;
        }
    }).catch(function (error) {
        console.log(error);
    });
}

$(function () {
    $("#nombre,#zona_trabajada,#unidades,#descripcion").on('change', function (e) {
        validateTarget(e.target)
    });

    $("#botonCrearMaquina").click(function (e) {
        e.preventDefault();
        let enviarFormulario = true;
        let formData = new FormData;
        formData.append('nombre', $("#nombre").val());
        formData.append('zona_trabajada', $("#zona_trabajada").val());
        formData.append('unidades', $("#unidades").val());
        formData.append('descripcion', $("#descripcion").val());

        axios.post('/createMaquina/validate', formData)
            .then(function (response) {
                if (gestionarErrores("#nombre", response.data.nombre)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#zona_trabajada", response.data.zona_trabajada)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#unidades", response.data.unidades)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#descripcion", response.data.descripcion)) {
                    enviarFormulario = false;
                }

                if (enviarFormulario === true){
                    $("#formularioCrearMaquina").submit();
                }
            });
    });
});