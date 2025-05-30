
const formCrear = document.getElementById("form-crear")
if(formCrear){

    formCrear.addEventListener("submit",function(e){
        e.preventDefault();

        Swal.fire({
            title: "¿Estás seguro?",
            text: "¿Quieres realizar la acción solicitada?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, realizar",
            cancelButtonText: "No, cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                
                let data = new FormData(this);
                let method = this.getAttribute("method");
                let action = this.getAttribute("action");

                let encabezados = new Headers();

                let config = {
                    method: method,
                    headers:encabezados,
                    mode: "cors",
                    cache: "no-cache",
                    body: data
                }

                fetch(action,config)
                .then(respuesta => respuesta.json())
                .then(respuesta => {
                    alertas_ajax(respuesta)
                    if(respuesta.icono === "success"){
                        window.location.href = "http://localhost:8080/task-tracker/"
                        reescribirLista()
                    }
                });

            }
        });
    })

}

const formActualizar = document.getElementById("form-actualizar")
if(formActualizar){
    formActualizar.addEventListener("submit",function(e){
    e.preventDefault();

    Swal.fire({
        title: "¿Estás seguro?",
        text: "¿Quieres realizar la acción solicitada?",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, realizar",
        cancelButtonText: "No, cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            
            let data = new FormData(this);
            let method = this.getAttribute("method");
            let action = this.getAttribute("action");

            let encabezados = new Headers();

            let config = {
                method: method,
                headers:encabezados,
                mode: "cors",
                cache: "no-cache",
                body: data
            }

            fetch(action,config)
            .then(respuesta => respuesta.json())
            .then(respuesta => {
                alertas_ajax(respuesta)
                if(respuesta.icono === "success"){
                    window.location.href = "http://localhost:8080/task-tracker/"
                    reescribirLista()
                }
            });
        }
    });
})
}
function alertas_ajax(alerta){
    Swal.fire({
        icon:alerta.icono,
        title:alerta.titulo,
        text:alerta.texto,
        confirmButtonText:"Aceptar"
    });
}

function reescribirLista(){
    const lista = document.getElementById("lista-tasks");

    let method = "POST"
    let action = "./logic/leer-logic.php"

    let encabezados = new Headers();

    let config = {
        method: method,
        headers:encabezados,
        mode: "cors",
        cache: "no-cache"
    }

    fetch(action,config)
    .then(res => res.text())
    .then(html => lista.innerHTML=html)
    .catch(err => console.error(err))
}

function guardarSeleccion(valor) {
    console.log("cambio: " + valor)
    const tiempoExpira = new Date()
    tiempoExpira.setTime(tiempoExpira.getTime() + (60*60*1000)) // 1 hora

    document.cookie = "estado="+valor+";expires="+tiempoExpira.toUTCString() + ";path=/"

    reescribirLista()
}

function eliminarTask(boton){

    Swal.fire({
        title: "¿Estás seguro?",
        text: "¿Quieres eliminar la tarea seleccionada?",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, realizar",
        cancelButtonText: "No, cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            
            const data = new FormData();
            data.append("id",boton.dataset.id)

            let method = "POST"
            let action = "./logic/eliminar-logic.php"

            let encabezados = new Headers();

            let config = {
                method: method,
                headers:encabezados,
                mode: "cors",
                cache: "no-cache",
                body: data
            }

            fetch(action,config)
            .then(respuesta => {
                return respuesta.json()
            })
            .then(respuesta => {
                alertas_ajax(respuesta)
                if(respuesta.icono === "success"){
                    reescribirLista()
                }
            })
            .catch(err => console.log(err));

        }
    });
}