<?php
    session_start();
    function verificaSeUsuarioEstaLogado()
    {
        return isset($_SESSION['usuario']);
    }

    function verificaSePerfilDiferenteDeUsuario()
    {
        return verificaSeUsuarioEstaLogado() && getTipoUsuario();
    }

    function getTipoUsuario() 
    {
        return isset($_SESSION['usuario']['tipo']) ? $_SESSION['usuario']['tipo'] : false;
    }

    function verificaSePerfilAdmin()
    {
        return verificaSeUsuarioEstaLogado() &&
        $_SESSION['usuario']['tipo']== 'ADMIN';
    }

    function verificaSePerfilAnalista()
    {
        return verificaSeUsuarioEstaLogado() &&
        $_SESSION['usuario']['tipo']== 'ANALISTA';
    }