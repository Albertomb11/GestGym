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
    axios.post('/createProducto/validate',
        formData
    ).then(function (response) {
        $(target).parent().next(".spinner").removeClass("loader");
        switch (target.id) {
            case "nombre":
                gestionarErrores(target, response.data.nombre);
                break;
            case "precio":
                gestionarErrores(target, response.data.precio);
                break;
            case "stock":
                gestionarErrores(target, response.data.stock);
                break;
            case "sabor":
                gestionarErrores(target, response.data.sabor);
                break;
            case "caracteristicas":
                gestionarErrores(target, response.data.caracteristicas);
                break;
        }
    }).catch(function (error) {
        console.log(error);
    });
}

$(function () {
    $("#nombre,#precio,#stock,#sabor,#caracteristicas").on('change', function (e) {
        validateTarget(e.target)
    });

    $("#botonCrearProducto").click(function (e) {
        e.preventDefault();
        let enviarFormulario = true;
        let formData = new FormData;
        formData.append('nombre', $("#nombre").val());
        formData.append('precio', $("#precio").val());
        formData.append('stock', $("#stock").val());
        formData.append('sabor', $("#sabor").val());
        formData.append('caracteristicas', $("#caracteristicas").val());

        axios.post('/createProducto/validate', formData)
            .then(function (response) {
                if (gestionarErrores("#nombre", response.data.nombre)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#precio", response.data.precio)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#stock", response.data.stock)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#sabor", response.data.sabor)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#caracteristicas", response.data.caracteristicas)) {
                    enviarFormulario = false;
                }

                if (enviarFormulario === true){
                    $("#formularioCrearProducto").submit();
                }
            });
    });
});