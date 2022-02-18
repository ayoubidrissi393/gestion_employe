<?php 
    include "connexion.php";
    include "Nav_rech.php";
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
<table id="table_index" class="table table-dark table-striped">

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
        
        <!-- // recharger le donnes dans base donne  -->

        <?php 
                if(isset($_POST["search_btn"])){
                    $select = $_POST["select"];
                    $input = $_POST["search_input"];
                    
                    $sql = "SELECT * FROM employe
                    WHERE $select LIKE '%$input%'";
                    $result = $conn->query($sql);
                }
                else{
                    $result = $conn->query("Select * from employe");
                }

                // if($result >0){
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
                        echo "<td><a href='modifier.php?ID=$row[ID]&pic=$row[photo]'><img src=image/modifier.png ></a></td>";
                        echo "<td><a href='index.php?rn=$row[ID]' onClick=\"return confirm('confirmer le supression !!')\"><img src=image/supprimer.png></a></td>";
                        echo "</tr>";
                    }
                // }
                // foreach ($result as $key => $row) {
                //     echo "<tr>
                //     <td>" . $row["ID"] . "</td>
                //     <td>" . $row["Nom"] . "</td>
                //     <td>" . $row["Prenom"] . "</td>
                //     <td>" . $row["date_de_naissance"] . "</td>
                //     <td>" . $row["département"] . "</td>
                //     <td>" . $row["salaire"] . "</td>
                //     <td>" . $row["fonction"] . "</td>
                //     <td><img src=images/" . $row["photo"] . "></td>
                //     <td>
                //         <a class='btn btn-danger' href='deleteConfirm.php?ID=".$row["ID"]."'>Delete</a>
                //         <a class='btn btn-primary' href='edit.php?ID=".$row["ID"]."&photo=".$row["photo"]."'>Edit</a>
                //     </td>
                //     ";
                //     echo "</tr>";
                // }
            ?>
    


















        <!-- // $sql = "SELECT * FROM `employe`";
        // $result = mysqli_query($conn, $sql);
        // $resultCheck =mysqli_num_rows($result);

        // if($resultCheck >0){
        //     while($row = mysqli_fetch_assoc($result))
        //     {
        //         echo "<tr>";
        //         echo "<td>".$row["ID"]."</td>";
        //         echo "<td>".$row["Nom"]."</td>";
        //         echo "<td>".$row["Prenom"]."</td>";
        //         echo "<td>".$row["date_de_naissance"]."</td>";
        //         echo "<td>".$row["département"]."</td>";
        //         echo "<td>".$row["salaire"]."</td>";
        //         echo "<td>".$row["fonction"]."</td>";
        //         echo "<td><img src=image/" . $row["photo"] . "></td>";
        //         echo "<td><a href='modifier.php?ID=$row[ID]&pic=$row[photo]'><img src=image/modifier.png ></a></td>";
        //         echo "<td><a href='index.php?rn=$row[ID]' onClick=\"return confirm('confirmer le supression !!')\"><img src=image/supprimer.png></a></td>";
        //         echo "</tr>";
        //     }
        // } -->
       
    
   
</table>
</body>
</html>