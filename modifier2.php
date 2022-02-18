<?php 
  include "connexion.php";
 

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
<?php
         $photo=$_GET['pic'];
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
            
            $fileName = $_FILES["uploadfile"]["name"];
            $tempName = $_FILES["uploadfile"]["tmp_name"];
            $folder = "image/" . $fileName;
            if($fileName=="")
            {
                $fileName=$photo;
            }
            else{
                
            }
            // Requête de modification d'enregistrement
            $sql = "UPDATE `employe`
             SET `Nom`='$nom',`Prenom`='$prenom',`date_de_naissance`='$dateN',`département`='$depa',`salaire`=$salire,`fonction`='$func', `photo`='$fileName'
              WHERE ID='$id';";
             echo $sql;

            //   move the uploaded image into the folder: images
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
            
            header("location: index.php");
           
        }
        ?>
<div class="container mt-3">
        <h2>modifier un Employe</h2>
        <form action="modifier.php?ID=<?php echo $id . "pic=$photo" ?>" method ="POST" enctype="multipart/form-data">

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

            <div class="mb-3 mt-3">
            <label >Photo:</label>
            <?php echo "<img src=image/" . $row["photo"] . ">"?>
            <input type="file" name="uploadfile" >
            </div>

            <button type="submit" value="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>


       
</body>
</html>  
