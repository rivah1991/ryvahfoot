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
    $name = $address = $salary = "";
    $name_err = $address_err = $salary_err = "";

    // Processing form data when form is submitted
    if(isset($_POST["id"]) && !empty($_POST["id"])){
        // Get hidden input value
        $id = $_POST["id"];

        // Validate name
        $input_name = trim($_POST["name"]);
        if(empty($input_name)){
            $name_err = "Please enter a name.";
        } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
            $name_err = "Please enter a valid name.";
        } else{
            $name = $input_name;
        }

        // Validate address address
        $input_address = trim($_POST["address"]);
        if(empty($input_address)){
            $address_err = "Please enter an address.";
        } else{
            $address = $input_address;
        }

        // Validate salary
        $input_salary = trim($_POST["salary"]);
        if(empty($input_salary)){
            $salary_err = "Please enter the salary amount.";
        } elseif(!ctype_digit($input_salary)){
            $salary_err = "Please enter a positive integer value.";
        } else{
            $salary = $input_salary;
        }

        // Check input errors before inserting in database
        if(empty($name_err) && empty($address_err) && empty($salary_err)){
            // Prepare an update statement
            $sql = "UPDATE club SET nomClub=?, adresse=?, airtel=? WHERE id=?";

            if($stmt = mysqli_prepare($base, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "sssi", $param_name, $param_address, $param_salary, $param_id);

                // Set parameters
                $param_name = $name;
                $param_address = $address;
                $param_salary = $salary;
                $param_id = $id;

                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Records updated successfully. Redirect to landing page
          //        header("location: indexClub.php");
                    echo "<script type='text/javascript'>document.location.replace('indexClub.php?page=modifier_club.php');</script>";
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
            $sql = "SELECT * FROM club WHERE id = ?";
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
                        $name = $row["nomClub"];
                        $address = $row["adresse"];
                        $salary = $row["airtel"];
                    } else{
                        // URL doesn't contain valid id. Redirect to error page
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
        }  else{
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
        <title>Update Record</title>
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
                        <h2>Mise à jour du club</h2>
                    </div>
                    <p>Mba ataovy marina tsara izay fanovana azafady.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Nom du club:</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                            <label>Adresse:</label>
                            <textarea name="address" class="form-control"><?php echo $address; ?></textarea>
                            <span class="help-block"><?php echo $address_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($salary_err)) ? 'has-error' : ''; ?>">
                            <label>Telephone :</label>
                            <input type="text" name="salary" class="form-control" value="<?php echo $salary; ?>">
                            <span class="help-block"><?php echo $salary_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Modifier">
                        <a href="indexClub.php" class="btn btn-default">Annuler</a>
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
