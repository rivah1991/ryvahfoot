<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
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
    $poule[1] = $poule2 = $poule3 = $poule4 = $poule5 = $poule6 = $poule7 = $poule8 = $poule9 = $poule10 ="";



    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){


        /**
         * poule['+counter+']
         *   $i = array();
        $counter = [$i];

        for($i=1; $i<11; $i++){
        $poule[$i] = $_POST["poule'+$counter+'"];
        }
         *      $poule1 = $_POST['poule1'];
        $poule2 = $_POST['poule2'];
        $poule3 = $_POST['poule3'];
        $poule4= $_POST['poule4'];
        $poule5 = $_POST['poule5'];
        $poule6 = $_POST['poule6'];
        $poule7 = $_POST['poule7'];
        $poule8= $_POST['poule8'];
        $poule9 = $_POST['poule9'];
        $poule10= $_POST['poule10'];
         */







        if(empty($nom_err) && empty($adresse_err) && empty($airtel_err) && empty($orange_err) && empty($telma_err)){

            $sql = "INSERT INTO poulea (poule1, poule2, poule3, poule4,poule5,poule6,poule7,poule8,poule9,poule10) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";



            if($stmt = $base->prepare($sql)){
                // Bind variables to the prepared statement as parameters

                /**
                 * $stmt->bind_param("ssssssssss",$param[1], $param[2], $param[3], $param[4],
                $param[5], $param[6], $param[7], $param[8], $param[9], $param[10]);

                // Set parameters
                $i = 0;
                foreach ($_POST['poule'] as $poule) {

                ++$i;
                echo $poule ;
                $param[$i] = $param[$i] + $poule;
                }
                 */
                $param_ = "";
                $stmt->bind_param("ssssssssss",$param_1, $param_2, $param_3, $param_4,
                    $param_5, $param_6, $param_7, $param_8, $param_9, $param_10);

                // Set parameters
                $i = 1;
                foreach ($_POST['poule'] as $poule) {
                    ++$i;
                    echo $poule;
                    $param_ = $param_ + $poule;
                }
                // Attempt to execute the prepared statement
                if($stmt->execute()){
                    // Records created successfully. Redirect to landing page

                echo "<script>alert(\"Enregistrer avec succès\")</script>";
              //      echo "<script type='text/javascript'>document.location.replace('Poule.php?page=Poule.php');</script>";

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
                        <h2 style="text-align: center">Association Madagascar Standard PLUS</h2>
                        <h2 style="text-align: center">Tournoi Coum 67 - 2019/2020</h2>
                    </div>
                    </br>
                    </br>
                    </br>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div id='TextBoxesGroup'>
                        <input type='button' value='Ajouter poule' id='addButton'>
                        <input type='button' value='Supprimer poule' id='removeButton'>
                        <input type='button' style="display:none;" value='Voir la valeur la liste textbox' id='getButtonValue'>
                        <br/>
                        <br/>
                        <br/>
                    </div>
<?PHP
                        /**
                         *   <div id="TextBoxDiv1" name="" style="display:none;">
                        <label>Poule 1 : </label><input type='textbox' id='textbox1' >
                        </div>
                        */
?>





                        <script type="text/javascript">

                            $(document).ready(function(){

                                var counter = 1;

                                $("#addButton").click(function () {

                                    if(counter>10){
                                        alert("Maximum 10 poules");
                                        return false;
                                    }


                                    var newTextBoxDiv = $(document.createElement('div'))
                                        .attr("id", 'TextBoxDiv' + counter);


                                    newTextBoxDiv.after().html('<label >Poule '+ counter + ' : </label>' +
                                    '<select name="poule[]" >'+
          '<?PHP $result = $base->query("select nomClub from club");
          echo '<option>';
          echo '</option>';
          while ($row = $result->fetch_assoc()) {
          unset($nomClubAc);
          $nomClubAc = $row['nomClub'];

          echo '<option value=" '.$row['nomClub'].' " style="width: 300px">'.$nomClubAc.'</option>';
                             }
          ?></option></select>');

                                    newTextBoxDiv.appendTo("#TextBoxesGroup");


                                    counter++;
                                });

                                $("#removeButton").click(function () {
                                    if(counter==1){
                                        alert("Suppression impossible");
                                        return false;
                                    }

                                    counter--;

                                    $("#TextBoxDiv" + counter).remove();

                                });

                                $("#getButtonValue").click(function () {

                                    var msg = '';
                                    for(i=1; i<counter; i++){
                                        msg += "\n Poule #" + i + " : " + $('#textbox' + i).val();
                                    }
                                    alert(msg);
                                });
                            });
                        </script>

                    </div>
                <div style="padding-left: 40%">
                    <input type="submit" class="btn btn-primary" value="Valider" >
                    <a href="" class="btn btn-danger" >Initialiser</a>
                </div>



        </div>
            </form>
    </div>
</div>
</div>
</body>
</html>
