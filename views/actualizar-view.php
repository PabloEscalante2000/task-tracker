<?php

    // obteniendo el array tasks
    $path = __DIR__ ."/../data/data.json";
    $json = file_get_contents($path);
    $tasks = json_decode($json,true);
    $tasks = $tasks["tasks"];

    //obteniedo el task que tenga el id
    $id = $url[1];
    foreach ($tasks as $task) {
        if($task["id"] === $id){
            $task_def = $task;
            break;
        }
    }
?>
<main class="w-full h-dvh flex justify-center items-center flex-col gap-3">
    <h1 class="font-bold text-2xl">Update Task</h1>
    <form class="p-5 border shadow-sm max-w-full flex flex-col gap-3 rounded-sm shadow-sm" action="/task-tracker/logic/actualizar-logic.php" method="POST" id="form-actualizar">
        <input type="hidden" value="<?= $task_def["id"] ?>" name="id-actualizar" />
        <label for="title">Tìtulo:</label>
        <input class="outline-none p-1 border rounded-sm shadow-sm" type="text" name="title-actualizar" id="title-actualizar" required value="<?= $task_def["title"] ?>"/>
        <label for="description">Descripción:</label>
        <input class="outline-none p-1 border rounded-sm shadow-sm" type="text" name="description-actualizar" value="<?= $task_def["description"] ?>" id="description-actualizar"/>
        <select class="px-3 py-1 text-lg border bg-slate-500 text-white transition-all cursor-pointer duration-300 hover:bg-slate-600 outline-none rounded-sm"  id="estado_actualizar" name="estado_actualizar">
            <option value="0" <?= $task_def["state"] == 0 ? "selected":""; ?>>Pendiente</option>
            <option value="1" <?= $task_def["state"] == 1 ? "selected":""; ?>>En Proceso</option>
            <option value="2" <?= $task_def["state"] == 2 ? "selected":""; ?>>Finalizado</option>
        </select>
        <input class="px-3 py-1 font-bold cursor-pointer transition-all hover:scale-95 bg-green-500 rounded-sm shadow-sm border border-green-400" type="submit" value="Actualizar"/>
    </from>
</main>