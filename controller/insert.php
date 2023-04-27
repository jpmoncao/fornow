<?php
session_start();

if(isset($_REQUEST['cadastro'])) {
    // Inclui o arquivo config.php com a variável $conn
    require_once('../src/config.php');

    // Verifica se todos os campos obrigatórios foram preenchidos
    if (empty($_POST['nome']) || empty($_POST['sobrenome']) || empty($_POST['email']) || empty($_POST['senha'])) {
        // Algum campo obrigatório não foi preenchido, exibe mensagem de erro
        $_SESSION['error_message'] = "Por favor, preencha todos os campos obrigatórios.";
        header("Location: ../view/cadastro.php");
        exit();
    }

    // Limpa e valida os dados recebidos
    $nome = trim(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));
    $sobrenome = trim(filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));

    // Verifica se o email já está cadastrado no banco de dados
    $sql_verifica_email = "SELECT * FROM usuario WHERE email = ?";
    $stmt_verifica_email = $conn->prepare($sql_verifica_email);
    $stmt_verifica_email->bind_param("s", $email);
    $stmt_verifica_email->execute();
    $result_verifica_email = $stmt_verifica_email->get_result();

    if ($result_verifica_email->num_rows > 0) {
        // O email já está cadastrado, exibe mensagem de erro
        $_SESSION['error_message'] = "Este email já está cadastrado.";
        header("Location: ../view/cadastro.php");
        exit();
    }

    // Verificações de senha forte
    $senha = $_POST['senha'];
    $c_senha = $_POST['c-senha']; 

    if (strlen($senha) < 8) {
        // Senha tem menos de 8 caracteres
        $_SESSION['error_message'] = "A senha deve ter pelo menos 8 caracteres.";
        header("Location: ../view/cadastro.php");
        exit();
    } elseif (!preg_match('/[A-Z]/', $senha)) {
        // Senha não contém letra maiúscula
        $_SESSION['error_message'] = "A senha deve ter pelo menos menos uma letra maiúscula.";
        header("Location: ../view/cadastro.php");
        exit();
    } elseif (!preg_match('/[a-z]/', $senha)) {
        // Senha não contém letra minúscula
        $_SESSION['error_message'] = "A senha deve conter pelo menos uma letra minúscula.";
        header("Location: ../view/cadastro.php");
        exit();
    } elseif (!preg_match('/[0-9]/', $senha)) {
        // Senha não contém número
        $_SESSION['error_message'] = "A senha deve conter pelo menos um número.";
        header("Location: ../view/cadastro.php");
        exit();
    } elseif (!preg_match('/[!@#$%^&*()_+{}[\]:;<>?,.\/-]/', $senha)) {
        // Senha não contém caractere especial
        $_SESSION['error_message'] = "A senha deve conter pelo menos um caractere especial.";
        header("Location: ../view/cadastro.php");
        exit();
    } elseif ($senha !== $c_senha) { 
        $_SESSION['error_message'] = "As senha não são iguais!";
        header("Location: ../view/cadastro.php");
        exit;
    }
    
    // Limpa e valida a senha recebida
    $senha = password_hash(trim($_POST['senha']), PASSWORD_DEFAULT);

    // Prepara a instrução SQL para inserção
    $sql_insere_usuario = "INSERT INTO usuario (id, nome, sobrenome, email, senha) VALUES (null, ?, ?, ?, ?)";

    // Prepara a declaração SQL com placeholders (?)
    $stmt_insere_usuario = $conn->prepare($sql_insere_usuario);

    // Vincula os parâmetros aos placeholders
    $stmt_insere_usuario->bind_param("ssss", $nome, $sobrenome, $email, $senha);

    // Executa a instrução SQL de inserção
    if ($stmt_insere_usuario->execute()) {
        // Redireciona para a página de login
        header('Location: ../view/login.php');
        exit();
    } else {
        // Exibe uma mensagem de erro caso ocorra algum problema na inserção
        $_SESSION['error_message'] = "Erro ao cadastrar usuário: " . $conn->error;
        header("Location: ../view/login.php");
        exit();
    }

    // Fecha a conexão com o banco de dados
    $stmt_verifica_email->close();
    $stmt_insere_usuario->close();
    $conn->close();
}
// } elseif(isset($_REQUEST['add-tarefa'])) {
//     // inclui o arquivo config.php com a variável $conn
//     require_once('../src/config.php');

//     // Obtém as informações da sessão do usuário
//     $usuario = $_SESSION['usuario'];
//     $usuario_id = $usuario['id'] ?? '';
//     $categoria_id = $_POST['categoria-seletor'] ?? '';
//     $titulo = $_POST['titulo'] ?? '';
//     $descricao = $_POST['descricao'] ?? '';
//     $data_conclusao = $_POST['data_conclusao'] ?? '';
//     $horario = $_POST['horario'] ?? '';
//     $recorrente = $_POST['recorrente'] ?? '';
//     $dias_semana = $_POST['dias_semana'] ?? '';
//     $concluida = $_POST['concluida'] ?? '';

//     // Verifica se há dados faltando
//     if(empty($categoria_id) || empty($titulo) || empty($descricao) || empty($horario) || empty($data_conclusao) || empty($recorrente) || ($recorrente == 1 && empty($dias_semana))) {
//         $_SESSION['error_message'] = "Por favor, preencha todos os campos.";
//         header("Location: ../view/tarefas.php");
//         exit();
//     }

//     // Prepara a instrução SQL para inserção
//     if($recorrente === "1") {
//         $sql_insere_tarefa = "INSERT INTO tarefa (id, usuario_id, categoria_id, titulo, descricao, horario, data_conclusao, recorrente, dias_semana, concluida) VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?, 0)";
//     } else {
//         $sql_insere_tarefa = "INSERT INTO tarefa (id, usuario_id, categoria_id, titulo, descricao, horario, recorrente, concluida) VALUES (null, ?, ?, ?, ?, ?, ?, ?, 0)";
//     }

//     // Prepara a declaração SQL com placeholders (?)
//     $stmt_insere_tarefa = $conn->prepare($sql_insere_tarefa);

//     // Vincula os parâmetros aos placeholders
//     if($recorrente === "1") {
//         $stmt_insere_tarefa->bind_param("iissssisi", $usuario_id, $categoria_id, $titulo, $descricao, $data_conclusao, $recorrente, $dias_semana, $concluida);
//     } else {
//         $stmt_insere_tarefa->bind_param("iissssii", $usuario_id, $categoria_id, $titulo, $descricao, $data_conclusao, $recorrente, $concluida);
//     }

//     // Executa a instrução SQL de inserção
//     if ($stmt_insere_tarefa->execute()) {
//         // Redireciona para a página de tarefas
//         header('Location: ../view/tarefas.php');
//         exit();
//     } else {
//         // Exibe uma mensagem de erro caso ocorra algum problema na inserção
//         $_SESSION['error_message'] = "Erro ao cadastrar tarefa: " . $conn->error . ". Tente novamente mais tarde!";
//         header("Location: ../view/tarefas.php");
//         exit();
//     }

//     // Encerra a conexão com o banco de dados
//     $conn->close();
