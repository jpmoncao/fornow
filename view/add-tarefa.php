<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/assets/css/home.css">
    <title>Add tarefas</title>
</head>
<body>
    <main style="margin-top: 12rem;">
        <form action="controller/insert.php?add-tarefa" method="POST" >
            <p>
                <label for="">categoria</label>
                <input type="number" name="categoria-seletor" id="categoria-seletor" value="1">
            </p>
            <p>
                <label for="titulo">titulo</label>
                <input type="text" name="titulo" id="titulo"> <br>
                <label for="descricao">descricao</label>
                <input type="text" name="descricao" id="descricao">
            </p>
            <p>
                <label for="recorrente">recorrente</label>
                <input type="radio" name="recorrente" id="recorrente" value="1"> <br>
                <label for="recorrente">Única vez</label>
                <input type="radio" name="recorrente" id="recorrente" value="0"> <br>
            </p>
            <p>
                <label for="data_conclusao">data_conclusao</label>
                <input type="date" name="data_conclusao" id="data_conclusao">
            </p>
            <p>
                <label for="dias_semana">dias_semana</label>
                <input type="text" name="dias_semana" id="dias_semana">
            </p>
            <input type="submit" value="Enviar">
        </form>
    </main>
</body>
</html>