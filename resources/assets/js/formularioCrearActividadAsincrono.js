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
    axios.post('/createActividad/validate',
        formData
    ).then(function (response) {
        $(target).parent().next(".spinner").removeClass("loader");
        switch (target.id) {
            case "nombre":
                gestionarErrores(target, response.data.nombre);
                break;
            case "objetivos":
                gestionarErrores(target, response.data.objetivos);
                break;
            case "intensidad":
                gestionarErrores(target, response.data.intensidad);
                break;
            case "duracion":
                gestionarErrores(target, response.data.duracion);
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
    $("#nombre,#objetivos,#intensidad,#duracion,#descripcion").on('change', function (e) {
        validateTarget(e.target)
    });

    $("#botonCrearActividad").click(function (e) {
        e.preventDefault();
        let enviarFormulario = true;
        let formData = new FormData;
        formData.append('nombre', $("#nombre").val());
        formData.append('objetivos', $("#objetivos").val());
        formData.append('intensidad', $("#intensidad").val());
        formData.append('duracion', $("#duracion").val());
        formData.append('descripcion', $("#descripcion").val());

        axios.post('/createActividad/validate', formData)
            .then(function (response) {
                if (gestionarErrores("#nombre", response.data.nombre)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#objetivos", response.data.objetivos)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#intensidad", response.data.intensidad)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#duracion", response.data.duracion)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#descripcion", response.data.descripcion)) {
                    enviarFormulario = false;
                }

                if (enviarFormulario === true){
                    $("#formularioCrearActividad").submit();
                }
            });
    });
});