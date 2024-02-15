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
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty($_GET["id"])){
        // Include config file
        require_once("../config/database.php");

        // Prepare a select statement
        $sql = "SELECT * FROM club WHERE id = ?";

        if($stmt = mysqli_prepare($base, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            // Set parameters
            $param_id = trim($_GET["id"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $name = $row["nomClub"];
                    $addresse = $row["adresse"];
                    $salary = $row["airtel"];
                } else{
                    // URL doesn't contain valid id parameter. Redirect to error page
                    header("location: errorClub.php");
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
    } else{
        // URL doesn't contain id parameter. Redirect to error page
   //     header("location: errorClub.php");
        exit();
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
                        <h1>Voir club</h1>
                    </div>
                    <div class="form-group">
                        <label>Nom du club</label>
                        <p class="form-control-static"><?php echo $row["nomClub"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Addresse</label>
                        <p class="form-control-static"><?php echo $row["adresse"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Telephone</label>
                        <p class="form-control-static"><?php echo $row["airtel"]; ?></p>
                    </div>
                    <p><a href="indexClub.php" class="btn btn-primary">Retour</a></p>
                </div>
            </div>
        </div>
    </div>
    </body>
    </html>

</div>

</body>
</html>

