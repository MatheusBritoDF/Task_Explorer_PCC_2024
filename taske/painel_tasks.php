<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/painel-tasks.css">
    <script src="js/drag.js" defer></script>
    <script src="js/todo.js" defer></script>
</head>
<body>
    <div class="menu_board">
        <p>Task Explorer</p>
        <a href="painel.php">Visualizar seus Quadros</a>
    </div>
    <div class="board">

        <form action="" id="todo-form">
            <input type="text" placeholder="Nova Tarefa" id="todo-input"/>
            <button type="submit">Adicionar +</button>
        </form>

        <div class="lanes">

            <div class="swim-lane" id="todo-lane" data-id-lista="1">
                <h3 class="heading">A Fazer</h3>
            </div>

            <div class="swim-lane" data-id-lista="2" >
                <h3 class="heading">Fazendo</h3>

            </div>

            <div class="swim-lane" data-id-lista="3" >
                <h3 class="heading">Concluído</h3>

            </div>

        </div>

    </div>
</body>
</html>
