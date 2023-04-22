<?php

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['usuario'])) {
    die("Você não pode acessar esta página porque não está logado.<p><a href=\"view/login.php\">Entrar</a></p>");
}