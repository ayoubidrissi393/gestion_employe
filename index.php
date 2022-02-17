<?php 
    include "connexion.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<table  class="table table-dark table-striped">
            <tr>
                <th>ID</th>
                <th>nom</th>
                <th>prenom</th>
                <th>date-de-naissance</th>
                <th>département</th>
                <th>salaire</th>
                <th>fonction</th>
                <th>photo</th>
                <th></th>
                <th></th>
            </tr>
        <?php 

            // supprimer un element 
            // if(isset($_REQUEST['ID'])) {
            //     $id = $_REQUEST['ID'];
            //     $sqlDelete = "DELETE FROM employe WHERE ID = '$id' ";
            //     $conn->query($sqlDelete);
            // header("Location: select.php");


             if(isset($_GET['rn']))
             {
             $id = $_GET['rn'];
             $query = "DELETE FROM employe WHERE ID='" . $id . "'";
             $res = mysqli_query($conn, $query);
             if($res) {
            //  echo json_encode($res);
             }
              else {
             echo "Error: " . $sql . "" . mysqli_error($conn);
             }
            }
        // recharger le donnes dans base donne 
        $sql = "SELECT * FROM `employe`";
        $result = mysqli_query($conn, $sql);
        $resultCheck =mysqli_num_rows($result);

        if($resultCheck >0){
            while($row = mysqli_fetch_assoc($result))
            {
                echo "<tr>";
                echo "<td>".$row["ID"]."</td>";
                echo "<td>".$row["Nom"]."</td>";
                echo "<td>".$row["Prenom"]."</td>";
                echo "<td>".$row["date_de_naissance"]."</td>";
                echo "<td>".$row["département"]."</td>";
                echo "<td>".$row["salaire"]."</td>";
                echo "<td>".$row["fonction"]."</td>";
                echo "<td><img src=image/" . $row["photo"] . "></td>";
                echo "<td><a href='modifier.php?ID=$row[ID]'><img src=image/modifier.png ></a></td>";
                echo "<td><a href='index.php?rn=$row[ID]' onClick=\"return confirm('confirmer le supression !!')\"><img src=image/supprimer.png></a></td>";
                echo "</tr>";
            }
        }
       
    
   ?> 
</table>

</body>
</html>  
