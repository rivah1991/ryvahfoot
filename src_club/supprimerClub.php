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
    // Process delete operation after confirmation
    if(isset($_POST["id"]) && !empty($_POST["id"])){
        // Include config file
        require_once("../config/database.php");

        // Prepare a delete statement
        $sql = "DELETE FROM club WHERE id = ?";

        if($stmt = mysqli_prepare($base, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            // Set parameters
            $param_id = trim($_POST["id"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records deleted successfully. Redirect to landing page
              //  header("location: indexClub");
                echo "<script type='text/javascript'>document.location.replace('indexClub.php?page=supprimerClub.php');</script>";
                exit();
                exit();
            } else{
                echo "Oops! Quelque chose a mal tourné. Veuillez réessayer plus tard.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);

        // Close connection
        mysqli_close($base);
    } else{
        // Check existence of id parameter

        if(empty($_GET["id"])){
            // URL doesn't contain id parameter. Redirect to error page
            header("location: errorClub.php");
            exit();
        }


    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>View Record</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <style type="text/css">
            .wrapper{
                width: 500px;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Suppression d'un Club</h1>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Voulez-vous vraiment supprimer cet enregistrement?</p><br>
                            <p>
                            <div style="text-align: center">
                                <input  type="submit" value="Oui" class="btn btn-danger">
                                <a href="indexClub.php" class="btn btn-default">Non</a>
                            </div>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </body>
    </html>

</div>
</body>
</html>
