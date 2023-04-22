<?php

$usuario = 'root';
$senha = '123456';
$database = 'fornow';
$host = 'localhost';

$conn = new mysqli($host, $usuario, $senha, $database);
        
// Verificar conexão
if ($conn->connect_error) {
    die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
}