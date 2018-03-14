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
    axios.post('/createMonitor/validate',
        formData
    ).then(function (response) {
        $(target).parent().next(".spinner").removeClass("loader");
        switch (target.id) {
            case "nombre":
                gestionarErrores(target, response.data.nombre);
                break;
            case "apellidos":
                gestionarErrores(target, response.data.apellidos);
                break;
            case "fecha_nacimiento":
                gestionarErrores(target, response.data.fecha_nacimiento);
                break;
            case "email":
                gestionarErrores(target, response.data.email);
                break;
            case "estudios":
                gestionarErrores(target, response.data.estudios);
                break;
            case "direccion":
                gestionarErrores(target, response.data.direccion);
                break;
        }
    }).catch(function (error) {
        console.log(error);
    });
}

$(function () {
    $("#nombre,#apellidos,#fecha_nacimiento,#email,#estudios,#direccion").on('change', function (e) {
        validateTarget(e.target)
    });

    $("#botonCrearMonitor").click(function (e) {
        e.preventDefault();
        let enviarFormulario = true;
        let formData = new FormData;
        formData.append('nombre', $("#nombre").val());
        formData.append('apellidos', $("#apellidos").val());
        formData.append('fecha_nacimiento', $("#fecha_nacimiento").val());
        formData.append('email', $("#email").val());
        formData.append('estudios', $("#estudios").val());
        formData.append('direccion', $("#direccion").val());

        axios.post('/createMonitor/validate', formData)
            .then(function (response) {
                if (gestionarErrores("#nombre", response.data.nombre)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#apellidos", response.data.apellidos)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#fecha_nacimiento", response.data.fecha_nacimiento)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#email", response.data.email)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#estudios", response.data.estudios)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#direccion", response.data.direccion)) {
                    enviarFormulario = false;
                }

                if (enviarFormulario === true){
                    $("#formularioCrearMonitor").submit();
                }
            });
    });
});