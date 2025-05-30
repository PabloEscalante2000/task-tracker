<?php
    $path = __DIR__ ."/../data/data.json";
    $json = file_get_contents($path);
    $tasks = json_decode($json,true);
    $tasks = $tasks["tasks"];
    if(isset($_COOKIE["estado"])){
        if($_COOKIE["estado"] !== "todos"){
            $estado_c = (int) $_COOKIE["estado"];
            $tasks = array_filter($tasks,function($task) use ($estado_c){
                return $task["state"] == $estado_c;
            });
        } 
    }

    if(count($tasks)> 0):

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
            <div class="flex justify-center items-center gap-5">
                <a class="w-20 h-10 rounded-sm shadow-sm bg-slate-500 text-white cursor-pointer block text-center flex justify-center items-center" href="http://localhost:8080/task-tracker/actualizar/<?php echo $task["id"] ?>">Cambiar</a>
                <button class="w-20 h-10 rounded-sm shadow-sm bg-red-500 text-white cursor-pointer block" onclick="eliminarTask(this)" data-id="<?php echo $task["id"] ?>">Eliminar</button>
            </div>
        </div>
    </div>
<?php 
    endforeach;
    else:
?>
    <div class="text-center text-xl text-slate-300 font-black">
        No hay tareas
    </div>
<?php
    endif;  
?>