<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas | ForNow</title>
    
    <!-- IONIC -->
    <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core/css/ionic.bundle.css" />

    <link rel="stylesheet" href="view/assets/css/tarefas.css">
</head>
<body>
    <main>
        <h1>TAREFA</h1>
        <div class="linha"></div>

        <section>
            <form action="">
                <div class="tarefas-organizacao">
                    <div class="categoria-tarefa">
                        <p>CATEGORIA DA TAREFA</p>
                        <input type="button" name="estudos" class="botao-estudos">
                        <input type="hidden" name="categria-seletor" value="1">
                        <label for="estudos">Estudos</label>
                    </div>

                    <div class="tipos-de-tarefa">
                        <p>TIPO DA TAREFA</p>
                        <ion-radio-group allow-empty-selection="true" value="0">
                            <ion-radio name="recorrente" justify="start" labelPlacement="end" value="0">Única vez</ion-radio>
                            <ion-radio name="recorrente" justify="start" labelPlacement="end" value="1">Recorrente</ion-radio>
                        </ion-radio-group>
                    </div>
                </div>

                <div class="nome-tarefa">
                    <p>NOME DA TAREFA</p>
                    <input type="text" placeholder="Título da tarefa" class="titulo-tarefa" name="titulo">
                    <textarea type="text" placeholder="Descrição da tarefa" class="descricao-tarefa" name="descricao"></textarea>
                </div>
                
                <div class="conclusao-tarefa">
                    <p>CONCLUSÃO DA TAREFA</p>
                    <p style="font-size: 0.6rem; color: rgba(11, 140, 104, 0.75);">Selecione uma data clicando no calendário</p>
                    <?php 
                        $date = new DateTime();
                        $date->sub(new DateInterval('PT1M'));
                    ?>
                    <ion-datetime-button datetime="datetime"></ion-datetime-button>
                    <ion-modal>
                        <ion-datetime 
                            id="datetime"
                            locale="pt-br"
                            min="<?= $date->format('Y-m-d\TH:i:s');?>"
                            max="<?= date('Y') . '-12-31T23:59:59';?>"
                        >
                            <span slot="title">Selecione uma data e hora</span>
                        </ion-datetime>
                    </ion-modal>
                    <!-- presentation="time" -->
                </div>

                <div class="salvar-cancelar">
                    <input type="submit" value="SALVAR" class="salvar-tarefa">
                    <input type="button" value="CANCELAR" class="cancelar-tarefa">
                </div>
            </form>
        </section>
    </main>
</body>
</html>

<!-- TO DO
- Elaborar lógica de mudança da conclusão conforme o radio input
- Menu select de icons
- Ajustar tamanho dos input e datetimes
-->