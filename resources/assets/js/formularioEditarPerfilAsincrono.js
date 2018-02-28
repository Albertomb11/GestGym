function formularioEditarPerfil(){
    event.preventDefault();
    $(event.target).addClass("active");
    axios.get('/editarPerfil')
        .then(function(response){
            $("#formularioEditarPerfil").html(response.data);
            asociarEventoAsincrono();
            asociarvalidaciones();
        }).catch(function (error) {
        console.log(error);
    });
}

function asociarEventoAsincrono(){
    $("#formularioEditarPerfilBoton").on("click",formularioEditarPerfil);
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
    axios.post('/updatePerfil/validate',
        formData
    ).then(function (response) {
        $(target).parent().next(".spinner").removeClass("loader");
        switch (target.id) {
            case "name":
                gestionarErrores(target, response.data.name);
                break;
            case "surname":
                gestionarErrores(target, response.data.surname);
                break;
            case "email":
                gestionarErrores(target, response.data.email);
                break;
            case "movil":
                gestionarErrores(target, response.data.movil);
                break;
            case "website":
                gestionarErrores(target, response.data.website);
                break;
            case "about":
                gestionarErrores(target, response.data.about);
                break;
        }
    }).catch(function (error) {
        console.log(error);
    });
}

function asociarvalidaciones(){
    $("#name,#surname,#email,#movil,#website,#about").on('change', function (e) {
        validateTarget(e.target)
    });

    $("#botonFormularioEditarPerfil").click(function (e) {
        e.preventDefault();
        let enviarFormulario = true;
        let formData = new FormData;
        formData.append('name', $("#name").val());
        formData.append('surname', $("#surname").val());
        formData.append('email', $("#email").val());
        formData.append('movil', $("#movil").val());
        formData.append('website', $("#website").val());
        formData.append('about', $("#about").val());

        axios.post('/updatePerfil/validate', formData)
            .then(function (response) {
                if (gestionarErrores("#name", response.data.name)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#surname", response.data.surname)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#email", response.data.email)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#movil", response.data.movil)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#website", response.data.website)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#about", response.data.about)) {
                    enviarFormulario = false;
                }

                if (enviarFormulario === true){
                    $("#formEditarPerfil").submit();
                }
            });
    });
}