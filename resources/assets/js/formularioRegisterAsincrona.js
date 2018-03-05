function formularioRegistro(){
    event.preventDefault();
    $("#loginVista").toggle();
    $(event.target).addClass("active");
    axios.get('/registro')
        .then(function(response){
            $("#formularioRegistro").html(response.data);
            asociarEventoAsincrono();
            asociarvalidaciones();
        }).catch(function (error) {
        console.log(error);
    });
}

function asociarEventoAsincrono(){
    $("#formularioRegistroBoton").on("click",formularioRegistro);
}

$(function(){
    asociarEventoAsincrono();
});

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
    axios.post('/register/validate',
        formData
    ).then(function (response) {
        $(target).parent().next(".spinner").removeClass("loader");
        switch (target.id) {
            case "username":
                gestionarErrores(target, response.data.username);
                break;
            case "email":
                gestionarErrores(target, response.data.email);
                break;
        }
    }).catch(function (error) {
        console.log(error);
    });
}

function asociarvalidaciones(){
    $("#username,#email").on('change', function (e) {
        validateTarget(e.target)
    });

    $("#botonFormularioRegistro").click(function (e) {
        e.preventDefault();
        let enviarFormulario = true;
        let formData = new FormData;
        formData.append('username', $("#username").val());
        formData.append('email', $("#email").val());

        axios.post('/register/validate', formData)
            .then(function (response) {
                if (gestionarErrores("#username", response.data.username)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#email", response.data.email)) {
                    enviarFormulario = false;
                }

                if (enviarFormulario === true){
                    $("#formRegistro").submit();
                }
            });
    });
}