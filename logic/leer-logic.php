<?php
    $json = file_get_contents("./data/data.json");
    $tasks = json_decode($json,true);
    $tasks = $tasks["tasks"];
    if(isset($_COOKIE["estado"]) || $_COOKIE["estado"]!=="todos"){
        $estado_c = (int) $_COOKIE["estado"];
        $tasks = array_filter($tasks,fn($task,$k) => $task["state"]==$estado_c,ARRAY_FILTER_USE_BOTH);
    }

    foreach ($tasks as $task):
?>
    <div class="border p-5 rounded-sm shadow-sm space-y-3 w-64 h-60 flex flex-col justify-between gap-3">
        <div class="space-y-3">
            <p class="text-xl font-bold"><?php echo $task["title"]; ?></p>
            <p class="line-clamp-3"><?php echo $task["description"]; ?></p>
        </div>
        <div class="space-y-3">
            <?php
                switch ($task["state"]):
                    case 0:
                        echo '<p class="text-slate-500">Estado: Pendiente</p>';
                        break;
                    case 1:
                        echo '<p class="text-yellow-500">Estado: En Proceso</p>';
                        break;
                    case 2:
                        echo '<p class="text-green-500">Estado: Finalizado</p>';
                        break;
                    endswitch;
            ?>
            <button class="px-3 py-1 rounded-sm shadow-sm bg-slate-500 text-white cursor-pointer">Cambiar</button>
            <button class="px-3 py-1 rounded-sm shadow-sm bg-red-500 text-white cursor-pointer">Eliminar</button>
        </div>
    </div>
<?php endforeach; ?>