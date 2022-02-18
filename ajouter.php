<?php 
    include "connexion.php";
    include "Navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
<body>
        <div class="container mt-3">
        <h2>Ajouter un Employe</h2>
        <form action="ajouter.php" method ="POST" enctype="multipart/form-data">
            <div class="mb-3 mt-3">
            <label >ID:</label>
            <input type="text" class="form-control" id="id" placeholder=" id" name="id">
            </div>

            <div class="mb-3">
            <label >Nom:</label>
            <input type="text" class="form-control" id="nom" placeholder=" nom" name="nom">
            </div>

            <div class="mb-3 mt-3">
            <label >Prenom:</label>
            <input type="text" class="form-control" id="prenom" placeholder=" prenom" name="prenom">
            </div>

            <div class="mb-3">
            <label >date-de-naissance:</label>
            <input type="date" class="form-control" id="date_N" placeholder=" date-de-naissance" name="date_N">
            </div>

            <div class="mb-3 mt-3">
            <label >département:</label>
            <input type="text" class="form-control" id="depar" placeholder="Enter département" name="depar">
            </div>

            <div class="mb-3">
            <label >salaire:</label>
            <input type="number" class="form-control" id="salaire" placeholder="Enter salaire" name="salaire">
            </div>

            <div class="mb-3 mt-3">
            <label >fonction:</label>
            <input type="text" class="form-control" id="fonction" placeholder="Enter fonction" name="fonction">
            </div>
            <input type="file" name="uploadfile">

            <button type="submit" value="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>


        <?php
      
        if(isset($_POST['submit']))
        {    
            $ID = $_POST['id'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $dateN = $_POST['date_N'];
            $depa = $_POST['depar'];
            $salire = $_POST['salaire'];
            $func = $_POST['fonction'];
            // $photo = $_POST['photo'];

            $fileName = $_FILES["uploadfile"]["name"];
            $tempName = $_FILES["uploadfile"]["tmp_name"];
            $folder = "image/" . $fileName;


            $sql = "INSERT INTO employe (`ID`, `Nom`, `Prenom`, `date_de_naissance`, `département`, `salaire`, `fonction`,`photo`)
             VALUES ('$ID', '$nom', '$prenom', '$dateN', '$depa', '$salire', '$func','$fileName');";

             // move the uploaded image into the folder: images
            if (move_uploaded_file($tempName, $folder))  {
                $msg = "Image uploaded successfully";
            }else{
                $msg = "Failed to upload image";
            }
            if (mysqli_query($conn, $sql)) {
                echo "New record has been added successfully !";
            }
            else {
                echo "Error: " . $sql . ":-" . mysqli_error($conn);
            }
            mysqli_close($conn);
        }
        ?>
</body>
</html>