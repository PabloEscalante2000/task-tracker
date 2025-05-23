<main class="w-full min-h-dvh bg-slate-100 p-5 space-y-3 flex flex-col justify-center items-center gap-5">
    <h1 class="font-bold text-2xl">Create Task</h1>
    <form class="p-5 border shadow-sm max-w-full flex flex-col gap-3 rounded-sm shadow-sm" action="./logic/crear-logic.php" method="POST" id="form-crear">
        <label for="title">Tìtulo:</label>
        <input class="outline-none p-1 border rounded-sm shadow-sm" type="text" name="title-crear" id="title-crear" required/>
        <label for="description">Descripción:</label>
        <input class="outline-none p-1 border rounded-sm shadow-sm" type="text" name="description-crear" id="description-crear"/>
        <input class="px-3 py-1 font-bold cursor-pointer transition-all hover:scale-95 bg-green-500 rounded-sm shadow-sm border border-green-400" type="submit" value="Crear"/>
    </from>
</main>