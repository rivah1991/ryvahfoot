<!DOCTYPE html>
<html>
<head>
    <title>Titre</title>
    <link rel="stylesheet" type="text/css" href="../css/StyleTournoi.css">
    <link rel="stylesheet" type="text/css" href="../css/joueur.css">
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

            font-family: "Arial";

        }
    </style>
</head>
<body >
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
        $sql = "SELECT * FROM joueur WHERE id = ?";

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
                    $name = $row["nom"];
                    $addresse = $row["prenom"];
                    $salary = $row["telephone"];
                } else{
                    // URL doesn't contain valid id parameter. Redirect to error page
       //             header("location: errorClub.php");
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
<div id='printarea'>
    <div >

        <h1 style="text-align: center">Information Joueur</h1>
    </div>
    <div>
    <div id="cadre1" >
        <div class="">
        <p class=""><?php echo "<img class= 'images' src='../images/".$row['photo']."' >"; ?></p>
        </div>

    </div>
    <div id="cadre2"  >

        <div class="container-fluid">
            </br>

            <div class="row">

                <div class="col-md-12">

                    <div class="form-group">
                        <label>Nom :</label>
                      <?php echo mb_strtoupper($row["nom"]); ?>
                    </div>
                    <div class="form-group">
                        <label>Prenom :</label>
                       <?php echo ucfirst($row["prenom"]); ?>
                    </div>
                    <div class="form-group">
                        <label>Date de naissance :</label>
                        <?php echo date('d-m-Y', strtotime( $row['date'] )); ?></p>
                    </div>
                    <div class="form-group">
                        <label>Adresse :</label>
                       <?php echo mb_strtoupper($row["adresse"]); ?>
                    </div>
                    <div class="form-group">
                        <label>Telephone :</label>
                        <?php echo $row["telephone"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Club actuel :</label>
                       <?php echo $row["club_actuelle"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Club ancien :</label>
                     <?php echo $row["club_ancien"]; ?></p>
                    </div>

                </div>

            </div>
        </div>

            <p><a href="listeLicence.php" class="btn btn-primary">Retour</a></p>

            </div>
    </div>
        </div>


    </div>
<div >
    <p>This is a sample text for printing purpose.</p>
</div>
<input type='button' id='btn' value='Print'>
<script>
    $("#btn").click(function () {
        $("#printarea").show();
        window.print();

    });

</script>

    </body>
    </html>

</div>

</body>
</html>

