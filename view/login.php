<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ForNow | Login</title>
    <link href="../vendor/bootstrap-5.2.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>   
    <h1>LOGIN</h1>
    <div class="linha"></div>
    <form action="../controller/get.php?login" method="POST" class="login">
        <p>
            <input type="text" name="email" placeholder="E-mail">
        </p>
        <p>
            <input type="password" name="senha" placeholder="Senha  ">
        </p>
        <p class="form-button" style="margin-bottom: 10rem;">
            <button type="submit">ENTRAR</button>
        </p>
        <p>
            <a href="./cadastro.php">Não possui uma conta? Crie uma clicando aqui!</a>
        </p>
            <script src="../vendor/bootstrap-5.2.3/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
            <?php include('../src/verify_errors.php');?>
    </form>
</body>
</html>