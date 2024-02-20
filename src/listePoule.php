<!DOCTYPE html>
<html>
<head>
    <title>Titre</title>
    <link rel="stylesheet" type="text/css" href="../css/StyleTournoi.css">
    <link rel="stylesheet" type="text/css" href="../css/menu_menu.css.css">
    <link rel="stylesheet" type="text/css" href="../asserts/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/poule.css">
    <link rel="stylesheet" type="text/css" href="../asserts/bootstrap.min.css">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <meta charset="utf-8">
    <script src="../scripts/bootstrap.js"></script>
    <script src="../scripts/bootstrap.bundle.min.js"></script>
    <script src="../scripts/jquery-3.4.1.min.js"></script>
    <script src="../scripts/bootstrap.bundle.js"></script>
    <script src="../scripts/jquery-3.4.1.min.js"></script>
    <script src="../scripts/drop.js"></script>
    <style>
        body 	{
            font-style: normal;
            font-weight: bold;
            font-family: "Arial";

        }
        .table-danger{
            border-radius: 10px 10px 0 0;
            border: 1px solid;
            color: black;
            font-size: 12;
        }

        .table-active{
            border-radius: 0 0 10px 10px;
            /* border-radius: 10px; */
        }
    </style>
</head>
<body>
<!-- HEADER -->
<div>
    <?php include('../ressources/header.php') ?>
</div>
<div>
    <?php include('../ressources/menu.php') ?>

</div>
<div>
    <?php include('../ressources/contenu.php'); ?>

    <?php
    // Include config file
    require_once("../config/database.php");

    // Define variables and initialize with empty values
    $pouleA = $pouleB = $pouleC = $pouleD =  "";
    //   $nom_err = $adresse_err = $airtel_err = "";
    $chaine = array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/"));


    // Processing form data when form is submitted


    ?>

    <div class=" justify-content-end">
        <div class="container-fluid">
            <div class=" row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2 style="text-align: center ">Association Madagascar Standard PLUS</h2>
                        <h2 style="text-align: center">Tournoi Coum 67 - 2019/2020</h2>
                        <br/>
                        <br/>
                        <h5 style="text-align: center">Liste Poule</h2>
                    </div>

<br/>
                    <br/>
                    <br/>
                    <?php
                    $sql = "SELECT * FROM poule";
                    if($result = $base->query($sql)){
                    if($result->num_rows > 0){
                    echo "<table  class='lignesEspacees'   >";

                        echo "<tr>";
                             echo "<th  class='table-danger '>GROUPE A</th>";
                             echo "<th class='table-danger'>GROUPE B</th>";
                             echo "<th  class='table-danger'>GROUPE C</th>";
                             echo "<th class='table-danger'>GROUPE D</th>";

                        echo "</tr>";

                        echo "<tbody>";

                        while($row = $result->fetch_array()){
                        echo "<tr>";
                            echo "<td class='table-active'>". mb_strtoupper($row['pouleA']) . "</td>";
                            echo "<td class='table-active'>" . mb_strtoupper($row['pouleB']) . "</td>";
                            echo "<td class='table-active'>" . mb_strtoupper($row['pouleC']) . "</td>";
                            echo "<td class='table-active'>" . mb_strtoupper($row['pouleD']) . "</td>";
                        echo "</tr>";

                }
                    } else{
                        echo "<p class='lead'><em>Aucun enregistrement.</em></p>";
                    }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . $base->error;
                    }

                    // Close connection
                    $base->close();
                echo "</tbody>";
                echo "</table>";
                // Free result set
                $result->free();
                //    $base->close();
?>
            </div>
        </div>

    </div>

</div>
</div>


</div>

</body>
</html>
