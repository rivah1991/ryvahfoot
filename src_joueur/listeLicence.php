<!DOCTYPE html>
<html>
<head>
    <title>Titre</title>

    <link rel="stylesheet" type="text/css" href="../css/StyleTournoi.css">
    <link rel="stylesheet" type="text/css" href="../asserts/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../asserts/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../asserts/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="../asserts/jquery.dataTables.min.css">
    <//cdn.datatables.net/plug-ins/1.10.22/integration/font-awesome/dataTables.fontAwesome.css
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <meta charset="utf-8">
    <script src="../scripts/bootstrap.js"></script>
    <script src="../scripts/bootstrap.bundle.min.js"></script>
    <script src="../scripts/jquery-3.4.1.min.js"></script>
    <script src="../scripts/bootstrap.bundle.js"></script>
    <script src="../scripts/jquery-3.4.1.min.js"></script>
    <script src="../scripts/drop.js"></script>
    <script src="../scripts/jquery.dataTables.js"></script>
    <script src="../scripts/jquery.dataTables.min.js"></script>


    <style>
        body 	{
            font-style: normal;
            font-weight: bold;
            font-family: "Arial";

        }
        td	{
            font-style: normal;
            font-family: "Text new roman";
            font-weight: normal;
            font-size: 13px;

        }
        thead 	{
            font-style: normal;
            font-family: "Text new roman";
            font-weight: normal;
            font-size: 15px;
            text-align: center;

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
    <div class="wrapper">
        <div class="">
            <div class="row">
                    <div class="col-md">
                    <div >

                        <h2 class="pull-center">Liste des joueurs en détail</h2>

                    </div>
                    <style>
                        h2.pull-center{
                            text-align: center;
                        }
                        td, th {
                            border-width:2px;
                            border-style:solid;
                            text-align: center;



                        }
                    </style>
                    <?php
                    // Include config file
                    require_once("../config/database.php");

                    // Attempt select query execution
                    $sql = "SELECT * FROM joueur";
                 //  $nice_date = '';
                //    $nice_date = date('d-m-Y', strtotime( $row['date'] ));
                    if($result = $base->query($sql)){
                        if($result->num_rows > 0){
                            echo "<table  style='width: 110%;  border-style: solid; text-align: center' id='myTable'>";
                            echo "<thead style='background-color: #80bdff; border-style: solid; text-align: center'>";
                            echo "<tr>";
                            echo "<th>Nom</th>";
                            echo "<th>Prenom</th>";
                            echo "<th>Date de Naissance</th>";
                            echo "<th>Adresse</th>";
                            echo "<th>Telephone</th>";
                            echo "<th>Club Actuel</th>";
                            echo "<th  class='fa fa-forward'>Club Ancien</th>";
                            echo "<th>Action</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";

                            while($row = $result->fetch_array()){
                                echo "<tr>";
                                echo "<td width=15%>" . mb_strtoupper($row['nom']) . "</td>";
                                echo "<td width=15%>" . ucfirst($row['prenom']) . "</td>";
                                echo "<td width=10%>" . date('d-m-Y', strtotime( $row['date'] )) . "</td>";
                                echo "<td width=10%>" . mb_strtoupper($row['adresse']) . "</td>";
                                echo "<td width=10%>" . mb_strtoupper($row['telephone']) . "</td>";
                                echo "<td width=10%>" . mb_strtoupper($row['club_actuelle']) . "</td>";
                                    echo "<td width=10%>" . mb_strtoupper($row['club_ancien']) . "</td>";
                                echo "<td width=10%>";
                                echo "<div>";

                               echo "<a href='voirJoueur.php?id=". $row['id'] ."'
                            title='voir' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'>voir</span></a>";
                                echo "<a href='modifier_joueur.php?id=". $row['id'] ."'
                            title='modifier' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                echo "<a href='../src_club/supprimerClub.php?id=". $row['id'] ."'
                             title='supprimer' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
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
</div>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>

</body>
</html>
