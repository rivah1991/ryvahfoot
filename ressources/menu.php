<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        #menu {
            background-color: #f8f9fa;
            padding: 20px;
            
        }

        .nav-item {
            list-style: none;
            margin-bottom: 10px;
        }

        .nav-link {
            text-decoration: none;
            color: #343a40;
            font-weight: bold;
            display: block;
            padding: 5px 0;
            border-bottom: 1px solid #dee2e6;
            transition: background-color 0.3s;
        }

        .nav-link:hover {
            background-color: #e9ecef;
        }

        .dropdown-menu {
            display: none;
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
            position: absolute;
            z-index: 1;
        }

        .dropdown-item {
            color: #343a40;
            text-decoration: none;
            display: block;
            padding: 5px 0;
            transition: background-color 0.3s;
        }

        .dropdown-item:hover {
            background-color: #e9ecef;
        }

        .dropright:hover .dropdown-menu {
            display: block;
        }
    </style>
</head>
<body>
<div id="menu" style="width: 200px;">
    <ul class="nav flex-column">
        <li class="nav-item">
        <li class="nav-item dropdown dropright">
            <a class="nav-link dropdown-toggle"  href="#" id="navbarDropdownMenuLink" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                poule
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="../src/Poule.php">insertion poule de 4</a>
                <a class="dropdown-item" href="../src/Poule1.php">insertion poule de 1 a 10</a>
                <a class="dropdown-item" href="../src/listePoule.php">liste poule</a>


        </li>
        <li class="nav-item dropdown dropright">
            <a class="nav-link dropdown-toggle"  href="#" id="navbarDropdownMenuLink" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                match
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="../menu/eliminatoire.php">eliminatoire</a>
                <a class="dropdown-item" href="../menu/phaseFinal.php">phase final</a>


        </li>
        </li>
        <li class="nav-item dropright">
            <a class="nav-link dropdown-toggle" href="#" id="" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                action
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="../menu/chronometre.php">chronometre</a>
                <a class="dropdown-item" href="../menu/statistique.php">statistique</a>

            </div>
        </li>



        <li class="nav-item dropright">
            <a class="nav-link dropdown-toggle" href="#" id="" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Paiement
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="../menu/droitMatch.php">Club</a>



            </div>
        </li>

        <li class="nav-item dropright">
            <a class="nav-link dropdown-toggle" href="#" id="" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                club
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="../menu/PaiementReglé.php">Paiement reglé</a>
                <a class="dropdown-item" href="../menu/paiementNonReglé.php.php">Paiement non reglé</a>

            </div>
        </li>

    </ul>

</div>

</body>
</html>
