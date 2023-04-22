<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ForNow | Cadastro</title>

    <link href="../vendor/bootstrap-5.2.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>   
    <header>
        <div class="branding">
            <p>ForNow</p>
            <img src="../view/assets/images/logo.png" alt="Logo" />
        </div>
    </header>
    <h1>CADASTRAR</h1>
    <div class="linha"></div>
    <form action="../controller/insert.php?cadastro" method="POST">
        <p>
            <input type="text" name="nome" placeholder="Nome">
        </p>
        <p>
            <input type="text" name="sobrenome" placeholder="Sobrenome">
        </p>
        <p>
            <input type="text" name="email" placeholder="E-mail">
        </p>
        <p class="password">
            <input type="password" name="senha" placeholder="Senha" />
            <input type="password" name="c-senha" placeholder="Confirmar Senha" />
            <div class="text-danger" id="password-alert" style="display: none;"></div>
        </p>

        <p class="form-button">
            <button type="submit">ENVIAR</button>
        </p>
        <p>
            <a href="./login.php">Já está cadastrado? Faça seu login!</a>
            <script src="../vendor/bootstrap-5.2.3/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
            <?php include('../src/verify_errors.php');?>
        </p>
    </form>


    <script>
        const password = document.querySelector('input[name="senha"]');
        const confirmPassword = document.querySelector('input[name="c-senha"]');
        const alertPassword = document.querySelector('#password-alert');
        
        function validatePassword() {
            if (password.value !== confirmPassword.value) {
                if(confirmPassword.value.trim() !== '') {
                    alertPassword.style.display = 'block';
                    alertPassword.innerHTML = 'As senha não são iguais!';
                }
                document.querySelector('button[type="submit"]').disabled = true;
            } else {
                alertPassword.style.display = 'none';
                alertPassword.innerHTML = '';
                document.querySelector('button[type="submit"]').disabled = false;
            }
        }
        
        password.addEventListener('change', validatePassword);
        confirmPassword.addEventListener('keyup', validatePassword);
    </script>
</body>
</html>