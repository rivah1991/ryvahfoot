<html>
	<head>

		<title>CHRONO</title>
        <script src="../scripts/jquery-3.4.1.min.js"></script>
        <script src="../scripts/rebours.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/Chrono.css">
	
    <style>
        .soustitre{
            font-size: 20px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        #global{
            padding-top: 0;
        }
        #content{
            border-radius: 30px;
            background-color:rgb(62, 228, 240);
            size: 200px;
            
        }
        #content{
            float: left;
            margin-left: 85px;
            margin-top: 50px;
            width:450px;
            height:300px;
            padding: 20px;
            background: rgb(62, 228, 240);
            font-size: 25px;
            border-radius: 30px;
        }
        #nonrebour{
            color: black;
            font-size: 30px;
            height: 80px;
            width:450px;
            background-color: aquamarine;
            margin-top: -30px;
            margin-left: -20px;
        }
        input{
            border-color: red;
            size: 30;
        }
        label{
            font-size:16px;
            justify-content: center;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        select{
            border-radius: 10px;
            font-size:30px;
            border-color: rgb(62, 228, 240);
        }
        #countdown{
            font-size:30px;
            padding-bottom: 30px;
        }
        #choixDePoule{
         padding-left: 40%;
        }
        .header {
            /* height:40px; */
            width:50px;
            margin:-30px;
        }
        .sidebar2{
            /* float:; */
            margin-top: 5%;
            width: 150px;
            padding: 10px;
            font-size: 18px;
        }

    </style>
