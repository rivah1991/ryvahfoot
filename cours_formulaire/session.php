<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();
// On s'amuse à créer quelques variables de session dans $_SESSION
$_SESSION['prenom'] = 'Jean';
$_SESSION['nom'] = 'Dupont';
$_SESSION['age'] = 24;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Titre de ma page</title>
</head>
<body>
<p>
    Je me souviens de toi ! Tu t'appelles <?php echo
        $_SESSION['prenom'] . ' ' . $_SESSION['nom']; ?> !<br />
    Et ton âge hummm... Tu as <?php echo $_SESSION['age']; ?>
    ans, c'est ça ? :-D

</p>
<p>
    <a href="mapage.php">Lien vers mapage.php</a><br />
    <a href="monscript.php">Lien vers monscript.php</a><br />
    <a href="informations.php">Lien vers informations.php</a>
</p>
</body>
</html>