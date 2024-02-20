<!DOCTYPE html>
<html>
<head>
    <title>Titre</title>
    <link rel="stylesheet" type="text/css" href="../css/StyleTournoi.css">
    <link rel="stylesheet" type="text/css" href="../asserts/bootstrap.css">
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
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
<!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script> -->
        <script src="../scripts/bootstrap.js"></script>
        <script src="../scripts/bootstrap.bundle.min.js"></script>
        <script src="../scripts/jquery-3.4.1.min.js"></script>
        <script src="../scripts/bootstrap.bundle.js"></script>
        <script src="../scripts/jquery-3.4.1.min.js"></script>
        <script src="../scripts/drop.js"></script>
        <style type="text/css">
            .wrapper{
                width: 650px;
                margin: 0 auto;
            }
            .page-header h2{
                margin-top: 0;
            }
            table tr td:last-child a{
                margin-right: 15px;

            }
            table, tr, td, th, thead{
                border: 1px solid black;
                text-align: center;
            }
            table{
                border: 2px solid black;
                text-align: center;
                font-family: "times New Roman";
                font-size: medium;
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </head>
    <body>
    <div class="">
        <div class="container-fluid">
            <div class="test">
                <div class="">
                    <div class="page-header clearfix">

                        <h2 class="">Liste club détaillé</h2>

                    </div>
                    <style>
                        div.test{
                            padding-left: 10%;
                        }
                        h2{
                            text-align: center;

                        }
                        
                    </style>
                    <?php
                    // Include config file
                    require_once("../config/database.php");

                    // Attempt select query execution
                    $sql = "SELECT * FROM club";
                    if($result = $base->query($sql)){
                        if($result->num_rows > 0){
                            echo "<table class='table '>";
                            echo "<thead style='background:rgb(62, 228, 240)'>";
                            echo "<tr>";
                            echo "<th >Nom</th>";
                            echo "<th >Adresse</th>";
                            echo "<th >Telephone</th>";
                            echo "<th >Action</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";

                            while($row = $result->fetch_array()){
                                /**
                                 * echo '<pre>';
                                print_r($row);
                                echo '</pre>';
                                echo '<hr/>';

                                 */
                                 echo "<tr>";
                                echo "<td style='font-family:'Arial black'>" . mb_strtoupper($row['nomClub']) . "</td>";
                                echo "<td style='font-family:'Arial black'>" . mb_strtoupper($row['adresse']) . "</td>";
                                echo "<td style='font-family:'Arial black'>" . $row['airtel'] . "</td>";
                                echo "<td style='font-family:'Arial black'>";
                                echo "<div>";

                                echo "<a href='voirClub.php?id=". $row['id'] ."'
                            title='voir' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                echo "<a href='modifier_club.php?id=". $row['id'] ."'
                            title='modifier' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'>mod</span></a>";
                                echo "<a href='../src_club/supprimerClub.php?id=". $row['id'] ."'
                             title='supprimer' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'>sup</span></a>";
                                echo "</td>";
                                echo "</tr>";
                                echo "</div>";

                            }
                            echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            $result->free();
                        } else{
                            echo "<p class='lead'><em>Aucun enregistrement.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . $base->error;
                    }

                    // Close connection
                    $base->close();
                    ?>
                </div>
            </div>
        </div>
    </div>
    </body>
    </html>

</div>

</body>
</html>
