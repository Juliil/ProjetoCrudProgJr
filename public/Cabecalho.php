<?php
/**
 * Este arquivo é o cabeçalho do projeto, nele contém todos as ancoras da navbar.
 */
require_once '../config/config.php';
?>

<html>
<head>
    <title>Flex Peak</title>

    <link rel="stylesheet" href="../public/js/bootstrap/css/bootstrap.css"/>
    <script type="text/javascript" src="../public/js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../public/js/jquery.maskedinput.js"></script>
    <script type="text/javascript" src="../public/js/scriptcep.js"></script>
    <script>
        $(function () {
            $('#dt_nascimento').mask('9999/99/99');
            $('#dt_criacao').mask('9999/99/99');
        })
    </script>
</head>
<body>

<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Painel</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="../curso/index.php">Cursos</a></li>
                <li><a href="../aluno/index.php">Alunos</a></li>
                <li><a href="../professor/index.php">Professores</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container" style="margin-top: 60px;">