<?php
define('HOST', 'localhost');
//Ip do banco no mysql ex:127.0.0.1
define('USUARIO', 'root');
//Irá puxar o usuario padrão do banco
define('SENHA', '');
//Senha do banco de dados, como não definimos senha no banco deixamos vazio.
define('DB', 'db_task_explorer');
// nome do banco de dados.

$dsn = 'mysql:host=' . HOST . ';dbname=' . DB .';charset=utf8;';

$conexao = new PDO($dsn, USUARIO, SENHA, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);


/* 

<button type='button' class='btn-clear1'onclick='deletar".$task['id']."()'>Remover</button>
                            <script>
                                function deletar".$task['id']."(){
                                    if(confirm('Desejar Remover?') ){
                                        window.location = 'http://localhost/Task_Explorer_PCC_2024-main/taske/painel.php/task.php0?key=".$task['id'] . "';
                                    }
                                    return false;
                                }
                            </script>
*/
