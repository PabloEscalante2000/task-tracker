<?php
    if(isset($_POST["id"])){
        $id = $_POST["id"];

        // leer data
        $data = file_get_contents("../data/data.json");
        $tasks = json_decode($data,true);
        $tasks = $tasks["tasks"];

        // reescribir data
        $tasks = array_filter($tasks,fn($task) => $task["id"] !== $id);

        $res = ["tasks" => $tasks ];

        // actualizar data
        file_put_contents("../data/data.json",json_encode($res,JSON_PRETTY_PRINT));

        // crear alerta
        $alerta = [
            "titulo"=>"Tarea eliminada exitosamente",
            "texto"=>"Tu tarea fue eliminada",
            "icono"=>"success"
        ];
    } else {
        // crear alerta
        $alerta = [
            "titulo"=>"Hubo un error",
            "texto"=>"Contacte con TI",
            "icono"=>"error"
        ];
    }

    //? Retornar JSON
    echo json_encode($alerta);
?>