<?php
    require_once "./autoload.php";
    if(isset($_GET["views"])){
        $url = explode("/",$_GET["views"]);
    } else {
        $url = ["index"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Task Tracker</title>
</head>
<body>
    <?php
        if($url[0] == "index" || $url[0] =="actualizar" || $url[0] == "crear"){
            require_once "./views/".$url[0]."-view.php";
        } else {
            require_once "./views/404-view.php";
        }
    ?>
    <script src="./js/ajax.js"></script>
    <script src="./js/list.js"></script>
</body>
</html>