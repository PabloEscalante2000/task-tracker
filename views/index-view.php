<main class="w-full min-h-dvh bg-slate-100 p-5 space-y-3">
    <h1 class="font-bold text-xl">Task Tracker</h1>
    <a class="w-fit block px-5 py-2 rounded-sm bg-slate-500 text-white transition-all hover:scale-95 border" href="http://localhost:8080/task-tracker/crear">Create New Task</a>
    <form>
        <label for="estado">Filtrar por estado: </label>
        <?php
            $estadoSeleccionado = $_COOKIE["estado"] ?? "todos"
        ?>
        <select class="px-3 py-1 text-lg border bg-slate-500 text-white transition-all cursor-pointer duration-300 hover:bg-slate-600 outline-none rounded-sm" onchange="guardarSeleccion(this.value)" id="estado" name="estado">
            <option value="todos" <?= $estadoSeleccionado == "todos" ? "selected":""; ?> >-- Todos --</option>
            <option value="0" <?= $estadoSeleccionado == "0" ? "selected":""; ?>>Pendiente</option>
            <option value="1" <?= $estadoSeleccionado == "1" ? "selected":""; ?>>En Proceso</option>
            <option value="2" <?= $estadoSeleccionado == "2" ? "selected":""; ?>>Finalizado</option>
        </select>
    </form>
    <div id="lista-tasks" class="flex gap-5 flex-wrap justify-center items-center">
        <?php require_once "./logic/leer-logic.php" ?>
</main>