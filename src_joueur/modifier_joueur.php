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
    <?php
    // Include config file
    require_once("../config/database.php");

    // Define variables and initialize with empty values
    $nom = $prenom = $date = $adresse = $clubAc = $clubAct = $photo = $telephone= "";

    $nom_err = $prenom_err = $date_err = $adresse_err = $clubAc_err = $clubAct_err = $photo_err = $telephone_err= "";
        if(isset($_POST["id"]) && !empty($_POST["id"])){
        // Get hidden input value
        $id = $_POST["id"];
        $input_nom= trim($_POST["Nom"]);

        $input_prenom= trim($_POST["Prenom"]);

        $input_telephone= trim($_POST["telephone"]);

        $input_clubAc= trim($_POST["club_ancien"]);
        $input_clubAct= trim($_POST["club_actuelle"]);
        $input_photo= trim($_POST["photo"]);
        $input_date= trim($_POST["date"]);
        $input_adresse= trim($_POST["adresse"]);

            $nom = $input_nom;
            $prenom =  $input_prenom;
            $telephone = $input_telephone;
            $clubAc = $input_clubAc;
            $clubAct= $input_clubAct;
            $_photo = $input_photo;
            $date = $input_date;
            $adresse = $input_adresse;

        // Check input errors before inserting in database
        if(empty($nom_err) && empty($adresse_err) && empty($telephone_err)){
            // Prepare an update statement
            $sql = "UPDATE joueur SET Nom=?, Prenom=?, date=?, adresse=?, club_ancien =?, club_actuelle=?, telephone=?,
                     photo=? WHERE id=?";

            if($stmt = mysqli_prepare($base, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ssssssssi", $param_nom, $param_prenom, $param_date, $param_adresse,
                     $param_clubAc,$param_clubAct, $param_telephone, $param_photo, $param_id);

                // Set parameters
                $param_nom = $nom;
                $param_prenom = $prenom;
                $param_date = $date;
                $param_adresse= $adresse;
                $param_clubAc = $clubAc;
                $param_clubAct = $clubAct;
                $param_photo = $photo;
                $param_telephone = $telephone;
                $param_id = $id;

                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Records updated successfully. Redirect to landing page
                    //          header("location: indexClub.php");
                 //  echo "<script type='text/javascript'>document.location.replace('listeLicence.php?page=modifier_joueur.php');</script>";
                    exit();
                } else{
                    echo "Something went wrong. Please try again later.";
                }
            }

            // Close statement
            //   mysqli_stmt_close($stmt);
        }

        // Close connection
        mysqli_close($base);
    } else{
        // Check existence of id parameter before processing further
        if(isset($_GET["id"]) && !empty($_GET["id"])){
            // Get URL parameter
            $id =  trim($_GET["id"]);

            // Prepare a select statement
            $sql = "SELECT * FROM joueur WHERE id = ?";
            if($stmt = mysqli_prepare($base, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "i", $param_id);

                // Set parameters
                $param_id = $id;

                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    $result = mysqli_stmt_get_result($stmt);

                    if(mysqli_num_rows($result) == 1){
                        /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                        // Retrieve individual field value
                        $nom = $row["Nom"];
                        $prenom = $row["Prenom"];
                        $date = $row["date"];
                        $adresse = $row["adresse"];
                        $clubAc = $row["club_ancien"];
                        $clubAct = $row["club_actuelle"];
                        $telephone = $row["telephone"];
                        $photo = $row["photo"];

                    } else{
                        // URL doesn't contain valid id. Redirect to error page
                 //       header("location: errorJoueur.php");

                        exit();
                    }

                } else{
                    echo "Oops! Quelque chose a mal tourné. Veuillez réessayer plus tard.";
                }
            }

            // Close statement
            mysqli_stmt_close($stmt);

            // Close connection
            mysqli_close($base);
        }  else{
            // URL doesn't contain id parameter. Redirect to error page
     //       header("location: errorClub.php");
            exit();
        }
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
                    <p></p>

                    <div id="contenu1">

                      <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">

                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Nom</label>
                                <div class="col-sm-6">
                                    <input type="text" name="Nom" class="form-control" id="nomJoueur" placeholder="Entrez votre nom"
                                    value="<?php echo $nom; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Prenom</label>
                                <div class="col-sm-6">
                                    <input type="text" name="Prenom" class="form-control" id="prenomJoueur" placeholder="Entrez votre prenom"
                                           value="<?php echo $prenom; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputDate" class="col-sm-2 col-form-label">Né le</label>
                                <div class="col-sm-6">
                                    <input type="datetime-local" class="form-control" id="date" placeholder="Date de naissance" name="date"
                                           value="<?php echo date('d-m-Y', strtotime( $date )); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Adresse</label>
                                <div class="col-sm-6">
                                    <input type="text" name="adresse" class="form-control" id="adresse" placeholder="Entrez votre Adresse"
                                           value="<?php echo $adresse; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Telephone</label>
                                <div class="col-sm-6">
                                    <input type="text" name="telephone" class="form-control" id="telephone" placeholder="Entrez votre telephone"
                                           value="<?php echo $telephone; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="club_actuelle"  class="col-sm-2 col-form-label">Club actuelle :</label>
                                <div class="col-sm-8">
                                    <?php


                                    echo "<html>";
                                    echo "<body>";
                                    echo "<select name='club_actuelle' style='width: 300px'>";
                                    echo '<option>';
                                    echo '</option>';
                                  //  $sql = "SELECT club_actuelle FROM joueur";
                               //     if($result = $base->query($sql)) {
                                      //  if ($id=$row['id'] > 0) {
                                            echo '<option value=" ' . $clubAct . ' ">' . $row['club_actuelle'] . '</option>';
                                        //}

                                    ?>
                                    </select>
                                </div>

                            </div>
                    <div class="form-group row">
                        <label for="club_ancien"  class="col-sm-2 col-form-label">Club ancien :</label>
                        <div class="col-sm-8">
                            <?php


                            echo "<html>";
                            echo "<body>";
                            echo "<select name='club_ancien' style='width: 300px'>";
                            echo '<option>';
                            echo '</option>';
                            //  $sql = "SELECT club_actuelle FROM joueur";
                            //     if($result = $base->query($sql)) {
                       //     if ($id=$row['id'] > 0) {
                                echo '<option value=" ' . $clubAc . ' ">' . $row['club_ancien'] . '</option>';
                         //   }

                            ?>
                            </select>
                        </div>

                    </div>
                            <div class="form-group row">
                                <label for="photo" class="col-sm-2 col-form-label">Upload photo</label>

                                <div class="col-sm-6">
                                    <input type="file" name="photo" value="<?php echo $photo; ?>">
                                </div>

                            </div>
                            <div class="form-group row">

                                <div style="padding-left: 40%">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                                    <input type="submit" class="btn btn-primary" value="Modifier">
                                    <a href="listeLicence.php" class="btn btn-danger" >Retour</a>
                                </div>
                                <div id="menu1">

                                </div>

                            </div>
                    </div>

                </div>

                </form>


            </div>

        </div>
    </div>
</div>

</div>

</body>
</html>