</head>

	<body>
    <!-- <?php include('../ressources/contenu.php'); ?> -->

    <?php
    // Include config file
    require_once("../config/database.php");

    // Define variables and initialize with empty values
    $equipeA = $equipeB = $scoreA = $scoreB= "";
    //   $nom_err = $adresse_err = $airtel_err = "";
    $chaine = array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/"));
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $equipeA = $_POST['equipeA'];
        $equipeB = $_POST['equipeB'];
        $scoreA = $_POST['scoreA'];
        $scoreB = $_POST['scoreB'];

        if(empty($nom_err) && empty($adresse_err) && empty($airtel_err) && empty($orange_err) && empty($telma_err)){
            // Prepare an insert statement
            $sql = "INSERT INTO chrono (equipeA, scoreA, equipeB, scoreB) VALUES (?, ?, ?, ?)";


            if($stmt = $base->prepare($sql)){
                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("ssss", $param_equipeA, $param_scoreA, $param_equipeB, $param_scoreB);

                // Set parameters
                $param_equipeA = $equipeA;
                $param_scoreA = $scoreA;
                $param_equipeB = $equipeB;
                $param_scoreB = $scoreB;



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
    ?>

<div class="font">
<div id="global">
       <div id="header">

		<marquee direction="left"><h1>Association Madagascar Standard Plus</h1></marquee>
      </div>
    <div id="choixDePoule">
    <label for="equipe">Choix de poule :</label>
    <div class="col-sm-16">
        <select name='equipeB' style='width: 150px'>
        <option value="pouleA" id="optionA">poule A</option>
        <option value="pouleB" id="optionB">poule B</option>
        <option value="pouleC" id="optionC">poule C</option>
        <option value="pouleD" id="optionD">poule D</option>
       </select>
    </div>
    </div>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div id="body">
       <div class="sidebar1" id="equipeAA">
         <label for="equipe">EQUIPE A :</label>
            <div>
           <div class="col-sm-8">
               <?php
               require_once("../config/database.php");
               $result = $base->query("select pouleA from poule");
               echo "<html>";
               echo "<body>";
               echo "<select name='equipeA' style='width: 150px'>";
               echo '<option>';
               echo '</option>';
               // $select_attribute = '';
               while ($row = $result->fetch_assoc()) {
                   unset($nomClubAc);
                   $nomClubAc = $row['pouleA'];

                   echo '<option value=" '.$row['pouleA'].' ">'.$nomClubAc.'</option>';
               }
               echo "</select>";
               echo "</body>";
               echo "</html>";

               ?>
               </select>
           </div>
            </div>


           <br/>
           <br/>
           <br/>
  			SCORE
           <br/>
           <input class="input" name="scoreA" type="number" />
       </div>
        <div class="sidebar1" id="equipeAB" style="display:none;">
            <label for="equipe">EQUIPE B :</label>
            <div  >
                <div class="col-sm-8">
                    <?php
                    require_once("../config/database.php");
                    $result = $base->query("select pouleB from poule");
                    echo "<html>";
                    echo "<body>";
                    echo "<select name='equipeA' style='width: 150px'>";
                    echo '<option>';
                    echo '</option>';
                    // $select_attribute = '';
                    while ($row = $result->fetch_assoc()) {
                        unset($nomClubAc);
                        $nomClubAc = $row['pouleB'];

                        echo '<option value=" '.$row['pouleB'].' ">'.$nomClubAc.'</option>';
                    }
                    echo "</select>";
                    echo "</body>";
                    echo "</html>";

                    ?>
                    </select>
                </div>
            </div>


            <br/>
            <br/>
            <br/>
            SCORE
            <br/>
            <input class="input" name="scoreA" type="number" />
        </div>

        <div class="sidebar1" id="equipeAC" style="display:none;">
            <label for="equipe">EQUIPE C :</label>
            <div  >
                <div class="col-sm-8">
                    <?php
                    require_once("../config/database.php");
                    $result = $base->query("select pouleC from poule");
                    echo "<html>";
                    echo "<body>";
                    echo "<select name='equipeA' style='width: 150px'>";
                    echo '<option>';
                    echo '</option>';
                    // $select_attribute = '';
                    while ($row = $result->fetch_assoc()) {
                        unset($nomClubAc);
                        $nomClubAc = $row['pouleC'];

                        echo '<option value=" '.$row['pouleC'].' ">'.$nomClubAc.'</option>';
                    }
                    echo "</select>";
                    echo "</body>";
                    echo "</html>";

                    ?>
                    </select>
                </div>
            </div>


            <br/>
            <br/>
            <br/>
            SCORE
            <br/>
            <input class="input" name="scoreA" type="number" />
        </div>
        <div class="sidebar1" id="equipeAD" style="display:none;">
            <label for="equipe">EQUIPE D :</label>
            <div  >
                <div class="col-sm-8">
                    <?php
                    require_once("../config/database.php");
                    $result = $base->query("select pouleD from poule");
                    echo "<html>";
                    echo "<body>";
                    echo "<select name='equipeA' style='width: 150px'>";
                    echo '<option>';
                    echo '</option>';
                    // $select_attribute = '';
                    while ($row = $result->fetch_assoc()) {
                        unset($nomClubAc);
                        $nomClubAc = $row['pouleD'];

                        echo '<option value=" '.$row['pouleD'].' ">'.$nomClubAc.'</option>';
                    }
                    echo "</select>";
                    echo "</body>";
                    echo "</html>";

                    ?>
                    </select>
                </div>
            </div>


            <br/>
            <br/>
            <br/>
            SCORE
            <br/>
            <input class="input" name="scoreA" type="number" />
        </div>
          <div id="content" >
              <div controls >
                  Temps restant:
                  <br/>
                  <br/>
                  <br/>
                  <br/>
                  <div id="nonrebour">

                      <br/>
                      <div id="nrebour" >
                     <span id="countdown">00 : 00</span>

                      </div>
                      </br>
                      </br>
                      <div>
                          <div class="play"  id="b1" style="display:none";  >
                              <input type="button"   value="play"
                                     onclick="start('andrana');countdownTimer=setInterval('secondPassed()',1000);" >

                          </div>

                          <div class="pause"  id="b2" style="display:none"; >
                              <input type="button" value="Pause" onclick="stop1();" >
                          </div>


                          </div>
                      </div>
                  </div>

                  <br/>
              </div>
              <br/>
              <br/>

          </div>
    </div>

        <div class="sidebar2" id="equipeBA">
			<label for="equipe">EQUIPE A :</label>
           <div >
            <div class="col-sm-8">
                <?php
                require_once("../config/database.php");
                $result = $base->query("select pouleA from poule");
                echo "<html>";
                echo "<body>";
                echo "<select name='equipeB' style='width: 150px'>";
                echo '<option>';
                echo '</option>';
                // $select_attribute = '';
                while ($row = $result->fetch_assoc()) {
                    unset($nomClubAc);
                    $nomClubAc = $row['pouleA'];

                    echo '<option value=" '.$row['pouleA'].' ">'.$nomClubAc.'</option>';
                }
                echo "</select>";
                echo "</body>";
                echo "</html>";

                ?>
                </select>
            </div>
           </div>




            <br/>
            <br/>
          <br/>

			SCORE
            <br/>
            <input class="input" name="scoreB" type="number" />
        </div>
</div>
    <div class="sidebar2" style="display:none;" id="equipeBB">
        <div>
        <label for="equipe">EQUIPE B :</label>
        <div>
            <div class="col-sm-8">
                <?php
                require_once("../config/database.php");
                $result = $base->query("select pouleB from poule");
                echo "<html>";
                echo "<body>";
                echo "<select name='equipeB' style='width: 150px'>";
                echo '<option>';
                echo '</option>';
                // $select_attribute = '';
                while ($row = $result->fetch_assoc()) {
                    unset($nomClubAc);
                    $nomClubAc = $row['pouleB'];

                    echo '<option value=" '.$row['pouleB'].' ">'.$nomClubAc.'</option>';
                }
                echo "</select>";
                echo "</body>";
                echo "</html>";

                ?>
                </select>
            </div>
        </div>
        <br/>
        <br/>
        <br/>
        SCORE
        <br/>
        <input class="input" name="scoreB" type="number" />
    </div>
    </div>
    <div class="sidebar2" style="display:none;" id="equipeBC">
        <div>
            <label for="equipe">EQUIPE C :</label>
            <div>
                <div class="col-sm-8">
                    <?php
                    require_once("../config/database.php");
                    $result = $base->query("select pouleC from poule");
                    echo "<html>";
                    echo "<body>";
                    echo "<select name='equipeB' style='width: 150px'>";
                    echo '<option>';
                    echo '</option>';
                    // $select_attribute = '';
                    while ($row = $result->fetch_assoc()) {
                        unset($nomClubAc);
                        $nomClubAc = $row['pouleC'];

                        echo '<option value=" '.$row['pouleC'].' ">'.$nomClubAc.'</option>';
                    }
                    echo "</select>";
                    echo "</body>";
                    echo "</html>";

                    ?>
                    </select>
                </div>
            </div>
            <br/>
            <br/>
            <br/>
            SCORE
            <br/>
            <input class="input" name="scoreB" type="number" />
        </div>
    </div>
    <div class="sidebar2" style="display:none;" id="equipeBD">
        <div>
            <label for="equipe">EQUIPE D :</label>
            <div>
                <div class="col-sm-8">
                    <?php
                    require_once("../config/database.php");
                    $result = $base->query("select pouleD from poule");
                    echo "<html>";
                    echo "<body>";
                    echo "<select name='equipeB' style='width: 150px'>";
                    echo '<option>';
                    echo '</option>';
                    // $select_attribute = '';
                    while ($row = $result->fetch_assoc()) {
                        unset($nomClubAc);
                        $nomClubAc = $row['pouleD'];

                        echo '<option value=" '.$row['pouleD'].' ">'.$nomClubAc.'</option>';
                    }
                    echo "</select>";
                    echo "</body>";
                    echo "</html>";

                    ?>
                    </select>
                </div>
            </div>
            <br/>
            <br/>
            <br/>
            SCORE
            <br/>
            <input class="input" name="scoreB" type="number" />
        </div>
    </div>
   <div class="footer" >
       <div id= "enregistrer" style="display:none;">
           <input type="submit" class="btn btn-primary" value="Enregistrer" >
       </div>
       </form>
    <div class="">


        </br>

        <input type="button" value="45'"  id="min45"
               onclick="start('test');countdownTimer=setInterval('secondPassed()',1000); min45();stop1()" >
        <input type="button" value="30'"  id="min30"
               onclick="start('test');countdownTimer=setInterval('secondPassed()',1000); min30(); stop1()" >
        <input type="button"  value="20'" id="min20"
               onclick="start('test');countdownTimer=setInterval('secondPassed()',1000); min20(); stop1()">
        <input type="button"  value="15'" id="min15"
               onclick="start('test');countdownTimer=setInterval('secondPassed()',1000); min15(); stop1()">
        <input type="button"  value="5'" id="min5"
               onclick="start('test');countdownTimer=setInterval('secondPassed()',1000); min5(); stop1()">

    </div>

</div>

</div>
 </div>
</div>


	</body>
    <script>
        const enterFullScreen = function( element ){
            if( element.requestFullScreen ){
                element.requestFullScreen();
            } else if ( element.webkitRequestFullScreen ){
                element.webkitRequestFullScreen( Element.ALLOW_KEYBOARD_INPUT );
            } else if ( element.mozRequestFullScreen ){
                element.mozRequestFullScreen();
            }
        };

        document.querySelector( '.fullScreen' ).addEventListener( 'click', function( ev ){
            enterFullScreen( document.body );
        }, false );
    </script>
    <script>
        function exitFull(){
            if (document.fullscreenElement) {
                if (!document.fullscreenElement) {
                    document.documentElement.requestFullscreen();
                } else {
                    document.exitFullscreen();
                }
            }
         }
    </script>

    <script>
        $(document).ready(function(){
            $("#optionA").click(function(){
                $("#equipeAA").show();
                $("#equipeAC").hide();
                $("#equipeAB").hide();
                $("#equipeAD").hide();
                $("#equipeBA").show();
                $("#equipeBC").hide();
                $("#equipeBB").hide();
                $("#equipeBD").hide();


            });
            $("#optionB").click(function(){
                $("#equipeAB").show();
                $("#equipeAC").hide();
                $("#equipeAA").hide();
                $("#equipeAD").hide();
                $("#equipeBB").show();
                $("#equipeBC").hide();
                $("#equipeBA").hide();
                $("#equipeBD").hide();
            });
            $("#optionC").click(function(){
                $("#equipeAC").show();
                $("#equipeAB").hide();
                $("#equipeAA").hide();
                $("#equipeAD").hide();
                $("#equipeBC").show();
                $("#equipeBB").hide();
                $("#equipeBA").hide();
                $("#equipeBD").hide();
            });
            $("#optionD").click(function(){
                $("#equipeAD").show();
                $("#equipeAC").hide();
                $("#equipeAA").hide();
                $("#equipeAB").hide();
                $("#equipeBD").show();
                $("#equipeBC").hide();
                $("#equipeBA").hide();
                $("#equipeBB").hide();
            });


            $("#min45").click(function(){
                $("#b1").show();
                $("#body").show();
                $("#b2").hide();
                $("#nonrebour").show();
                $('#retour').show();
                $(".footer").show();

                $("#sidebar1").show();
                $("#sidebar2").show();
            });
            $("#b1").click(function(){
                $("#b1").hide();
                $("#enregistrer").show();
                $("#b2").show();

            });

            $("#b2").click(function(){
                $("#b2").hide();
                $("#b1").show();
            })
            $("#min30").click(function(){
                $("#b1").show();
                $("#body").show();
                $("#b2").hide();
                $("#nonrebour").show();
                $('#retour').show();
                $(".footer").show();

                $("#sidebar1").show();
                $("#sidebar2").show();
            });

            $("#min15").click(function(){
                $("#b1").show();
                $("#body").show();
                $("#b2").hide();
                $("#nonrebour").show();
                $('#retour').show();
                $(".footer").show();

                $("#sidebar1").show();
                $("#sidebar2").show();
            });
            $("#min5").click(function(){
                $("#b1").show();
                $("#body").show();
                $("#b2").hide();
                $("#nonrebour").show();
                $('#retour').show();
                $(".footer").show();

                $("#sidebar1").show();
                $("#sidebar2").show();
            });


            $("#min20").click(function(){
                $("#b1").show();
                $("#body").show();
                $("#b2").hide();
                $("#nonrebour").show();
                $('#retour').show();
                $(".footer").show();

                $("#sidebar1").show();
                $("#sidebar2").show();
            });

        });
    </script>

</html>