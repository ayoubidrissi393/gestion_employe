<?php 
  include "connexion.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
           // Réecriture des variables
           if(isset($_REQUEST['ID'])) {
            $id = $_REQUEST['ID'];
            $sqlSelect = "SELECT * FROM employe WHERE ID = '$id' ";
            $result = $conn->query($sqlSelect);
            $row = $result -> fetch_array(MYSQLI_ASSOC);
        }
        if(isset($_POST['submit']))
        {    
            $id = $_REQUEST['ID'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $dateN = $_POST['date_N'];
            $depa = $_POST['depar'];
            $salire = $_POST['salaire'];
            $func = $_POST['fonction'];
            // Requête de modification d'enregistrement
            $sql = "UPDATE `employe`
             SET `Nom`='$nom',`Prenom`='$prenom',`date_de_naissance`='$dateN',`département`='$depa',`salaire`=$salire,`fonction`='$func'
              WHERE ID='$id';";
              echo $sql;
            if (mysqli_query($conn, $sql)) {
                echo "New record has been added successfully !";
            }
            else {
                echo "Error: " . $sql . ":-" . mysqli_error($conn);
            }
            mysqli_close($conn);
            header("location: index.php");
        }
        ?>
<div class="container mt-3">
        <h2>modifier un Employe</h2>
        <form action="modifier.php?ID=<?php echo $id ?>" method ="POST">
            

            <div class="mb-3">
            <label >Nom:</label>
            <input type="text" class="form-control" id="nom" placeholder=" nom" name="nom" value="<?php echo $row["Nom"] ?>">
            </div>

            <div class="mb-3 mt-3">
            <label >Prenom:</label>
            <input type="text" class="form-control" id="prenom" placeholder=" prenom" name="prenom" value="<?php echo $row["Prenom"] ?>" >
            </div>

            <div class="mb-3">
            <label >date-de-naissance:</label>
            <input type="date" class="form-control" id="date_N" placeholder=" date-de-naissance" name="date_N" value="<?php echo $row["date_de_naissance"] ?>" >
            </div>

            <div class="mb-3 mt-3">
            <label >département:</label>
            <input type="text" class="form-control" id="depar" placeholder="Enter département" name="depar" value="<?php echo $row["département"] ?>" >
            </div>

            <div class="mb-3">
            <label >salaire:</label>
            <input type="number" class="form-control" id="salaire" placeholder="Enter salaire" name="salaire" value="<?php echo $row["salaire"] ?>" >
            </div>

            <div class="mb-3 mt-3">
            <label >fonction:</label>
            <input type="text" class="form-control" id="fonction" placeholder="Enter fonction" name="fonction" value="<?php echo $row["fonction"] ?>" >
            </div>

            <button type="submit" value="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>


       
</body>
</html>  
