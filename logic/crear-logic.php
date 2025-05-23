<?php
    if(isset($_POST["title-crear"])){
        // ? leer data
        $data = file_get_contents("../data/data.json");
        $tasks = json_decode($data,true);
        $tasks = $tasks["tasks"];

        // ? crear data
        $id = uniqid();
        $title = $_POST["title-crear"];
        $description = $_POST["description-crear"];
        $state = 0;

        $task = [
            "id" => $id,
            "title" => $title,
            "description" => $description,
            "state" => 0
        ];

        $tasks[] = $task;

        $res = ["tasks" => $tasks ];

        //? reescribir data
        file_put_contents("../data/data.json",json_encode($res,JSON_PRETTY_PRINT));

        //? crear alerta
        $alerta = [
            "titulo"=>"Tarea creada exitosamente",
            "texto"=>"'$title'",
            "icono"=>"success"
        ];
    } else {
        //? crear alerta
        $alerta = [
            "titulo"=>"Hubo un error",
            "texto"=>"Tiene que haber un título",
            "icono"=>"error"
        ];
    }

    //? Retornar JSON
    echo json_encode($alerta);
?>