<?php
include("config/database.php");
session_start();
$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    $myusername = mysqli_real_escape_string($base,$_POST['username']);

    $mypassword = mysqli_real_escape_string($base,$_POST['password']);

    $sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
    $result = mysqli_query($base,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  //  $active = $row['active'];

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if($count == 1) {
       // session_register("myusername");
        session_start();
        $_SESSION['login_user'] = $myusername;

        header("location: menu/classement.php");
    }else {
          $error =  "<script>alert('tsy ao anaty base ny anarana lah')</script>";
    }
}
?>
<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <meta charset="utf-8">


    <style type = "text/css">
        body {
            font-family:"times New Roman";
            font-size:20px;
            text-align: center;
            width: 120%;


        }
        label {
            font-weight:bold;

            font-size:14px;

        }

        .box {
            border:#666666 solid 1px;
            width: 220px;
            text-align: center;
        }
    </style>

</head>


<body bgcolor = "#FFFFFF">
<br>
<div id="cadre1">
    <div class="">
     <img  src="" class= 'images' id="masuperimage" >

        <SCRIPT language="JavaScript" type="text/javascript">
            // Un tableau qui va contenir toutes tes images.
            var images = new Array();
            /**
             *   images[] = "../images/7019.jpg";
             images[] = "../images/10811.jpg";
             images[] = "../images/rivah.jpg";
             images.push("../images/7019.jpg");
             images.push("../images/10811.jpg");
             // images.push("../images/8153.jpg");
             * @type {string}
             */
            images[0] = "../images/joueur/1.jpg";
            images[1] = "../images/joueur/2.jpg";
            images[2] = "../images/joueur/3.jpg";
            images[3] = "../images/joueur/4.jpg";
            images[4] = "../images/joueur/5.jpg";


            var pointeur = 0;

            function ChangerImage(){
                document.getElementById("masuperimage").src = images[pointeur];

                if(pointeur < images.length - 1){
                    pointeur++;
                }
                else{
                    pointeur = 0;
                }

                window.setInterval("ChangerImage()", 2000)
            }

            // Charge la fonction
            window.onload = function(){
                ChangerImage();
            }
        </SCRIPT>


</div>
</div>
</br>
</br>
<div id="cadre2">
    <div class="complet" align = "center">
        <div style = "width:400px; height: 250px; border: solid 2px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px; text-align: center"><b>Se connecter</b></div>

            <div style = "margin:40px">

                <form action = "" method = "post">
                    <label>Utilisateur  :</label>
                    <input type = "text" name = "username" class = "box" placeholder="nom utilisateur"/><br /><br />
                    <label>Mot de passe  :</label>  <input type = "password" name = "password" class = "box" placeholder="mot de passe"/><br/><br />
                    <div style="text-align: center";>
                        <input  type = "submit" value = " Entrer "/><br />
                    </div>
                </form>
                <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error  ?></div>


            </div>

        </div>

    </div>

</div>





</body>
</html>