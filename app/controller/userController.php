<?php
require_once '../app/models/User.php';

class UserController {
    public function home() {
        header('Location: http://localhost/p/fornow/app/view/home.php');
    }

    public function login() {
        // exibir formulário de login ou processar dados do formulário
    }

    public function register() {
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Se o campo estiver definido
            if (isset($_POST['nome'] && isset($_POST['sobrenome'] && isset($_POST['email'] && isset($_POST['senha'])) {

                // Se o campo não estiver vazio
                if (!empty(isset($_POST['nome']) && !empty(isset($_POST['sobrenome']) && !empty(isset($_POST['email']) && !empty(isset($_POST['senha']))) {

                    // Se o email for válido
                    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

                        // Se a senha tiver 8 ou mais caracteres
                        if(strlen($_POST['senha']) >= 8){
                            
                            // Se a senha for forte
                            if(preg_match('/[!@#$%^&*()]/', $_POST['senha']) && ctype_upper($_POST['senha']) && ctype_lower($_POST['senha']) && preg_match('/\d/', $_POST['senha'])){
                                $nome = $_POST['nome'];
                                $sobrenome = $_POST['sobrenome'];
                                $email = $_POST['email'];
                                $senha = $_POST['senha'];

                                session_start();
                                $_SESSION['user'] = $nome;
                                header('Location: http://localhost/p/fornow/public/index.php?action=home');
                            } else {
                                ?>
                                    <script>alert('SUA SENHA É FRACA!\nInsira pelo menos um símbolo, um número, letras maiúsculas e minúsculas.');</script>
                                <?php
                                return;
                            }
                        } else {
                            ?>
                                <script>alert('Erro: Sua senha deve conter 8 ou mais caracteres!');</script>
                            <?php
                            return;
                        }  
                    } else {
                        ?>
                            <script>alert('ERRO: Formato de email inválido!');</script>
                        <?php
                        return;
                    }

                } else {
                    ?>
                        <script>alert('ERRO: Campo vazio!');</script>
                    <?php
                    return;
                }
                
            } else {
                ?>
                    <script>alert('ERRO: Campo não definido!');</script>
                <?php
                return;
            }
        } else {
            require('../view/cadaster.php')
        }

    }

    public function profile() {
        // exibir página de perfil do usuário
    }
}
?>
