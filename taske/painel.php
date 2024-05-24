<?php
include ("verifica_login.php");
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/painel.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800,900" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="img/task.png">
    <title>Início</title>
</head>

<html>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo-details">
            <span class="logo_name">Task Explorer</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="#">
                    <i class='bx bxs-grid-alt'></i>
                    <!--Logo do inicio-->
                    <span class="link_name">Dashboard</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Category</a></li>

                </ul>
            </li>
            <li>
                <div class="iocn-links">
                    <a href="#">
                        <i class='bx bx-collection'></i>
                        <!--Logo do inicio-->
                        <span class="link_name">Preços</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">Planos</a></li>
                    <li><a href="precos.html">Gratuito</a></li>
                    <li><a href="precos.html">Pro</a></li>
                    <li><a href="precos.html">Empresa</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-links">
                    <a href="#">
                        <i class='bx bx-book-alt'></i>
                        <!--Logo-->
                        <span class="link_name">Posts</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">Posts</a></li>
                    <li><a href="#">Web Design</a></li>
                    <li><a href="#">Login Form</a></li>
                    <li><a href="#">Card Design</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <!--Logo do inicio-->
                    <span class="link_name">Analytics</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Analytics</a></li>
                </ul>
            </li>
            <!-- <li>
                    <a href="#">
                        <i class='bx bx-line-chart' ></i>
                        <span class="link_name">Chart</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="#">Chart</a></li>
                    </ul>
                </li>
                <li>
                    <div class="iocn-links">
                        <a href="#">
                            <i class='bx bx-plug' ></i>
                            <span class="link_name">Plugins</span>
                        </a>
                        <i class='bx bx-chevron-down arrow' ></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="#">Plugins</a></li>
                        <li><a href="#">Ui Face</a></li>
                        <li><a href="#">Pigments</a></li>
                        <li><a href="#">Box Icons </a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class='bx bx-compass' ></i>
                        <span class="link_name">Explore</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="#">Explore</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class='bx bx-history' ></i>
                        <span class="link_name">History</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="#">History</a></li>
                    </ul>
                </li> -->
            <li>
                <a href="#">
                    <i class='bx bx-cog'></i>
                    <!--Logo do inicio-->
                    <span class="link_name">Setting</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Setting</a></li>
                </ul>
            </li>
            <li>
                <div class="profile-details">
                    <div class="profile-content">
                        <img src="image/bg_main_home.png" alt="home">
                    </div>

                    <div class="name-job">
                        <div class="profile-name">Nome usuário</div>
                        <div class="job">Web Desginer</div>
                    </div>
                    <a href="index.html"><i class='bx bx-log-out'></i></a>
                </div>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <span class="text">Seus Quadros</span>
            <a class="botao_logout" href="logout.php">Sair</a>
        </div>


        <main>
            <section class="main_dashboard">
                <header class="main_dashboard_header">
                    <h1>Veja templates para começar seus projetos</h1>
                    <p>
                        Conheça alguns dos exemplos mais utilizados pelos usuários
                    </p>
                </header>

                <div class="dashboard_templates">
                    <article>
                        <a href="painel_tasks.php">
                            <img class="dashboard_templates_image" src="img/christian-lue-QcJ1XCc3gJo-unsplash.jpg"
                                alt="" draggable="false">
                        </a>
                    </article>
                    <article>
                        <a href="#">
                            <img class="dashboard_templates_image"
                                src="https://images.unsplash.com/photo-1714383524948-ebc87c14c0f1?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw0NHx8fGVufDB8fHx8fA%3D%3D"
                                alt="" draggable="false">
                        </a>
                    </article>
                    <article>
                        <a href="#">
                            <img class="dashboard_templates_image"
                                src="https://images.unsplash.com/photo-1714591755376-349fd01b41cb?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw2MHx8fGVufDB8fHx8fA%3D%3D"
                                alt="" draggable="false">
                        </a>
                    </article>
                    <article>
                        <a href="#">
                            <img class="dashboard_templates_image"
                                src="https://images.unsplash.com/photo-1714833890840-a3c4f446c194?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw2OHx8fGVufDB8fHx8fA%3D%3D"
                                alt="" draggable="false">
                        </a>
                    </article>
                    
                    <article>
                        <a href="project-create.php" class="novo_projeto">Novo Quadro</a>
                    </article>

                </div>
            </section>
        </main>




        <!-- JavaScript -->
        <script>
            let arrow = document.querySelectorAll(".arrow");
            for (var i = 0; i < arrow.length; i++) {
                arrow[i].addEventListener("click", (e) => {
                    let arrowParent = e.target.parentElement.parentElement;
                    arrowParent.classList.toggle("showMenu");
                });
            }

            let sidebar = document.querySelector(".sidebar");
            let sidebar8tn = document.querySelector(".bx-menu");
            console.log(sidebar8tn);
            sidebar8tn.addEventListener("click", () => {
                sidebar.classList.toggle("close");
            });

        </script>

</body>

</html>