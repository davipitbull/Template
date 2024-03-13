<?php
include_once "./config/conexao.php";
include_once "./config/constantes.php";
include_once "./func/func.php";

$return = conectar();

if (!isset($_SESSION['idadm'])) {

    header('location: login.php');
}

$currentPage = isset($_GET['page']) ? $_GET['page'] : 'main';
?>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>ADM</title>
</head>

<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
    }

    #sidebar {
        color: white;
        height: 100vh;
        width: 130px;
        position: fixed;
        z-index: 1;
        overflow-x: hidden;
        background-color: #111;
        transition: 0.5s;
        padding-top: 60px;
    }

    #sidebar a {
        color: white;
        padding: 15px;
        text-decoration: none;
        font-size: 18px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    #sidebar a:hover {
        color: #f1f1f1;
    }

    #content {
        margin-left: 130;   
        

    }

    #open-btn {
        cursor: pointer;
        background-color: #111;
        color: white;
        border: none;
        padding: 10px 15px;


    }

    @media (max-width: 768px) {
        #sidebar {
            padding-top: 15px;
        }

        #sidebar a {
            padding: 10px;
        }

        #open-btn {
            top: 10px;
            left: 10px;
        }
    }

    table {
        border-collapse: collapse;
        width: 80%;
        margin-top: 20px;
        margin-left: 20px;

    }

    th,
    td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 1px;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }
</style>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="adm.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sair.php">Sair</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Sanfona
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Acao</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div id="sidebar">

        <a href="?page=teste1">Teste1</a>
        <a href="?page=teste2">Teste2</a>
        <a href="?page=teste3">Teste3</a>
        <!-- Adicione mais links conforme necessário -->
    </div>



    <div id="content">

        <?php
        $page = isset($_GET['page']) ? $_GET['page'] : 'main';

        switch ($page) {
            case 'teste1':
                include "teste1.php";
                break;
            case 'teste2':
                include "teste2.php";
                break;
            case 'teste3':
                include "teste3.php";
                break;
                // Adicione mais casos conforme necessário

            default:
                include "main.php";
                break;
        }
        ?>

    </div>



    
    <script src="js/func.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>