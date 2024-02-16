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
    $nom = $adresse = $prenom = $date= $club = $telephone= "";
 //   $nom_err = $adresse_err = $airtel_err = "";
    $chaine = array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/"));


    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adresse = $_POST['adresse'];
        $telephone= $_POST['telephone'];
        $clubAc= $_POST['club_actuelle'];
        $clubAn= $_POST['club_ancien'];
        $date = $_POST['date'];
        //$date = date('Y-m-d', strtotime(str_replace('/','-',$_POST['date_1'])));
        $photo = $_POST['photo'];



        if(empty($nom_err) && empty($adresse_err) && empty($airtel_err) && empty($orange_err) && empty($telma_err)){
            // Prepare an insert statement
            $sql = "INSERT INTO joueur (nom, prenom, date, adresse, club_ancien, club_actuelle, telephone, photo) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";


            if($stmt = $base->prepare($sql)){
                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("ssssssss", $param_nom, $param_prenom, $param_date, $param_adresse,$param_clubAn, $param_clubAc, $param_telephone, $param_photo);

                // Set parameters
                $param_nom = $nom;
                $param_prenom = $prenom;
                $param_adresse = $adresse;
                $param_date = $date;
                $param_telephone= $telephone;
                $param_clubAc= $clubAc;
                 $param_clubAn= $clubAn;
                $param_photo = $photo;




                // Attempt to execute the prepared statement
                if($stmt->execute()){
                    // Records created successfully. Redirect to landing page
                    echo "<script>alert(\"Enregistrer avec succès\")</script>";
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
    if (isset($_POST['upload'])) {
        // Get image name
        $image = $_FILES['photo']['name'];
        // Get text
        $image_text = mysqli_real_escape_string($base, $_POST['image_text']);

        // image file directory
        $target = "../images/".basename($image);

        $sql = "INSERT INTO images (image, image_text) VALUES ('$image', '$image_text')";
        // execute query
        mysqli_query($base, $sql);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
        }
    }
    ?>

       <div class=" justify-content-end">
        <div class="container-fluid">
            <div class=" row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2 style="text-align: center">Association Madagascar Standard PLUS</h2>
                        <h2 style="text-align: center">Tournoi Coum 67 - 2019/2020</h2>
                    </div>
                    <p></p>

                    <div id="contenu1">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Nom</label>
                            <div class="col-sm-6">
                                <input type="text" name="nom" class="form-control" id="nomJoueur" placeholder="Entrez votre nom">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Prenom</label>
                            <div class="col-sm-6">
                                <input type="text" name="prenom" class="form-control" id="prenomJoueur" placeholder="Entrez votre prenom">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputDate" class="col-sm-2 col-form-label">Né le</label>
                            <div class="col-sm-6">
                       <input type="datetime-local" class="form-control" id="date" placeholder="Date de naissance" name="date"
                              value ="1990/01/01">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Adresse</label>
                            <div class="col-sm-6">
                                <input type="text" name="adresse" class="form-control" id="adresse" placeholder="Entrez votre Adresse">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Telephone</label>
                            <div class="col-sm-6">
                                <input type="text" name="telephone" class="form-control" id="telephone" placeholder="Entrez votre telephone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="club_ancien"  class="col-sm-2 col-form-label">Club ancien :</label>
                            <div class="col-sm-8">
                                    <?php
                                    require_once("../config/database.php");
                                    /**
                                    * $sqlClub = "SELECT nomClub FROM club WHERE id";
                                    $result = $base->query($sqlClub);

                                    if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                    //echo $row["nom"];
                                    echo "<option value='nomClub' >".$row['nomClub']."</option>";
                                    }
                                    } else {
                                    echo "0 results";
                                    }
                                    $base->close();
                                     */
                                    $result = $base->query("select nomClub from club");
                                    echo "<html>";
                                    echo "<body>";
                                    echo "<select name='club_ancien' style='width: 300px'>";
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
                            <label for="clubActuel"  class="col-sm-2 col-form-label">Club actuel :</label>
                            <div class="col-sm-8">
                                <?php
                                require_once("../config/database.php");
                                /**
                                 * $sqlClub = "SELECT nomClub FROM club WHERE id";
                                $result = $base->query($sqlClub);

                                if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                //echo $row["nom"];
                                echo "<option value='nomClub' >".$row['nomClub']."</option>";
                                }
                                } else {
                                echo "0 results";
                                }
                                $base->close();
                                 */
                                $result = $base->query("select nomClub from club");
                                echo "<html>";
                                echo "<body>";
                                echo "<select name='club_actuelle' style='width: 300px'>";
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
                             <label for="photo" class="col-sm-2 col-form-label">Upload photo</label>

                            <div class="col-sm-6">
                            <input type="file" name="photo">
                                </div>

                        </div>
                        <div class="form-group row">

                            <div style="padding-left: 40%">
                                <input type="submit" class="btn btn-primary" value="Valider" >
                                <a href="" class="btn btn-danger" >Initialiser</a>
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





</div>

</body>
</html>
