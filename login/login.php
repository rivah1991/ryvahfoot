<?php
include("../config/database.php");
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

        header("location: ../menu/classement.php");
    }else {
          $error =  "<script>alert('tsy ao anaty base ny anarana lah')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .container {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            height: 50vh;

        }
        #cadre1 {
            width: 50%;
            padding: 20px;
        }
        .images {
            width: 100%;
            border-radius: 10px;
            /* height: auto; */
            /* border: 2px solid #333333; */
        }

        #cadre2 {
            width: 50%;
            padding: 50px;
            box-sizing: border-box;
        }
        .login-form {
            background-color: #fff;
            border-radius: 10px;
            /* border: 2px solid #333333; */
            padding: 10px;
        }
        .login-form h2 {
            background-color: #333333;
            color: #fff;
            padding:20px;
            margin: 0;
            text-align: center;
        }
        .form-group {
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
        }
        .form-group input[type="text"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .form-group input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-group input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error-message {
            font-size: 14px;
            color: #cc0000;
            margin-top: 10px;
        }
        @media screen and (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            #cadre1, #cadre2 {
                width: 100%;
                padding: 10px;
            }
            .images {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div id="cadre1">
        <img src="../images/joueur/1.jpg" class="images" id="imagejoueur">
    </div>
    <div id="cadre2">
        <div class="login-form" >
            <h2 style="background : #ffc107">Se connecter</h2>
            <form action="" method="post">
                <div class="form-group">
                    <label for="username">Utilisateur :</label>
                    <input type="text" id="username" name="username" placeholder="Nom utilisateur" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password" placeholder="Mot de passe" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Entrer">
                </div>
            </form>
            <!-- <div class="error-message"><?php echo $error; ?></div> -->
        </div>
    </div>
</div>
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

                window.setTimeout("ChangerImage()", 5000)
            }

            // Charge la fonction
            window.onload = function(){
                ChangerImage();
            }
        </SCRIPT>

</body>
</html>
