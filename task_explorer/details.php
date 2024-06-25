x'<?php

session_start();

require __DIR__ . '/connect.php';
include 'models/database/dao/kanbandao.php';
// include 'models/database/dao/tarefadao.php';


$stmt = $conn->prepare("SELECT * FROM tasks WHERE id = :id");
$stmt->bindParam(':id', $_GET['key']);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

$_SESSION['id_task'] = $_GET ['key'];

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/painel.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/styleg1.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800,900" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="img/task.png">
    <script src="js/drag.js" defer></script>
    <script src="js/todo.js" defer></script>
    <title>Gerenciador de Tarefas</title>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo-details">
            <img src="img/taske2-andre-lindo.png" alt="">
            <span class="logo_name">Task Explorer</span>
        </div>
        <ul class="nav-links">

            <li>
                <div class="iocn-links">
                    <a class="link_as_button" href="funcoes.html">
                        <i class='bx bxs-home'></i>
                        <!--Logo do inicio-->
                        <span class="link_name">Funções</span>
                    </a>
                </div>
            </li>

            <li>
                <div class="iocn-links">
                    <a class="link_as_button" href="suporte.html">
                        <i class='bx bx-help-circle'></i>
                        <!--Logo do inicio-->
                        <span class="link_name">Suporte</span>
                    </a>
                </div>
            </li>

            <li>
                <div class="profile-details">
                    <div class="nome">
                        <?php if (!isset($_SESSION['usuario'])) {
                            header("Location: login.php");
                            exit();
                        }
                        echo "Olá, " . ucfirst($_SESSION['usuario']['nome']) . "!"; ?>

                    </div>
                    <a href="logout.php"><i class='bx bx-log-out'></i></a>
                </div>
            </li>
        </ul>
    </div>
    <!-- FIM SIDERBAR -->
    <div class="logo-voltar">
        <a href="painel.php"><button class="btn-voltar">Voltar</button></a>
    </div>
    <div class="details-container">
        <div class="header2">

            <h1>
                <?php echo isset($data[0]['task_name']) ? $data[0]['task_name'] : ''; ?>
            </h1>
        </div>

        <div class="row">
            <div class="details">
                <dl>
                    <dt>Descrição da Tarefa:</dt>
                    <dd>
                        <?php echo isset($data[0]['task_description']) ? $data[0]['task_description'] : ''; ?>
                    </dd>


                    <dt>Data da Tarefa:</dt>
                    <dd>
                        <?php echo isset($data[0]['task_date']) ? $data[0]['task_date'] : ''; ?>
                    </dd>


                </dl>
            </div>
            <div class="image">
                <?php if (isset($data[0]['task_image'])): ?>
                <img src="uploads/<?php echo $data[0]['task_image'] ?>" alt="">
                <?php endif; ?>

            </div>

        </div>
        <div class="footer">
            <p>Gerenciamento Task Explore</p>
        </div>
        <!--</div>-->


        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

        <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');


        body {
            background: #1a0f3d ;
        }

        html{
            background: #1a0f3d;
        }

        .box{
            background: #1a0f3d ;
        }

        .main {
            background:#1a0f3d ;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin-left:300px;
        }


        .todo-container {
            /*box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;*/
            width: 1000px;
            height: 60vh;
            display: flex;
            border: 5px solid #ccc;
            border-radius: 5px;
        }

        .status {
            width: 25%;
            background: linear-gradient(135deg,
                    rgba(255, 255, 255, 0.1),
                    rgba(255, 255, 255, 0));
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 5px;
            border: 3px solid #fff;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
            position: relative;
            padding: 60px 1rem 0.5rem;
        }

        .status:nth-child(even) {
            background-color: #ccc;
        }

        .status h2 {
            position: absolute;
            top: 0;
            left: 0;
            text-align: center;
            /*background-color: #343434;*/
            font-size: 30px;
            color: #f3f3f3;
            margin: 0;
            width: 100%;
            padding: 0.5rem 1rem;
        }

        .todo {
            position: relative;
            background-color: #fff;
            box-shadow: rgba(15, 15, 15, 0.1) 0px 0px 0px 1px,
                rgba(15, 15, 15, 0.1) 0px 2px 4px;
            border-radius: 4px;
            padding: 0.5rem 1rem;
            font-size: 1.1rem;
            margin: 0.5rem 0;
            text-transform: capitalize;
        }

        .todo .close {
            position: absolute;
            right: 1rem;
            top: 0.4rem;
            font-size: 2rem;
            color: rgb(228, 18, 18);
            cursor: pointer;
            background: #fff;
        }



        .todo .close:hover {
            color: red;
        }
        </style>

        </head>
    </div>
    <div class="box">
        <div class="main">

            <!--<h1>To-Do List in Kanban Board</h1>-->

            <!-- Modal -->
            <div class="modal fade" id="addListModal" tabindex="-1" aria-labelledby="addList" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="border: 2px solid white; border-radius: 10px;">
                            <h5 class="modal-title" id="addList" style="color: white;">Adicione tarefa!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="border: 2px solid white; border-radius: 10px;">
                            <form action="add-todo.php" method="POST">
                                <div class="form-group">
                                    <label for="list" style="color: white;">Nome:</label>
                                    <input type="text" class="form-control" id="list" name="list">
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
                                    <button type="submit" class="btn btn-dark">Adicionar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Todo -->
            <?php
                include ('conn.php');
                $id_task = $_SESSION ["id_task"];
                 
                $stmt = $conn->prepare("SELECT * FROM tbl_list  where id_task = :id_task");
                $stmt->bindParam(':id_task', $_SESSION['id_task'], PDO::PARAM_INT);
                $stmt->execute();



                $result = $stmt->fetchAll();


                
            ?>
            
            <div class="todo-container">
    <div class="status" id="status-0" ondrop="drop(event)" ondragover="allowDrop(event)">
        <h2 style="background: #1caf1c;">A Fazer</h2>
        <button class="btn btn-dark form-control" data-toggle="modal" data-target="#addListModal">Adicionar tarefas</button>

        <?php foreach ($result as $row) : ?>
            
            <?php if ($row['painel'] == '0'): ?>
                <div class="todo" draggable="true" ondragstart="drag(event)" id="todo-<?= $row['id'] ?>">
                    <input type="hidden" id="listId-<?= $row['id'] ?>" value="<?= $row['list'] ?>">
                    <span style="background: #fff;" id="list-<?= $row['id'] ?>">
                        <?= $row['list'] ?>
                    </span>
                    <span class="close" onclick="deleteList(<?= $row['id'] ?>)">&times;</span>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

    <div class="status" id="status-1" ondrop="drop(event)" ondragover="allowDrop(event)">
        <h2 style="background: #1caf1c;">Fazendo</h2>
        <?php foreach ($result as $row) : ?>
            <?php if ($row['painel'] == '1'): ?>
                <div class="todo" draggable="true" ondragstart="drag(event)" id="todo-<?= $row['id'] ?>">
                    <input type="hidden" id="listId-<?= $row['id'] ?>" value="<?= $row['list'] ?>">
                    <span style="background: #fff;" id="list-<?= $row['id'] ?>">
                        <?= $row['list'] ?>
                    </span>
                    <span class="close" onclick="deleteList(<?= $row['id'] ?>)">&times;</span>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

    <div class="status" id="status-2" ondrop="drop(event)" ondragover="allowDrop(event)">
        <h2 style="background: #1caf1c;">Em Teste</h2>
        <?php foreach ($result as $row) : ?>
            <?php if ($row['painel'] == '2'): ?>
                <div class="todo" draggable="true" ondragstart="drag(event)" id="todo-<?= $row['id'] ?>">
                    <input type="hidden" id="listId-<?= $row['id'] ?>" value="<?= $row['list'] ?>">
                    <span style="background: #fff;" id="list-<?= $row['id'] ?>">
                        <?= $row['list'] ?>
                    </span>
                    <span class="close" onclick="deleteList(<?= $row['id'] ?>)">&times;</span>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

    <div class="status" id="status-3" ondrop="drop(event)" ondragover="allowDrop(event)">
        <h2 style="background: #1caf1c;">Concluído</h2>
        <?php foreach ($result as $row) : ?>
            <?php if ($row['painel'] == '3'): ?>
                <div class="todo" draggable="true" ondragstart="drag(event)" id="todo-<?= $row['id'] ?>">
                    <input type="hidden" id="listId-<?= $row['id'] ?>" value="<?= $row['list'] ?>">
                    <span style="background: #fff;" id="list-<?= $row['id'] ?>">
                        <?= $row['list'] ?>
                    </span>
                    <span class="close" onclick="deleteList(<?= $row['id'] ?>)">&times;</span>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>


        

            <div id="overlay"></div>

        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

    <script>
    const todos = document.querySelectorAll(".todo");
    const all_status = document.querySelectorAll(".status");
    let draggableTodo = null;

    todos.forEach((todo) => {
        todo.addEventListener("dragstart", dragStart);
        todo.addEventListener("dragend", dragEnd);
    });

    function dragStart() {
        draggableTodo = this;
        setTimeout(() => {
            this.style.display = "none";
        }, 0);
        console.log("dragStart");
    }

    function dragEnd() {
        draggableTodo = null;
        setTimeout(() => {
            this.style.display = "block";
        }, 0);
        console.log("dragEnd");
        let elemento = document.getElementById('listID');
    }

    all_status.forEach((status) => {
        status.addEventListener("dragover", dragOver);
        status.addEventListener("dragenter", dragEnter);
        status.addEventListener("dragleave", dragLeave);
        status.addEventListener("drop", dragDrop);
    });

    function dragOver(e) {
        e.preventDefault();
    }

    function dragEnter() {
        this.style.border = "1px dashed #ccc";
        console.log("dragEnter");
    }

    function dragLeave() {
        this.style.border = "none";
        console.log("dragLeave");
    }

    function dragDrop() {
        this.style.border = "none";
        this.appendChild(draggableTodo);
        console.log("dropped");
    }

    function deleteList(id) {
        if (confirm("Tem certeza que deseja DELETAR a tarefa?")) {
            window.location = "delete-todo.php?list=" + id;
        }
    }
    </script>

<script>
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    var element = document.getElementById(data);
    ev.target.appendChild(element);

    // Atualizar no banco de dados
    var listId = element.id.split('-')[1];
    var painel = ev.target.id.split('-')[1];

    updateListPainel(listId, painel);
}

function updateListPainel(listId, painel) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "update_painel.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
        }
    };
    xhr.send("id=" + listId + "&painel=" + painel);
}
</script>

</body>

</html>
