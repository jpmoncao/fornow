<?php
session_start();

// Verifica se a requisição 'login' existe
if (isset($_REQUEST['login'])) {

    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';  

    // Verifica se o campo de e-mail foi preenchido
    if (strlen($_POST['email']) == 0) {
        $_SESSION['error_message'] = "Preencha seu e-mail!";
        header("Location: ../view/login.php");
        exit;
    }

    // Verifica se o campo de senha foi preenchido
    elseif (strlen($_POST['senha']) == 0) {
        $_SESSION['error_message'] = "Preencha sua senha!";
        header("Location: ../view/login.php");
        exit;
    } 

    else {
        // Inclui o arquivo config.php com a variável $conn
        require_once('../src/config.php');

        // Escapa o e-mail e a senha para evitar injeção de SQL
        $email = $conn->real_escape_string($_POST['email']);
        $senha = $conn->real_escape_string($_POST['senha']);

        // Prepara uma declaração SQL para selecionar o usuário com base no e-mail
        $stmt = $conn->prepare("SELECT * FROM usuario WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();

        // Obtém o resultado da declaração SQL
        $result = $stmt->get_result();

        // Se o usuário não foi encontrado
        if ($result->num_rows !== 1) {
            $_SESSION['error_message'] = "Usuário não encontrado!";
            header("Location: ../view/login.php");
            exit;
        }

        // Obtém os dados do usuário e o hash da senha armazenado no banco de dados
        $row = $result->fetch_assoc();
        $hash = $row['senha'];

        // Verifica se a senha informada é válida
        if (password_verify($senha, $hash)) {
            // Remove a senha do array
            unset($row['senha']);
            
            // Inicia a sessão
            $_SESSION['usuario'] = $row;

            // Redireciona para a página home.php
            header('Location: ../?home');
            exit;
        } else {
            $_SESSION['error_message'] = "Senha incorreta!";
            header("Location: ../view/login.php");
            exit;
        }
    }

    // Fecha a conexão com o banco de dados e a declaração SQL
    $stmt->close();
    $conn->close();
}
