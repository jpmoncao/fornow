<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/assets/css/header.css">
    <link rel="stylesheet" href="view/assets/css/navbar.css">
</head>

<body>
    <?php
    session_start();

    if (!isset($_SESSION['usuario'])) {
        header('Location: view/login.php');
        exit;
    } else {
        include('src/protect.php');
        include("view/components/header.php");

        $usuario = $_SESSION['usuario'];

        if (isset($_GET['calendario'])) {
            include('view/calendario.php');
        } elseif (isset($_GET['tarefas'])) {
            include('view/tarefas.php');
        } elseif (isset($_GET['perfil'])) {
            include('view/perfil.php');
        } else {
            include('view/home.php');
        }

        include("view/components/navbar.php");
    }

    ?>

</body>

</html>