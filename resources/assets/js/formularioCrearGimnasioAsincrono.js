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
    axios.post('/createGimnasios/validate',
        formData
    ).then(function (response) {
        $(target).parent().next(".spinner").removeClass("loader");
        switch (target.id) {
            case "nombre":
                gestionarErrores(target, response.data.nombre);
                break;
            case "direccion":
                gestionarErrores(target, response.data.direccion);
                break;
            case "horario_apertura":
                gestionarErrores(target, response.data.horario_apertura);
                break;
            case "horario_cierre":
                gestionarErrores(target, response.data.horario_cierre);
                break;
            case "cuotas":
                gestionarErrores(target, response.data.cuotas);
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
    $("#nombre,#direccion,#horario_apertura,#horario_cierre,#cuotas,#descripcion").on('change', function (e) {
        validateTarget(e.target)
    });

    $("#botonCrearGimnasio").click(function (e) {
        e.preventDefault();
        let enviarFormulario = true;
        let formData = new FormData;
        formData.append('nombre', $("#nombre").val());
        formData.append('direccion', $("#direccion").val());
        formData.append('horario_apertura', $("#horario_apertura").val());
        formData.append('horario_cierre', $("#horario_cierre").val());
        formData.append('cuotas', $("#cuotas").val());
        formData.append('descripcion', $("#descripcion").val());

        axios.post('/createGimnasios/validate', formData)
            .then(function (response) {
                if (gestionarErrores("#nombre", response.data.nombre)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#direccion", response.data.direccion)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#horario_apertura", response.data.horario_apertura)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#horario_cierre", response.data.horario_cierre)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#cuotas", response.data.cuotas)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#descripcion", response.data.descripcion)) {
                    enviarFormulario = false;
                }

                if (enviarFormulario === true){
                    $("#formularioCrearGimnasio").submit();
                }
            });
    });
});