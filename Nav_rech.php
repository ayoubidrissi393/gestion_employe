<?php 
    include "connexion.php";
    // include "rechercher.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="javascript:void(0)">Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
            <a class="nav-link" href="index.php">Accuiel</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="ajouter.php">Ajouter</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="rechercher.php">Rechercher</a>
            </li>
        </ul>
        <form class="d-flex">
        <div class="dropdown">
            <button type="select" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
            Rechercher un employé
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" value="" href="#">ID</a></li>
                <li><a class="dropdown-item" value="" href="#">Département</a> </li>
                <li><a class="dropdown-item" value="" href="#">Nom</a></li>
            </ul>
        </div>
            <input class="form-control me-2" name="search_input" type="text" placeholder="Search">
            <button class="btn btn-primary" name="search_btn" type="submit">Search</button>
        </form>
        </div>
    </div>
    </nav>

</body>
</html>