<?php
    if(isset($_POST["title-actualizar"]) && isset($_POST["description-actualizar"]) && isset($_POST["estado_actualizar"]) && isset($_POST["id_actualizar"])){

        // Obtener el id del task a actualizar
        $id = $_POST["id_actualizar"];

        // ? leer data
        $data = file_get_contents("../data/data.json");
        $tasks = json_decode($data,true);
        $tasks = $tasks["tasks"];

        

    } else {
        //? crear alerta
        $alerta = [
            "titulo"=>"Hubo un error",
            "texto"=>"Hay datos inexistentes",
            "icono"=>"error"
        ];
    }

    //? Retornar JSON
    echo json_encode($alerta);
?>