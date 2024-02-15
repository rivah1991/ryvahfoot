<!DOCTYPE html>
<html>
<head>
    <title>Titre</title>
    <link rel="stylesheet" type="text/css" href="../css/StyleTournoi.css">
    <link rel="stylesheet" type="text/css" href="../css/menu_menu.css.css">
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

    <?php
    // Include config file
    require_once("../config/database.php");

    // Define variables and initialize with empty values
    $pouleA = $pouleB = $pouleC = $pouleD =  "";
    //   $nom_err = $adresse_err = $airtel_err = "";
    $chaine = array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/"));


    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $pouleA = $_POST['pouleA'];
        $pouleB = $_POST['pouleB'];
        $pouleC = $_POST['pouleC'];
        $pouleD= $_POST['pouleD'];

        //$date = date('Y-m-d', strtotime(str_replace('/','-',$_POST['date_1'])));




        if(empty($nom_err) && empty($adresse_err) && empty($airtel_err) && empty($orange_err) && empty($telma_err)){
            // Prepare an insert statement
            $sql = "INSERT INTO poule (pouleA, pouleB, pouleC, pouleD) VALUES (?, ?, ?, ?)";



            if($stmt = $base->prepare($sql)){
                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("ssss", $param_pouleA, $param_pouleB, $param_pouleC, $param_pouleD);

                // Set parameters
                $param_pouleA = $pouleA;
                $param_pouleB = $pouleB;
                $param_pouleC = $pouleC;
                $param_pouleD = $pouleD;




                // Attempt to execute the prepared statement
                if($stmt->execute()){
                    // Records created successfully. Redirect to landing page

           echo "<script>alert(\"Enregistrer avec succès\")</script>";
         //   echo "<script type='text/javascript'>document.location.replace('Poule.php?page=Poule.php');</script>";

                    exit();
                } else{
                    echo "Quelque chose a mal tourné. Veuillez réessayer plus tard.";
                }
            }

            // Close statement
            //  $stmt->close();
        }


        // Close connection
        $base->close();
    }

    ?>

    <div class=" justify-content-end">
        <div class="container-fluid">
            <div class=" row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2 style="text-align: center">ASSOCIATION MADAGASCAR STANDARD PLUS</h2>
                        <h2 style="text-align: center">TOURNOI COUM 67 - 2019/2020</h2>
                    </div>
                    </br>
                    </br>
                    </br>
                    <Input Type="Button" style="display:none;" Value="Ajout ligne" OnClick=Ajouter1()>
                    <Input Type="Button" style="display:none;" Value="Supprimer ligne" OnClick=Supprimer()>


                    <div id="contenu1">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">


                            <div class="form-group row">
                                <label for="poule_A"  class="col-sm-2 col-form-label">Poule A :</label>
                                <div class="col-sm-8">
                                    <?php
                                    require_once("../config/database.php");

                                    $result = $base->query("select nomClub from club");
                                    echo "<html>";
                                    echo "<body>";
                                    echo "<select name='pouleA' style='width: 300px'>";
                                    echo '<option>';
                                    echo '</option>';
                                    $select_attribute = '';
                                    while ($row = $result->fetch_assoc()) {
                                        unset($nomClubAn);
                                        $nomClubAn = $row['nomClub'];


                                        echo '<option value=" '.$row['nomClub'].' ">'.$nomClubAn.'</option>';
                                    }

                                    echo "</select>";
                                    echo "</body>";
                                    echo "</html>";

                                    ?>
                                    </select>

                                </div>

                            </div>
                            </div>
                            <div class="form-group row">
                                <label for="poule_B"  class="col-sm-2 col-form-label">Poule B :</label>
                                <div class="col-sm-8">
                                    <?php
                                    require_once("../config/database.php");

                                    $result = $base->query("select nomClub from club");
                                    echo "<html>";
                                    echo "<body>";
                                    echo "<select name='pouleB' style='width: 300px'>";
                                    echo '<option>';
                                    echo '</option>';
                                    // $select_attribute = '';
                                    while ($row = $result->fetch_assoc()) {
                                        unset($nomClubAc);
                                        $nomClubAc = $row['nomClub'];

                                        echo '<option value=" '.$row['nomClub'].' ">'.$nomClubAc.'</option>';
                                    }
                                    echo "</select>";
                                    echo "</body>";
                                    echo "</html>";

                                    ?>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="poule_C"  class="col-sm-2 col-form-label">Poule C :</label>
                                <div class="col-sm-8">
                                    <?php
                                    require_once("../config/database.php");

                                    $result = $base->query("select nomClub from club");
                                    echo "<html>";
                                    echo "<body>";
                                    echo "<select name='pouleC' style='width: 300px'>";
                                    echo '<option>';
                                    echo '</option>';
                                    $select_attribute = '';
                                    while ($row = $result->fetch_assoc()) {
                                        unset($nomClubAn);
                                        $nomClubAn = $row['nomClub'];


                                        echo '<option value=" '.$row['nomClub'].' ">'.$nomClubAn.'</option>';
                                    }
                                    echo "</select>";
                                    echo "</body>";
                                    echo "</html>";

                                    ?>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="poule_D"  class="col-sm-2 col-form-label">Poule D :</label>
                                <div class="col-sm-8">
                                    <?php
                                    require_once("../config/database.php");

                                    $result = $base->query("select nomClub from club");
                                    echo "<html>";
                                    echo "<body>";
                                    echo "<select name='pouleD' style='width: 300px'>";
                                    echo '<option>';
                                    echo '</option>';

                                    // $select_attribute = '';
                                    $test = "";
                                    if($test === sele)
                                    while ($row = $result->fetch_assoc()) {
                                        unset($nomClubAc);
                                        $nomClubAc = $row['nomClub'];

                                        echo '<option value=" '.$row['nomClub'].' ">'.$nomClubAc.'</option>';

                                    }
                                    echo "</select>";
                                    echo "</body>";
                                    echo "</html>";

                                    ?>
                                    </select>
                                </div>

                            </div>
                    </b>
                    <div class="form-group row">
                        <br>
                        <div id="saisies1">
                        </div>
                    <script>

                        </script>
                            </br>
                            </br>
                                <div style="padding-left: 40%">
                                    <input type="submit" class="btn btn-primary" value="Valider" >
                                    <a href="" class="btn btn-danger" >Initialiser</a>
                                </div>



            </div>
    </div>
</div>
        </div>
        </form>
</div>
</div>
</div>
</body>
</html>
