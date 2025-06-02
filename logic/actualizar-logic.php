<?php
    if(isset($_POST["title-actualizar"]) && isset($_POST["description-actualizar"]) && isset($_POST["estado_actualizar"]) && isset($_POST["id-actualizar"])){

        // Obtener el id del task a actualizar
        $id = $_POST["id-actualizar"];

        // ? leer data
        $data = file_get_contents("../data/data.json");
        $tasks = json_decode($data,true);
        $tasks = $tasks["tasks"];

        // ? crear data
        $title = $_POST["title-actualizar"];
        $description = $_POST["description-actualizar"];
        $state = (int) $_POST["estado_actualizar"];

        // * Actualizar data
        foreach($tasks as &$task){
            if($task["id"] === $id){
                $task["title"] = $title;
                $task["description"]=$description;
                $task["state"]=$state;
            }
        }

        $res = ["tasks" => $tasks ];

        //? reescribir data
        file_put_contents("../data/data.json",json_encode($res,JSON_PRETTY_PRINT));

        //? crear alerta
        $alerta = [
            "titulo"=>"Tarea actualizada exitosamente",
            "texto"=>"'$title'",
            "icono"=>"success"
        ];

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