function mostrarGimnasios(){
    event.preventDefault();

    let enlace = $(event.target);
    let valor = parseInt(enlace.text());

    $(event.target).addClass("active");
    axios.get('/mostrarGimnasios?page='+valor)
        .then(function(response){
            $("#mostrarGimnasiosPublico").html(response.data);
            asociarEventoAsincrono();
        }).catch(function (error) {
        console.log(error);
    });
}

function asociarEventoAsincrono(){
    $(".pagination > li > a").on("click",mostrarGimnasios);
}

$(function(){
    asociarEventoAsincrono();
});